<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30" class="d-inline-block align-top" alt="">
            Darshan Booking Website
        </a>
    </nav> 

    <!-- Notifications -->
    <div class="container mt-4">
        <h1 class="display-4" style="text-align: center;">NOTIFICATIONS</h1>
        <hr>

        <?php
        require_once "connect.php";

        // Fetch latest notifications from the database
        $query = "SELECT * FROM notification ORDER BY date DESC";
        $result = mysqli_query($conn, $query);

        // Check if there are any notifications
        if (mysqli_num_rows($result) > 0) {
            // Display notifications
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="jumbotron jumbotron-fluid">';
                echo '<div class="container">';
                echo '<h3  >' . $row['message'] . '</h3 >';
                echo '<marquee><p class="lead">This message was uploaded on ' . $row['date'] . '</p> </marquee>';
                echo '</div></div>';
            }
        } else {
            echo '<div class="alert alert-info" role="alert">No notifications available.</div>';
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
