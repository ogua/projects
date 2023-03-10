<?php
 echo '
	                   <div class="col-sm-8 col-sm-offset-2" style="border-style:double;border-color:white;padding:10px;> 
						<form method="post" action="sendquey.php">																																																				
											<div class="col-sm-12">
											<div class="col-sm-6">
												<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Your Full Name" required>
											</div>
											<div class="col-sm-6">
												<select id="typeq"name="typeq"class="form-control">
														<option value="">Type Of Query</option>
														<option value="Urgent">Urgent</option>
														<option value="Report">Regular</option>													
											    </select>	
											</div>
											</div>
										
										
											<label></label>
												<textarea rows="4"name="reasons" id="reasons"class="form-control" style="resize:none;" placeholder="Describe Problem" required></textarea>
											<input type="submit" style="margin-left:30px;margin-top:20px;"id="send2" name="send2" class="btn btn-success pull-right" value="Send Report">
											<a href="#" id="tobill" style="margin-top:20px;" class="btn btn-success pull-right">Back To Billing</a>
										</form>
										</div>
					 
										
 ';
?>