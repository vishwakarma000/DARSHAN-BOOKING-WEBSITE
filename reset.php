<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "connect.php";
    $error_message = '';

    // Validate and sanitize the new password and confirm password
    $newPassword = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
    $confirmPassword = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validate new password
    if (empty($newPassword)) {
        $error_message = 'Please enter a new password.';
    } elseif (strlen($newPassword) < 8) {
        $error_message = 'Password must be at least 8 characters long.';
    } elseif ($newPassword !== $confirmPassword) {
        $error_message = 'Passwords do not match.';
    } else {
        // Hashing the new password 
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $email = $_SESSION['reset_email']; // Assuming you stored the user's email during OTP verification
        $updateQuery = "UPDATE registration SET password = ? WHERE email = ?";
        
        if ($stmt = $conn->prepare($updateQuery)) {
            $stmt->bind_param('ss', $passwordHash, $email);
            $stmt->execute();
            echo '<script> alert("Password reset successfull")</script>';
            echo"<script> window.location.href = 'login.php'</script>";

            exit();
        } else {
            $error_message = 'Error updating the password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Reset Page</title>
</head>

<body>
    <div class="wrapper">
        <form action="reset.php" method="post">
            <div class="form-box">
                <div class="logo">
                    <img src="img/logo1.jpg">
                </div>
                <h1>Reset password</h1>
                <div class="input-box">
                <input type="password" class="name" placeholder="New Password" id="new_password" name="new_password"  required>
                <small> <span id="Message pass"></span></small>
                <i class='bx bx-lock-alt' ></i>            
            </div>
            <div class="input-box">
               
                <input type="password" class="name" placeholder="Confirm Password" id="confirm_password"  name="confirm_password"  required>
                 <small> <span id="Message pass-cnf"></span></small>
                 <i class='bx bxs-lock-alt' ></i>            
            </div>
                <button type="submit" name="reset" class="sub-btn">SUBMIT</button>
                
            </div>
            <div class="register-pg">
                <label>Now</label> <a href="login.php">Login</a>
             </div>
        </form>
    </div>
</body>
</html>