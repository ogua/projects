<!DOCTYPE html>
<html lang="zxx">

<head>
    <title></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <?php
		include('includes/home_header2.php');
	?>
    <!-- about -->

    <!-- Contact -->
    <section class="about-info py-5 px-lg-5">
        <div class="content-w3ls-inn px-lg-5">
            <div class="container py-md-5 py-3">
                <div class="px-lg-5">
                    <h3 class="tittle-w3ls mb-lg-5 mb-4"><span class="pink">Request</span> Service</h3>
                    <p class="mt-5 pr-lg-5">Please fill the form below to order a service.
					A member of our team will contact you as soon as possible.
					<br></p>


                    <div class="contact-hny-form mt-lg-5 mt-3">
                        <h3 class="title-hny mb-lg-5 mb-3">
                        </h3>
						<div id="messagehere"></div>
                        <form action="" method="post" id="postcontact">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="w3lName">Your Name</label>
                                        <input type="text" name="w3lName" id="w3lName" style="color:black;">
                                    </div>
                                    <div class="form-group">
                                        <label for="w3lSender">Your Mobile Number </label>
                                        <input type="text" name="w3lSender" id="w3lSender" style="color:black;">
                                    </div>
                                    <div class="form-group">
                                        <label for="w3lSubject">Subject</label>
										<select name="w3lSubject" class="form-control" style="color:black;">
											<option value=""></option>
											<option value="Request For Website">Request For Website</option>
											<option value="Request For Software">Request For Software</option>
											<option value="Request For Software">Request For Android Application</option>
											<option value="Student Project Work">Student Project Work</option>
											<option value="Student Project Topics">Student Project Topics</option>
											<option value="Wrong Transaction">Wrong Transaction</option>
											<option value="Others">Others</option>
										</select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="w3lSubject">Message</label>
                                        <textarea name="w3lMessage" id="w3lMessage" style="color:black;">
    </textarea>
                                    </div>
                                </div>
                                <div class="form-group mx-auto mt-3">
                                    <button type="submit" class="btn btn-default morebtn more black con-submit">Request NoW</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="map-w3pvt mt-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27404345275!2d-118.69191921441556!3d34.02016130939095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos+Angeles%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522474296007" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Contact -->

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
			<div id="messageheres"></div>
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
		$(document).on("submit","#postcontact", function(e){
			e.preventDefault();
			//alert('working');
			//return;
			$.ajax({
				url: 'postservice.php',
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
				data: new FormData(this),
				success: function(data){
				   if(data.match("success")){
						$("#messagehere").html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>DETAILS SENT SUCCESSFULLY</div>');
						$("#postcontact")[0].reset();
					}else if(data.match("failed")){
						$("#messagehere").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Failed!</h4>TRY AGAIN LATER</div>');
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
						$("#messageheres").html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>EMAIL REGISTERED SUCCESSFULLY</div>');
						$("#newsletter")[0].reset();
					}else if(data.match("failed")){
						$("#messageheres").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Failed!</h4>TRY AGAIN LATER</div>');
					}else if(data.match("emailerror")){
						$("#messageheres").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Failed!</h4>EMAIL ALREADY EXIT</div>');
					}
				}
			});
		});
		
	});
</script>
</body>

</html>
