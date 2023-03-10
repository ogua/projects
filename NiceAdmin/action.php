<?php
	include('db.php');
	if(isset($_POST['Updatestatus'])){
		$sql = "UPDATE `mamalit_special` SET `status` = '".$_POST['stat']."' WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($con,$sql);
		if($query){
			echo
			"success";
		}else{
			echo"failed";
		}
	}if(isset($_POST['Updatestatus2'])){
		$sql = "UPDATE `club_house` SET `status` = '".$_POST['stat']."' WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($con,$sql);
		if($query){
			echo
			"success";
		}else{
			echo"failed";
		}
	}if(isset($_POST['Updatestatus3'])){
		$sql = "UPDATE `tanee` SET `status` = '".$_POST['stat']."' WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($con,$sql);
		if($query){
			echo
			"success";
		}else{
			echo"failed";
		}
	}if(isset($_POST['Updatestatus4'])){
		$sql = "UPDATE `mary_dee` SET `status` = '".$_POST['stat']."' WHERE `id` = '".$_POST['cid']."' ";
		$query = mysqli_query($con,$sql);
		if($query){
			echo
			"success";
		}else{
			echo"failed";
		}
	}
?>