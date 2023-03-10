<?php
session_start();
if(empty($_SESSION['bookuserid'])){
	header("location:login2.php");
}
				include_once("db.php");
				$sql = "SELECT * FROM `event` WHERE `id` = '".$_GET['id']."'";
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($query);
				$nameofevent = $row['nameofevent'];
				$typofEvnt = $row['typeofevnt'];
				$date = $row['dates'];
				$time = $row['time'];
				$venue = $row['EvebtVenue'];
				$price = $row['Px'];
				$userid = $row['uid'];
				$qtys = $row['Qty'];
				$ids = $row['id'];
				if(isset($_POST['send'])){
					$px = $_POST['edate'];
					$qty = $_POST['etyme'];
					$toto = $price * $qty;
					$qtyleft = $qtys - $qty;
					$ref = rand(7,300);
					$ref2 = "REF".$ref;
					$sql2 = "INSERT INTO `booking`(`Name`, `Phone`, `price`, `Qty`, `Total`, `nameofEvent`, `TypeofEvent`, `Edate`, `Etime`, `Evenue`, `Userid`, Refid, dates) 
					VALUES ('".$_POST['nameE']."','".$_POST['nmeE']."','$price','".$_POST['etyme']."','$toto','$nameofevent','$typofEvnt',
					'$date','$time','$venue','$userid','$ref2',CURRENT_DATE)";
					$query2 = mysqli_query($conn,$sql2);
					if($query2){					
						session_start();
						$_SESSION['GenrateId'] = mysqli_insert_id($conn);
						$sql2 = "UPDATE `event` SET `Qty` = '$qtyleft' WHERE`id` = '$ids'";
						$query3 = mysqli_query($conn,$sql2);
						if($query3){
							header("location:genreport.php");
						}else{
							echo '
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Booking Failed
								</strong></div>
							';
						}
						
					}else{
						echo '
								<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Booking Was Unsuccessful
								</strong></div>
							';
					}
				}
			?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Book Event</title>
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
		<div class="modal-dialog" role="document">
			
					
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
							<li class=""><a href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="profile.php" class="" >My Event</a>
							</li>
							<li class="dropdown">
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
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<h3><?php echo $row['nameofevent'];?></h3>
			<img src="images/<?php echo $row['artwork'];?>">
		</div>
			<div class="col-md-6 well">
				<br>
				<form method="POST" action="" enctype="multipart/form-data">
		
					<div class="form-group">
						<label class="label-control">ENTER FullNAME</label>
						<input type="text" class="form-control" name="nameE" id="nameE" placeholder="ENTER FullNAME"required/>
					</div>
		
					<div class="form-group">
						<div class="col-md-12">
							<div class="col-md-6">
								<label>Price</label>
								<input type="number" class="form-control" name="edate" value="<?php echo $price; ?>"id="edate" disabled>
							</div>
							<div class="col-md-6">
							<label>Ticket Quantity</label>
							<input type="number" class="form-control" value="0" name="etyme" id="etyme" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="label-control">Phone Number</label>
						<input type="number" class="form-control" name="nmeE" id="nmeE" placeholder="ENTER NUMBER"required/>
					</div>
					
					<div class="form-group">
						<input type="submit" name="send" value="Book Event" class="btn btn-success">
					</div>
		
				</form>
				
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