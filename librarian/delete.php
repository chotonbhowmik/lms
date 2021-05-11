<?php

    include "../db.php";
    if (isset($_GET['deletebook'])) {
    	$id = $_GET['deletebook'];
    	$deletequery = "DELETE FROM `books` WHERE id = '$id'";

    	$query = mysqli_query($db, $deletequery );

    	header('location:managebook.php');
    }

?>