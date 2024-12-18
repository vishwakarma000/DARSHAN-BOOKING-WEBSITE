<?php
session_start();
require_once "connect.php";

// Check if the user is logged in and is an admin (you need to implement admin authentication)
if (!isset($_SESSION["admin_id"])) {
    echo "<script>window.location.href = 'admin.php'</script>";
    exit(); // Stop further execution
}

// Function to get the total booked passes and cancelled passes for a particular month and pass type
function getPassesReport($conn, $month, $passType) {
    $bookedQuery = "SELECT COUNT(*) AS total_booked FROM $passType WHERE MONTH(date) = '$month' AND status = 'active'";
    $bookedResult = mysqli_query($conn, $bookedQuery);
    $bookedData = mysqli_fetch_assoc($bookedResult);
    $totalBooked = $bookedData['total_booked'];

    $cancelledQuery = "SELECT COUNT(*) AS total_cancelled FROM $passType WHERE MONTH(date) = '$month' AND status = 'cancelled'";
    $cancelledResult = mysqli_query($conn, $cancelledQuery);
    $cancelledData = mysqli_fetch_assoc($cancelledResult);
    $totalCancelled = $cancelledData['total_cancelled'];

    return [
        'total_booked' => $totalBooked,
        'total_cancelled' => $totalCancelled
    ];
}

// Function to get the total passes (both active and cancelled) for puja for a particular month
function getTotalPasses($conn, $month, $passType) {
    $totalQuery = "SELECT COUNT(*) AS total_passes FROM $passType WHERE MONTH(date) = '$month'";
    $totalResult = mysqli_query($conn, $totalQuery);
    $totalData = mysqli_fetch_assoc($totalResult);
    $totalPasses = $totalData['total_passes'];

    return $totalPasses;
}

if (isset($_POST['submit'])) {
    $selectedMonth = $_POST['month'];
    $selectedPassType = $_POST['pass_type'];
    $reportDarshan = getPassesReport($conn, $selectedMonth, 'darshanpass');
    $reportPuja = getPassesReport($conn, $selectedMonth, 'pujapass');
    $totalPassesPuja = getTotalPasses($conn, $selectedMonth, 'pujapass');
} else {
    // Default to the current month if not submitted
    $selectedMonth = date('m');
    $reportDarshan = getPassesReport($conn, $selectedMonth, 'darshanpass');
    $reportPuja = getPassesReport($conn, $selectedMonth, 'pujapass');
    $totalPassesPuja = getTotalPasses($conn, $selectedMonth, 'pujapass');
}

// Calculate the total booked passes for darshan and puja passes
$totalBookedDarshan = $reportDarshan['total_booked'];
$totalBookedPuja = $reportPuja['total_booked'];

// Calculate the total percentage of puja booked passes compared to the total booked passes of both darshan and puja passes
$totalPercentagePuja = ($totalBookedPuja > 0 ? round(($totalBookedPuja / ($totalBookedDarshan + $totalBookedPuja)) * 100, 2) : 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Passes Report</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin_side_page.php">
        <img src="img/logo1.jpg" style="border-radius: 10px;" width="40" height="40"  alt="logo">
    </a>
    <a class="navbar-brand" href="admin_side_page.php">Darshan Booking Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown"></div>
    <div class="form-inline mt-2 mt-md-0">
        <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');" style="text-decoration: none; color: inherit; font-size: 35px;"><i class='bx bx-power-off'></i></a>
    </div>
</nav>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Passes Report</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="month">Select Month:</label>
                    <select class="form-control" style="width:40%;" name="month" id="month">
                        <?php
                        // Generate options for selecting month
                        for ($m = 1; $m <= 12; $m++) {
                            $monthName = date("F", mktime(0, 0, 0, $m, 1));
                            echo "<option value='$m' " . ($selectedMonth == $m ? 'selected' : '') . ">$monthName</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pass_type">Select Pass Type:</label>
                    <select class="form-control" style="width:40%;" name="pass_type" id="pass_type">
                        <option value="darshanpass" selected>Darshan Pass</option>
                        <option value="pujapass">Puja Pass</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark" name="submit">Generate Report</button>
            </form>

            <h2 class="mt-4">Darshan Passes Report for <?php echo date('F', mktime(0, 0, 0, $selectedMonth, 1)); ?></h2>
            <p>Total Booked Passes: <?php echo $reportDarshan['total_booked']; ?></p>
            <p>Total Cancelled Passes: <?php echo $reportDarshan['total_cancelled']; ?></p>
            <p>Percentage of Booked Passes: <?php echo ($reportDarshan['total_booked'] > 0 ? round(($reportDarshan['total_booked'] / ($reportDarshan['total_booked'] + $reportDarshan['total_cancelled'])) * 100, 2) : 0) ?>%</p>
            <p>Percentage of Cancelled Passes: <?php echo ($reportDarshan['total_cancelled'] > 0 ? round(($reportDarshan['total_cancelled'] / ($reportDarshan['total_booked'] + $reportDarshan['total_cancelled'])) * 100, 2) : 0) ?>%</p>

            <h2 class="mt-4">Puja Passes Report for <?php echo date('F', mktime(0, 0, 0, $selectedMonth, 1)); ?></h2>
            <p>Total Booked Passes: <?php echo $reportPuja['total_booked']; ?></p>
            <p>Total Cancelled Passes: <?php echo $reportPuja['total_cancelled']; ?></p>
            <p>Total Passes Booking: <?php echo $totalPassesPuja; ?></p>
            <p>Total Percentage of Booked Passes: <?php echo $totalPercentagePuja; ?>%</p>
        </div>
    </div>
</div>

</body>
</html>
