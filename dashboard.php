<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'dbConnect.php';

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: Login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Employee Management System</h1>

<p>Welcome <?php echo $_SESSION['username']; ?></p>

<a href="addemployee.php" class="btn btn-primary">
Add Employee
</a>

<a href="viewemployees.php" class="btn btn-success">
View Employees
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</body>
</html>
