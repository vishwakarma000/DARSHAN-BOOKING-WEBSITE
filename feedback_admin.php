<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    echo "<script> window.location.href = 'admin.php'</script>";
    exit(); // Stop further execution
}
require_once "connect.php";

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM feedback WHERE id = $deleteId";
    mysqli_query($conn, $deleteQuery);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Feedback List</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="admin_side_page.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30"
                class="d-inline-block align-top" alt="">
            Admin
        </a>
    </nav>

    <div class="container mt-4">
        <h2>Feedback List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $feedbackQuery = "SELECT * FROM feedback";
                $result = mysqli_query($conn, $feedbackQuery);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['userid'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        echo "<td><a href='feedback_admin.php?delete_id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No feedback found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
