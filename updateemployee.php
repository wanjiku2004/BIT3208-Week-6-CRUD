<?php

include 'dbConnect.php';

$id = $_GET['id'];

if(isset($_POST['update']))
{
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    
    $sql = "UPDATE employees SET
    full_name='$name',
    email='$email',
    phone='$phone',
    department='$department',
    position='$position',
    salary='$salary'
    WHERE employee_id='$id'";
    
    mysqli_query($conn, $sql);
    
    header("Location: viewemployees.php");
}

$result = mysqli_query($conn,
                       "SELECT * FROM employees WHERE employee_id='$id'");

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Update Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Update Employee</h2>

<form method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text"
name="full_name"
value="<?php echo $row['full_name']; ?>"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
value="<?php echo $row['email']; ?>"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text"
name="phone"
value="<?php echo $row['phone']; ?>"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Department</label>
<input type="text"
name="department"
value="<?php echo $row['department']; ?>"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Position</label>
<input type="text"
name="position"
value="<?php echo $row['position']; ?>"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Salary</label>
<input type="number"
name="salary"
value="<?php echo $row['salary']; ?>"
class="form-control"
required>
</div>

<button type="submit"
name="update"
class="btn btn-success">
Update Employee
</button>

<a href="viewemployees.php"
class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>
