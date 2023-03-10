<?php
	include_once('db.php');
	function insertdata($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$prdid = insertdata($_POST['prid']);
	$fname = insertdata($_POST['fName']);
	$lname = insertdata($_POST['lName']);
	$email = insertdata($_POST['Email']);
	$msg = insertdata($_POST['Message']);
	
	if(!empty($email)){
		if(!FILTER_VAR($email,FILTER_VALIDATE_EMAIL)){
			echo'emailerror';
			exit;
		}
	}
	
	$sql = "INSERT INTO `reply`(`comtid`, `firstname`, `lastname`, `email`, `message`) VALUES 
	('$prdid','$fname','$lname','$email','$msg')";
	$query = mysqli_query($conn,$sql);
	if($query){
		?>
			<div class="media mt-sm-5 mt-3 ml-5">
				<a class="pr-3" href="#">
					<img class="mr-3" src="http://localhost/OguaSes%20IT%20Solutions/images/co.png" alt="image">
				</a>
				<div class="media-body comments-grid-right">
					<h4><?php echo $lname; ?></h4>
					<ul class="my-2">
					<li class="font-weight-bold">JUST NOW
						<i>|</i>
					</li>
				<li>
						</li>
				</ul>
					<p><?php echo $msg; ?></p>
				</div>
			</div>
		<?php
	}else{
		echo'failed';
	}
	
?>