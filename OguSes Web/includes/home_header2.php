<script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

</head>

<body>
    <!--/home -->
    <div id="home" class="inner-w3pvt-page">
        <div class="overlay-innerpage">
            <!--/top-nav -->
            <div class="top_w3pvt_main container">
                <!--/header -->
                <header class="nav_w3pvt text-center">
                    <?php
						include('web_nav.php');
					?>
                </header>
                <!--//header -->
							<?php
								$url = $_SERVER['SCRIPT_NAME'];
								$burl = explode("/",$url);
								$result = $burl[3];
							?>
						
							
                <!--/breadcrumb-->
                <div class="inner-w3pvt-page-info">
                    <ol class="breadcrumb d-flex">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
						<?php
							if($result == 'about.php'){
							?>
							  <li class="breadcrumb-item active">About</li>
							<?php
						  }
					   ?>
                       
					   <?php
							if($result == 'services.php'){
							?>
							  <li class="breadcrumb-item active">Services</li>
							<?php
						  }
					   ?>
					   
					   <?php
							if($result == 'team.php'){
							?>
							  <li class="breadcrumb-item active">Team</li>
							<?php
						  }
					   ?>
					   
					    <?php
							if($result == 'contact.php'){
							?>
							  <li class="breadcrumb-item active">Contact Us</li>
							<?php
						  }
					   ?>
					   <?php
							if($result == 'single.php'){
							?>
							  <li class="breadcrumb-item active">Project Information</li>
							<?php
						  }
					   ?>
					   <?php
							if($result == 'request.php'){
							?>
							  <li class="breadcrumb-item active">Request Services</li>
							<?php
						  }
					   ?>
                    </ol>

                </div>
                <!--//breadcrumb-->
            </div>
            <!-- //top-nav -->
        </div>
    </div>
    <!-- //home -->