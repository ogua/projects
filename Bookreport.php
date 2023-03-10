<?php
	session_start();
	if(!isset($_SESSION['id'])){
	   header("location: index.php");
	}
	$Florr =  $_GET['floor'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Car Parking System Receipt</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		.require{
			color:red;
		}
		.back2{
  background-image: url("dist/img/joey-banks-391210-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
.back{
  background-image: url("images/raban-haaijk-118657-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
p{
	font-size:18px;
}
	</style>

  </head>
  <body class="back">
	<div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;">
		<div class="well">
			<ul class="list-inline">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li class=""><a href="contact.php">Contact Us</a></li>
				<li class="pull-right"><a href="logout.php">Logout</a></li>
				<li class="pull-right"><a href="changepass.php">Change Password</a></li>
				<li class="pull-right"><a href="account.php">My account</a></li>						
			</ul>
		</div>
	             
	 </div>
     <div class="container-fluid well back2" style="">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-7">
				<h2 class="text-success">Online Car Booking</h2>
				<h3 class="text-capitalize text-primary">All Parking Space slots for <?php $flor = $_GET['floor']; echo $flor; ?></h3>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	 </div>
	 <div class="clearfix"></div>
	  <div class="container-fluid" style="margin-top:-20px;">
		<div class="row">
			
			<div class="col-md-3 well">
				<div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome : <?php echo $_SESSION['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  <div id="dislalogout" style="display:none;">
	  <hr style="border:2px solid #ccc;">
	  <a href="logout.php" class="btn btn-success" style="margin-left:10px;">Logout</a>
	  </div>
			</div>
			<div class="col-md-8 well">
				<a href="slotbook.php?floor=<?php echo $Florr; ?>" class="btn btn-success">&larr; Back</a>
				<h3 class="text-capitalize text-success">Booking Receipt</h3>
				<?php
					if(@isset($_GET['error'])){
						echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			        Parking Slot Already Occupied !
					</strong></div>';	
					}
					include_once("db.php");
					$sql = "SELECT * FROM `parkslot` WHERE `username` = '".$_SESSION['name']."' AND `id` = '".$_SESSION['lastid']."' ";
					$query = mysqli_query($conn,$sql);
					if($query){
						$row = mysqli_fetch_array($query);
					}
					
					$SQLDIFF = "select DATEDIFF(`endstart`,`startdate`) AS DIFFDATE FROM parkslot WHERE `username` = '".$_SESSION['name']."' AND `id` = '".$_SESSION['lastid']."'";
					$query2 = mysqli_query($conn,$SQLDIFF);
					if($query2){
						$rows = mysqli_fetch_array($query2);
						$datedif = $rows['DIFFDATE'];
						$datediff = $datedif + 1;
						$costperday = 10 * $datediff;
					}
				?>
					<div class="col-md-10 col-md-offset-1" style="border:2px solid blue;" id="printRec">
						<center><H3>KOTOKA AIRPORT ONLINE CAR BOOKING RECEIPT</H3></center>
						<center><H3>Customer Name : <?php echo $_SESSION['name'];?></H3></center>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Slot Location</p>
							</div>
							<div class="col-md-6">
							<p class="text-capitalie text-info"><?php $lwrd = strtolower($row['slotname']); echo ucwords($lwrd); ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Slot Number</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitaliz text-info"><?php  $snum = strtolower($row['slodid']); echo ucwords($snum); ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Vehicle Name</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitaliz text-info"><?php $vename = strtolower($row['vehicle']); echo ucwords($vename); ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Plate Number</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitaliz text-info"><?php echo  strtoupper($row['platenumber']); ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Email</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitaliz text-info"><?php echo $row['email']; ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Phone Number</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitalize text-info"><?php echo $row['phonenumber']; ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Start Date</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitalize text-info"><?php echo $row['startdate']; ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">End Date</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitalize text-info"><?php echo $row['endstart']; ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Number of Dates</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitalize text-info"><?php echo $datediff; ?> Days</p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Cost Per Day</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitalize text-info"> GH&cent; 10</p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="row">
							<div class="col-md-6">
								<p class="text-capitalize">Total Bill</p>
							</div>
							<div class="col-md-6">
								<p class="text-capitalize text-info"> GH&cent;<?php echo $costperday; ?></p>
							</div>
						</div>
						<hr style="border:2px solid #ccc;">
						<div class="col-md-12 text-center">
							<svg id="barcode" jsbarcode-width="1"></svg>	
						</div>
						<ul class="list-inline">
							<li><a href="#" class="btn btn-success" id="print_btn"> Print Invoice<span class=""></span></a></li>
							<li><a href="#" id="payit" class="btn btn-success">Proceed To Payment</a></li>
						</ul>
						<ul class="list-inline" id="payitshow" style="display:none;">
							<hr style="border:2px solid #ccc;">
								<h4>Select Payment Option</h4>
							<li><a href="#" class="btn btn-success" id="payarrive">Pay On Arrival<span class=""></span></a></li>
							<li><a href="#" data-toggle="modal" data-target="#ipayModal"   class="btn btn-success">Pay Now</a></li>
						</ul>
							
					</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
		<div id="ipayModal" class="modal fade m-auto" role="dialog" data-keyboard="true" data-backdrop="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<img src="https://payments.ipaygh.com/app/webroot/img/LOGO-MER01095.jpeg" class="mx-auto d-block logo">
							</div>
							<form action="https://community.ipaygh.com/gateway" id="ipay_checkout" method="post" name="ipay_checkout" target="_blank">
								<div class="modal-body">
									<legend class="text-center mt-1">Make Payment</legend>
									<input name="merchant_key" type="hidden" value="5c841bf2-d29b-11e7-aebc-f23c9170642f">
									<input id="merchant_code" type="hidden" value="TST000000000950">
									<input name="success_url" type="hidden" value="">
									<input name="cancelled_url" type="hidden" value="">
									<input id="invoice_id" name="invoice_id" type="hidden" value="">
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="text" title="Name" name="extra_name" value="<?php echo $_SESSION['name'];?>" id="name" class="form-control" placeholder="First & Last Name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="tel" title="Mobile Number" name="extra_mobile" id="number" value="<?php echo $row['phonenumber']; ?>"class="form-control" maxlength="10" placeholder="Contact Number">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="email" name="email" id="extra_email" value="<?php echo $row['email']; ?>"class="form-control" placeholder="Email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input type="text" name="total" class="form-control" value="<?php echo $costperday; ?>" id="total" placeholder="Amount(GH₵)">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group">
												<input class="form-control" type="text" value="Tithe Payment"name="description" id="description" placeholder="Car Parking Payment">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<button type="submit" class="btn btn-primary ipay-btn btn-block" style="padding: 8px 11px;"><strong>Pay</strong></button>
										</div>
									</div>
									<div class="row">
										<div class="col-lg text-center mt-2">
											<a href="" data-dismiss="modal" id="close">Cancel</a>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-center ">
									<div class="row">
										<div class="col-lg">
											<img src="https://payments.ipaygh.com/app/webroot/img/iPay_payments.png" style="width: 100%;" class="img-fluid mr-auto" alt="Powered by iPay">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
			<script type="text/javascript">(function(){Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();})();</script>
			
	 </div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/JsBarcode.all.min.js"></script>
<script src="js/jquery.PrintArea.js"></script>

<script>
	$("document").ready(function(){
		$("#payit").click(function(e){
			e.preventDefault();
			$("#payitshow").toggle(700);
		});
		
		$("#imgclick").click(function(e){
			e.preventDefault();
			$("#dislalogout").toggle(700);
		});
		
		$("#payarrive").click(function(e){
			e.preventDefault();
			var username = '<?php echo $_SESSION['name']; ?>';
			var phonenum = '<?php echo $row['phonenumber']; ?>';
			var email = '<?php echo $row['email']; ?>';
			var amount = '<?php echo $costperday; ?>';
			var vehicl = '<?php echo $row['vehicle']; ?>';
			var plate = '<?php echo $row['platenumber']; ?>';
			var slodid = '<?php echo $snum; ?>'; 
			var slotea = '<?php echo $row['slotname']; ?>';
			var status = '<?php echo "Pay On Arrival"; ?>';
			var parkdays = '<?php echo $datediff; ?>';
			var img = '<?php echo $_SESSION['image']; ?>';
			$.ajax({
				url: 'delivery.php',
				type: 'POST',
				data: {delivery: 1, username: username, phonenum: phonenum, email: email, amount: amount, vehicl: vehicl, plate: plate,
				slodid: slodid, slotea: slotea, status: status, parkdays: parkdays, img: img},
				success: function(data){
					alert(data);
					window.location.href = "Bookprg.php";
				}
			});
		});
		
		$("#print_btn").click(function(e){
			e.preventDefault();
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("#printRec").printArea(options);
        });
		
		JsBarcode("#barcode", "<?php echo $_SESSION['name']; ?>");
	});
</script>	 
</body>
</html>
