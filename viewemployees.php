<?php

include 'dbConnect.php';

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];
    
    $sql = "SELECT * FROM employees
    WHERE full_name LIKE '%$search%'
    OR department LIKE '%$search%'
    OR position LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM employees";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>View Employees</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Employee Records</h2>

<form method="GET" class="mb-3">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Employee">

<br>

<button class="btn btn-primary">
Search
</button>

</form>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th>Position</th>
<th>Salary</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
    
    <tr>
    
    <td><?php echo $row['employee_id']; ?></td>
    <td><?php echo $row['full_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['position']; ?></td>
    <td><?php echo $row['salary']; ?></td>
    
    <td>
    
    <a href="updateemployee.php?id=<?php echo $row['employee_id']; ?>"
    class="btn btn-warning btn-sm">
    Edit
    </a>
    
    <a href="deleteemployee.php?id=<?php echo $row['employee_id']; ?>"
    class="btn btn-danger btn-sm"
    onclick="return confirm('Delete Employee?')">
    Delete
    </a>
    
    </td>
    
    </tr>
    
    <?php } ?>
    
    </table>
    
    <a href="dashboard.php" class="btn btn-secondary">
    Back
    </a>
    
    </div>
    
    </body>
    </html>
