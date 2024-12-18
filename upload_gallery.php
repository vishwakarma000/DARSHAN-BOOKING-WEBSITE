<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    echo "<script> window.location.href = 'admin.php'</script>";
    exit(); // Stop further execution
}
require_once "connect.php";

if(isset($_POST["submit"])) {
    // Get the file name
    $imageName = $_FILES["image"]["name"];
    // Get the temporary location of the file
    $imageTmpName = $_FILES["image"]["tmp_name"];
    // Get the file type
    $imageType = $_FILES["image"]["type"];
    // Read the file content
    $imageData = file_get_contents($imageTmpName);
    
    // Prepare SQL statement to insert the image data into the database
    $sql = "INSERT INTO images (name, type, data) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $imageName, $imageType, $imageData);
    
    // Execute the SQL statement
    if($stmt->execute()) {
        echo "<script>alert('Image uploaded successfully')</script>";
    } else {
        echo "<script>alert('Failed to  upload images')</script>";
    }
}

// Retrieve images from the database
$sql = "SELECT name, type, data FROM images";
$result = $conn->query($sql);

// Display images only if there are images in the database
$imageDataArray = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $imageDataArray[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Admin Gallery</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="admin.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30" class="d-inline-block align-top" alt="">
            Admin
        </a>
    </nav> 

    <div class="container-fluid">
    <h2>Upload Image</h2><hr>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <button type="submit" name="submit">Upload</button>
    </form><hr>

    <hr>

    <h2>Uploaded Images</h2>
    <div>
        <?php
        if (!empty($imageDataArray)) {
            foreach ($imageDataArray as $imageData) {
                echo '<img src="data:' . $imageData["type"] . ';base64,' . base64_encode($imageData["data"]) . '" alt="' . $imageData["name"] . '" style="width: 200px; height: 200px; margin: 10px;">';
            }
        } else {
            echo "No images uploaded yet.";
        }
        ?>
    </div>
    </div>
</body>
</html>
