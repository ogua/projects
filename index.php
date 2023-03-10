<!DOCTYPE HTML>
<html>

<head>
	<title>:: Artist Booking</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('#slider').nivoSlider();
		});
	</script>
</head>

<body>
	<div class="header">
		<div class="header_top">
			<div class="wrap">
				<div class="logo">
					<a href="index.php">
						<img src="images/logo2.png" alt="" />
					</a>
				</div>
				<div class="menu">
					<ul>
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<a href="artistsignUp.php">Artist SignUp</a>
						</li>
						<li>
							<a href="book.php">Book Artist</a>
						</li>
						<li>
							<a href="gallery.php">Gallery</a>
						</li>
						<li>
							<a href="contact.php">Contact Us</a>
						</li>
						<li>
							<a href="login.php">Login</a>
						</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!------ Slider ------------>
		<div class="wrap">
			<div class="slider">
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivoSlider">
						<img src="images/shatta.jpg" data-thumb="images/shatta.jpg" alt="" />
						<img src="images/Stonebwoy-3.jpg" data-thumb="images/Stonebwoy-3.jpg" alt="" />
						<img src="images/joyce.jpg" data-thumb="images/joyce.jpg" alt="" />
						<img src="images/kumi-guitar.jpg" data-thumb="images/kumi-guitar.jpg" alt="" />
						<img src="images/shatta.jpg" data-thumb="images/shatta.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
		<!------End Slider ------------>
	</div>
	<div class="main">
		<div class="wrap">
			<div class="section group">
				<div class="listview_1_of_3 images_1_of_3 event_grid">
					<a href="events.html">
						<div class="listimg listimg_1_of_2">
							<a href="ArtistInfo.php?id=12"><img src="images/yaapono.jpg" alt="" /></a>
						</div>
						<div class="text list_1_of_2">
							<div class="date">
								<figure>
									<span></span>Yaa Pono</figure>
							</div>
						</div>
					</a>
				</div>
				<div class="listview_1_of_3 images_1_of_3 event_grid">
					<a href="events.html">
						<div class="listimg listimg_1_of_2">
							<a href="ArtistInfo.php?id=5"><img src="images/becca - Copy.jpg" alt="" /></a>
						</div>
						<div class="text list_1_of_2">
							<div class="date">
								<figure>
									<span></span>Becca</figure>
							</div>
						</div>
					</a>
				</div>
				<div class="listview_1_of_3 images_1_of_3 event_grid">
					<a href="events.html">
						<div class="listimg listimg_1_of_2">
							<a href="ArtistInfo.php?id=6"><img src="images/Obibini - Copy.jpg" alt="" /></a>
						</div>
						<div class="text list_1_of_2">
							<div class="date">
								<figure>
									<span></span>Obibini</figure>
							</div>
						</div>
					</a>
				</div>
			</div>
			
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>

</html>