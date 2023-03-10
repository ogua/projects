<?php
	include_once('db.php');
	function insertdata($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$prdid = insertdata($_POST['prid']);
	$fname = insertdata($_POST['fName']);
	$lname = insertdata($_POST['lName']);
	$email = insertdata($_POST['Email']);
	$msg = insertdata($_POST['Message']);
	
	if(!empty($email)){
		if(!FILTER_VAR($email,FILTER_VALIDATE_EMAIL)){
			echo'emailerror';
			exit;
		}
	}
	
	
	$sql = "INSERT INTO `Comments`(`proid`, `firstname`, `lastname`, `email`, `message`) VALUES 
	('$prdid','$fname','$lname','$email','$msg')";
	$query = mysqli_query($conn,$sql);
	if($query){
		?>
			<img class="mr-3" src="http://localhost/OguaSes%20IT%20Solutions/images/co.png" alt="image">
			<div class="media-body comments-grid-right">
                 <h4><?php echo $lname; ?></h4>
                    <ul class="my-2">
                     <li class="font-weight-bold">JUST NOW
                     <i>|</i>
                      </li>
                    <li>
                    <a href="#" class="replybtn font-weight-bold" cid="<?php echo $prdid; ?>">Reply</a>
                      </li>
                   </ul>
                <p><?php echo $msg; ?></p>
				<div id="comment_<?php echo $prdid; ?>" style="display:none;">
					<form action="#" class="contact-hny-form" method="post" id="replycomment">
					<input class="form-control" type="text" name="prid" value="<?php echo $prdid;?>" placeholder="" required="" style="color:black;"> 
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
			
		<?php
	}else{
		echo'failed';
	}
	
?>