<?php
	include('db.php');
	$image = $_FILES['InputFile']['name'];
	$tmpimage = $_FILES['InputFile']['tmp_name'];
	$source ="images/";
	$target_file = $source.basename($image);	
	$ext = strtolower(substr($image, strripos($image, '.')+1));
	$filename = round(microtime(true)).mt_rand().'.'.$ext;
	
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		$sql = "INSERT INTO `Equipments`(`image`, `name`, `supplier`, `purpose`, `datebought`, `price`, `dates`) 
		VALUES ('$filename','".$_POST['fname']."','".$_POST['suppl']."','".$_POST['purpose']."','".$_POST['datebou']."','".$_POST['price']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
	}else{
		echo"Failed";
	}
?>