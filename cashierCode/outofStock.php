<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		}
		$sql = "SELECT * FROM product WHERE `Barcode`= ".$_POST['prductss']." ";
		$query = mysqli_query($conn,$sql);
		if($query){
			$rows = mysqli_fetch_array($query);
			$result = $rows['Quantity'];
			if($result >= 1 && $result < 10){
			echo"shout";
		}elseif($result < 1){
			echo"out";
		}else{
			echo"go";
		}		
		}	  
	?>