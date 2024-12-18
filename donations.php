<?php
session_start();
if (!isset($_SESSION["email"])){
    echo "<script>window.location.href = 'login.php'</script>";
    exit(); 
}

require_once "connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $amount = 100;
    $amount = $_POST["amount"];
    $email = $_SESSION['email']; 
    $date = date('Y-m-d H:i:s');
    $status = "success"; 
 
            $stmt = $conn->prepare("INSERT INTO donation (amount, status, email, transcation_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("dsss", $amount, $status, $email, $date);

            if ($stmt->execute() === TRUE) {
                echo "<script> alert('Donation successful!')</script>";
                echo "<script> window.location.href = 'donation.php'</script>";
                exit(); 
            } else {
                echo "Error: " . $stmt->error;
            }

    $stmt->close();
    $conn->close();
}
?>