<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		}
		$sql = "SELECT * FROM product WHERE `Barcode`= ".$_POST['prductss']." ";
		$query = mysqli_query($conn,$sql);
		if($query){
			$row = mysqli_fetch_array($query);
			echo json_encode($row);
		}
		else{
			echo"FAILED TO ADD PRODUCT";
		}
				
	?>