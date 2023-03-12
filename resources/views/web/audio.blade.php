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
				<div class="col-lg-12 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<h3 style="border-bottom: 4px solid #272262">
							<a href="#">Audios </a>
						</h3>

						<div class="row">
							<div class="col-md-4">
								<iframe src="https://www.boomplay.com/embed/58746063/MUSIC?colType=2&colID=24191037" width="100%" height="420" frameborder="0"></iframe>
							</div>

							<!---- add next content here -->
							<div class="col-md-4">
								<iframe title="deezer-widget" src="https://widget.deezer.com/widget/dark/album/222604232" width="100%" height="420" frameborder="0" allowtransparency="true" allow="encrypted-media; clipboard-write"></iframe>
							</div>

							<div class="col-md-4">
								<iframe id='AmazonMusicEmbedB092G3D4SQ' src='https://music.amazon.de/embed/B092G3D4SQ/?id=D6Tdo35sjy&marketplaceId=A1PA6795UKMFR9&musicTerritory=DE' width='100%' height='420px' style='border:1px solid rgba(0, 0, 0, 0.12);max-width:'></iframe>
							</div>




						</div>
						
						
						
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