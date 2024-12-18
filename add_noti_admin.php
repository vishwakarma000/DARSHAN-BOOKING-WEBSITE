<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    echo "<script> window.location.href = 'admin.php'</script>";
    exit(); 
}
require_once "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    $sql = "INSERT INTO notification (message) VALUES ('$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Notification sent successfully')</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
    }
}

$sql = "SELECT * FROM notification ORDER BY date DESC";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="admin_side_page.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30"
                class="d-inline-block align-top" alt="">
            Admin
        </a>
    </nav>
    <div class="container mt-4">
        <form action="add_noti_admin.php" method="post">
            <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Enter Notice for Users"
                    id="exampleFormControlTextarea1" rows="3" required></textarea>
                <button type="submit" class="btn btn-dark mt-2">Send Now</button>
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <h2>Notifications</h2>
        <?php if (mysqli_num_rows($result) > 0) { ?>
        <ul class="list-group">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <li class="list-group-item"><?php echo $row['message']; ?> <br><hr>
            <marquee> This message was uploaded on-<?php echo $row['date']; ?> by admin.</marquee></li>
            <?php } ?>
        </ul>
        <?php } else { ?>
        <p>No notifications available.</p>
        <?php } ?>
    </div>

</body>

</html>
