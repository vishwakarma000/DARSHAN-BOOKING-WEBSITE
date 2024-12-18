<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php 
   
    require_once "connect.php";
    if (!isset($_SESSION["email"])) {
        // Redirect to the login page if not logged in
        echo "<script>window.location.href = 'login.php'</script>";
        exit(); // Stop further execution
    }
    ?> 
    
    <div class="wrapper">
        <form action="darshan.php" method=""  >
            <div class="logo">
                <img src="img/logo1.jpg" >
            </div>
            <h1> Darshan Pass</h1>
            <button type="button" class="sub-btn" onclick="location.href='bookpass.php'">Book  Pass</button>
            <!-- <button type="button" class="sub-btn-cp" onclick="location.href='vipass.php'">VIP Pass</button> -->
            <button type="button" class="sub-btn-cp" onclick="location.href='mybooking.php'">Cancel Pass</button>

            
            <div class="register-pg">
            <label>Back to</label> <a href="home.php">Home Page</a>
            </div>
        </form>
    </div>
</body>
</html>