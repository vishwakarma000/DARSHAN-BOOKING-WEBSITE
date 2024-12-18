<?php
session_start();
if (!isset($_SESSION['email'])) {
    // header("Location: login.php");
    echo "<script>window.location.href = 'login.php'</script>";
    exit();
}

// Database connection
// $conn = mysqli_connect("localhost", "root", "", "sansthan") or die("Connection failed");
require_once "connect.php";

if (isset($_POST['pass_id'])) {
    $passId = $_POST['pass_id'];

    $updateQuery = "UPDATE darshanpass SET status = 'cancelled' WHERE id = $passId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
   
        // header("Location: mybooking.php");
        echo "<script>window.location.href = 'mybooking.php'</script>";

        exit();
    } else {
        // Error cancelling pass
        echo "Error cancelling pass.";
    }
} else {
    // Pass ID not provided
    echo "Pass ID not provided.";
}
?>
