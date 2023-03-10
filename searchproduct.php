<?php
	include_once("db.php");
	$name = $_POST['name'];
	$sql = "SELECT * FROM `products` WHERE `name` like '%$name%' limit 10";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo '<datalist id="productList">';
		while($row = mysqli_fetch_array($query)){
		$productname = $row['name'];
		$mlower = strtolower($productname);
		$final = ucwords($mlower);
			echo'<option value="'.$final.'">'.$final.','.$row['dosage'].'</option>';
		}
		echo'</datalist>';
		
	}
?>
			