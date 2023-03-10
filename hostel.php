<?php
	session_start();
	if(isset($_SESSION['role']) != "Hostel"){
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
				<a class="navbar-brand text-uppercase" href="index.html">Hostel Hub</a>
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
					<ul class="list-inline">
						<li><a href="hostel.php" class="btn btn-info" style="width:100%;">Publish Hostel</a></li>
						<li><a href="hviewbooking.php" class="btn btn-success" style="width:100%;">View Bookings</a></li>
						<li><a href="hcustomer.php" class="btn btn-success" style="width:100%;">Customers</a></li>
						<li><a href="Editpassword.php" class="btn btn-success" style="width:100%;">Edit Password</a></li>
						<li><a href="generatereport.php" class="btn btn-success" style="width:100%;">Generate Report</a></li>
						<li></li>
					</ul>
					<hr style="border:1px solid #ccc;">
					<div class="row">
						<div class="col-md-2">
							
						</div>
						<div class="col-md-10">
							<div class="panel panel-info">
							<div class="panel panel-heading">Publish Hostel</div>
							<div class="panel panel-body">
								<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<?php
										if(@$_GET['suc']){
											$msg = $_GET['suc'];
											echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>'.$msg.'</strong></div>';
										}
									?>
								</div>
							</div>
						</div>
								<form action="#" method="post" id="UploadHostel">
					<div class="contact_left_grid" style="width:100%;">
						<img src="imades/" id="imgs" name="imgs" width="200" height="200">
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color:black;">Upload Hostel Image (400/400)</label>
									<input type="file" name="InputFile" id="InputFile" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>" id="userid" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color:black;">Name of Hostel</label>
									<input type="text" name="namofHos" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label style="color:black;">Location of Hostel</label>
									<input type="text" name="locofHos" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color:black;">Google Map Url of Location of Hostel</label>
									<img src="images/embedMap.png" height="" width="100%">
									<input type="text" name="goourl" placeholder="sdhdh" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label style="color:black;">Select Type OF Hostel</label>
									<select name="typehos" class="form-control">
										<option value="">Select Type OF Hostel</option>
										<option value="Self Contained">Self Contained</option>
										<option value="Two Story Building">Two Story Building</option>
										<option value="Three Story Building">Three Story Building</option>
										<option value="Four Story Building">Four Story Building</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color:black;">Number of Rooms</label>
									<input type="number" name="namofroom" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label style="color:black;">Room Size</label>
									<select name="mortype" id="mortype" class="form-control">
										<option value=""></option>
										<option value="1">Single Beds, Toliet + Bath</option>
										<option value="2">Joint Double Beds, Toliet + Bath</option>
										<option value="3">Two single beds, Toilet + bath</option>
										<option value="4">Single Beds, Toliet + Bath + Aircondition</option>
										<option value="5">Joint Double Beds, Toliet + Bath + Aircondition</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label style="color:black;">Describe The Number of People Per Room</label>
									<textarea id="decsroom" name="decsroom" placeholder="Eg. We Have Two in a Room, one in a room and so on.."></textarea>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label style="color:black;">Prices to pay</label>
									<input type="number" name="single" id="single" class="form-control">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group" id="showFailed">
							
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="submit" name="sendhostel" value="publish Hostel" class="btn btn-info">
								</div>
							</div>
						</div>
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
			$("#mortype").on("change",function(e){
				e.preventDefault();
				var values = $(this).val();
				if(values.match("1")){
					$("#single").val(1500);
				}if(values.match("2")){
					$("#single").val(1500);
				}if(values.match("3")){
					$("#single").val(1700);
				}if(values.match("4")){
					$("#single").val(2500);
				}if(values.match("4")){
					$("#single").val(2500);
				}
			});
		});
	</script>
   </body>
</html>