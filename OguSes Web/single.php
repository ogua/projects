<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Project Preview</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
     <?php
		include('includes/home_header2.php');
	?>

    <!-- Contact -->
		<?php
			include_once('db.php');
			$id = $_GET['id'];
			if(!empty($id) && is_numeric($id)){
				$sql = "SELECT * FROM `projects` WHERE `id` = '$id'";
				$query = mysqli_query($conn,$sql);
				if($query){
					$row = mysqli_fetch_array($query);
				}
			}
			
		?>
    <section class="about-info p-lg-5 p-3">
        <div class="content-w3ls-inn px-lg-5">
            <div class="container py-md-5 py-3">
                <div class="content-sing-w3pvt px-lg-5">
                    <img class="img-fluid mb-2" src="http://localhost/OguaSes%20IT%20Solutions/images/<?php echo $row['imagesurl'];?>" alt="">
                    <h4 class="title-hny my-2"></h4>
                    <p><?php echo $row['description'];?></p>
                    <p class="mt-2"></p>


                    <div class="row about-w3pvt-top mt-2">

                        <div class="col-lg-6 about-info">
                            <h4 class="title-hny mb-3">Functions Of This Project</h4>
                            <p><?php echo $row['profunctions'];?></p>


                        </div>
                        <div class="col-lg-6 about-img">
						<h4 class="title-hny mb-3">Related Projects Developed.</h4>
                            <div class="row">
								<?php
									$rsql = "SELECT imagesurl,id FROM `projects` WHERE id !='$id' ORDER BY `id` DESC LIMIT 2";
									$rquery = mysqli_query($conn,$rsql);
									$result = mysqli_num_rows($rquery);
									if($result > 0){
										while($rows = mysqli_fetch_array($rquery)){
											?>
											<div class="col">
												<a href="single.php?id=<?php echo $rows['id'];?>"><img src="http://localhost/OguaSes%20IT%20Solutions/images/<?php echo $rows['imagesurl'];?>" class="img-fluid" alt="user-image"></a>
											</div>
											<?php
										}
									}
								?>
                            </div>
                        </div>


                    </div>
                    <div class="social-icons-footer">
                        <ul class="list-unstyled w3pvt-icons mb-5">
                            <li class="lead">
                                Catch On Social :
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-facebook-f"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-dribbble"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-google-plus"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-pinterest-p"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-vk"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="comments my-5 px-lg-5">
                    <h4 class="title-hny mb-5">Recent Comments</h4>
                    <div class="comments-grids mt-4">
						<div id="commentere">
						<?php
							include_once('db.php');
							$id =  $_GET['id'];
							if(!empty($id) && is_numeric($id)){
								$sql = "SELECT * FROM `Comments` WHERE `proid` = '$id' ";
							    $query = mysqli_query($conn,$sql);
								$result = mysqli_num_rows($query);
								if($result > 0){
									while($rows = mysqli_fetch_array($query)){
										?>
											<div class="media mt-4">
												<img class="mr-3" src="http://localhost/OguaSes%20IT%20Solutions/images/co.png" alt="image">
												<div class="media-body comments-grid-right">
													<h4><?php echo $rows['lastname']; ?></h4>
													<ul class="my-2">
														<li class="font-weight-bold"><?php echo $rows['datetime']; ?>
															<i>|</i>
														</li>
														<li>
															<a href="#" class="replybtn font-weight-bold" cid="<?php echo $rows['id']; ?>">Reply</a>
														</li>
													</ul>
													<p><?php echo $rows['message']; ?></p>
													<div id="comment_<?php echo $rows['id']; ?>" style="display:none;">
														<form action="#" class="contact-hny-form" method="post" id="replycomment_<?php echo $rows['id']; ?>">
														<input class="form-control" type="hidden" name="prid" value="<?php echo $rows['id'];?>" placeholder="" required="" style="color:black;"> 
															<div class="row">
																<div class="col-lg-6">
																	<div class="form-group">
																		<label>First Name</label>
																		<input class="form-control" type="text" name="fName" placeholder="" required="" style="color:black;">
																	</div>
																	<div class="form-group">
																		<label>Last Name</label>
																		<input class="form-control" type="text" name="lName" placeholder="" required="" style="color:black;">
																	</div>
																	<div class="form-group">
																		<label>Email</label>
																		<input class="form-control" type="email" name="Email" placeholder="" required="" style="color:black;">
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<label>Write Message</label>
																		<textarea class="form-control" name="Message" placeholder="" required="" style="color:black;"></textarea>
																	</div>
																</div>
																<div class="form-group mx-auto mt-3">
																	<button type="submit" class="btn more">Post Reply</button>
																</div>
															</div>

														</form>
														
														
													</div>	
												</div>
											</div>
										<?php
											$comid = $rows['id'];
										$rsql = "SELECT * FROM `reply` WHERE `comtid` =  '$comid'";
										$rquery = mysqli_query($conn,$rsql);
										$rresult = mysqli_num_rows($rquery);
										if($rresult > 0){
											while($rowss = mysqli_fetch_array($rquery)){
												?>
												<div id="replymessages_<?php echo $rows['id']; ?>">
													<div class="media mt-sm-5 mt-3 ml-5">
														<a class="pr-3" href="#">
															<img class="mr-3" src="http://localhost/OguaSes%20IT%20Solutions/images/co.png" alt="image">
														</a>
														<div class="media-body comments-grid-right">
															<h4><?php echo $rowss['lastname']; ?></h4>
															<ul class="my-2">
																<li class="font-weight-bold"><?php echo $rowss['datetime']; ?>
																	<i>|</i>
																</li>
			
															</ul>
															<p><?php echo $rowss['message']; ?></p>
														</div>
													</div>
												</div>
												<?php
											}
										}
									}
								}
							}
							
						?>								
						</div>
                    </div>
                </div>
                <div class="contact-right-hny-info login px-lg-5">

                    <h4 class="title-hny mb-5">Leave a Comment</h4>
                    <form action="#" class="contact-hny-form" method="post" id="postcomment">
					<input class="form-control" type="hidden" name="prid" value="<?php echo $row['id'];?>" placeholder="" required="" style="color:black;"> 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="fName" placeholder="" required="" style="color:black;">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="lName" placeholder="" required="" style="color:black;">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="Email" placeholder="" required="" style="color:black;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Write Message</label>
                                    <textarea class="form-control" name="Message" placeholder="" required="" style="color:black;"></textarea>
                                </div>
                            </div>
                            <div class="form-group mx-auto mt-3">
                                <button type="submit" class="btn more">Post Comment</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </section>
    <!-- //single -->

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
		$(document).on("submit","#postcomment", function(e){
			e.preventDefault();
			//alert('working');
			//return;
			$.ajax({
				url: 'postcomment.php',
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
						$("#commentere").append(data);
						$("#postcomment")[0].reset();
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
