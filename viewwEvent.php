<!DOCTYPE html>
<html lang="en">
<head>
<title>E -Ticketing Event View</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
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
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Sign In & Sign Up
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Click Me</div>
							  </div>
							  <div class="form">
								<h3>Login to your account</h3>
								<form action="#" method="post">
								  <input type="text" name="Username" placeholder="Username" required="">
								  <input type="password" name="Password" placeholder="Password" required="">
								  <input type="submit" value="Login">
								</form>
							  </div>
							  <div class="form">
								<h3>Create an account</h3>
								<form action="#" method="post">
								  <input type="text" name="Username" placeholder="Username" required="">
								  <input type="password" name="Password" placeholder="Password" required="">
								  <input type="email" name="Email" placeholder="Email Address" required="">
								  <input type="text" name="Phone" placeholder="Phone Number" required="">
								  <input type="submit" value="Register">
								</form>
							  </div>
							  <div class="cta"><a href="#">Forgot your password?</a></div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
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
							<li class="active"><a href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="profile.php" class="" >My Event</a>
							</li>
							<li class="dropdown">
								<a href="createvent.php" class="" >Creat Event</a>
							</li>
							<li class="dropdown">
								<a href="singin.php" class="" >Signin</a>
							</li>
							<li class="dropdown">
								<a href="singup.php" class="" >Create Account</a>
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
		<h3 class="text-center">Event Information</h3>
	<?php
		include_once("db.php");
		$sql = "SELECT * FROM `event` WHERE `id` = '".$_GET['id']."'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
	?>
	<div class="faq">
			<div class="container">
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="wthree-news-left-img">
								<img src="images/<?php echo $row['artwork']; ?>" alt="" height="300" width="300"/>
								<h4><?php echo $row['nameofevent']; ?></h4>
								<div class="s-author">
									<p>Posted By <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a> &nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row['dates']; ?> &nbsp;&nbsp; <a href="#"></a></p>
								</div>
								<div class="w3-agile-news-text">
									<p>Type of Event:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"><?php echo $row['typeofevnt']; ?> </b><br>
									Organised by:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['NameofOrg']; ?></b><br>
									Organiser Email:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['NameofOEmail']; ?></b><br>
									Organiser Phone:  &nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['NameofOrgphone']; ?></b><br>
									Event Location:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['EventLoc']; ?></b><br>
									Event Venue:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['EvebtVenue']; ?></b><br>
									Event Address:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['EventAddr']; ?></b><br>
									Ticket Name:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['TicketName']; ?></b><br>
									Ticket Quantity:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> <?php echo $row['Qty']; ?></b><br>
									Ticket Price:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-danger"> 
									<?php if($row['Px'] == 0){
										echo '<h2 style="color:red">FREE </h2></b>';
									}else{
										echo $row['Px']; 
									}?></b>
									<span><?php echo $row['describEvnt']; ?>
									</p>
								</div>
							</div>
							<a href="bookevent.php?id=<?php echo $row['id']; ?>" class="book btn btn-success">Book Event</a>
						</div>
						
						<!-- //agile-comments -->
						<div class="news-related">
							
						</div>
					</div>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Upcoming Events</h3>
							</div>
							<div class="wthree-news-right-top">
								<div class="news-grids-bottom">
									<!-- date -->
									<div id="design" class="date">
										<?php
										include_once("db.php");
										$sql = "SELECT * FROM `event` WHERE `publish` = 1";
										$query = mysqli_query($conn,$sql);
										if($query){
											echo '<div id="cycler">  ';
											while($row = mysqli_fetch_array($query)){
												echo '
												
												<div class="date-text">
												<a href="viewwEvent.php?id='.$row['id'].'">'.$row['dates'].'<span class="blinking"><img src="images/new.png" alt="" /></span></a>
												<p>'.$row['describEvnt'].'</p>
											</div>
												';
											}
											echo '</div>';
										}
									?>
										 																					
										<script>
										function blinker() {
											$('.blinking').fadeOut(500);
											$('.blinking').fadeIn(500);
										}
										setInterval(blinker, 1000);
										</script>
										<script>
											function cycle($item, $cycler){
												setTimeout(cycle, 2000, $item.next(), $cycler);
												
												$item.slideUp(1000,function(){
													$item.appendTo($cycler).show();        
												});
												}
											cycle($('#cycler div:first'),  $('#cycler'));
										</script>
									</div>
									<!-- //date -->
								</div>
							</div>
						
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
								 
						   </div>
			</div>
	</div>
<!-- //faq-banner -->		
	
				
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
				<p>&copy; 2019 One Movies. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
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