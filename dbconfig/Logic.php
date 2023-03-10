<?php 
require_once ("$Connection.php");
require_once ("$Function.php");

$date = date('d/m/Y');

if (iseet ($_POST ['reg_btn')){
	$Fullname = inject_checker($Connection, ucwords($_POST['Fullname']));
	$Username = inject_checker($Connection, strtolower($_POST['Username']));
	$Password = inject_checker($Connection,$_POST['Password']);
	$r_Password = inject_checker($Connection,$_POST['r_Password']);
	
	//ERROR CHECKING FOR EMPTY FIELDS
	if(empty ($Fullname)){
		$error_msg = "Fullname Field cannot be empty"
	}
	elseif (empty ($Username)){
		$error_msg = "Username Field cannot be empty"
	}
	elseif (empty ($Password)){
		$error_msg = "Password Field cannot be Empty"
	}
	elseif (empty($r_Password)){
		$error_msg = "Password do not March"
	}else{
		$query = " SELECT * FROM register WHERE Username = '{$Username}' ";
		$run_query = mysqli_query ($Connection, $query);
		
		if(mysqli_num_rows($run_query > 0){
			$error_msg = "Error: This user Already Exists";
		}else{
			$query = " INSERT INTO register (Fullname, Username, Password)
			VALUES ('$Fullname', '$Username', '$Password')";
			$run_query = mysqli_query ($Connection, $query);
			
			if($run_query == true){
				$msg_success = "Registration Successful!";
			}else{
				$error_msg = "Registration Failed!"
			}
		}
	}
}



?>