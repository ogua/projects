@extends('web.layout')


@section('banner')
	
@endsection

@section('main_content')

<section class="main-content-w3layouts-agileits" style="background: url('./web/images/stellajomo.png');background-size: cover;">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-tops">
						<h3 class="text-black" style="border-bottom: 4px solid #272262">
							ABOUT STELLA JOMO MINISTRY
						</h3>
						<div class="text-black">
							{!! $about->about !!}
						</div>

					</div>
					
				</div>
				<!--//left-->
				<!--right-->
				
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