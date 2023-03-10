<!DOCTYPE html>
<html lang="zxx">

<head>
    <title></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Infinitude Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <?php
		include('includes/home_header2.php');
	?>
    <!-- about -->
    <section class="about py-5">
        <div class="container py-md-5">
            <div class="about-hny-info text-left px-md-5">
                <h3 class="tittle-w3ls mb-3"><span class="pink">What</span> we offer </h3>
                <p class="sub-tittle mt-3 mb-4 pr-md-5">
					OguSes IT Solutions provides quality and result oriented projects for our clients

We possess a combination of skills and experience that make us stand out from the rest. Hiring us will make you look smart and make life easier.

OguSes IT Solution can do the work and deliver exceptional results and will fit in beautifully and be a great addition to the team.
				</p>
                <!--<a class="btn more black" href="single.html" role="button">Read More</a>-->
            </div>
        </div>
    </section>
    <!-- //about -->
    <!-- /projects -->
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Stunning</span> Services</h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
				<?php
					include_once('db.php');
					$sql = "SELECT * FROM `services` ORDER BY id DESC LIMIT 9 ";
					$query = mysqli_query($conn,$sql);
					$result = mysqli_num_rows($query);
					if($result > 0){
						while($row = mysqli_fetch_array($query)){
							?>
							<div class="col-md-4 gal-img">
								<a href="#gal1"><img src="http://localhost/OguaSes%20IT%20Solutions/images/<?php echo $row['imagesurl']; ?>" alt="w3pvt" class="img-fluid"></a>
								<a href="serviceinfo.php?id=<?php echo $row['id']; ?>"><div class="gal-info">
									<h5>View Details<span class="decription"><?php echo $row['type']; ?></span></h5>
								</div></a>
							</div>
							<?php
						}
					}
				?>
            </div>
            
           
        </div>
    </section>
    <!-- //projects -->

    <!--/services-->
    <section class="services" id="services">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <div class="row my-4">
                    <div class="col-lg-5 services-innfo pr-5">
                        <h3 class="tittle-w3ls two mb-3 text-left"><span class="pink">What</span> We Provide</h3>
                        <p class="sub-tittle mt-2 mb-sm-3 text-left"></p>
                        <a href="#"><img src="images/ab2.jpg" alt="w3pvt" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-7 services-grid-inf">
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-paint-brush" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="serviceinfo.php?id=1">Website Development</a></h4>
                                        <p></p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-bullhorn" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="serviceinfo.php?id=2">SEO Marketing</a></h4>
                                        <p></p>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird ">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-shield" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="serviceinfo.php?id=4">Software Development</a></h4>
                                        <p></p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="serviceinfo.php?id=3">Mobile App Development</a></h4>
                                        <p></p>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//services-->

    <!--/mid-->
    <!--<section class="banner_bottom py-5" id="appointment">
        <div class="container py-md-5">
            <div class="row inner_sec_info">


                <div class="col-lg-5 banner_bottom_left">

                    <div class="login p-md-5 p-4 mx-auto bg-white mw-100">
                        <h4>
                            Make An Appointment</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>First name</label>

                                <input type="text" class="form-control" id="validationDefault01" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="" required="">
                            </div>

                            <div class="form-group mb-4">
                                <label class="mb-2">Password</label>
                                <input type="password" class="form-control" id="password1" placeholder="" required="">
                            </div>

                            <button type="submit" class="btn more black submit mb-4">Appointment</button>

                        </form>

                    </div>

                </div>
                <div class="col-lg-7 banner_bottom_grid help pl-lg-5">
                    <img src="images/ab2.jpg" alt=" " class="img-fluid mb-4">
                    <h4><a class="link-hny" href="contact.html">Stat Your Project Now?</a></h4>
                    <p class="mt-3">Lorem Ipsum is simply text the printing and typesetting standard industry.Quisque sagittis lacus eu lorem. </p>

                </div>
            </div>

        </div>
    </section>-->
    <!--//mid-->


    <!-- /news-letter -->
    <section class="news-letter-w3pvt py-5">
        <div class="container contact-form mx-auto text-left">
            <h3 class="title-w3ls two text-left mb-3">Newsletter </h3>
            <form method="post" action="#" class="w3ls-frm" id="newsletter">
                <div class="row subscribe-sec">
                    <p class="news-para col-lg-3">Let Start working together?</p>
                    <div class="col-lg-6 con-gd">
                        <input type="email" class="form-control" id="email" placeholder="Your Email here..." name="email" required style="color:black;">

                    </div>
                    <div class="col-lg-3 con-gd">
                        <button type="submit" class="btn submit">Subscribe</button>
                    </div>

                </div>

            </form>
			<hr>
			<div id="messagehere"></div>
        </div>
    </section>
    <!-- //news-letter -->

   <?php
		include('includes/web_footer.php');
   ?>
   <script src="js/bootstrap-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/jquery.min.js"></script>
<!-- Page Print -->
<script>
	$('document').ready(function(){
		//Form Reference Script Edit Services
		$(document).on("submit","#newsletter", function(e){
			e.preventDefault();
			//alert('working');
			//return;
			$.ajax({
				url: 'newsletterscript.php',
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
				data: new FormData(this),
				success: function(data){
				   if(data.match("success")){
						$("#messagehere").html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>EMAIL REGISTERED SUCCESSFULLY</div>');
						$("#newsletter")[0].reset();
					}else if(data.match("failed")){
						$("#messagehere").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Failed!</h4>TRY AGAIN LATER</div>');
					}else if(data.match("emailerror")){
						$("#messagehere").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Failed!</h4>EMAIL ALREADY EXIT</div>');
					}
				}
			});
		});
		
		$(document).on("click",".replybtn", function(e){
			e.preventDefault();
			var cid = $(this).attr("cid");
			//alert(cid);
			$("#comment_"+cid).toggle(2000);
			
			$(document).on("submit","#replycomment_"+cid, function(e){
			e.preventDefault();
			//alert('working');
			//return;
			$.ajax({
					url: 'replycomment.php',
					type: 'POST',
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
					   if(data.match("emailerror")){
							alert("EMAIL IS INVALID");						
						}else if(data.match("failed")){
							alert("SOMETHING WENT WRONG, TRY AGAIN LATER");
						}else{
							$("#replymessages_"+cid).prepend(data);
							$("#comment_"+cid).toggle(2000);
							$("#replycomment_"+cid)[0].reset();
						}
					}
				});
			});
		});
		
		
		
	});
</script>
</body>

</html>
