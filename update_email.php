<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='login.php'</script>";
    exit();
}
require_once "connect.php";

$userEmail = $_SESSION['email'];
$query = "SELECT * FROM registration WHERE email = '$userEmail'";
$result1 = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newEmail = $_POST['new_email'];

    if ($newEmail === $userData['email']) {
        echo "<script>alert('New email must be different from the current email');</script>";
        echo "<script>window.location.href='update_email.php'</script>";
        exit();
    }
    $checkQuery = "SELECT * FROM registration WHERE email = '$newEmail'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email already exists for another user. Please choose a different email');</script>";
        echo "<script>window.location.href='update_email.php'</script>";
        exit();
    }
          
    $updateQuery = "UPDATE registration SET email=? WHERE email=?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    mysqli_stmt_bind_param($stmt, "ss", $newEmail, $userEmail);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Email updated successfully');</script>";
        
        $_SESSION['email'] = $newEmail;

        echo "<script>window.location.href='profile.php'</script>";
    } else {
        echo "<script>alert('Error updating email');</script>";
        echo "<script>window.location.href='update_email.php'</script>";
    }

    mysqli_stmt_close($stmt);    
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Update Email</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="40" height="40" alt="logo">
        </a>
        <a class="navbar-brand" href="home.php">Darshan Booking Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Update Email</h2>
        <div class="row">
            <div class="col-md-6">
                <label for="email"><b>Email:</b></label><br>
                <div class="card"><?php echo $userData['email']; ?></div><br>
                <form id="update-email-form" method="post" action="">
                    <div class="form-group">
                        <label for="new-email">New Email:</label>
                        <input type="email" class="form-control" id="new-email" name="new_email" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Update Email</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
