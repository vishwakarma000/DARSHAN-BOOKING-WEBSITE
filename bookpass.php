<?php 
include "connect.php";

if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $Time = $_POST["Time"];
    $person = $_POST["person"];  
    require_once "connect.php";

    $sql = "INSERT INTO darshanpass (date, Time, person) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    // Check if statement preparation is successful
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $date, $Time, $person);
        mysqli_stmt_execute($stmt);
        echo '<script> alert("Booking successful")</script>';
        echo '<script> window.location.href = "home.php"</script>';
    } else {
        die("Something went wrong");
    }

    mysqli_stmt_close($stmt);  // Close the statement
    mysqli_close($conn);  // Close the connection
}

?>









