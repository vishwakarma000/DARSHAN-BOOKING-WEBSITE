<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "<script>window.location.href = 'login.php'</script>";
    exit();
}

require_once "connect.php";
mysqli_set_charset($conn, 'utf8mb4');

$userEmail = $_SESSION["email"];
$query = "SELECT id FROM registration WHERE email = '$userEmail'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$userId = $row['id'];

if (isset($_POST['feedback'])) {
    $feedbackMessage = $_POST['feedback'];

    $insertQuery = "INSERT INTO feedback (userid, email, message) VALUES ('$userId', '$userEmail', '$feedbackMessage')";
    if (mysqli_query($conn, $insertQuery)) {
        echo '<script>alert("Feedback submitted successfully!")</script>';
    } else {
        echo '<script>alert("Error submitting feedback. Please try again later.")</script>';
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .pass-info {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Darshan Booking Website
        </a>
    </nav>

    <!-- Feedback Form -->
    <div class="container mt-5">
        <h3 class="display-4 text-center mb-4">Feedback</h3>
        <form action="feedback.php" method="post" accept-charset="UTF-8">
            <div class="form-group">
                <label for="feedback">Your Feedback</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Submit Feedback</button>
        </form>
    </div>

</body>

</html>