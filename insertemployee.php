<?php

include 'dbConnect.php';

$name=$_POST['full_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$department=$_POST['department'];
$position=$_POST['position'];
$salary=$_POST['salary'];

$sql="INSERT INTO employees
(full_name,email,phone,department,position,salary)
VALUES
('$name','$email','$phone',
'$department','$position','$salary')";

if(mysqli_query($conn,$sql))
{
    echo "Employee Added Successfully";
}
else
{
    echo mysqli_error($conn);
}

?>
