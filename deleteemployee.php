<?php

include 'dbConnect.php';

$id = $_GET['id'];

$sql = "DELETE FROM employees WHERE employee_id='$id'";

mysqli_query($conn, $sql);

header("Location: viewemployees.php");

?>
