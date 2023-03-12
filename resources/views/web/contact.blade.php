@extends('web.layout')


@section('style')
 <link href="{{ URL::to('web/css/contact.css')}}" rel='stylesheet' type='text/css' />
@endsection


@section('banner')

<div class="banner-inner">
	</div>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active">Contact Stella Jomo</li>
	</ol>

@endsection

@section('main_content')

<section class="main-content-w3layouts-agileits">

		<h3 class="tittle">Want to get in touch?</h3>
		<div class="ad-inf-sec bg-light">
			<div class="container">
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Address</h6>
								<p> Teshie - Greater Accra, Ghana

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Email</h6>
								<p>
									<a href="mailto:abenajomo1@gmail.com"> abenajomo1@gmail.com</a>

								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Phone</h6>
								<p>+233 54 412 4656</p>
								<p>+233 24 428 7740</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="contact_grid_right">
				<form action="#" method="post">
					<div class="row contact_left_grid">
						<div class="col-md-6 con-left">
							<div class="form-group">
								<label for="validationCustom01 my-2">Name</label>
								<input class="form-control" type="text" name="Name" placeholder="" required="">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input class="form-control" type="email" name="Email" placeholder="" required="">
							</div>
							<div class="form-group">
								<label for="validationCustom03 my-2">Subject</label>
								<input class="form-control" type="text" name="Subject" placeholder="" required="">
							</div>
						</div>
						<div class="col-md-6 con-right">
							<div class="form-group">
								<label for="textarea">Message</label>
								<textarea id="textarea" placeholder=""></textarea>
							</div>
							<input class="form-control" type="submit" value="Submit">

						</div>
					</div>
				</form>
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