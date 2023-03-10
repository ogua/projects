<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>:: Hotel Hub</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	   <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
     <link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
      <!-- //font-awesome icons -->
	  <link href="css/simpleLightbox.css" rel='stylesheet' type='text/css' />
      <!--stylesheets-->
	  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
      <link href="css/style.css?newversion" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
  <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
   <style type="text/css">.fonts{font-size: 12.5px;}.ipay-btn{background-color: #04448C;border-color: #04448C;border-radius: 17px !important;}#close:hover{text-decoration: none !important;}.logo{width: 65px;height: 65px;}</style>
   </head>
   <body>
   <!-- Navigation -->
<header>
	<div class="top-nav">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand text-uppercase" href="index.php">Hostel Hub</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
					
				</div>
			</nav>
		</div>
	</div>
</header>
<!-- //Navigation -->
	<!-- Appointment -->
	<div class="clearfix"></div>
<section class="appointment py-5">
	<div class="test_agile_info">
		<div class="clearfix"></div>
		<div class="container py-md-3" style="margin-top:40px;">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel panel-heading">
					<ul class="list-inline">
						<li><i><img src="images/avatar.png"width="50" height="50" class="img-circle img-thumbnail"></i> &nbsp; Welcome:  
				<?php ?></li>
				</ul>
				<li><a href="logout.php" class="btn btn-info btn-sm pull-right">Logout</a></li>
				</div>
				<div class="panel panel-body">
					<div class="row">
						<div class="col-md-2">
							<div class="panel panel-info">
							<div class="panel panel-heading">Menu</div>
							<div class="panel panel-body">
								<ul>
									<li>
										<a href="uprofile.php"><img src="images/avatar.png" class="img-thumbnail" width="100" height="100"></a>
									<a href="uprofile.php" class="btn btn-success" style="width:100%;">User Profile</a></li>
									<hr style="2px solid #fff;">
									<li><a href="booking2.php"><img src="images/bookim.jpg" class="img-thumbnail" width="100" height="100"></a><a href="booking2.php" class="btn btn-info" style="width:100%;">Book Now</a></li>
									<li><hr style="2px solid #fff;"></li>
									<li><a href="viewBooking.php"><img src="images/bookimg.png" class="img-thumbnail" width="100" height="100"></a><a href="viewBooking.php" class="btn btn-success" style="width:100%;">View Bookings</a></li>
									<li><hr style="2px solid #fff;"></li>
									<li><a href="#"><img src="images/customers.jpg" class="img-thumbnail" width="100" height="100"></a><a href="#" class="btn btn-success" style="width:100%;">Report</a></li>
								</ul>	
							</div>
							<div class="panel panel-footer"></div>
							</div>
						</div>
						<div class="col-md-10">
							<?php
							include_once('db.php');
								$sql = "SELECT * FROM `booking` WHERE `userid` = '".$_SESSION['id']."' and id = '".$_SESSION['lastid']."' ";
								$query = mysqli_query($conn,$sql);
								if($query){
									$row = mysqli_fetch_array($query);
								}
							?>
							<div class="panel panel-info">
							<div class="panel panel-heading">Booking Summary</div>
							<div class="panel panel-body">
								<div class="row">
								<div class="col-md-3">
									<img src="images/<?php echo $row['image']; ?>" height="200" width="200" alt="picofhostel" class="img-thumbnail">
								</div>
								<div class="col-md-9">
									<h4 style="font-size:15px;">Customer Name <span class="text-info pull-right"><?php echo $row['CustomerName']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Customer Email <span class="text-info pull-right"><?php echo $row['Customeremail']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Customer Gender <span class="text-info pull-right"><?php echo $row['Customergender']; ?></span></h4>
									<hr style="1px solid #ccc;">
						<h4 style="font-size:15px;">Customer Number <span class="text-info pull-right"><?php echo $row['CustomerPhone']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Hostel Booked <span class="text-info pull-right"><?php echo $row['Hostelname']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Floor Blocked <span class="text-info pull-right"><?php echo $row['hostelFloor']; ?> </span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Room Type <span class="text-info pull-right"><?php echo $row['hostelRoomType']; ?> </span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Allocated To Room <span class="text-info pull-right"><?php echo $row['HostelroomNum']; ?> </span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Amount to Pay <span class="text-info pull-right"><?php echo $row['price']; ?> </span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Status <span class="text-info pull-right">
									<?php 
										if($row['status'] == "0"){
											echo"Submitted";
										}else{
											echo"Booked";
										}
										
									?> </span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Paid <span class="text-info pull-right">
									<?php 
										if($row['PaymentStatus'] == "0"){
											echo"No";
										}else{
											echo"Yes";
										}
										
									?> </span></h4>
									<hr style="1px solid #ccc;">
									<div class="clearfix"></div>
									<div class="col-md-10 col-md-offset-2">
										<ul class="list-inline">
											<li><a href="#" id="print_button2" class="btn btn-sm btn-info">Print</a></li>
											<li><a href="#" id="paynow" class="btn btn-sm btn-info">Proceed to Payment</a></li>
										</ul>
									</div>
									<hr style="1px solid #ccc;">
									<div class="col-md-10 col-md-offset-2" id="hidethis" style="border:1px solid #ccc;">
										<ul class="list-inline">
											<li><a href="#" id="payn" class="btn ipay-btn btn-sm btn-primary">Pay On Arrival</a></li>
											<li><button type="button" class="btn btn-primary ipay-btn" data-toggle="modal" data-target="#ipayModal">Make Payment</button></li>
										</ul>
									</div>
								</div>
							</div>
							</div>
							<div class="panel panel-footer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-footer"></div>
			</div>
		</div>
		</div>
	</div>
</section>
<!-- //Appointment -->
<div class="clearfix"></div>
<div id="ipayModal" class="modal fade m-auto" role="dialog" data-keyboard="true" data-backdrop="true" style="overflow:hidden;" style="border:1px solid red;"><div class="clearfix"></div>
					<div class="modal-dialog" style="border:2px solid green;width:300px;margin-top:130px;">
					<div class="clearfix"></div>
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
											<div class="form-group input-group">
												<input type="text" title="Name" name="extra_name" value="<?php echo $row['CustomerName']; ?>" id="name" class="form-control" placeholder="First & Last Name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="tel" title="Mobile Number" value="<?php echo $row['CustomerPhone']; ?>" name="extra_mobile" id="number" class="form-control" maxlength="10" placeholder="Contact Number">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="email" name="email" value="<?php echo $row['Customeremail']; ?>" id="extra_email" class="form-control" placeholder="Email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="text" name="total" value="<?php echo $row['price']; ?>" class="form-control" id="total" placeholder="Amount(GH₵)">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input class="form-control" type="text" name="description" value="Hostel Payment" id="description" placeholder="Description of Payment">
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
	<!--//main-->
      <!-- //Contact-form -->
	  <!-- Vertically centered Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase text-center" id="exampleModalLongTitle"> Hotel zone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<img src="images/ban5.jpg" class="img-fluid mb-3" alt="Modal Image" />
        Vivamus eget est in odio tempor interdum. Mauris maximus fermentum arcu, ac finibus ante. Sed mattis risus at ipsum elementum, ut auctor turpis cursus. Sed sed odio pharetra, aliquet velit cursus, vehicula enim. Mauris porta aliquet magna, eget laoreet ligula.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- //Vertically centered Modal -->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!-- //js  working-->
     
	<!-- Banner Responsive slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Banner Responsive slider -->

      <!--// banner-->
	  <!-- simpleLightbox -->
	<script src="js/simpleLightbox.js"></script>
	<script>
		$('.proj_gallery_grid a').simpleLightbox();
	</script>
	<!-- //simpleLightbox -->
<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<!-- //flexSlider -->
<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->
			<!-- odometer-script -->
	<script src="js/odometer.js"></script>
	<script>
		window.odometerOptions = {
			format: '(ddd).dd'
		};
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats1').html(25);
		}, 1500);
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats2').html(330);
		}, 1500);
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats3').html(542);
		}, 1500);
	</script>
	<script>
		setTimeout(function () {
			jQuery('#w3l_stats4').html(222);
		}, 1500);
	</script>
	<!-- //odometer-script -->

      <!-- start-smoth-scrolling -->
      <script  src="js/move-top.js"></script>
      <script  src="js/easing.js"></script>
      <script >
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         	/*
         		var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear' 
         		};
         	*/
         
         	$().UItoTop({ easingType: 'easeOutQuart' });
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.js"></script>
      <!-- //bootstrap working-->
	  <script src="js/action.js"></script>
	  <script src="tinymce/tinymce.min.js"></script>
	   <script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
			<script type="text/javascript">(function(){Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();})();</script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
	<script>
		$('document').ready(function(){
			$("#hidethis").hide();
			
			$("#paynow").click(function(e){
				e.preventDefault();
				$("#hidethis").toggle(1000);
			});
			
			$("#payn").click(function(){
				$.ajax({
				url: 'action.php',
				type: 'POST',
				data: {Payonarrive: 1},
					success: function(data){
						alert(data);
					}
				});
			});
			
			$("#print_button2").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("#printRec").printArea(options);
			});
			$("#booking").on("submit",function(e){
				e.preventDefault();
				$.ajax({
				url: 'booknow.php',
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
				data: new FormData(this),
				success: function(data){
					if(data.match("success")){
						
					}else{
						alert(data);
					}
				}
				});
			});
			
			
			$("#UploadHostel").on("submit",function(e){
				e.preventDefault();
			$.ajax({
				url: 'upload.php',
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
				data: new FormData(this),
				success: function(data){
					if(data.match("success")){
						window.location.href="hostel.php?suc=Hostel Details Submitted Successfully!";
					}else{
						$("#showFailed").html(data);
					}
				}
			});
	});
			$("#InputFile").change(function(){
						showImages(this);
					});
					function showImages(input){
						if(input.files && input.files[0]){
							var imagetype = input.files[0].type;
							var imageExt = ["image/jpeg","image/png","image/gif"];
							if(!((imagetype==imageExt[0]) || (imagetype==imageExt[1]) || (imagetype==imageExt[2]) )){
								alert("File is not a valid Image");
							}else{
								var reader = new FileReader();
								reader.onload = function(e){
									$("#imgs").attr("src",e.target.result);
								}
								reader.readAsDataURL(input.files[0]);
							}
							
						}
						
					}
				
			$("#romsize").on("change",function(e){
				e.preventDefault();
				var values = $(this).val();
				if(values.match("1")){
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {Post1: 1},
						success: function(data){
							$("#roomNumber").hide();
							$("#showromm").html(data);
							$("#price").val(1500);
						}
					});														
				}if(values.match("2")){
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {Post2: 1},
						success: function(data){
							$("#roomNumber").hide();
							$("#showromm").html(data);
							$("#price").val(1500);
						}
					});	
				}if(values.match("3")){
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {Post3: 1},
						success: function(data){
							$("#roomNumber").hide();
							$("#showromm").html(data);
							$("#price").val(1700);
						}
					});	
				}if(values.match("4")){
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {Post4: 1},
						success: function(data){
							$("#roomNumber").hide();
							$("#showromm").html(data);
							$("#price").val(2500);
						}
					});	
				}if(values.match("4")){
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {Post5: 1},
						success: function(data){
							$("#roomNumber").hide();
							$("#showromm").html(data);
							$("#price").val(2500);
						}
					});	
				}
			});
		});
	</script>
   </body>
</html>