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
<?php
 session_start();
if (isset($_POST["login"]))  {
    $id = $_POST["id"] ;
    $password = $_POST["password"] ;
    require_once "connect.php";
    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user_pass = $user["password"];
    if($user){
        if( $user_pass){

            echo"<script> window.location.href = 'admin_side_page.html'</script>";
            die();
        }else{
            echo " Invalid password";
        }
    }else{
        echo "Enter valid admin id";
    }
}
?>

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
                <div class="rem-me">
                    <label><input type="checkbox">Remember me </label>
                    <a href="#">Forget password?</a>
                </div>
                <button type="submit" name="login" class="sub-btn" >login</button>
                
            </div>
        </form>
    </div>
</body>

</html>