<?php
	 include_once('db.php');
	 $sql = "SELECT MAX(`BillId`) as maximum_num FROM bilids_t ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 session_start();
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + 1;
	 $_SESSION['billid'] = $num3;
	 echo $num3;
	 }else{
		 echo"failed";
	 }
	
?>