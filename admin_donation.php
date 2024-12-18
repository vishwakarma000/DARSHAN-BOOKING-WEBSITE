<?php
session_start();
require_once "connect.php"; 
if (!isset($_SESSION["admin_id"])) {
    echo "<script>alert('Please log in as admin.'); window.location.href = 'admin.php';</script>";
    exit();
}

$start_date = "";
$end_date = "";

if(isset($_POST['start_date']) && isset($_POST['end_date'])){
    // Retrieve start and end dates from the form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    // Fetch donation data within the specified date range
    $query = "SELECT * FROM donation WHERE transcation_date BETWEEN '$start_date' AND '$end_date'";
} else {
    // Fetch all donation data if no date range is specified
    $query = "SELECT * FROM donation";
}

$result = mysqli_query($conn, $query);

// Calculate the total donation amount
$totalAmount = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $totalAmount += $row['amount'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Donation List</title>
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
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
 
        
      </div>
      <div class="form-inline mt-2 mt-md-0">
      <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');" style="text-decoration: none; color: inherit; font-size: 35px;" ><i class='bx bx-power-off' ></i></a>

    </div>
    </nav>
<div class="container my-3">
    <h1>Admin - Donation List</h1>
    <form method="post">
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control " style="width:40%; " id="start_date" name="start_date" value="<?php echo $start_date; ?>">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control"  style="width:40%; " id="end_date" name="end_date" value="<?php echo $end_date; ?>">
        </div>
        <button type="submit" class="btn btn-dark">Search</button>
    </form>
    <div class="mb-3">
        <label for="totalAmount">Total Donation Amount:</label>
        <input type="text" class="form-control" id="totalAmount" value="<?php echo $totalAmount; ?>" readonly>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Sr no</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Transaction Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Reset the data pointer to the beginning of the result set
            mysqli_data_seek($result, 0);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$count}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['amount']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>{$row['transcation_date']}</td>";
                echo "</tr>";
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
