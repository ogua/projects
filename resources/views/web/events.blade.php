@extends('web.layout')


@section('banner')

@endsection

@section('main_content')

<!--/main-->
	<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row inner-sec">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">

					<h3 style="border-bottom: 4px solid #272262;font-size: 1.2em; font-weight: 700;">
							<a href="#" style="color: #333333;">Events </a>
						</h3>
					<div class="row mb-4">
						
						@foreach ($posts as $post)
							
						
						<div class="col-md-6 card my-4">
							<a href="{{ route('eventid',['id' => $post->slug]) }}">
								<img src="{{asset('storage')}}/{{$post->image}}" class="card-img-top img-fluid" alt="">
							</a>
							<div class="card-body">
								
								<h5 class="card-title ">
									<a href="{{ route('eventid',['id' => $post->slug]) }}">
										{{Str::limit($post->title,20,'...')}} </a>
								</h5>
								<p class="card-text mb-3">{{$post->edesc}}</p>
							</div>
						</div>

						@endforeach

					</div>

					{{ $posts->links() }}

				</div>
				<!--//left-->
				<!--right-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-left">
					<div class="right-blog-info text-left">
						
						<div class="tech-btm">
							<h4>Top stories of the week</h4>

							<?php
							$spost = TCG\Voyager\Models\Post::latest()->take('6')->get();
						?>

						  @foreach ($spost as $row)


							<div class="blog-grids row mb-3">
								<div class="col-md-5 blog-grid-left">
									<a href="{{ route('eventid',['id' => $row->slug]) }}">

										<img src="{{asset('storage')}}/{{$row->image}}" class="img-fluid" alt="">

									</a>
								</div>
								<div class="col-md-7 blog-grid-right">

									<h5>
										<a href="{{ route('eventid',['id' => $row->slug]) }}">{{$row->title}}</a>
									</h5>
									<div class="sub-meta">
										<span>
											<i class="far fa-clock"></i> {!! date('d-M-Y', strtotime($row->edate)) !!}</span>
									</div>
								</div>

							</div>


						@endforeach
							
						</div>
						
				</div>
				</aside>
				<!--//right-->
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