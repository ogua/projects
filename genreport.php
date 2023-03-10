<html>
	<head>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
</head>
<?php
	include_once("db.php");
	session_start();
	$id = $_SESSION['GenrateId'];
	$sql = "SELECT * FROM `booking` WHERE `id` = '$id' ";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
?>
<body>
		<div class="col-md-6 col-md-offset-3 well printAlll" style="margin-top:100px;">
			<h1 class="text-center">Event Booked Successfully</h1>
			<a href="index.php" class="btn btn-success btn-sm">Back to Homepage</a>
			<ul class="list-unstyled">
		<li><b>Name: </b><?php echo $row['Name']; ?></li>
		<li><b>Phone Number:</b> <?php echo $row['Phone']; ?></li>
		<li><b>Event Booked: </b><?php echo $row['nameofEvent']; ?></li>
		<li><b>Type of Event: </b><?php echo $row['TypeofEvent']; ?></li>
		<li><b>Unit Price: </b><?php echo $row['price']; ?></li>
		<li><b>Quantity: </b><?php echo $row['Qty']; ?></li>
		<li><b>Event Date:</b> <?php echo $row['Edate']; ?></li>
		<li><b>Event Time: </b><?php echo $row['Etime']; ?></li>
		<li><b>Event Venue: </b><?php echo $row['Evenue']; ?></li>
		<li><b>Reference ID: </b><?php echo $row['Refid']; ?></li>
			</ul>
			<a href="#"  onclick="print()" class="btn btn-xs btn-success pull-right">Print</a>
		</div>	
</body>
</html>

