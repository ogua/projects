navigation -->
		<div class="navigation-w3ls">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center">
						<li class="nav-item active">
							<a class="nav-link text-white" href="{{ route('home') }}">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Programmes
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="language.html">Language</a>
								<a class="dropdown-item" href="communication.html">Communication</a>
								<a class="dropdown-item" href="business.html">Business</a>
								<a class="dropdown-item" href="software.html">Software</a>
								<a class="dropdown-item" href="social_media.html">Social Media</a>
								<a class="dropdown-item" href="photography.html">Photography</a>
								<a class="dropdown-item" href="course_details.html">Course Details</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="form.html">Apply Now</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{route('lecturer-login')}}">Lecturer Login</a>
								<a class="dropdown-item" href="{{route('student-login')}}">Student Login</a>
								<a class="dropdown-item" href="{{route('login')}}">Admin Login</a>
								<a class="dropdown-item" href="{{ route('online-admission-login') }}">Online Admission</a>
								<a class="dropdown-item" href="{{ route('onscode') }}">Purchase OSN Code</a>
							</div>
						</li>

						<!-- <li class="nav-item">
							<a class="nav-link text-white" href="blog.html">Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="gallery.html">Gallery</a>
						</li> -->

						<li class="nav-item">
							<a class="nav-link text-white" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- //navigation