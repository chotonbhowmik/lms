
<?php
 $db = mysqli_connect("localhost","root","","lms");
 if ($db) {
 	// echo "database connected ";
 }
 else{
 	die("database not connected ".mysqli_error($db));
 }



?>