<?php
session_start();
if (isset( $_SESSION["admin_id"])){
    // header("Location: login.php");
    echo"<script> window.location.href = 'admin_side_page.php'</script>";
}
if (isset($_POST["login"])) {
    $id = $_POST["id"];
    $password = $_POST["password"];
    require_once "connect.php";
    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user_pass = $user["password"];
    if ($user) {
        if ($password == $user_pass) { // Check if entered password matches the password in the database
            $_SESSION['admin_id'] = $user['id'];
           
            echo "<script> window.location.href = 'admin_side_page.php'</script>";
            die();
        } else {
            echo "<script>alert('Invalid password')</script>";
        }
    } else {
        echo "<script>alert('Enter valid admin id')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title> Admin Login Page</title>



</head>

<body> 
    <div class="wrapper">
        <form action="admin.php" method="post" >
   
            <div class="form-box">
                <div class="logo">
                    <img src="img/logo1.jpg">
                </div>
                <h1> Admin Login</h1>
                <div id="error-message" style="color: red;"></div>
                <div class="input-box">
                    <!--User ID-->
                    <input type="text" placeholder="User ID" name="id" id="id" required><i class='bx bxs-contact'></i><br>
                </div>
                <div class="input-box">
                    <!--Password-->
                    <input type="password" placeholder="Password" name="password" id="password" required><i class='bx bxs-lock'></i><br>
                </div>
                <button type="submit" name="login" class="sub-btn" >login</button>
                
            </div>
        </form>
    </div>
</body>

</html>