<!DOCTYPE html>
<html lang="zxx">

<head>
	{!! SEOMeta::generate() !!}

	{!! OpenGraph::generate() !!}

	{!! Twitter::generate() !!}

	{!! JsonLd::generate() !!}

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>


	<?php

		setting('site.logo');
	?>

	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6131699138d3130012bc0d5a&product=inline-share-buttons" async="async"></script>
	
	<link href="{{ URL::to('web/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{ URL::to('web/css/jquery.desoslide.css')}}">
	<link href="{{ URL::to('web/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{URL::to('web/css/fontawesome-all.css')}}" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">

	@yield('style')

</head>

<body>
	<!------  facebook sdk ---->
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="Ogu0amir"></script>
	<!------  /facebook sdk ---->

	<!-- Messenger Chat Plugin Code -->

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104344301621037");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<!-- /Your Chat Plugin code -->

	<!--Header-->
	<header>
		<div class="bar_sub_w3layouts_custom container-fluid">
			<div class="row">
				<div class="col-md-4 logo text-left">
					
				</div>
				<div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0">
					<img src="{{ URL::to('web/images/stellalogo.png')}}" alt="Stella Jomo Logo" width="100" height="100">
				</div>
				<div class="col-md-4 log-icons text-right">
					
				</div>
			</div>
		</div>

		<div class="top-bar_sub_w3layouts container-fluid">
			<div class="row">
				<div class="col-md-4 logo text-left">
					
				</div>
				<div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0">
					
				</div>
				<div class="col-md-4 log-icons text-right">
					<ul class="social_list1 mt-3">

						<li>
							<a href="https://web.facebook.com/Stella-Jomo-Ministries-103479961152661" target="_blank" class="facebook1 mx-2" >
								<i class="fab fa-facebook-f"></i>

							</a>
						</li>
						<li>
							<a href="https://twitter.com/stella_jomo" target="_blank" class="twitter2">
								<i class="fab fa-twitter"></i>

							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/stellajomo_ministries/" target="_blank" class="dribble3 mx-2">
								<i class="fab fa-instagram"></i>
							</a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UClzuXW66-gA9f88fNmlm08w" target="_blank" class="pin">
								<i class="fab fa-youtube"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>

		</div>

			<div class="header_top" id="home">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler navbar-toggler-right mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				   </button>


					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item 
							           @if(Route::current()->getName()
							           == 'webhome' )
										active                  
									   @endif
										">
								<a class="nav-link" href="{{ route('webhome') }}">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item
							           @if(Route::current()->getName()
							           == 'bio' )
										active                  
									   @endif">
								<a class="nav-link" href="{{ route('bio') }}">Bio</a>
							</li>
							<li class="nav-item 
							          @if(Route::current()->getName()
							           == 'events' )
										active                  
									   @endif">
								<a class="nav-link" href="{{ route('events') }}">Events</a>
							</li>
							<li class="nav-item dropdown 
							           @if(Route::current()->getName()== 'audio' )
										active 

										@elseif(Route::current()->getName()== 'gallary')
										active
										                 
									   @endif">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Media
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#"></a>
								<a class="dropdown-item" target="_blank" href="https://www.youtube.com/channel/UClzuXW66-gA9f88fNmlm08w">Video</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item @if(Route::current()->getName()
							           == 'audio' )
										active                  
									   @endif" href="{{ route('audio') }}">Audio</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item @if(Route::current()->getName()
							           == 'gallary' )
										active                  
									   @endif" href="{{ route('gallary') }}">Photos</a>

							</div>
						</li>
						<li class="nav-item @if(Route::current()->getName()
							           == 'shop' )
										active                  
									   @endif">
								<a class="nav-link" href="{{ route('shop') }}">Shop</a>
							</li>

						<li class="nav-item @if(Route::current()->getName()
							           == 'feeds' )
										active                  
									   @endif">
								<a class="nav-link" href="{{ route('feeds') }}">News</a>
							</li>

							<li class="nav-item 
									@if(Route::current()->getName()
							           == 'contactus' )
										active                  
									   @endif">
								<a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
							</li>

						</ul>
						
					</div>
				</nav>

			</div>
	</header>
	<!--//header-->

	@yield('banner')
	<!--//banner-->

	<!--/main-->
	@yield('main_content')
	
	<!--//main-->
	
	<!---->
	
	@yield('main_content_extral')


	<!--footer-->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 footer-grid-agileits-w3ls text-left">
					<h3>Stella Jomo Bio</h3>

					{{-- <?php
							$bio = App\Models\Aboutstella::first();
					?> --}}
					<p class="text-white">
					{{-- {{Str::limit($bio->about,50,'...')}} --}}
					</p>
					<div class="read">
						<a href="{{ route('bio') }}" class="btn btn-primary read-m">Read More</a>
					</div>
				</div>
				<div class="col-lg-4 footer-grid-agileits-w3ls text-left">

					<div class="tech-btm">
						<h3>Latest Posts</h3>
						<?php
							$fpost = TCG\Voyager\Models\Post::latest()->take('2')->get();
						?>
						@foreach ($fpost as $row)
							
							<div class="blog-grids row mb-3">
							<div class="col-md-5 blog-grid-left">
								<a href="{{ route('eventid',['id' => $row->slug]) }}">
									<img src="{{asset('storage')}}/{{$row->image}}" class="img-fluid" alt="">
								</a>
							</div>
							<div class="col-md-7 blog-grid-right">

								<h5>
									<a href="{{ route('eventid',['id' => $row->slug]) }}" class="text-white" >{{$row->title}}</a>
								</h5>
								<div class="sub-meta">
									<span>
										<i class="far fa-clock"></i>{{$row->edate}}</span>
								</div>
							</div>
							
						</div>

						@endforeach
						
						
						
					</div>
				</div>
				<!-- subscribe -->
				<div class="col-lg-4 subscribe-main footer-grid-agileits-w3ls text-left">
					<h2>Signup to our newsletter</h2>
					<div class="subscribe-main text-left">
							<div class="subscribe-form">
									<form action="#" method="post" class="subscribe_form">
										<input class="form-control" type="email" placeholder="Enter your email..." required="">
										<button type="submit" class="btn btn-primary submit">Submit</button>
									</form>
									<div class="clearfix"> </div>
						   </div>
						<p class="text-white">We respect your privacy.No spam ever!</p>
					</div>
					<!-- //subscribe -->
				</div>
			</div>
			<!-- footer -->
			<div class="footer-cpy text-center">
				<div class="footer-social">
					<div class="copyrighttop">
						<ul>
							<li class="mx-3">
								<a class="facebook" href="https://web.facebook.com/Stella-Jomo-Ministries-103479961152661">
									<i class="fab fa-facebook-f"></i>
									<span>Facebook</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="https://twitter.com/stella_jomo">
									<i class="fab fa-twitter"></i>
									<span>Twitter</span>
								</a>
							</li>
							<li class="mx-3">
								<a class="facebook" href="https://www.instagram.com/stellajomo_ministries/">
									<i class="fab fa-instagram"></i>
									<span>Instagram</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="https://www.youtube.com/channel/UClzuXW66-gA9f88fNmlm08w">
									<i class="fab fa-youtube"></i>
									<span>Youtube</span>
								</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="w3layouts-agile-copyrightbottom">
					<p>© <?php echo date('Y'); ?> Stella Jomo Ministries. All Rights Reserved | Design by
						<a href="#">OguSesITSolutions</a>
					</p>

				</div>
			</div>

			<!-- //footer -->
		</div>
	</footer>
	<!---->
	<!-- js -->
	<script src="{{ URL::to('web/js/jquery-2.2.3.min.js')}}"></script>
	<!-- //js -->
	<!-- desoslide-JavaScript -->
	<script src="{{ URL::to('web/js/jquery.desoslide.js')}}"></script>
	<script>
		$('#demo1_thumbs').desoSlide({
			main: {
				container: '#demo1_main_image',
				cssClass: 'img-responsive'
			},
			effect: 'sideFade',
			caption: true
		});
	</script>

	<!-- requried-jsfiles-for owl -->
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo2").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script src="{{ URL::to('web/js/jquery.flexisel.js')}}"></script>
	<!-- //password-script -->
	<!--/ start-smoth-scrolling -->
	<script src="{{ URL::to('web/js/move-top.js')}}"></script>
	<script src="{{ URL::to('web/js/easing.js')}}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!--// end-smoth-scrolling -->

	<script>
		$(document).ready(function () {
			
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- //Custom-JavaScript-File-Links -->
	<script src="{{ URL::to('web/js/bootstrap.js')}}"></script>

	@yield('scriptTag')

	@yield('script')

</body>

</html>