<?php 
session_start();
require_once "connect.php";

if (!isset($_SESSION["email"])) {
    // Redirect to the login page if not logged in
    echo "<script>window.location.href = 'login.php'</script>";
    exit(); // Stop further execution
}

// Update status of puja passes to "cancelled" if booking date is before today's date
$update_query = "UPDATE pujapass SET status = 'cancelled' WHERE date < CURDATE() AND status != 'cancelled'";
mysqli_query($conn, $update_query);

// Check if form is submitted
if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $time = $_POST["Time"];
    $type = $_POST["Type"];
    $person = $_POST["person"];  
    
    // Check if the user has already booked a pass for the selected date
    $existingBookingQuery = "SELECT COUNT(*) AS existing_bookings FROM pujapass WHERE date = ? AND userid = ? AND status = 'active'";
    $stmt_existingBooking = mysqli_stmt_init($conn);
    
    if (mysqli_stmt_prepare($stmt_existingBooking, $existingBookingQuery)) {
        $email = $_SESSION["email"];
        $query = "SELECT id FROM registration WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
        
        $row = mysqli_fetch_assoc($result);
        $userid = $row['id'];
        
        mysqli_stmt_bind_param($stmt_existingBooking, "si", $date, $userid);
        mysqli_stmt_execute($stmt_existingBooking);
        mysqli_stmt_store_result($stmt_existingBooking);
        mysqli_stmt_bind_result($stmt_existingBooking, $existingBookings);
        mysqli_stmt_fetch($stmt_existingBooking);
        
        if ($existingBookings > 0) {
            // User has already booked a pass for the selected date
            echo '<script>alert("You have already booked a puja pass for this date. You cannot book more than one puja pass for the same day.")</script>';
        } else {
            // Check if the selected time slot for the selected date is available for the selected type of puja
            $check_query = "SELECT COUNT(*) AS count FROM pujapass WHERE date = ? AND Time = ? AND Type = ?";
            $stmt = mysqli_prepare($conn, $check_query);
            mysqli_stmt_bind_param($stmt, "sss", $date, $time, $type);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $count);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            
            if ($count > 0) {
                // Puja for the selected time slot and date already booked for the selected type
                echo '<script>alert("This time slot is already booked for the selected type of puja. Please choose a different time slot or type.")</script>';
            } else {
                // Insert the booking into the database
                $sql = "INSERT INTO pujapass (date, Time, Type, person, userid, status) VALUES (?,?,?,?,?, 'active')";
                $stmt = mysqli_stmt_init($conn);
            
                // Check if statement preparation is successful
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssssi", $date, $time, $type, $person, $userid);
                    mysqli_stmt_execute($stmt);
                    echo '<script>alert("Booking successful")</script>';
                    echo '<script>window.location.href = "home.php"</script>';
                } else {
                    echo '<script>alert("Something went wrong. Please try again later.")</script>';
                }
            
                mysqli_stmt_close($stmt);  // Close the statement
            }
        }
    } else {
        echo '<script>alert("Something went wrong. Please try again later.")</script>';
    }
    
    mysqli_close($conn);  // Close the connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Puja</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    
    
    <div class="wrapper">
        <form action="bookpuja.php" method="post">
            <div class="logo">
                <img src="img/logo1.jpg">
            </div>
            <h1>Book Puja</h1>
            <div class="input-box">
                <label for="date">Select Date:</label>
                <input type="date" class="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+2 months')); ?>" required>
                <small> <span id="Message full-name"></span></small>

            </div>
            <div class="input-box">
                <label for="Time">Select the Time:</label>
                <select id="Time" class="date" name="Time">
                    <option value="07:00-09:00">07:00-09:00</option>
                    <option value="09:00-11:00">09:00-11:00</option>                   
                    <option value="11:30-13:30">11:30-13:30</option>    
                    <option value="13:30-15:30">13:30-15:30</option>  
                    <option value="15:30-17:30">15:30-17:30</option>    
                    <option value="17:30-19:30">17:30-19:30</option>  
                </select>
            </div>
            <div class="input-box">
                <label for="Type">Select the Type:</label>
                <select id="Type" class="Type" name="Type">
                    <option value="Murti Abhishek">Murti Abhishek</option>
                    <option value="Atharavshirsh Path">Atharavshirsh Path</option>
                    <option value="Hoam Hawan">Hoam Hawan</option>                      
                                      
                </select>
            </div>
            <div class="input-box">
                <label for="person">No. fo Person:</label>
                <select id="person" name="person">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>   
                    <option value="4">4</option>  
                    <option value="5">5</option>  
                    <option value="6">6</option>                   
                </select>
            </div>

            <button type="submit" class="book-btn" name="submit">Book</button>
            <div class="register-pg">
                <label>Back to</label> <a href="home.php">Home Page</a>
            </div>
        </form>
    </div>
    
</body>

</html>
