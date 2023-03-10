<?php
	if(isset($_POST['delivery'])){
		include_once("db.php");
		$sql = "INSERT INTO `payments`(`dates`,`username`, `phonenume`, `email`, `amountpaid`, `vehicle`, `platenumber`, `assignslot`, `slotename`, `status`, `parkdays`, `image`) 
		VALUES (CURRENT_DATE,'".$_POST['username']."','".$_POST['phonenum']."','".$_POST['email']."','".$_POST['amount']."','".$_POST['vehicl']."',
		'".$_POST['plate']."','".$_POST['slodid']."',
		'".$_POST['slotea']."','".$_POST['status']."','".$_POST['parkdays']."','".$_POST['img']."')";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo "Slot Booked Successfully !";
		}else{
			echo "Failed to Book Slot";
		}
	}
?>