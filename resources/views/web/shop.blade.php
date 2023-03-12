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
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<h3 style="border-bottom: 4px solid #272262">
							<a href="#">SHOP ALBUM RELEASES </a>
						</h3>
						

						<div class="row">

							<div class="col-md-4">
								<div class="panel panel-heading">
									<div class="panel-heading" style="background-color: #272262;color: #fff;">Nyame Abasa Audio</div>
									<div class="panel-body">
										<div class="text-center content-grid-effect slow-zoom vertical">
											<div class="img-box">
												<a href="https://paystack.com/pay/-3cfektpbq" target="_bank"><img class="thumbnail" src="{{ URL::to('web/images/banner2.jpg')}}" height="200" width="150"/></a>
											</div>
										</div>
									</div>
									<div class="panel-footer">
										<a href="https://paystack.com/pay/p2ov8nltn7" target="_blank" >
										GH&cent;50.00 <i class="text-back pull-right fa fa-shopping-cart"></i></a>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="panel panel-heading">
									<div class="panel-heading" style="background-color: #272262;color: #fff;">Nyame Abasa Video</div>
									<div class="panel-body">
										<div class="text-center content-grid-effect slow-zoom vertical">
											<div class="img-box">
												<a href="https://paystack.com/pay/p2ov8nltn7" target="_blank" ><img class="thumbnail" src="{{ URL::to('web/images/banner2.jpg')}}" height="200" width="150"/></a>
											</div>
										</div>
									</div>
									<div class="panel-footer">
										<a href="https://paystack.com/pay/p2ov8nltn7" target="_blank" >
										GH&cent;50.00 <i class="text-back pull-right fa fa-shopping-cart"></i></a>
									</div>
								</div>
							</div>

							<div class="row">
								<iframe id='AmazonMusicEmbedB092G3D4SQ' src='https://music.amazon.de/embed/B092G3D4SQ/?id=D6Tdo35sjy&marketplaceId=A1PA6795UKMFR9&musicTerritory=DE' width='100%' height='550px' style='border:1px solid rgba(0, 0, 0, 0.12);max-width:'></iframe>
							</div>



						</div>	

											
						
					 </div>

					
					
				</div>


				<div class="col-lg-4 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<h3 style="border-bottom: 4px solid #272262">
							<a href="#"> Support </a>
						</h3>
						<p>Donate To Stella Jomo Ministry</p>
						<a href="https://paystack.com/pay/ah-dn8pipx" target="_blank" class="btn btn-success"><i class="fa fa-credit-card"></i> Donate</a>
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