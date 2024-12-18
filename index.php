<?php 
session_start();
if (isset( $_SESSION["user"])){
    // header("Location: home.php");
    echo"<script> window.location.href = 'home.php'</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Darshan Booking Website</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Just an image -->
      
        <a class="navbar-brand" href="index.php">
          <img src="img/logo1.jpg" style="border-radius: 10px;" width="40" height="40"  alt="logo">
        </a>
      <!-- nav bars -->
      <a class="navbar-brand" href="index.php">Darshan Booking Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
        </ul>
        
      </div>
      <div class="form-inline mt-2 mt-md-0">
        <a class="btn btn-outline-success my-2 my-sm-0 mr-1" href="login.php" style="border-radius: 10px;" type="submit">Login</a>
        <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php" style="border-radius: 10px;" type="submit">Admin</a>
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
          <img src="img/bappa1.jpg " height="400"   class="d-block w-100" alt="...">
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
<div class="container-fluid my-4"  > 
  <div class="jumbotron " >
    <h1 style="letter-spacing: 5px;">जय गणेश</h1>
    <hr>
    <p class="lead" style="letter-spacing: 1px; font-weight: 500;" >...!!जय गणेश!!... "वक्रतुंड महाकाय सूर्यकोटि समप्रभ निर्वीघ्नम कुरमे देवा सर्वकार्येषु सर्वदा" सर्व गणेश भक्तांच्या हार्दिक स्वागत ,ही वेबसाईट तुमच्या सगळ्यांसाठी एक वेगळा प्रकार नी ऑनलाइन दर्शन बुकिंग ,पूजा बुकिंग, नोटिफिकेशन्स , डोनेशन आणि फीडबॅक साठी तयार केला आहे. धन्यवाद!!!</p>
    <a class="btn btn-outline-success " href="register.html" role="button">Register Now »</a>
  </div>
</div>
<!-- servicess -->
<div class="container">
  <h1 class="display-4 " style="text-align: center;">Services</h1>
  <hr>
 <div class="row">
  <!-- darshan book -->
  <div class="col-md-4">
    <div class="card ml-3 my-4" style="width: 18rem;">
      <img src="img/darshan.jpg" height="200" class="card-img-top p-3" alt="...">
      <div class="card-body">
        <h5 class="card-title">Darshan Pass</h5>
        <p class="card-text">Book your darshan pass and  proceed for the shree darshan by simply login. <br><b>Note:</b> Darshan Pass is not required for children under 9 years old</p>
        <a href="login.php" class="btn btn-outline-warning">book my darshan</a>
      </div>
    </div>
  </div>
  <!-- puja booking -->
 <div class="col-md-4">
  <div class="card ml-3 my-4" style="width: 18rem;">
    <img src="img/puja1.jpg" height="200" class="card-img-top p-3" alt="...">
    <div class="card-body">
      <h5 class="card-title">Puja Pass</h5>
      <p class="card-text">Book your Special puja's like Abhishek's,etc. by simply login  <br><b>Note:</b> After booking cancellection is <b>not </b>allowed</p>
      <a href="login.html" class="btn btn-outline-warning">book my puja</a>
    </div>
  </div>
 </div>
 <!-- donation -->
 <div class="col-md-4">
  <div class="card ml-3 my-4" style="width: 18rem;">
    <img src="img/donation.png" height="200" class="card-img-top p-3" alt="...">
    <div class="card-body">
      <h5 class="card-title">Donation</h5>
      <p class="card-text">Donate here!.. by simply login. <br>
        Be aware of frauds agents now you can make donation  online. </p> <br>
      <a href="contact.php" class="btn btn-outline-warning">Donation</a>
    </div>
  </div>
 </div>

</div>
</div>


<?php include "footer.php" ;?>
  </body>
</html>


