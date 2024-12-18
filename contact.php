<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa; /* Light grey background */
        }

        /* Custom link styling */
        a {
            color: #ffa500; /* Orange color */
            text-decoration: none; /* Remove underline */
        }

        a:hover {
            color: #ff7f00; /* Darker orange  */
            text-decoration: none; 
        }

        .card-header {
            background-color: #ffc107; /* Yellow background  */
            color: #212529; /* Dark text color */
        }

        .card-body {
            background-color: #fff; /* White background */
        }

        .card-body h3 {
            color: #ffa500; /* Orange color  */
        }

        .card-body p {
            color: #212529; /* Dark text color  */
        }

        .card-body ul li {
            color: #212529; /* Dark text color */
        }

        .card-body ul li a {
            color: #ffa500; /* Orange color  */
        }

        .card-body ul li a:hover {
            color: #ff7f00; /* Darker orange color  */
        }
       
    </style>
</head>
<body>
    <div class="container">
        <a href="home.php">
        <h1 class="mt-4 mb-4">Help Center</h1></a>
                <!-- Contact Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Contact</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li><a href="#contactus">Contact Us</a></li>
                    <li><a href="#faq">FAQs</a></li>
                </ul>
            </div>
        </div>
        <!-- User Account Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>User Account</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li><a href="#registration">Account Registration</a></li>
                    <li><a href="#login">Login Assistance</a></li>
                    <li><a href="#password">Password Reset</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Darshan book system Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2> Services</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li><a href="#products">How to book darshan pass ?</a></li>
                    <li><a href="#cart">How to book passes of pooja's ?</a></li>
                    <li><a href="#checkout">How to check you booked passes ?</a></li>
                </ul>
            </div>
        </div>
        
        


        <!-- Help Content -->
        <div class="card mb-4">
            <div class="card-body">
                <!-- User Account Section -->
                <section id="registration">
                    <h3>Account Registration</h3>
                    <p>To create a new user account, please follow these steps:</p>
                    <ol>
                        <li>Log in to your account using your email address and password.</li>
                        <li>Click on the "My Account" or "Profile" link/button to access your profile settings.</li>
                        <li>From the profile dashboard, you can edit your personal information, such as your name, email address, and shipping address.</li>
                        <li>Make any necessary changes and click the "Save" or "Update" button to save your updated profile.</li>
                    </ol>
                </section>
                <section id="login">
                    <h3>Login Assistance</h3>
                    <p>If you're having trouble logging in to your account, here are some steps you can take to troubleshoot:</p>
                    <ol>
                        <li>Double-check that you're using the correct email address and password for your account.</li>
                        <li>Ensure that your Caps Lock key is not accidentally turned on, as passwords are case-sensitive.</li>
                        <li>If you've forgotten your password, follow the steps outlined in the "Password Reset" section to reset it.</li>
                        <li>Try logging in from a different web browser or device to see if the issue persists.</li>
                        <li>If you're still unable to log in, please contact our customer support team for further assistance.</li>
                    </ol>
                </section>
                <section id="password">
                    <h3>Password Reset</h3>
                    <p>If you've forgotten your password or need to reset it for any reason, you can do so by following these steps:</p>
                    <ol>
                        <li>Visit the login page on our website.</li>
                        <li>Click on the "Forgot Password" or "Reset Password" link.</li>
                        <li>Enter your email address associated with your account.</li>
                        <li>You will receive an email with instructions on how to reset your password.</li>
                        <li>Follow the instructions in the email to create a new password for your account.</li>
                    </ol>
                    <p>If you don't receive the password reset email within a few minutes, please check your spam or junk folder. If you still encounter issues, please contact our customer support team for further assistance.</p>
                </section>

                

                <!-- Booking  -->
                <section id="products">
                    <h3> Darhsan Pass</h3>
                    <p>To book darshan passes on our website, simply click to the <a href="darshan.php">this link</a> and click on book pass or go to home page and click on darshan pass button.</p>
                    <p>You can choose the time and date slot as per your schedule ,only 3 person is allowed in one single pass also u can book your pass upto 2months . </p>
                    <p>Kindly note that on each time slot only 30 passes are alloted onces it fully booked then you have to book another available slots.</p>
                    <p>If you want to cancel or view the booked pass click on <a href="mybooking.php">this link</a></p>
                </section>

                <!-- Shopping Cart -->
                <section id="cart">
                    <h3>Pooja Pass</h3>
                    <p>To book pooja passes on our website, simply click to the <a href="bookpuja.php">this link</a> or go to home page and click on puja pass button.</p>
                    <p>You can choose the time and date slot and type of puja as per your need ,only 6 person is allowed in one single pass also u can book your pass upto 2months . </p>
                    <p>Kindly note that on each time slot with type only 1 passes are alloted onces it fully booked then you have to book another available slots.</p>
                    <p>Cancellection is not allowed in puja pass.you can view the Puja passes on this following<a href="mybooking.php">link</a> </p>
                </section>

                <!-- Checkout Process -->
                <section id="checkout">
                    <h3>View the Booked passes</h3>
                    <p>Once you've book the pass you can view/check pass by following these <a href="mybooking.php">link</a></p>
                   
                </section>



                <!-- Contact Us -->
                <section id="contactus">
                    <h3>Contact Us</h3>
                    <p>If you need further assistance or have any questions, please don't hesitate to contact our customer support team.</p>
                    <p>You can reach us by email at idarshanbook@gmail.com or by filling out the feedback form on our website.</p>
                </section>

                <!-- FAQs -->
                <section id="faq">
                    <h3>FAQs</h3>
                    <ul>
                        <li><strong>Q:</strong> What payment methods do you accept for donation?</li>
                        <li><strong>A:</strong> We accept major credit cards, PayPal, and other secure payment methods.</li>
                        <li><strong>Q:</strong> Can we book pass for any dates?</li>
                        <li><strong>A:</strong> Yes, but it should be available and booking prior should not be more tha 2 months from todays date.</li>
                        <li><strong>Q:</strong> Booking pass is mandatory for all person?</li>
                        <li><strong>A:</strong> Yes,but not for the child under 9 yrs old .</li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
