<?php
session_start();
if (!isset( $_SESSION["email"])){
    // header("Location: login.php");
    echo"<script> window.location.href = 'login.php'</script>";
}
require_once "connect.php";
$sql = "SELECT name, type, data FROM images";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Gallery</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30" class="d-inline-block align-top" alt="">
            Darshan Booking Website
        </a>
    </nav> 

    <div class="container-fluid">
    <h2 class="display-4 "> Gallery</h2> <hr>
    <div>
        <?php
        // Display images retrieved from the database
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<img src="data:' . $row["type"] . ';base64,' . base64_encode($row["data"]) . '" alt="' . $row["name"] . '" style="width: 200px; height: 200px; margin: 10px;">';
            }
        } else {
            echo "No images uploaded yet.";
        }
        ?>
    </div></div>
</body>
</html>

