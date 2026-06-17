<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Add Employee</h2>

<form action="insertemployee.php" method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text" name="full_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Department</label>
<input type="text" name="department" class="form-control" required>
</div>

<div class="mb-3">
<label>Position</label>
<input type="text" name="position" class="form-control" required>
</div>

<div class="mb-3">
<label>Salary</label>
<input type="number" name="salary" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">
Save Employee
</button>

<a href="dashboard.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>
