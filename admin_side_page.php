<?php 
session_start();
if (!isset( $_SESSION["admin_id"]) ){
  // header("Location: login.php");
  echo"<script> window.location.href = 'admin.php'</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Admin</title>
  </head>
  <body style="background-image: url('img/images (4).jpg'); background-size: cover; background-position: center;">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin_side_page.php">
          <img src="img/logo1.jpg" style="border-radius: 10px;" width="40" height="40"  alt="logo">
        </a>
      <a class="navbar-brand" href="admin_side_page.php">Darshan Booking Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="add_noti_admin.php">Upload Notification</a>
              <a class="dropdown-item" href="upload_gallery.php">Upload Images</a>
              <a class="dropdown-item" href="devotee_info.php">View Devotee</a>
              <a class="dropdown-item" href="feedback_admin.php">View Feedback</a>
            </div>
          </li>
        </ul>
        
      </div>
      <div class="form-inline mt-2 mt-md-0">
      <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');" style="text-decoration: none; color: inherit; font-size: 35px;" ><i class='bx bx-power-off' ></i></a>

    </div>
    </nav>
    <!-- imgs running on background -->

    <!-- template introducing -->
<marquee style="color:orange; font-size:25px; background:brown;"  scrollamount="15">...!!जय गणेश!!... Welcome you,ADMIN!!!</marquee>
<!-- servicess line 1 -->
<div class="container my-4">
  <h3 class="display-5 " style="text-align: center;">Welcome Admin</h3>
  <hr>
 <div class="row ">
    <!-- Profile -->
    <div class="col-md-3  text-center mx-auto ">
    <div class="card ml-3 my-4  " style="width: 13rem; ">
    <img src="img/noti.jpg" height="200" width="100"class="card-img-top p-3 " alt="...">
      <div class="card-body mt-0 " >
        <!-- <h5 class="card-title ">Darshan Pass</h5> -->
        <a href="add_noti_admin.php" class="btn btn-outline-warning mb-3 ">Notification</a>
      </div>
    </div>
  </div>
  <!-- darshan book -->
  <div class="col-md-3 text-center mx-auto ">
    <div class="card ml-3 my-4   " style="width: 13rem;">
    <img src="img/booking.png" height="200" width="100" class="card-img-top p-3 " alt="...">
      
      <div class="card-body mt-0 " >
        <!-- <h5 class="card-title ">Darshan Pass</h5> -->
        <a href="pass_report.php" class="btn btn-outline-warning mb-3 ">Pass Report</a>
      </div>
    </div>
  </div>
  <!-- puja booking -->
 <div class="col-md-3 text-center mx-auto " >
  <div class="card ml-3 my-4  " style="width: 13rem; ">
    <img src="img/devotee.png" height="200" width="100" class="card-img-top p-3  " alt="...">
    <div class="card-body mt-0">
      <!-- <h5 class="card-title">Puja Pass</h5> -->
      <a href="devotee_info.php" class="btn btn-outline-warning mb-3 ">View Devotee</a>
    </div>
  </div>
 </div>
 <!-- donation -->
 <div class="col-md-3 text-center mx-auto ">
  <div class="card ml-3 my-4  " style="width: 13rem;">
    <img src="img/donation.png" height="200" width="100" class="card-img-top p-3  " alt="...">
    <div class="card-body mt-0">
      <!-- <h5 class="card-title">Donation</h5> -->
      <a href="admin_donation.php" class="btn btn-outline-warning mb-3 ">Donation</a>
    </div>
  </div>
 </div>

</div>
</div>
  </body>
</html>


