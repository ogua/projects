<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		} 
		 if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST['prdidname']) === 0){
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! Product name must start with upper case letter and cant contain numbers</strong></div>';	
			exit;
		 }
		$sql = "INSERT INTO `product`(`ProductId`,Barcode, `name`, `Quantity`, `Amount`, Discount, `Desciption`, `dates`) VALUES ('".$_POST['prdid']."','".$_POST['prdidbar']."','".$_POST['prdidname']."','".$_POST['prdidqty']."','".$_POST['prdidprice']."','".$_POST['prdidscnt']."','".$_POST['prdidpdd']."','".$_POST['prdiddate']."') ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Product Added SuccessFully!</strong></div>';		 
		
		}
		else{
			 echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed! To Add Product</strong></div>';		 

		}
				
	?>