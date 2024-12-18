<?php 
session_start();
require_once "connect.php";
if (!isset($_SESSION["email"])) {
    echo "<script>window.location.href = 'login.php'</script>";
    exit(); // Stop 
}

$userEmail = $_SESSION["email"];
$fetch = "SELECT * FROM registration WHERE email = '$userEmail'";
$query = mysqli_query($conn, $fetch);
$result = mysqli_fetch_assoc($query);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Home</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   

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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="darshan.php">Darshan Pass</a>
              <a class="dropdown-item" href="bookpuja.php">Puja pass</a>
              <a class="dropdown-item" href="donation.php">Donation</a>

            </div>
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
    <!-- template introducing -->
<marquee style="color:orange; font-size:25px; background:brown;"  scrollamount="15">...!!जय गणेश!!... "वक्रतुंड महाकाय सूर्यकोटि समप्रभ निर्वीघ्नम कुरमे देवा सर्वकार्येषु सर्वदा" सर्व गणेश भक्तांच्या हार्दिक स्वागत ,ही वेबसाईट तुमच्या सगळ्यांसाठी एक वेगळा प्रकार नी ऑनलाइन दर्शन बुकिंग ,पूजा बुकिंग, नोटिफिकेशन्स , डोनेशन आणि फीडबॅक साठी तयार केला आहे. धन्यवाद!!!</marquee>

<div class="container">
<main role="main" class="container">

<div class="starter-template">
  <h1><?php echo "Hello ", $result['Fullname']; ?></h1>
  <p class="lead">Darshan booking website welcomes you dear <?php echo  $result['Fullname']; ?>.<br> Your Email  id <b>:" <?php echo  $result['email']; ?>"</b>
  <br> Your Mobile no. <b>:" <?php echo  $result['phone_no']; ?>"</b>
  </p>
  <div class="form-inline mt-2 mt-md-0">
        <a class="btn btn-outline-success my-2 my-sm-0 mr-1" href="update_email.php" style="border-radius: 10px;" type="submit">Update Email</a>
        <a class="btn btn-outline-success my-2 my-sm-0" href="change_password.php" style="border-radius: 10px;" type="submit">Change Password</a>
      </div>
</div>

</main>
</div>

  </body>
</html>


