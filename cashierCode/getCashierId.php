<?php
	 include_once('db.php');
	  $sql9 = "SELECT `cashierid` FROM `cashier` WHERE `name` = '".$_POST['csh']."' ";
	  $query9 = mysqli_query($conn,$sql9);
	  $result9 = mysqli_num_rows($query9);
	  $row9 = mysqli_fetch_array($query9);
	  $cashname = $row9['cashierid'];
	  echo $cashname;
?>