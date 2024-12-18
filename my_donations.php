<?php
session_start();
require_once "connect.php"; 

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION["email"];

$query = "SELECT * FROM donation WHERE email = '$userEmail'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Donation List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">      
        <a class="navbar-brand" href="home.php">
          <img src="img/logo1.jpg" style="border-radius: 10px;" width="40" height="40"  alt="logo">
        </a>
      <!-- nav bars -->
      <a class="navbar-brand" href="home.php">Darshan Booking Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
        
          <li class="nav-item">
              <a class="nav-link" href="my_donations.php">My Donation List</a>
          </li>
        </ul>
        
      </div>
      <div class="form-inline mt-2 mt-md-0">
      <!-- <a class="btn btn-outline-success my-2 my-sm-0 mr-1" href="#"  style="border-radius: 10px;" type="submit">Logout</a> -->
      <a href="notification.php" style="text-decoration: none; color: inherit; font-size: 30px;" ><i class='bx bx-bell' ></i></a>
      <a href="logout.php" style="text-decoration: none; color: inherit; font-size: 35px;" ><i class='bx bx-power-off' ></i></a>

    </div>
    </nav>

    <div class="container">
        <h1>My Donation List</h1>
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<p>Thank you for your donations:</p>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>Dear devotee we have accepted a amount of <b> {$row['amount']}₹ </b> -on  {$row['transcation_date']}. Status:<b><i> {$row['status']} </i></b>- Transaction Date: {$row['transcation_date']} Thankyou for donating us.</p>";
               echo  " <hr>";
            }
        } else {
            echo "<p>No donations found.</p>";
        }
        ?>
    </div>

</body>
</html>
