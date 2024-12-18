<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Darshan</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<?php
require_once "connect.php";
// Check if the user is logged in
if (!isset($_SESSION["email"])) {
    // header("Location: login.php");
    echo "<script>window.location.href = 'login.php'</script>";
    exit(); // Stop further execution
}

// Handle form submission
if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $Time = $_POST["Time"];
    $person = $_POST["person"];  

    $email = $_SESSION["email"];
    // Fetch the user ID from the database
    $query = "SELECT id FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);
    $userid = $row['id'];

    // Check if the user has already booked a pass for the selected date
$existingBookingQuery = "SELECT COUNT(*) AS existing_bookings FROM darshanpass WHERE date = '$date' AND userid = '$userid' AND status = 'active'";
$existingBookingResult = mysqli_query($conn, $existingBookingQuery);
$existingBookingData = mysqli_fetch_assoc($existingBookingResult);
$existingBookings = $existingBookingData['existing_bookings'];

// Allow booking only if the user has not already booked a pass for the selected date
if ($existingBookings == 0) {
    // Check if the selected time slot is fully booked
    $bookingQuery = "SELECT COUNT(*) AS total_bookings FROM darshanpass WHERE date = '$date' AND Time = '$Time' AND status = 'active'";
    $bookingResult = mysqli_query($conn, $bookingQuery);
    $bookingData = mysqli_fetch_assoc($bookingResult);
    $totalBookings = $bookingData['total_bookings'];

    // Allow booking only if the total active bookings for the time slot are less than 3
    if ($totalBookings < 3) {
        // Perform database insertion
        $sql = "INSERT INTO darshanpass (date, Time, person, userid, status) VALUES (?, ?, ?, ?, 'active')";
        $stmt = mysqli_stmt_init($conn);

        // Check if statement preparation is successful
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssi", $date, $Time, $person, $userid);
            mysqli_stmt_execute($stmt);
            echo '<script> alert("Booking successful")</script>';
            echo '<script> window.location.href = "home.php"</script>';
        } else {
            die("Something went wrong");
        }
    } else {
       
        echo '<script> alert("The selected time slot is fully booked. Please choose another time slot.")</script>';
    }
} else {
 
    echo '<script> alert("You have already booked a pass for this date. You cannot book more than one pass for the same day.")</script>';
}

    mysqli_close($conn);  // Close the connection
}
?>



    <div class="wrapper">
    <form  action="bookpass.php" method="post" >
   
            <div class="logo">
                <img src="img/logo1.jpg">
            </div>
            <h1>Book Pass</h1>
            <div class="input-box">
            
                <label for="date">Select Date:</label>
                <input type="date" class="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+2 months')); ?>" required>
               
            </div>
            <div class="input-box">
                <label for="Time">Select the Time:</label>
                <select id="Time" class="Time" name="Time">
                    <option value="07:00-08:00">07:00-08:00</option>
                    <option value="08:00-09:00">08:00-09:00</option>
                    <option value="09:00-10:00">09:00-10:00</option>
                    <option value="10:00-11:00">10:00-11:00</option>                      
                    <option value="11:30-12:30">11:30-12:30</option>  
                    <option value="12:30-13:30">12:30-13:30</option>  
                    <option value="13:30-14:30">13:30-14:30</option>  
                    <option value="14:30-15:30">14:30-15:30</option>  
                    <option value="15:30-16:30">15:30-16:30</option>  
                    <option value="16:30-17:30">16:30-17:30</option>  
                    <option value="17:30-18:30">17:30-18:30</option>  
                    <option value="18:30-19:30">18:30-19:30</option> 
                </select>
            </div>
            <div class="input-box">
                <label for="person">No. of Person:</label>
                <select id="person" name="person">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <small><span id="dateError"></span></small>
            <button type="submit" class="book-btn" id="submit" name="submit">Book</button>
            <div class="register-pg">
                <label>Back to</label> <a href="home.php">Home Page</a>
            </div>
        </form>
    </div>

</body>


</html>
