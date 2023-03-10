<?php
	include_once('db.php');
	if(isset($_POST['login'])){
		$sql = "SELECT * FROM `users` WHERE `email` = '".$_POST['Email']."' AND `role` = '".$_POST['role']."' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		$row = mysqli_fetch_array($query);
		$password = $row['password'];
		if(!password_verify($_POST['password'],$password)){
			echo'<script>alert("User Email or Password Incorrect");</script>';
		}else{
			if($_POST['role'] == "Admin"){
				session_start();
				$_SESSION['role'] = $_POST['role'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
				echo'<script>alert("User Login Successfully!");</script>';
				header("location:admin.php");
			}if($_POST['role'] == "Customer"){
				session_start();
				$_SESSION['role'] = $_POST['role'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
				echo'<script>alert("User Login Successfully!");</script>';
				header("location:booking2.php");
			}if($_POST['role'] == "Hostel"){
				session_start();
				$_SESSION['role'] = $_POST['role'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
			echo'<script>alert("User Login Successfully!");</script>';
				header("location:hostel.php");
			}
		}
		
	}else{
		echo'<script>alert("User Email or Password Incorrect");</script>';
	}
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
      <!--//booststrap end-->
      <!-- font-awesome icons -->
     <link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
      <!-- //font-awesome icons -->
	  <link href="css/simpleLightbox.css" rel='stylesheet' type='text/css' />
      <!--stylesheets-->
	  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
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
<section class="appointment py-5" id="appointment">
	<div class="test_agile_info">
		<div class="container py-md-3">
		 <div class="w3-head-all mb-3 w3-head-col">
		         <h3>User Login</h3>
		       </div>
			<div class="contact_grid_right">
				<form action="#" method="post" id="LoginUser">
					<div class="contact_left_grid">
						
						<div class="form-group">
							<input class="form-control" type="email" name="Email" placeholder="Your Email" required="">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="password" placeholder="Your Password" required="">
						</div>
						<div class="form-group">
						<select name="role">
									<option value="">Select Role </option>
									<option value="Customer">Customer</option>
									<option value="Hostel">Hostel Manager </option>
									<option value="Admin">Admin</option> 
								</select>
						</div>
						<div class="form-group">
							<label><a href="signup.php">Dont Have an Account? Signup</a></label>
						</div>
						<div class="form-group" id="dislayResults">
							
						</div>
						<input class="form-control" type="submit" name="login" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- //Appointment -->

	<!--//main-->
      <!-- //Contact-form -->
	  <!-- footer section -->
<section class="newsletter text-center py-5">
	<div class="container py-lg-3">
		<div class="subscribe_inner">
			<h4 class="mb-4">Subscribe Us</h4>
			<p class="mb-4">Subscribe to our Newsletter to get latest offers from our Barber. </p>
			<form action="#" method="post" class="subscribe_form">
				<input class="form-control" type="email" placeholder="Enter Your Email..." required="">
				<button type="submit" class="btn1 btn-primary submit"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
			</form>
			<div class="social mt-5">
				<ul class="d-flex mt-4 justify-content-center">
					<li class="mx-2"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-twitter"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fas fa-rss"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-google-plus"></span></a></li>
				</ul>
			</div>
		</div>
		<div class="copyright mt-5">
			<p>© 2018 Hotel zone. All Rights Reserved | Design by	<a href="http://w3layouts.com/">W3layouts</a> </p>
		</div>
	</div>
</section>
<!-- //footer section -->
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
	  <script>
		$('document').ready(function(){
			
			$("#LoginUer").on("submit",function(e){
			e.preventDefault();
			//alert("gooo");
				$.ajax({
					url: 'Login.php',
					type: 'POST',
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						if(data.match("admin")){
							alert("User Login Successfully !");
							window.location.href="admin.php";
						}else if(data.match("Customer")){
							alert("User Login Successfully !");
							window.location.href="booking2.php";
						}else if(data.match("hostelm")){
							alert("User Login Successfully !");
							window.location.href="hostel.php";
						}else{
							alert(data);
						}
					}
				});
			});
			
		});
	  </script>
   </body>
</html>