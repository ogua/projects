<?php
	    include_once('db.php');
		if($conn->connect_error){
		    echo"Connection to the database unsuccessfully";
		}else{
		    
		}
		$qmty = $_POST['pqty'];
		$prices = $_POST['Pprice'];
		$dcnt = $_POST['pdcnt'];
		$cal = $qmty * $prices;
		$calR = (($dcnt/100)*$cal);
		$totals = $cal - $calR;
		$stat = $_POST['pname'];
		$sql = "INSERT INTO `sale`(`BillId`, `Productid`, `name`, `Price`, `Quantity`, `Discount`, `Total`, `date`) VALUES ('".$_POST['bills']."','".$_POST['prducts']."','".$_POST['pname']."','$prices','.$qmty.','.$dcnt.','$totals',CURRENT_DATE)";
		$query = mysqli_query($conn,$sql);
		if($query){
			
			 // syntax for quantity update
			 $sql2 = "SELECT `Quantity` FROM `product` WHERE `Barcode` = ".$_POST['prducts']." ";
		$resuly = mysqli_query($conn,$sql2);
		if($resuly){
		$row = mysqli_fetch_assoc($resuly);
		$qty =  $row['Quantity'];
		$ans = $qty - $qmty;
		if($ans < 10){
			echo $stat +' is out of stock. please Take note';
		}else{
			
		}
		//update take effect here
		$sql3 = "UPDATE `product` SET `Quantity`= $ans WHERE `Barcode` = ".$_POST['prducts']." ";
		$resulys = mysqli_query($conn,$sql3);
		if($resulys){
		}else{
			
		}
		}
		}
		else{
			echo"FAILED TO ADD PRODUCT";
		}
				
	?>