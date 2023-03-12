@extends('web.layout')


@section('banner')

@endsection

@section('main_content')

<section class="banner-bottom">
		<!--/blog-->
		<div class="container">
			<div class="row">
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<a href="#">
									<img src="{{asset('storage')}}/{{$post->image}}" class="img-fluid" alt="">
								</a>
							</div>
						</div>

						<h3>
							<a href="#">{{$post->title}}</a>
						</h3>
					 {!! $post->body !!}

					 <div class="sharethis-inline-share-buttons"></div>
					 
					</div>

					<div class="comment-top">
						<h4>Comments</h4>
						<div class="fb-comments" 
						data-href="http://127.0.0.1:8000/eventinfo/{{$uniquid}}" data-width="100%" data-numposts="10"></div>
					</div>
				</div>

				<!--//left-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right">
					<div class="right-blog-info text-left">

						<h4>Recent Post</h4>

						<div class="tech-btm">

							<?php
							  $x = 0;
							?>

						@foreach ($posts as $post)
							{{-- expr --}}

							@if ($x === 6)
								
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
											<i class="far fa-clock"></i> {{$post->edate}}</span>
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

				</aside>
				

			</div>
		</div>
	</section>

@endsection


@section('main_content_extral')

@endsection










@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    
  	//start
    $(document).on("","#", function(e){
      e.preventDefault();
      
     
    });
    //end


  });

</script>


@endsection