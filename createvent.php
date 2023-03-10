<?php
session_start();
if(!$_SESSION['id']){
	header("location:singin.php");
}
					
				if(isset($_POST['send'])){
						include_once("db.php");
						
						$image = $_FILES['logofile']['name'];
						$tmpimage = $_FILES['logofile']['tmp_name'];
						$source ="images/";
						$target_file = $source.basename($image);	
						$ext = strtolower(substr($image, strripos($image, '.')+1));
						$filename = round(microtime(true)).mt_rand().'.'.$ext;
						
						if(move_uploaded_file($tmpimage,$source.$filename)){
						$sql = "INSERT INTO `event`(`nameofevent`, `typeofevnt`, `dates`, `time`, `artwork`, `describEvnt`, `uid`, `uName` ) 
						VALUES ('".$_POST['ename']."','".$_POST['typeofe']."','".$_POST['edate']."','".$_POST['edatee']."', '$filename','".$_POST['decrbevnt']."','".$_SESSION['id']."','".$_SESSION['username']."' )";
						$query = mysqli_query($conn,$sql);
						if($query){
							$_SESSION['lastid'] = mysqli_insert_id($conn);
							header("location:eventlocation.php");
						}else{
							echo'
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Failed ! PLease Try Again
								</strong></div>
							';
						}
						}else{
							echo'
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Failed ! Unable to move uploaded File
								</strong></div>
							';
						}
						
					}
				?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Event</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<!-- news-css -->
<link rel="stylesheet" href="news-css/news.css" type="text/css" media="all" />
<!-- //news-css -->
<!-- list-css -->
<link rel="stylesheet" href="list-css/list.css" type="text/css" media="all" />
<!-- //list-css -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,5],
		  itemsDesktopSmall : [414,4]
	 
		});
	 
	}); 
</script> 
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="index.php"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				
			</div>
			<div class="w3l_sign_in_register">
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i>  (+233) 272185090</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="profile.php" class="" >My Event</a>
							</li>
							<li class="dropdown active">
								<a href="createvent.php" class="" >Creat Event</a>
							</li>
							<li class="dropdown">
								<a href="singin.php" class="" >Signin</a>
							</li>
							<!----<li class="dropdown">
								<a href="singup.php" class="" >Create Account</a>
							</li>----->
							<li class="dropdown">
								<a href="Book.php" class="" >Book Event</a>
							</li>
							<li class="dropdown">
								<a href="admin.php" class="" >Admin</a>
							</li>
						</ul>
					</nav>
				</div>
			</nav>	
		</div>
	</div>
<!-- //nav -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
  </nav>
</div>
<!-- comedy-w3l-agileits -->
	<div class="wthree-comedy">
		<div class="row">
		<div class="col-md-2">
			
		</div>
			<div class="col-md-2">
				<h3>Tip</h3>
				<p>
				One of the easiest things to look out for when you want to attract lots of attention to your event is the name/title of your event.
				</p>
				<p>Avoid single worded names and always add a month or year to the name if your event is recurrent. This allows easy identification and its great for search engines.</p>
			</div>
			<div class="col-md-7 well">
				<ul class="list-inline">
					<li><a href="createvent.php" class="btn btn-info">Create Avent</a></li>
					<li><a href="eventlocation.php" class="btn btn-success">Specify Event Location</a></li>
					<li><a href="ticketsetup.php" class="btn btn-info">Setup Ticket Information</a></li>
				</ul>
				<br>
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="label-control">Name of Event/ Title of Event</label>
						<input type="text" class="form-control" name="ename" id="ename" placeholder="NAME OF EVENT EVENT / TITLE OF EVRNT" required/>
					</div>
					<div class="form-group">
						<label class="label-control">Type Of Event</label>
						<select name ="typeofe" class="form-control">
							<option value="">Select Type Of Event </option>
							<option value="Arts and Theater">Arts and Theater</option>
							<option value="Sports">Sports</option>
							<option value="Professional">Professional</option>
							<option value="Educational">Educational</option>
							<option value="Music &amp; Concert">Music &amp; Concert</option>
							<option value="Non Profit Event">Non Profit Event</option>
							<option value="Movies &amp; Cinema">Movies &amp; Cinema</option>
							<option value="Other">Other</option>
							<option value="Technology">Technology</option>
							<option value="Religious">Religious</option>
						</select>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<div class="col-md-6">
								<label>Start Date</label>
								<input type="date" class="form-control" name="edate" id="edate" required>
							</div>
							<div class="col-md-6">
							<label>Start Time</label>
							<input type="time" class="form-control" name="edatee" id="edatee" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="label-control">Upload Picart</label>
						<input type="file" class="form-control" name="logofile" id="logofile" placeholder="Type in the address of the venue" required/>
					</div>
					
					<div class="form-group">
						<label class="label-control">Describe Event</label>
						<textarea cols="5" rows="5" class="form-control" name="decrbevnt" placeholder="DESCRIBE YOUR EVENT" required></textarea>
					</div>			
					<div class="form-group">
						<input type="submit" name="send" value="Create Event &larr;" class="btn btn-success">
					</div>
		
				</form>
				
			</div>
			<div class="col-md-1">
			
			</div>
		</div>
	</div>
	<!-- //comedy-w3l-agileits -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Subscribe to us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="Your email..." required="">
								<input type="submit" value="Send">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="index.html"><h2>One<span>Movies</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2016 One Movies. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
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
</body>
</html>