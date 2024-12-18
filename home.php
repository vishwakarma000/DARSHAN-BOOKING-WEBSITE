<?php 
session_start();
if (!isset( $_SESSION["email"])){
    // header("Location: login.php");
    echo"<script> window.location.href = 'login.php'</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Bootstrap CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Home</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Just an image -->
      
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Services
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="darshan.php">Darshan Pass</a>
            <a class="dropdown-item" href="bookpuja.php">Puja pass</a>
            <a class="dropdown-item" href="donation.php">Donation</a>
          </div>
        </li>
        </ul>
        
      </div>
      <div class="form-inline mt-2 mt-md-0">
      <!-- <a class="btn btn-outline-success my-2 my-sm-0 mr-1" href="#"  style="border-radius: 10px;" type="submit">Logout</a> -->
      <a href="notification.php" style="text-decoration: none; color: inherit; font-size: 30px;" ><i class='bx bx-bell' ></i></a>
      <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');" style="text-decoration: none; color: inherit; font-size: 35px;" ><i class='bx bx-power-off' ></i></a>

    </div>
    </nav>
    <!-- imgs running on background -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/bappa2.png " height="400" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/bappa1.jpg " height="400" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/bg-lalbaug.avif" height="400" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/images (1).jpg" height="400" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
           
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/images (2).jpg" height="400" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
           
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
    <!-- template introducing -->
<marquee style="color:orange; font-size:25px; background:brown;"  scrollamount="15">...!!जय गणेश!!... "वक्रतुंड महाकाय सूर्यकोटि समप्रभ निर्वीघ्नम कुरमे देवा सर्वकार्येषु सर्वदा" सर्व गणेश भक्तांच्या हार्दिक स्वागत ,ही वेबसाईट तुमच्या सगळ्यांसाठी एक वेगळा प्रकार नी ऑनलाइन दर्शन बुकिंग ,पूजा बुकिंग, नोटिफिकेशन्स , डोनेशन आणि फीडबॅक साठी तयार केला आहे. धन्यवाद!!!</marquee>
<!-- servicess line 1 -->
<div class="container my-4">
  <h1 class="display-4 " style="text-align: center;">Services</h1>
  <hr>
 <div class="row ">
    <!-- Profile -->
    <div class="col-md-3  text-center mx-auto ">
    <div class="card ml-3 my-4  rounded-circle" style="width: 13rem; padding:0px 20px;">
      <img src="img/profile.png" height="200" class="card-img-top p-3 rounded-circle" alt="...">
      <div class="card-body mt-0 " >
        <!-- <h5 class="card-title ">Darshan Pass</h5> -->
        <a href="profile.php" class="btn btn-outline-warning mb-3 ">My Profile</a>
      </div>
    </div>
  </div>
  <!-- darshan book -->
  <div class="col-md-3 text-center mx-auto ">
    <div class="card ml-3 my-4  rounded-circle " style="width: 13rem;">
      <img src="img/darshan.jpg" height="200" class="card-img-top p-3 rounded-circle" alt="...">
      <div class="card-body mt-0 " >
        <!-- <h5 class="card-title ">Darshan Pass</h5> -->
        <a href="darshan.php" class="btn btn-outline-warning mb-3 ">Darshan Pass</a>
      </div>
    </div>
  </div>
  <!-- puja booking -->
 <div class="col-md-3 text-center mx-auto " >
  <div class="card ml-3 my-4  rounded-circle" style="width: 13rem; padding:0px 20px;">
    <img src="img/puja1.jpg" height="200" class="card-img-top p-3 rounded-circle " alt="...">
    <div class="card-body mt-0">
      <!-- <h5 class="card-title">Puja Pass</h5> -->
      <a href="bookpuja.php" class="btn btn-outline-warning mb-3 ">Puja Pass</a>
    </div>
  </div>
 </div>
 <!-- donation -->
 <div class="col-md-3 text-center mx-auto ">
  <div class="card ml-3 my-4  rounded-circle" style="width: 13rem; padding:0px 20px;">
    <img src="img/donation.png" height="200" class="card-img-top p-3 rounded-circle " alt="...">
    <div class="card-body mt-0">
      <!-- <h5 class="card-title">Donation</h5> -->
      <a href="donation.php" class="btn btn-outline-warning mb-3 ">Donation</a>
    </div>
  </div>
 </div>

</div>
</div>

<!-- service line 2 -->

<div class="container my-4">
  
 <div class="row ">
    <!-- gallery -->
    <div class="col-md-3  text-center mx-auto ">
    <div class="card ml-3 my-4  rounded-circle" style="width: 13rem; padding:0px 20px;">
      <img src="img/gallery.jpg" height="200" class="card-img-top p-3 rounded-circle" alt="...">
      <div class="card-body mt-0 " >
        <!-- <h5 class="card-title ">Darshan Pass</h5> -->
        <a href="gallery.php" class="btn btn-outline-warning mb-3 ">Gallery</a>
      </div>
    </div>
  </div>
  <!-- My booking -->
  <div class="col-md-3 text-center mx-auto ">
    <div class="card ml-3 my-4  rounded-circle " style="width: 13rem;">
      <img src="img/booking.png" height="200" class="card-img-top p-3 rounded-circle" alt="...">
      <div class="card-body mt-0 " >
        <!-- <h5 class="card-title ">Darshan Pass</h5> -->
        <a href="mybooking.php" class="btn btn-outline-warning mb-3 ">My Booking</a>
      </div>
    </div>
  </div>
  <!-- puja booking -->
 <div class="col-md-3 text-center mx-auto " >
  <div class="card ml-3 my-4  rounded-circle" style="width: 13rem; padding:0px 20px;">
    <img src="img/feedback.png" height="200" class="card-img-top p-3 rounded-circle " alt="...">
    <div class="card-body mt-0">
      <!-- <h5 class="card-title">Puja Pass</h5> -->
      <a href="feedback.php" class="btn btn-outline-warning mb-3 ">Feedback</a>
    </div>
  </div>
 </div>
 <!-- donation -->
 <div class="col-md-3 text-center mx-auto ">
  <div class="card ml-3 my-4  rounded-circle" style="width: 13rem; padding:0px 20px;">
    <img src="img/contact.png" height="200" class="card-img-top p-3 rounded-circle " alt="...">
    <div class="card-body mt-0">
      <!-- <h5 class="card-title">Donation</h5> -->
      <a href="contact.php" class="btn btn-outline-warning mb-3 ">Contact Us</a>
    </div>
  </div>
 </div>

</div>
</div>

<?php include "footer.php" ;?>
  </body>
</html>


