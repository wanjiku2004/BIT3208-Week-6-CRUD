<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>School Management Dashboard</title>
<style>
:root { --bg-color: #f4f6f9; --sidebar-color: #1e293b; --primary-color: #2563eb; --text-color: #334155; --white: #ffffff; }
* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
body { background-color: var(--bg-color); color: var(--text-color); display: flex; min-height: 100vh; }

.sidebar { width: 260px; background-color: var(--sidebar-color); color: var(--white); padding: 2rem 1.5rem; }
.sidebar h2 { margin-bottom: 2rem; font-size: 1.4rem; letter-spacing: 1px; }
.sidebar nav a { display: block; color: #94a3b8; text-decoration: none; padding: 0.75rem 1rem; margin-bottom: 0.5rem; border-radius: 6px; }
.sidebar nav a.active { background-color: var(--primary-color); color: var(--white); }

.main-content { flex: 1; padding: 2.5rem; }
header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
.btn-primary { background-color: var(--primary-color); color: var(--white); border: none; padding: 0.75rem 1.5rem; border-radius: 6px; cursor: pointer; font-weight: 600; }

.table-container { background-color: var(--white); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
table { width: 100%; border-collapse: collapse; text-align: left; margin-top: 1rem; }
th, td { padding: 0.85rem 1rem; border-bottom: 1px solid #e2e8f0; }
th { background-color: #f8fafc; color: #64748b; }

.modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.4); justify-content: center; align-items: center; }
.modal-content { background-color: var(--white); padding: 2rem; border-radius: 8px; width: 420px; position: relative; }
.close-btn { position: absolute; top: 1rem; right: 1rem; font-size: 1.5rem; cursor: pointer; }
.form-group { margin-bottom: 1.25rem; }
.form-group label { display: block; margin-bottom: 0.4rem; font-size: 0.9rem; font-weight: 500; }
.form-group input { width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 6px; }
</style>
</head>
<body>

<aside class="sidebar">
<h2>EduStream SMS</h2>
<nav>
<a href="#" class="active">Students Dashboard</a>
</nav>
</aside>

<main class="main-content">
<header>
<h1>Student Management</h1>
<button id="addStudentBtn" class="btn-primary">+ Add New Student</button>
</header>

<section class="table-container">
<h2>Registered Students</h2>
<table id="studentTable">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Enrollment Date</th>
<th>GPA</th>
</tr>
</thead>
<tbody>
<?php
$conn = new mysqli("localhost", "root", "", "school_system");
$result = $conn->query("SELECT * FROM students ORDER BY student_id DESC");
while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) . "</td>
    <td>" . htmlspecialchars($row['email']) . "</td>
    <td>" . $row['enrollment_date'] . "</td>
    <td>" . number_format($row['gpa'], 2) . "</td>
    </tr>";
}
$conn->close();
?>
</tbody>
</table>
</section>
</main>

<div id="studentModal" class="modal">
<div class="modal-content">
<span class="close-btn">&times;</span>
<h2>Register New Student</h2>
<form id="studentForm">
<div class="form-group"><label>First Name</label><input type="text" id="firstName" required></div>
<div class="form-group"><label>Last Name</label><input type="text" id="lastName" required></div>
<div class="form-group"><label>Email Address</label><input type="email" id="email" required></div>
<div class="form-group"><label>GPA</label><input type="number" id="gpa" step="0.01" min="0" max="4" required></div>
<button type="submit" class="btn-primary" style="width: 100%;">Save to Database</button>
</form>
</div>
</div>

<script src="script.js"></script>
</body>
</html>
