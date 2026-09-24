<?php 
include "db.php";

$id = $_GET['id'];

$query = "DELETE FROM employee WHERE employee_id = $id";
mysqli_query($conn, $query);

header("location: index.php");
?>