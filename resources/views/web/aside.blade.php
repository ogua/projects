						<div class="right-blog-info text-left">
						<div class="tech-btm">
							<img src="{{ URL::to('web/images/banner1.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="fb-like" data-href="https://web.facebook.com/stellajomomini" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>

						{{-- <div class="tech-btm widget_social">
							<h4>Stay Connect</h4>
							<ul>

								<li>
									<a class="twitter" href="#">
										<i class="fab fa-twitter"></i>
										<span class="count">317K</span> Twitter Followers</a>
								</li>
								<li>
									<a class="facebook" href="#">
										<i class="fab fa-facebook-f"></i>
										<span class="count">218k</span> Twitter Followers</a>
								</li>
								<li>
									<a class="dribble" href="#">
										<i class="fab fa-instagram"></i>

										<span class="count">215k</span> Instagram Followers</a>
								</li>
								<li>
									<a class="pin" href="#">
										<i class="fab fa-youtube"></i>
										<span class="count">190k</span> Youtube Followers</a>
								</li>

							</ul>
						</div> --}}
						<div class="tech-btm">
							<h4>Recent Posts</h4>

							<?php
							  $x = 0;
							?>
							@foreach ($posts as $post)

								@if ($x === 6)
								
								<?php
									break;
								?>
								
								@else

								<div class="blog-grids row mb-3">
								<div class="col-md-5 blog-grid-left">
									<a href="{{ route('eventid',['id' => $post->slug]) }}">

										<img src="{{asset('storage')}}/{{$post->image}}" class="img-fluid" alt="">
									</a>
								</div>
								<div class="col-md-7 blog-grid-right">

									<h5>
										<a href="{{ route('eventid',['id' => $post->slug]) }}">{{$post->title}}</a>
									</h5>
									<div class="sub-meta">
										<span>
											<i class="far fa-clock"></i> {!! date('d-M-Y', strtotime($post->edate)) !!} </span>
									</div>
								</div>
								
							</div>

							@endif

							<?php
								$x++;
							?>


							@endforeach
							
							
						</div>
					</div>