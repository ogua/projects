<!DOCTYPE HTML>
<html>

<head>
	<title>:: About</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div class="header">
		<div class="header_top">
			<div class="wrap">
				<div class="logo">
					<a href="index.html">
						<img src="images/logo2.png" alt="" />
					</a>
				</div>
				<div class="menu">
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">
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
	</div>
	<div class="main">
		<div class="wrap">
			<div class="content_top">
				<div class="section group">
					<div class="col_1_of_3 span_1_of_3">
						<h2>
							<span>welcome</span>
						</h2>
						<h4>Objectives</h4>
						<p>•To provide the platform for upcoming artiste and already existing artiste.<br>
•	To educate the masses more into entertainment arts (music).<br>
•	Showcasing the hard work of an artiste from all corners to interact or network with each other in the industry at large.<br>
•	Recognition of artiste to the public at large.
</p>
						<p></p>
						<p></p>
					</div>
					<div class="col_1_of_3 span_1_of_3">
						<div class="menu_timmings">
							<ul>
								<?php
									include_once('db.php');
									$sql = "SELECT * FROM `events` ORDER BY id DESC LIMIT 4";
									$query = mysqli_query($conn,$sql);
									if($query){
										while($row = mysqli_fetch_array($query)){
											echo'
											<li>
												<div class="txt1">'.$row['Artistname'].'</div>
												<div class="txt2 color1">'.$row['dateofevent'].'</div>
											</li>
										';
										}
									}
								?>								
							</ul>
						</div>
					</div>
					<div class="col_1_of_3 span_1_of_3">
						<h2>
							<span>Latest Events</span>
						</h2>
						<?php
									include_once('db.php');
									$sql = "SELECT * FROM `events` ORDER BY id DESC LIMIT 3";
									$query = mysqli_query($conn,$sql);
									if($query){
										while($row = mysqli_fetch_array($query)){
											echo'
											<div class="event-grid">
												<div class="event_img">
													<img src="images/'.$row['images'].'" title="post1" alt="">
												</div>
												<div class="event_desc">
													<h4>
														<span>'.$row['Artistname'].'</span>
													</h4>
													<h4>'.$row['dateofevent'].'
													<p>'.$row['name'].'
														<a href="EventInfo.php?id='.$row['id'].'">[&rarr;]</a>
													</p>
												</div>
												<div class="clear"> </div>
											</div>
											
										';
										}
									}
								?>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>

</html>