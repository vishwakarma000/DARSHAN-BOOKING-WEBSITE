<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href = 'login.php'</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        
        // Database connection
        // $conn = mysqli_connect("localhost", "root", "", "sansthan") or die("connection failed");
        require_once "connect.php";
        $userEmail = $_SESSION['email'];
        
        $query = "SELECT * FROM registration WHERE email = '$userEmail'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];
        if (password_verify($currentPassword, $storedPassword)) {
            if ($newPassword === $confirmPassword) {
                // Hash the new password
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                
                // Update the user's password in the database
                $updateQuery = "UPDATE registration SET password = '$newPasswordHash' WHERE email = '$userEmail'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    echo "<script>alert('Password changed successfully');</script>";
                    echo '<script> window.location.href = "profile.php"</script>';
                } else {
                    echo "<script>alert('Error changing password');</script>";
                }
            } else {
                echo "<script>alert('Oops!! password do not match please try again');</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect');</script>";
        }
        mysqli_close($conn);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Bootstrap CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Home</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Just an image -->
      
        <a class="navbar-brand" href="home.php">
          <img src="img/logo1.jpg" style="border-radius: 10px;" width="40" height="40"  alt="logo">
        </a>
      <!-- nav bars -->
      <a class="navbar-brand" href="home.php">Darshan Booking Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
     
    </nav>
    <!-- template introducing -->
<marquee style="color:orange; font-size:25px; background:brown;"  scrollamount="15">...!!जय गणेश!!... "वक्रतुंड महाकाय सूर्यकोटि समप्रभ निर्वीघ्नम कुरमे देवा सर्वकार्येषु सर्वदा" सर्व गणेश भक्तांच्या हार्दिक स्वागत ,ही वेबसाईट तुमच्या सगळ्यांसाठी एक वेगळा प्रकार नी ऑनलाइन दर्शन बुकिंग ,पूजा बुकिंग, नोटिफिकेशन्स , डोनेशन आणि फीडबॅक साठी तयार केला आहे. धन्यवाद!!!</marquee>

<div class="container">
<main role="main" class="container">

<div class="container mt-5">
    <h2 class="mb-4">Change Password</h2>
    <div class="row">
        <div class="col-md-6">
            <form id="change-password-form" method="post" action="change_password.php">
                <div class="form-group" >
                    <label for="current-password">Current Password:</label>
                    <input type="password" class="form-control" id="current-password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" class="form-control" id="new-password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-dark">Change Password</button>
            </form>
        </div>
    </div>
</div>

</main>
</div>
</body>
</html>
