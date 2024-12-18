<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    echo "<script> window.location.href = 'admin.php'</script>";
    exit(); // Stop 
}
require_once "connect.php";

// Search functionality
if(isset($_POST['search'])) {
    $searchKey = $_POST['search'];
    $query = "SELECT * FROM registration WHERE Fullname LIKE '%$searchKey%'";
} else {
    $query = "SELECT * FROM registration";
}
$result = mysqli_query($conn, $query);

// Delete functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['devotee_id'])) {
    $devotee_id = $_POST['devotee_id'];
    
    // Prepare and execute the SQL statement to delete the devotee
    $delete_query = "DELETE FROM registration WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $devotee_id);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
        // header("Location: ".$_SERVER['PHP_SELF']);
    echo "<script> window.location.href = 'devotee_info.php'</script>";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Devotee List</title>
</head>

<body>

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="admin_side_page.php">
            <img src="img/logo1.jpg" style="border-radius: 10px;" width="30" height="30"
                class="d-inline-block align-top" alt="">
            Admin
        </a>
    </nav>

    <div class="container mt-4">
        <!-- Search box -->
        <form class="form-inline mb-3" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Search by Name" aria-label="Search"
                name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <!-- Devotee information table -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr No</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile No</th>                   
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $count . "</th>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['Fullname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_no'] . "</td>";
                    echo "<td>
                            <form method='POST' action='".$_SERVER['PHP_SELF']."'>
                                <input type='hidden' name='devotee_id' value='".$row['id']."'>
                                <button type='submit' class='btn btn-danger' onclick=\"return confirm('You are deleting this devotees permanently from database.Are you sure you want to delete this devotee?')\">Delete</button>
                            </form>
                        </td>";
                    echo "</tr>";
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
