<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		} 	 
		$sql = "SELECT `name`,`Amount`, Quantity FROM product WHERE `ProductId`= '".$_POST['Pupdid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			$row = mysqli_fetch_array($query);
			echo json_encode($row);
		}
		else{
			echo"FAILED TO ADD PRODUCT";
		}
				
	?>