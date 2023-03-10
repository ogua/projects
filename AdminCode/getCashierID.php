<?php
	 include_once('db.php');
	 $sql = "SELECT MAX(`cashierid`) as maximum_num FROM `cashier` ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + 1;
	 echo $num3;
	 }else{
		 echo"failed";
	 }
	
?>