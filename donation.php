<?php
session_start();
if (!isset($_SESSION["email"])){
    echo "<script>window.location.href = 'login.php'</script>";
    exit(); 
}

require_once "connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $email = $_SESSION['email']; 
    $date = date('Y-m-d H:i:s');
    $status = "success"; 
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

            $stmt = $conn->prepare("INSERT INTO donation (amount, status, email, transcation_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("dsss", $amount, $status, $email, $date);

            if ($stmt->execute() === TRUE) {
                echo "<script> alert('Donation successful!')</script>";
                echo "<script> window.location.href = 'donation.php'</script>";
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

    } else {
        echo "<script> alert('User not found. Please try again.')</script>";
        echo "<script> window.location.href = 'donation.php'</script>";

        exit();
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <form id="paymentForm" method="post" onsubmit="return validateForm()">
            <div class="logo">
                <img src="img/logo1.jpg">
            </div>
            <h1>Donation</h1>

            <div class="input-box">
                <input type="number" class="name" placeholder="Enter amount"  name="amount" id="amount"  required>
                <i class='bx bx-wallet'></i>            
            </div>
            <small><span id="dateError"></span></small>
            <div class="input-box">
                <input type="number" class="phone" placeholder="Enter register mobile number" id="phone_no" name="phone_no" oninput="validatePhoneNumber()" required>
                <i class='bx bx-phone'></i>
                <small> <span id="Message phn-no"></span></small>
            </div>
            <button type="submit" class="book-btn" id="rzp-button" name="submit">Pay Now</button>
            <div class="register-pg">
                <label>Back to</label> <a href="home.php">Home Page</a>
            </div>
        </form>
    </div>
    <script>
    document.getElementById("amount").addEventListener("input", function() {
        var amountInput = parseFloat(this.value);
        if (amountInput > 500000) {
            this.value = "500000"; 
        }
    });
    </script>
    <script>
        function validateForm() {
            var amount = document.getElementById("amount").value;
            if (isNaN(amount) || amount <= 0) {
                alert("Please enter a valid amount.");
                return false;
            }
            return true;
        }
    </script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

document.getElementById('rzp-button').onclick = function(e) {

    const amount = document.getElementById("amount").value;
    const phone = document.getElementById("phone_no").value;


    // Create a new Razorpay instance
    var rzp = new Razorpay({
        key: 'rzp_test_IqL41z58B9nXgk', 
        amount: amount*100, 
        currency: 'INR',
        name: 'Darshan Booking Website',
        description: 'You are donating directly to Sansthan using razorpay',
        image: 'img/logo1.jpg',
        handler: function(response) {
          
            saveData(amount);
            alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);

        },
        prefill: {
            name: 'Customer Name',
            email: 'customer@example.com',
            contact: 'phone'
        },
        theme: {
            color: '#F37254'
        },
        payment_method: {
            netbanking: true,
            card: true,
            upi: true,
            wallet: true
        }
    });

    rzp.open();
    e.preventDefault();

    function saveData(amount) {
        // Prepare data to send
        const data = new URLSearchParams();
    data.append('amount', amount);

        fetch('donations.php', {
            method: 'POST',
            body: data
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Response from PHP file
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
}


</script>

</body>

</html>
<!-- rEVg2tW6BO0hA6Cj7SpQKgLT -->