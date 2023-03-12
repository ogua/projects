@extends('web.layout')


@section('banner')

@endsection

@section('main_content')

<!--//banner-->
	<section class="banner-bottom">
		<!--/blog-->
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-6 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<h3 style="border-bottom: 4px solid #272262">
							<a href="#">Facebook Feeds </a>
						</h3>
						<div class="fb-page" data-href="https://www.facebook.com/stellajomomini/" data-tabs="timeline" data-width="500" data-height="1000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/stellajomomini/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/stellajomomini/">stellajomo_ministries</a></blockquote></div>
					 </div>

					
					
				</div>


				<div class="col-lg-6 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<h3 style="border-bottom: 4px solid #272262">
							<a href="#">Twitter Feeds </a>
						</h3>


						<a class="twitter-timeline" href="https://twitter.com/StellaJomo?ref_src=twsrc%5Etfw">Tweets by StellaJomo</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						
						
					 </div>

					
					
				</div>

				<!--//left-->
				
				<!--//right-->
			</div>
		</div>
	</section>
	<!--//main-->



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