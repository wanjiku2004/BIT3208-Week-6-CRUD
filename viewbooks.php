<?php

include 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM books");

?>

<!DOCTYPE html>
<html>
<head>
<title>View Books</title>
</head>
<body>

<h2>Library Books</h2>

<table border="1">

<tr>
<th>Book ID</th>
<th>Book Title</th>
<th>Author</th>
<th>Category</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$row['book_id']."</td>";
    echo "<td>".$row['book_title']."</td>";
    echo "<td>".$row['author']."</td>";
    echo "<td>".$row['category']."</td>";
    echo "</tr>";
}

?>

</table>

</body>
</html>
