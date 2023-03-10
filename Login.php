<?php
	 include("db.php"); 
	 $sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['text1']."' and `password` = '".$_POST['text2']."' ";
	 $result = mysqli_query($conn,$sql);
	 $results = mysqli_num_rows($result);
	 $row = mysqli_fetch_array($result);
	 if($results == 1){
		$pin = rand(1,1000);
		 session_start();
		  $_SESSION['idNa'] = $row['id'];
		 $nuymber = $row['mobile'];
		 $_SESSION['num'] = $row['mobile'];
		 $sql2 = "UPDATE `users` SET `pinCode` = '$pin' WHERE `id` = '".$_SESSION['idNa']."'";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){
$number = $nuymber;
$add = substr($number,1,9);
$results = "00233".$add;				 
$key="9869b6f295ac68450b7b"; //your unique API key;
$msgs = "HI: ".$_SESSION['name']." Thank You, Your pin is ".$pin;
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "BOOKSHOP";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";
/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";
$result=file_get_contents($url); //call url and store result;
echo"goo";
		}
	 }else{
		 echo "Email or Password dont Exist Login Failed";
	 }
?>