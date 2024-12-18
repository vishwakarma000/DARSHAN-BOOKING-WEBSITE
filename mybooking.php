<?php
session_start();
if (!isset($_SESSION['email'])) {
    // header("Location: login.php");
    echo"<script> window.location.href = 'login.php'</script>";
    exit();
}
require_once "connect.php";
$userEmail = $_SESSION['email'];
$query = "SELECT * FROM registration WHERE email = '$userEmail'";
$result1 = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result1);

// Fetch and cancel darshan passes for the user for prior dates
$userId = $userData['id'];
$todayDate = date('Y-m-d');

// Cancel darshan passes prior to today's date
$cancelDarshanQuery = "UPDATE darshanpass SET status = 'cancelled' WHERE userid = $userId AND date < '$todayDate' AND status = 'active'";
mysqli_query($conn, $cancelDarshanQuery);

// Fetch booked darshan passes for the user for today and future dates
$darshanPassesQuery = "SELECT * FROM darshanpass WHERE userid = $userId AND (date >= '$todayDate' OR status = 'active') ORDER BY date ASC"; // Fetch passes in ascending order of date
$darshanPassesResult = mysqli_query($conn, $darshanPassesQuery);

// Fetch and cancel puja passes for the user for prior dates
$cancelPujaQuery = "UPDATE pujapass SET status = 'cancelled' WHERE userid = $userId AND date < '$todayDate' AND status = 'active'";
mysqli_query($conn, $cancelPujaQuery);

// Fetch booked puja passes for the user for today and future dates
$pujaPassesQuery = "SELECT * FROM pujapass WHERE userid = $userId AND (date >= '$todayDate' OR status = 'active') ORDER BY date ASC"; // Fetch passes in ascending order of date
$pujaPassesResult = mysqli_query($conn, $pujaPassesQuery);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .pass-info {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Darshan Booking Website
        </a>
    </nav>

    <!-- Booked darshan passes -->
    <div class="container mt-5">
        <h3 class="display-4 text-center mb-4">My Bookings</h3><hr>
        <h3>DARSHAN PASS</h3> <hr>
        <?php if (mysqli_num_rows($darshanPassesResult) > 0) { ?>
        <?php while ($pass = mysqli_fetch_assoc($darshanPassesResult)) { ?>
        <?php if ($pass['status'] == 'active') { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="pass-info">
              <p><strong>Date of Slot:</strong> <?php echo $pass['date']; ?></p>
                    <p><strong>Time:</strong> <?php echo $pass['Time']; ?></p>
                    <form id="cancel-form-<?php echo $pass['id']; ?>" action="cancel_pass.php" method="post">
                        <input type="hidden" name="pass_id" value="<?php echo $pass['id']; ?>">
                        <button type="button" class="btn btn-danger" onclick="confirmCancel(<?php echo $pass['id']; ?>)">Cancel Pass</button>
                    </form>
                    <p><strong>Message:</strong> Hello <b><i><?php echo $userData['Fullname']; ?></i></b>, you have booked a pass for <b><?php echo $pass['date']; ?></b>. You can take the darshan within the slot timing: <b><?php echo $pass['Time']; ?></b>.</p>
                    <small>Kindly note that the date is in "YYYY-MM-DD" format.</small>
                </div><hr>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } else { ?>
        <div class="row">
            <div class="col">
                <p>No passes booked yet.</p>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Booked puja passes -->
    <div class="container mt-5">
       <hr> <h3>PUJA PASS</h3><hr>
        <?php if (mysqli_num_rows($pujaPassesResult) > 0) { ?>
        <?php while ($pass = mysqli_fetch_assoc($pujaPassesResult)) { ?>
        <?php if ($pass['status'] == 'active') { ?>
        <div class="row">
            <div class="col-md-6">
            <div class="pass-info">
    <p><strong>Date of Slot:</strong> <?php echo $pass['date']; ?></p>
    <p><strong>Time:</strong> <?php echo $pass['Time']; ?></p>
    <p><strong>Status:</strong> <?php echo $pass['status']; ?></p> <!-- Add this line -->
    <p><strong>Message:</strong> Hello <b><i><?php echo $userData['Fullname']; ?></i></b>, you have booked a <b><?php echo $pass['Type']; ?></b> puja pass for <b><?php echo $pass['date']; ?></b>. You can take the darshan within the slot timing: <b><?php echo $pass['Time']; ?></b>.</p>
    <small>Kindly note that the date is in "YYYY-MM-DD" format.</small>
</div><hr>
<hr>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } else { ?>
        <div class="row">
            <div class="col">
                <p>No puja passes booked yet.</p>
            </div>
        </div>
        <?php } ?>
    </div>

    <script>
        function confirmCancel(passId) {
            if (confirm("Are you sure you want to cancel this pass?")) {
                document.getElementById("cancel-form-" + passId).submit();
            }
        }
    </script>
</body>

</html>
