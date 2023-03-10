<?php
	session_start();
	if(isset($_SESSION['role']) != "Customer"){
		header("location:signin.php");
	}
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
									<li><a href="ureport.php"><img src="images/customers.jpg" class="img-thumbnail" width="100" height="100"></a><a href="ureport.php" class="btn btn-success" style="width:100%;">Report</a></li>
								</ul>	
							</div>
							<div class="panel panel-footer"></div>
							</div>
						</div>
						<div class="col-md-6">
						<?php
							include_once('db.php');
								$id = $_GET['id'];
								$sql = "SELECT * FROM `hostels` WHERE `id` = '$id' ";
								$query = mysqli_query($conn,$sql);
								if($query){
									$row = mysqli_fetch_array($query);
								}
							?>
							<div class="panel panel-info">
							<div class="panel panel-heading">Hostel Information</div>
							<div class="panel panel-body">
								<div class="row">
								<div class="col-md-3">
									<img src="images/<?php echo $row['images']; ?>" height="200" width="200" alt="picofhostel" class="img-thumbnail">
								</div>
								<div class="col-md-9">
									<h4 style="font-size:15px;">Hostel Name: <span class="text-info pull-right"><?php echo $row['name']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Location: <span class="text-info pull-right"><?php echo $row['location']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Type: <span class="text-info pull-right"><?php echo $row['typeifHostel']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;"># of Rooms: <span class="text-info pull-right"><?php echo $row['numofrooms']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Room Size: <span class="text-info pull-right">
									<?php  
										if($row['roomsize'] =="1"){
												echo"Single Beds, Toliet + Bath";
											}if($row['roomsize'] =="2"){
												echo"Joint Double Beds, Toliet + Bath";
											}if($row['roomsize'] =="3"){
												echo"Two single beds, Toilet + bath";
											}if($row['roomsize'] =="4"){
												echo"Single Beds, Toliet + Bath + Aircondition";
											}if($row['roomsize'] =="5"){
												echo"Joint Double Beds, Toliet + Bath + Aircondition";
											}
									?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">People per Room: <span class="text-info pull-right"><?php echo $row['pplPerroom']; ?></span></h4>
									<hr style="1px solid #ccc;">
									<h4 style="font-size:15px;">Price Charge: <span class="text-info pull-right">At least &nbsp;<?php echo $row['price']; ?> </span></h4>
									<hr style="1px solid #ccc;">
									<br>
									<h4 style="font-size:15px;">Google map </h4>
									<hr style="1px solid #ccc;">
									<?php echo $row['urlofHostel']; ?> 
								</div>
							</div>
							</div>
							<div class="panel panel-footer"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-info">
							<div class="panel panel-heading">Book Now</div>
							<div class="panel panel-body">
								<form method="post" action="" id="booking">
								<img src="images/" id="imgs" height="100" width="100" class="img-circle">
								<div class="form-group">
									<input type="hidden" name="hostelid" value="<?php echo $row['userid']; ?>"  placeholder="Hostel ID" class="form-control">
								</div>
								<div class="form-group">
									<input type="hidden" name="useid" id="useid" value="<?php echo $_SESSION['id']; ?>" class="form-control">
								</div>
								<div class="form-group">
								<label>Upload  A passport Size Image</label>
									<input type="file" name="InputFile" id="InputFile" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Your Name</label>
									<input type="text" name="funame" value="<?php echo $_SESSION['name']; ?>" placeholder="" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Your Email</label>
									<input type="email" name="femail" value="<?php echo $_SESSION['email']; ?>" placeholder="" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Select Gender</label>
									<select class="form-control" name="gender">
										<option name=""></option>
										<option name="Male">Male</option>
										<option name="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
								<label>User Phone Number</label>
									<input type="text" name="fphone" value="<?php echo $_SESSION['phone']; ?>"placeholder="" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Hostel Name</label>
									<input type="text" name="hotelname" value="<?php echo $row['name']; ?>" placeholder="Hostel name" class="form-control" required>
								</div>
								<?php
									if($row['typeifHostel'] == "Self Contained"){
										echo'<div class="form-group">
										<label>Hostel Floor</label>
											<input type="text" name="hotelfloor" value="First Floor" placeholder="Hostel name" class="form-control" required>
										</div>';
									}if($row['typeifHostel'] == "Two Story Building"){
										echo'
										<div class="form-group">
										<label>Select Hostel Floor</label>
											<select name="hotelfloor" class="form-control" required>
												<option value="" ></option>
												<option value="First Floor" >First Floor</option>
												<option value="Second Floor" >Second Floor</option>
											</select>
										</div>
										';
									}if($row['typeifHostel'] == "Three Story Building"){
										echo'
										<div class="form-group">
										<label>Select Hostel Floor</label>
											<select name="hotelfloor" class="form-control" required>
												<option value="" ></option>
												<option value="First Floor" >First Floor</option>
												<option value="Second Floor" >Second Floor</option>
												<option value="Third Floor" >Third Floor</option>
											</select>
										</div>
										';
										
									}if($row['typeifHostel'] == "Four Story Building"){
										echo'
										<div class="form-group">
										<label>Select Hostel Floor</label>
											<select name="hotelfloor" class="form-control">
												<option value="" ></option>
												<option value="First Floor" >First Floor</option>
												<option value="Second Floor" >Second Floor</option>
												<option value="Third Floor" >Third Floor</option>
												<option value="Forth Floor" >Forth Floor</option>
											</select>
										</div>
										';
									}
								?>
								
								<div class="form-group">
									<label>Select Room Type</label>
									<select name="romsize" id="romsize" class="form-control" required>
										<option value=""></option>
										<option value="1">Single Beds, Toliet + Bath</option>
										<option value="2">Joint Double Beds, Toliet + Bath</option>
										<option value="3">Two single beds, Toilet + bath</option>
										<option value="4">Single Beds, Toliet + Bath + Aircondition</option>
										<option value="5">Joint Double Beds, Toliet + Bath + Aircondition</option>
									</select>
								</div>
								<div id="showromm"></div>
								<div class="form-group" id="roomNumber">
								<label>Select Room Number</label>
									<select name="" id="" class="form-control">
										<option value=""></option>
									</select>
								</div>
								<div class="form-group">
									<label>Price</label>
									<input type="text" id="prices" name="prices" class="form-control" >
								</div>
								<div class="form-group">
									<input type="submit" id="send" name="send" class="btn btn-success pull-right" value="Book Now">
								</div>
							</form>
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
						alert("Hostel Booked Successfully");
						window.location.href="bookingsammuary.php";
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
							$("#prices").val(1500);
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
							$("#prices").val(1500);
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
							$("#prices").val(1700);
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
							$("#prices").val(2500);
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
							$("#prices").val(2500);
						}
					});	
				}
			});
		});
	</script>
   </body>
</html>