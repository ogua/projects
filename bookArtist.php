<?php
	include('db.php');
	$funame = $_POST['fname'];
	$gender = $_POST['gender'];
	$Email = $_POST['Email'];
	$telep = $_POST['telep'];
	$eventkind = $_POST['eventkind'];
	$dateofevent = $_POST['dateofevent'];
	$startend = $_POST['startend'];
	$artists = $_POST['artists'];
	$sRequest = $_POST['sRequest'];
	
	if(strlen($telep) < 10 || strlen($telep) > 10){
		echo"PhoneError";
		exit;
	}
	
	$sql = "INSERT INTO `booking`(`fullname`, `gender`, `email`, `telephone`, `event`, `date`, `startnendtime`, `Artistname`, `specislRequset`, `dates`) VALUES ('$funame','$gender','$Email','$telep','$eventkind','$dateofevent','$startend','$artists','$sRequest',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"Successfully";
	}else{
		echo $sql;
		exit;
		echo"Failed to Book An Artist, Please Try again Later";
	}
	
?>