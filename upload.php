<?php
	error_reporting(0);
	if(is_array($_FILES)){
		include_once("db.php");
			
			$hname = $_POST['namofHos'];
			$userid = $_POST['userid'];
			$loca = $_POST['locofHos'];
			$goourl =  $_POST['goourl'];
			$typehos = $_POST['typehos'];
			$namofHos = $_POST['namofroom'];
			$roomsize = $_POST['mortype'];
			$PLPerRoom = $_POST['decsroom'];
			$price = $_POST['single'];
			$image = $_FILES['InputFile']['name'];
			
			
			$tmpimage = $_FILES['InputFile']['tmp_name'];
			$source ="images/";
			$target_file = $source.basename($image);	
		
		
			$ext = strtolower(substr($image, strripos($image, '.')+1));
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
			
			if(move_uploaded_file($tmpimage,$source.$filename)){
					$sql3 = "INSERT INTO `hostels`(userid,`name`, `location`, `urlofHostel`, `typeifHostel`, `numofrooms`, `roomsize`, `pplPerroom`, `price`, `dates`, `images`) VALUES ('$userid','$hname','$loca','$goourl','$typehos','$namofHos ','$roomsize','$PLPerRoom','$price',CURRENT_DATE,'$filename')";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo"success";
					}else{
						echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Failed! try again later</strong></div>';
					}
				}				
	}
?>