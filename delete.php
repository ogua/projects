<?php
include_once('db.php');
    $id = $_POST['cid'];
   $billid = $_POST['text2'];
   $sqli6 = "DELETE FROM `sale` WHERE `Productid` = '$id' AND `BillId` = '$billid'";
   $query6 = mysqli_query($conn,$sqli6);
   if($query6){
	   echo"Product Deleted Successfully";
   }else{
	   echo "Failed to Delete Row";
   }
   
?>