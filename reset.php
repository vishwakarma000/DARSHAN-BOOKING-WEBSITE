
<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection
    include "connect.php";

    // Initialize error message
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
        // Hash the new password before storing it in the database
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $email = $_SESSION['email']; // Assuming you stored the user's email during OTP verification
        $updateQuery = "UPDATE registration SET password = ? WHERE email = ?";
        
        if ($stmt = $conn->prepare($updateQuery)) {
            $stmt->bind_param('ss', $passwordHash, $email);
            $stmt->execute();

            // Redirect to a success page or login page
            // header("Location: login.php");
            echo"<script> window.location.href = 'login.php'</script>";

            exit();
        } else {
            $error_message = 'Error updating the password.';
        }
    }
}
?>