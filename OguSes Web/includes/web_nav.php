<!-- nav -->
                    <nav class="wthree-w3ls">
                        <div id="logo">
                            <h1> <a class="navbar-brand px-0 mx-0" href="index.php">OITS
                                </a>
                            </h1>
                        </div>

                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu mr-auto">
							<?php
								$url = $_SERVER['SCRIPT_NAME'];
								$burl = explode("/",$url);
								$result = $burl[3];
							?>
						
							<?php
								if($result == 'index.php'){
									?>
									 <li class="active"><a href="index.php">Home</a></li>
									<?php
								}else{
									?>
									 <li><a href="index.php">Home</a></li>
									<?php
								}
							?>
							
							<?php
								if($result == 'about.php'){
									?>
									  <li class="active"><a href="about.php">About</a></li>
									<?php
								}else{
									?>
									  <li><a href="about.php">About</a></li>
									<?php
								}
							?>
                           
                            <li>
                                <!-- First Tier Drop Down -->
                                <label for="drop-2" class="toggle toggle-2">Pages <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                                <a href="#">Pages  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul>
									<?php
										if($result == 'services.php'){
											?>
											   <li class="active"><a href="services.php" class="drop-text">Services</a></li>
											<?php
										}else{
											?>
											   <li><a href="services.php" class="drop-text">Services</a></li>
											<?php
										}
									?>
									
									
                                   
									<?php
										if($result == 'request.php'){
											?>
											  <li class="active"><a href="request.php" class="drop-text">Request Service</a></li>
											<?php
										}else{
											?>
											   <li><a href="request.php" class="drop-text">Request Service</a></li>
											<?php
										}
									?>
                                    
                                </ul>
                            </li>
                            <li><a href="index.php">Projects</a></li>
							<?php
								if($result == 'contact.php'){
									?>
									  <li class="active"><a href="contact.php">Contact</a></li>
									<?php
								}else{
									?>
									  <li><a href="contact.php">Contact</a></li>
									<?php
								}
							?>
                            

                            <li class="social-icons ml-lg-3"><a href="#" class="p-0 social-icon"><span class="fa fa-facebook-official" aria-hidden="true"></span>
                                    <div class="tooltip">Facebook</div>
                                </a> </li>
                            <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-twitter" aria-hidden="true"></span>
                                    <div class="tooltip">Twitter</div>
                                </a> </li>
                            <li class="social-icons"><a href="#" class="p-0 social-icon"><span class="fa fa-instagram" aria-hidden="true"></span>
                                    <div class="tooltip">Instagram</div>
                                </a> </li>
                        </ul>
                    </nav>
                    <!-- //nav -->