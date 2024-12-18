
<?php
session_start();  
include "connect.php";
require 'phpmailer2/SMTP.php';
require 'phpmailer2/POP3.php';
require 'phpmailer2/PHPMailer.php';
require 'phpmailer2/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['email'])) {
        exit('Empty Email');
    }

    $email = $_POST['email'];

    if ($stmt = $conn->prepare('SELECT email FROM registration WHERE email = ?')) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Generate unique token for the reset link
            $resetToken = bin2hex(random_bytes(32));

            // Store the token and user email in the session
            $_SESSION['reset_token'] = $resetToken;
            $_SESSION['reset_email'] = $email;

            // Create PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                // Configure mail settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'idarshanbook@gmail.com'; 
                $mail->Password   = 'vhif uujc yuap kgnt'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $resetLink = 'http://localhost/DARSHAN%20BOOKING/reset.php?token=' . $resetToken;
                $mailBody = 'Click the following link to reset your password: ' . $resetLink;

                // Set email content
                $mail->setFrom('idarshanbook@gmail.com', 'Darshan');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Link';
                $mail->Body    = $mailBody;

                // Send the email.
                $mail->send();

                echo '<script> alert("Password reset link has been sent to your email.")</script>';
                echo '<script>window.location.href = "forget.html"</script>';
                // echo 'Password reset link has been sent to your email.';
                exit();
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        } else {
            echo '<script> alert("Email not found. Please enter a registered email.")</script>';
            echo '<script>window.location.href = "forget.html"</script>';

            // echo 'Email not found. Please enter a registered email.';
        }

        $stmt->close();
    } else {
        echo 'Error Occurred';
    }

    $conn->close();
} else {
    // header("Location: forgot.php");
    echo"<script> window.location.href = 'forget.php'</script>";
    
    exit();
}
?>

<!-- https://bookdarshan.000webhostapp.com/reset.php -->








    
       



