<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		} 
         $producid = $_POST['Pupdid'];
         $producPx = $_POST['PupdidPx'];
         $producQty = $_POST['Pupdidav'];
         $producQtyp = $_POST['Pupdidpur'];
        $producQtyp =  $producQty + 	$producQtyp;	 
		$sql = "UPDATE product SET Quantity = $producQtyp, Amount=$producPx WHERE ProductId = $producid ";
		$query = mysqli_query($conn,$sql);
		if($query){
				echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>product with id number ' .$producid. ' has been updated successfully</strong></div>';		 

		}
		else{		
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed Please Try Again</strong></div>';		 

		}
				
	?>