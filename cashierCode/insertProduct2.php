<?php
	    include_once('db.php');
		$qmty = $_POST['pqty'];
		$prices = $_POST['Pprice'];
		$cal = $qmty * $prices;
		
		$sql = "INSERT INTO `sale`(`Productid`, `BillId`, `name`, `Price`, `Quantity`, `Total`, `dates`) VALUES
		('".$_POST['prdctid']."','".$_POST['bills']."','".$_POST['pname']."','$prices','$qmty','$cal',CURRENT_DATE)";
	
		$query = mysqli_query($conn,$sql);
		
		if($query){		
			 // syntax for quantity update
			 $sql2 = "SELECT * FROM `products` WHERE `id` = '".$_POST['prdctid']."' ";
		$resuly = mysqli_query($conn,$sql2);
		if($resuly){
		$row = mysqli_fetch_array($resuly);
		$qty =  $row['Quantity'];
		$ans = $qty - $qmty;
		
		//update take effect here
		$sql3 = "UPDATE `products` SET `Quantity` = '$ans' WHERE `id` = '".$_POST['prdctid']."' ";
		$resulys = mysqli_query($conn,$sql3);
		if($resulys){
			//echo $sql3;
		}else{
			
		}
		}
		}
		else{
			echo"FAILED TO ADD PRODUCT";
		}
				
	?>