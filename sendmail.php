<?php

	if(@$_GET['q'] == 1){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$service = $_POST['number']; 
		
		if(strlen($number) < 10){
			header("location:services.php?error=Phone number is invalid#request");
		}
		
		
		function insertdata($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		//Filter inputs
		$names = insertdata($name);
		$numbers = insertdata($number);
		
		
		$from = $email;
		$to = "info@amtabiz,com";
		$subject = "Service Request";
		$message = "Service request from $names, Service type: $service, contact information: $numbers, Email: $email";
		
		mail($to,$subject,$message);
		
		header("location:services.php?msg=Service Requested Successfully, A member of our team will call you shortly#request");

	}
	
	
	
	if(@$_GET['q'] == 2){				
		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$number = $_POST['Phone'];
		$msg = $_POST['megs']; 
		
		
		if(strlen($number) < 10){
			header("location:contact.php?error=Phone number is invalid#contact");
		}
		
		function insertdata($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		//Filter inputs
		$names = insertdata($name);
		$numbers = insertdata($number);
		$msgs = insertdata($msg);
		
		$to = "info@amtabiz,com";
		$subject = "Contact Message";
		$message = "Meesage from $names, Phome Number: $numbers, Email: $email, Message: $msg";
		
		mail($to,$subject,$message);

		header("location:contact.php?msg=Message Submitted Successfully!#contact");		
	}
	
?>