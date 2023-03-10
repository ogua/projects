<?php
	  include('db.php');
	$sql= "DELETE FROM `employee` WHERE `id` = '".$_POST['cid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		
	}else{
		
	}
?>