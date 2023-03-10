<?php
	error_reporting(0);
	if(is_array($_FILES)){
		include_once("db.php");
			$userid = $_POST['hostelid'];
			$mname = $_POST['nameofdrugMan'];
			$dname = $_POST['nameofdrug'];
			$brand = $_POST['brandofdrug'];
			$muDate =  $_POST['manuacdate'];
			$Exdate = $_POST['expiredate'];
			$mauNumber = $_POST['manfbum'];
			$comdisrt = $_POST['distrib'];
			$SerialNumber = $_POST['serailnum'];
			$image = $_FILES['InputFile']['name'];
			
			
			$tmpimage = $_FILES['InputFile']['tmp_name'];
			$source ="images/";
			$target_file = $source.basename($image);	
		
		
			$ext = strtolower(substr($image, strripos($image, '.')+1));
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
			
			if(move_uploaded_file($tmpimage,$source.$filename)){
					$sql3 = "UPDATE `druginfo` SET `images` = '$filename', `manufacturername` = '$mname', `drugname` = '$dname', `brand` = '$brand', `manufacdate`= '$muDate', `Expdate` = '$Exdate', `manNumber` = '$mauNumber', `Distributor` = '$comdisrt' WHERE `id` = '$userid' ";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo"success";
					}else{
						echo'Failed! Something Went Wrong try again later';
					}
			}else{
				$sql3 = "UPDATE `druginfo` SET `manufacturername` = '$mname', `drugname` = '$dname', `brand` = '$brand', `manufacdate`= '$muDate', `Expdate` = '$Exdate', `manNumber` = '$mauNumber', `Distributor` = '$comdisrt' WHERE `id` = '$userid' ";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo"success";
					}else{
						echo'Failed! Something Went Wrong try again later';
					}
			}			
	}
?>