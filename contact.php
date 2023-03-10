<!DOCTYPE HTML>
<html>

<head>
	<title>:: Conatct Page</title>
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
						<li class="active">
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
				<div class="contact">
					<div class="section group">
						<div class="col_1_of_3 contact_1_of_3">
							<div class="contact-form">
								<h3>Get In Touch</h3>
									<?php
										if(isset($_POST['send'])){
											include('db.php');
											$sql = "INSERT INTO `contact`(`name`, `email`, `message`, `dates`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['msg']."',CURRENT_DATE)";
											$query = mysqli_query($conn,$sql);
											if($query){
												echo'<script>alert("Successfully!");</script>';
											}else{
												echo'<script>alert("Failed!");</script>';
											}
										}
									?>
								<form method="post" action="">
									<div>
										<span>
											<input type="text" class="textbox" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required>
										</span>
									</div>
									<div>
										<span>
											<input type="text" class="textbox" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required>
										</span>
									</div>
									<div>
										<span>
											<textarea value="Message:" name="msg" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}" required>Message</textarea>
										</span>
									</div>
									<div>
										<span>
											<input type="submit" name="send" class="mybutton" value="Submit">
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="col_1_of_3 contact_1_of_3">
							<div class="company_address">
								<h3>Address</h3>
								<p>University of Professional Studies,</p>
								<p>P.O.Box ts 367,</p>
								<p>Ghana, Accra</p>
								<p>Phone:(+233) 272185090</p>
								<p>Email:
									<span>
										<a href="mailto:info@example.com">mail@example.com</a>
									</span>
								</p>
								<p>Follow on:
									<span>Facebook</span>,
									<span>Twitter</span>
								</p>
							</div>
						</div>
						<div class="col_1_of_3 contact_1_of_3">
							<div class="contact_info">
								<h3>Find Us Here</h3>
								<div class="map">
									<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe>
									<br>
									<small>
										<a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265"
										    style="color:#F39EFF;;text-align:left;font-size:0.85em">View Larger Map</a>
									</small>
								</div>
							</div>
						</div>
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