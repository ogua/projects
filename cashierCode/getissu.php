<?php
	include_once("db.php");
	$sql = "SELECT * FROM `issues` WHERE `Seen` = 0";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	echo $result;

?>