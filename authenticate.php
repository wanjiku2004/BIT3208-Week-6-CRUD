<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

include 'dbConnect.php';

$username = $_POST['username'];
$password = md5($_POST['password']); 

$sql = "SELECT * FROM users 
WHERE username='$username' 
AND password='$password'";

$result = mysqli_query($conn, $sql);


if ($result && mysqli_num_rows($result) == 1) 
{
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit(); 
}
else 
{
    echo "<h3>Invalid Username or Password</h3>";
    echo "<a href='Login.php'>Try Again</a>";
}
?>
