<?php
include '../db.php';

$id = base64_decode($_GET['id']);
$query = "UPDATE students SET status = 1 WHERE id = '$id'";
$updatequery = mysqli_query($db, $query);
header("Location: students.php");


?>