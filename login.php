<?php 
session_start();
if (isset( $_SESSION["user"])){
    // header("Location: home.php");
    echo"<script> window.location.href = 'home.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login Page</title>
</head>

<body>
<div class="wrapper">
<!-- php documentttt -->
<?php
if(isset($COOKIE['email']) && isset($COOKIE['password'])){  /////////////////////////////////////////
    $id=$_COOKIE['email'];
    $pass=$_COOKIE['password'];
}else{
    $id= "";
    $pass="";

}
if (isset($_POST["login"]))  {
    $email = $_POST["email"] ;
    $password = $_POST["password"] ;
    require_once "connect.php";
    $sql = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user_pass = $user["password"];
    if($user){
        if (password_verify($password, $user_pass)){
            if(isset($_POST['rem-me'])){
            setcookie('email',$_POST['email'],time() + (60*60*24));
            setcookie('password',$_POST['password'],time() + (60*60*24));
            }            
            session_start();
            $_SESSION["user"] = "yes";                                                       ////////////////////////////////////
            // header("Location: home.php") ;
            echo"<script> window.location.href = 'home.php'</script>";
            die();
        }else{
            echo " Invalid password";
        }
    }else{
        echo "Enter valid email id";
    }
}

?>
     
        <form action="login.php" method="post">

            <div class="form-box">
                <div class="logo">
                    <img src="img/logo1.jpg">
                </div>
                <h1>Login</h1>
                <div class="input-box">
                <input type="email" class="name" placeholder="Email ID" name="email"  value="<?php echo $id ?>" required>
                <i class='bx bx-envelope' ></i>            
            </div>
                <div class="input-box">
                    <!--Password-->
                    <input type="password" placeholder="Password" name="password" value="<?php echo $pass ?>" required><i
                        class='bx bxs-lock'></i><br>
                </div>
                <div class="rem-me">
                    <label><input type="checkbox" name="rem-me" >Remember me </label>
                    <a href="forget.html">Forget password?</a>
                </div>
                <button type="submit" name="login" class="sub-btn">login</button>
                <div class="register-pg">
                    <label>Dont have an account?</label><a href="register.html">Register</a><br>
                </div>
                <div class="register-pg">
                    <a href="admin.php">Admin</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>