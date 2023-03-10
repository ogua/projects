<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		}
		 if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST['cashidn']) === 0){
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Cashier name must start with upper case letter and cant contain numbers</strong></div>';	
			exit;
		 }
		$email = $_POST['cashidemail'];
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			
		}else{
					echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Cashier Email Is Invalid please Try Again</strong></div>';	
			exit();					

		}
		if(!preg_match('/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}/i', $_POST['cashidpass']))
		{
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Password must be at least 6 characters and must contain at least one digit</strong></div>';	
			exit;
		} 
		$sql = "INSERT INTO `cashier`(`cashierid`, `name`, `number`, `address`, `Email`, `password`, `Role`, `Date`) VALUES ('".$_POST['cashid']."','".$_POST['cashidn']."','".$_POST['cashidm']."','".$_POST['cashidadd']."','".$_POST['cashidemail']."','".$_POST['cashidpass']."','".$_POST['Crol']."','".$_POST['cashiddate']."') ";
		$query = mysqli_query($conn,$sql);
		if($query){
					      echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Cashier Added SuccessFully!</strong></div>';		 
 	
		}
		else{
					      echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! to Add Cashier</strong></div>';		 

		}
				
	?>