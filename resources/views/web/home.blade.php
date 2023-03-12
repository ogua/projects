@extends('web.layout')


@section('banner')
<!--/banner-->
	<div class="banner">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="carousel-caption">
						<h3>
							<span></span>
						</h3>
						{{-- <div class="read">
							<a href="{{ route('bio') }}" class="btn btn-primary read-m">Read More</a>
						</div> --}}
					</div>
				</div>
				<div class="carousel-item item2">
					<div class="carousel-caption">
						<h3>Stella Jomo
							<span style="font-size: 25px;">Nyama Abasa ft Selina Boateng</span>
						</h3>
						<div class="read">
							<a href="{{ route('bio') }}" class="btn btn-primary read-m">Read More</a>
						</div>
					</div>
				</div>
				<div class="carousel-item item3">
					<div class="carousel-caption">
						<h3>
							<span></span>
						</h3>
						<div class="read">
							{{-- <a href="{{ route('bio') }}" class="btn btn-primary read-m">Read More</a> --}}
						</div>
					</div>
				</div>
				<div class="carousel-item item4">
					<div class="carousel-caption">
						<h3>
							<span></span>
						</h3>
						<div class="read">
							{{-- <a href="{{ route('bio') }}" class="btn btn-primary read-m">Read More</a> --}}
						</div>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!--/model-->        
            
@endsection

@section('main_content')

<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<iframe width="100%" height="500" src="https://www.youtube.com/embed/NxkWlr-Oe0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
							<div class="blog-info-middle" style="display: none;">
								<ul>
									<li>
										<a href="#">
											<i class="far fa-calendar-alt"></i> FEB 15,2018</a>
									</li>
									<li class="mx-2">
										<a href="#">
											<i class="far fa-thumbs-up"></i> 201 Likes</a>
									</li>
									<li>
										<a href="#">
											<i class="far fa-comment"></i> 15 Comments</a>
									</li>
									
								</ul>
							</div>
						</div>

						<h3>
							<a href="single.html">Feature Video </a>
						</h3>

						<p>Award-winning gospel musician, Selina Boateng, has been featured on another banger after her numerous hit songs.
						
						This time, her exceptional talent was showcased on <b>‘Nyame abasa’</b> by a talented burgeoning gospel artiste, Stella Jomo.
					
						According to Selina, she was inspired by words in the song and had no regrets giving the nod to feature on it. </p>
						<a href="#" class="btn btn-primary read-m">Read More</a>
					</div>
					<!--//silder-->
					
					{{-- <div class="blog-mid-sec">
						<ul id="flexiselDemo2">
							<li>
								<div class="blog-item">
									<img src="{{ URL::to('web/images/5.jpg')}}" alt=" " class="img-fluid" />
									<button type="button" class="btn btn-primary play sec modalplay" cid="LHEOu9FBZco">
										<i class="fas fa-play"></i>
									</button>
									<div class="floods-text">
										<h3>Stella Jomo </h3>
									</div>
								</div>
							</li>
							<li>
								<div class="blog-item">
									<img src="{{ URL::to('web/images/6.jpg')}}" alt=" " class="img-fluid" />
									<button type="button" class="btn btn-primary play sec modalplay" cid="r5rIZLjiMSw">
										<i class="fas fa-play"></i>
									</button>
									<div class="floods-text">
										<h3>Stella Jomo </h3>
									</div>
								</div>
							</li>
							<li>
								<div class="blog-item">
									<img src="{{ URL::to('web/images/7.jpg')}}" alt=" " class="img-fluid" />
									<button type="button" class="btn btn-primary play sec modalplay" cid="kssdbfgx6qc">
										<i class="fas fa-play"></i>
									</button>
									<div class="floods-text">
										<h3>Stella Jomo </h3>
									</div>
								</div>
							</li>
							<li>
								<div class="blog-item">
									<img src="{{ URL::to('web/images/8.jpg')}}" alt=" " class="img-fluid" />
									<button type="button" class="btn btn-primary play sec modalplay" cid="wjGLsaJIj2k">
										<i class="fas fa-play"></i>
									</button>
									<div class="floods-text">
										<h3>Stella Jomo </h3>
									</div>
								</div>
							</li>
						</ul>
					</div> --}}

					<!--//silder-->
					<div class="blog-girds-sec">
						<div class="row">
							
							@foreach ($posts as $row)
								
								
								<div class="col-md-6 blog-grid-top">
								<div class="b-grid-top">
									<div class="blog_info_left_grid">
										<a href="{{ route('eventid',['id' => $row->slug]) }}">


										<img src="{{asset('storage')}}/{{$row->image}}" class="img-fluid" alt="">

										</a>
									</div>
									<h3>
										<a href="#">{{Str::limit($row->title,27,'...')}}</a>
									</h3>
									<p>{{$row->edesc}}</p>
								</div> 
								<ul class="blog-icons">
									<li>
										<a href="#">
											<i class="far fa-clock"></i> Posted {!! date('d-M-Y', strtotime($row->edate)) !!}</a>
									</li>
									{{-- <li class="mx-2">
										<a href="#">
											<i class="far fa-comment"></i> 21</a>
									</li>
									<li>
										<a href="#">
											<i class="fas fa-eye"></i> 2000</a>
									</li> --}}
									
								</ul>
							</div>

							
							@endforeach
							
						</div>
					</div>
				</div>
				<!--//left-->
				<!--right-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right">
					@include('web.aside',['posts' => $posts])
				</aside>
				<!--//right-->
			</div>
		</div>

		<div class="modal fade" id="exampleModal" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-21by9">
							<iframe width="100%" height="400" id="youtubeplayer" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>

				</div>
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
    $(document).on("click",".modalplay", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      var url = "https://www.youtube.com/embed/"+cid;
      $("#youtubeplayer").attr("src",url);
      $("#exampleModal").modal('show');     
    });
    //end


  });

</script>


@endsection