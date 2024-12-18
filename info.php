<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Table</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .table-dark-yellow thead th {
      background-color: rgb(248, 162, 33); /* Dark yellow background color */
      color: #fff; /* White text color */
    }
  </style>
</head>
<body>
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
            <a class="nav-link" href="#">Contact us</a>
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
      <!-- <a class="btn btn-outline-success my-2 my-sm-0 mr-1" href="#"  style="border-radius: 10px;" type="submit">Logout</a> -->
      <a href="notification.php" style="text-decoration: none; color: inherit; font-size: 30px;" ><i class='bx bx-bell' ></i></a>
      <a href="logout.php" style="text-decoration: none; color: inherit; font-size: 35px;" ><i class='bx bx-power-off' ></i></a>

    </div>
    </nav>
  <div class="container my-4">
    <h2 class="text-center">Temple Schedule</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-dark-yellow">
        <thead>
          <tr>
            <th> Monday to Sunday</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Kakad Aarti – The early morning prayer: at 6.30 a.m. to 7.00 a.m.</td>
          </tr>
          <tr>
            <td>Shree Darshan – morning at 7.00 a.m. to morning 11.00 a.m.</td>
          </tr>
          <tr>
            <td>Naivedhya – morning at 11.30 p.m. to afternoon 12.30 p.m.</td>
          </tr>
          <tr>
            <td>Shree Darshan – afternoon at 12.30 p.m. to evening 7.00 p.m.</td>
          </tr>
          <tr>
            <td>Aarti -Evening – The evening Prayer : 7.30 p.m. to 8.00 p.m</td>
          </tr>
          <tr>
            <td>Shejaarti – The last Aarti of the day
                 before bedtime : night 9.50 p. m. (The temple Gabhara doors remain closed after shejaarti)</td>
          </tr>
          <tr>
            <td>The Temple is fully closed till next morning after ‘Shejaarti.</td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered table-dark-yellow">
      <thead>
          <tc>
            <th> Dates</th>
          </tc>
          <tc>
            <th>Upcoming Events</th>
          </tc>
        </thead>
        <tbody>
        <tc>
            <td> 28/02/2024</td>
        </tc>
        <tc>
            <td>Ganesh sankashti chaturthi</td>
        </tc>
        <tr>
        <tc>
            <td> 08/03/2024</td>
        </tc>
        <tc>
            <td>Maha shivratri</td>
        </tc>
        </tr>
        <!--  -->
        <tr>
        <tc>
            <td> 17/04/2024</td>
        </tc>
        <tc>
            <td>Shri ram navmi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 26/05/2024</td>
        </tc>
        <tc>
            <td> Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 25/06/2024</td>
        </tc>
        <tc>
            <td>Angark Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 24/07/2024</td>
        </tc>
        <tc>
            <td> Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 22/08/2024</td>
        </tc>
        <tc>
            <td> Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 26/08/2024</td>
        </tc>
        <tc>
            <td>Gokul astmi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 07/09/2024</td>
        </tc>
        <tc>
            <td> <b>Ganesh  chaturthi</b></td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 21/09/2024</td>
        </tc>
        <tc>
            <td> Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 20/10/2024</td>
        </tc>
        <tc>
            <td> Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 01/11/2024</td>
        </tc>
        <tc>
            <td>Diwali</td>
        </tc>
        </tr>
        <tr>
        <tc>
            <td> 18/12/2024</td>
        </tc>
        <tc>
            <td> Ganesh sankashti chaturthi</td>
        </tc>
        </tr>
        </tbody>

  </table>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
