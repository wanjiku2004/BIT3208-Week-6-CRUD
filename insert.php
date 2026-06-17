<?php

include 'db_connect.php';

$title = $_POST['book_title'];
$author = $_POST['author'];
$category = $_POST['category'];

$sql = "INSERT INTO books
(book_title, author, category)
VALUES
('$title', '$author', '$category')";

if(mysqli_query($conn, $sql))
{
    echo "Book Added Successfully";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>
