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
    <!-- home -->
    <div id="home">
        <!--/top-nav -->
        <div class="top_w3pvt_main container">
            <!--/header -->
            <header class="nav_w3pvt text-center ">
                <?php
						include('web_nav.php');
				 ?>
            </header>
            <!--//header -->
        </div>
        <!-- //top-nav -->
        <!-- banner slider -->
        <div id="homepage-slider" class="st-slider">
            <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
            <div class="images">
                <div class="images-inner">
                    <div class="image-slide">
                        <div class="banner-w3pvt-1">
                            <div class="overlay-w3ls">

                            </div>

                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-2">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-3">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="labels">
                <div class="fake-radio">
                    <label for="slide1" class="radio-btn"></label>
                    <label for="slide2" class="radio-btn"></label>
                    <label for="slide3" class="radio-btn"></label>
                </div>
            </div>
            <!-- banner-hny-info -->
            <div class="banner-hny-info">
                <h3>OguSes 
                    IT Solutions</h3>
                <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                    <a href=" about.php" class="btn more mr-2">About Us</a>
                    <a href="contact.php" class="btn">Contact Us</a>
                </div>
                <div class="d-flex hny-stats-inf">
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">0</h5>
                            <p class="para-w3pvt">Designs</p>
                        </div>
                    </div>
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">0</h5>
                            <p class="para-w3pvt"> Projects</p>
                        </div>
                    </div>
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">0</h5>
                            <p class="para-w3pvt">Clients</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- //banner-hny-info -->
        </div>
        <!-- //banner slider -->
    </div>
    <!-- //banner -->

    <!-- //home -->