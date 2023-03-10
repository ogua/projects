<?php
 include_once("db.php");
	if(isset($_POST['GenReport'])){
	  echo '
	  <div class="col-sm-10 col-sm-offset-1">
		 <h2>Generate Report</h2>
				   <div class="form-group">
				        <div class="col-sm-5">
						         <label class="form-control">FROM</label>
										<input type="date" id="kwame" name="kwame"class="form-control" />
						</div>
						<div class="col-sm-5">
						         <label class="form-control">TO</label>
								 <input type="date"  id="kwames" name="kwames" class="form-control"/>
						</div><BR>
						<button type="submit"  style="border-bottom-left-radius:25px;" id="sdates" name="sdates" class="btn btn-success">Generate</button>	
				 </div>
				<div id="showRep">
				
				</div>
		</div>
	  ';
	}
	
	if(isset($_POST['GenReport2'])){
	 $Sql2 = "SELECT sum(`totalpx`) as Grandtotal FROM customerorder  WHERE `dates` BETWEEN '".$_POST['text1']."' AND '".$_POST['text2']."'";
	 $query2 = mysqli_query($conn,$Sql2);
	 $rows = mysqli_fetch_array($query2);
	 $sql = "SELECT `Fullname`, sum(`qty`) as Quantity, sum(`totalpx`) as total, `ReFid`, `dates` FROM `customerorder` WHERE `dates` BETWEEN '".$_POST['text1']."' AND '".$_POST['text2']."' GROUP BY `ReFid`";
	 $query = mysqli_query($conn,$sql);
	 $result = mysqli_num_rows($query);
	 if($result > 0){
		 echo '<br>
		  <div class="row" style="border:1px solid red;">
					  <div class="col-md-3" style="font-size:15px;color:red;">Ordered By</div>
			          <div class="col-md-2" style="font-size:15px;color:red;">Quantity</div>
					  <div class="col-md-2" style="font-size:15px;color:red;">Total Amount</div>
					  <div class="col-md-2" style="font-size:15px;color:red;">Ref.ID</div>
					  <div class="col-md-3" style="font-size:15px;color:red;">Date</div>
					  </div><br>
		 ';
		 while($row = mysqli_fetch_array($query)){
			 echo'
			 <div class="row">
					<div class="col-md-3">'.$row['Fullname'].'</div>
					  <div class="col-md-2">'.$row['Quantity'].'</div>
					  <div class="col-md-2">'.$row['total'].'</div>
					  <div class="col-md-2">'.$row['ReFid'].'</div>
					  <div class="col-md-3">'.$row['dates'].'</div>
					  </div>
			 ';
		 }
		 
		 echo'<br> <p class="pull-right text-danger">Grand Total: '.$rows['Grandtotal'].'</p>';
	 }else{
		echo'<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong> No Transaction as at that date</strong>'; 
	 }
	 
	}
	
	if(isset($_POST['upcustom'])){
	   $sql = "UPDATE `customerorder` SET `Status` = '".$_POST['text']."' where `ReFid` = '".$_POST['cid']."' ";
	  $query = mysqli_query($conn,$sql);
	 if($query){
			if($_POST['text'] == 2){
				$sql2 = "SELECT * FROM `customerorder` WHERE `ReFid` = '".$_POST['cid']."' ";
				$query2 = mysqli_query($conn,$sql2);
				if($query2){
					$row = mysqli_fetch_array($query2);
					$number = $row['Number'];
					$add = substr($number,1,9);
$results = "00233".$add;				 
$key="9869b6f295ac68450b7b"; //your unique API key;
$msgs = "Hi Your order is ready for pickup Your Reference Id is " .$_POST['cid'];
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "BOOKSHOP";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";


/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";


$result=file_get_contents($url); //call url and store result;

switch($result){                                           
    case "1000":
	echo "Message sent SuccessFully <br>";
	break;
    case "1002":
	echo "Message not sent";
	break;
    case "1003":
	echo "You don't have enough balance";
	break;
    case "1004":
	echo "Invalid API Key ";
	break;
    case "1005":
	echo "Phone number not valid ";
	break;
    case "1006":
	echo "Invalid Sender ID ";
	break;
    case "1008":
	echo "Empty message";
	break;
}					
				}
			}else if($_POST['text'] == 3){
				$sql2 = "SELECT * FROM `customerorder` WHERE `ReFid` = '".$_POST['cid']."' ";
				$query2 = mysqli_query($conn,$sql2);
				if($query2){
					$row = mysqli_fetch_array($query2);
					$number = $row['Number'];
					$add = substr($number,1,9);
$results = "00233".$add;				 
$key="9869b6f295ac68450b7b"; //your unique API key;
$msgs = "Sorry your order with reference number " .$_POST['cid']. " has being cancelled";
$phone = $results;
$message=urlencode($msgs); //encode url;
$sender_id = "BOOKSHOP";
/*******************API URL FOR SENDING MESSAGES********/
$url="https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";


/****************API URL TO CHECK BALANCE****************/
$urls="https://apps.mnotify.net/smsapi/balance?key=$key";


$result=file_get_contents($url); //call url and store result;

switch($result){                                           
    case "1000":
	echo "Message sent SuccessFully ";
	break;
    case "1002":
	echo "Message not sent ";
	break;
    case "1003":
	echo "You don't have enough balance ";
	break;
    case "1004":
	echo "Invalid API Key ";
	break;
    case "1005":
	echo "Phone number not valid ";
	break;
    case "1006":
	echo "Invalid Sender ID ";
	break;
    case "1008":
	echo "Empty message ";
	break;
}				
				}
			}else{
				echo"success";
			}
		}else{
			echo 'Failed to Update!';
		}
	}
	
if(isset($_POST['ediBok2'])){
	$msg = trim($_POST['text6']);
	   $sql = "UPDATE `products` SET `prod_title` = '".$_POST['text1']."', `prod_cat` = '".$_POST['text2']."', `prod_isbn` = '".$_POST['text3']."', `author` = '".$_POST['text4']."', `prod_px` = '".$_POST['text5']."', `prod_desc` = '$msg' WHERE `id` = '".$_POST['text7']."' ";
	  $query = mysqli_query($conn,$sql);
	 if($query){
			echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Success!</strong>';
		}else{
			echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed to Update!</strong>';
		}
	}
?>