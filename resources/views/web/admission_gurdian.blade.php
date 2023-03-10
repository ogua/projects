@extends('web.layouts.web_layout')


@section('title', 'Oguses IT Solutions | Purchase OSN Code')

@section('addcss')
		<link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
@endsection

@section('content')
	<!-- banner -->
	<div class="banner-agile-2">
		@include('web.layouts.admsion_nav')
	</div>
	
	@include('web.layouts.breadcrumb')
	<!-- //banner -->

<!-- admission form -->
	<div class="form-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Admission
				<span class="font-weight-bold">form</span>
			</h3>
			<div class="register-form pt-md-4">
				<form action="{{ route('admission-app-gurd-save') }}" method="post" id="gurdianinfo">
					<legend>Guardian Information</legend>
					@csrf
						<div class="styled-input form-group">
							<input type="text" class="form-control" placeholder="Guardian Name" name="gurname" value="@if(isset($gurinfo->osncode_id)){{$gurinfo->gurdianname ? : '' }}@endif" id="gurname" required="">
						</div>
						<div class="styled-input form-group">
							<input type="text" class="form-control" value="@if(isset($gurinfo->osncode_id)){{$gurinfo->relationshp ? : '' }}@endif" placeholder="Relationship" name="gurrela" id="gurrela" required="">
						</div>
						<div class="styled-input form-group">
							<input type="text" class="form-control" value="@if(isset($gurinfo->osncode_id)){{$gurinfo->occupation ? : '' }}@endif" placeholder="Occupation" name="guroccu" id="guroccu" required="">
						</div>
						<div class="styled-input form-group">
							<input type="text" class="form-control" value="@if(isset($gurinfo->osncode_id)){{$gurinfo->mobile ? : '' }}@endif" placeholder="Mobile Number" name="gurmob" id="gurmob" required="">
						</div>
					<legend>Employment History</legend>	
						<div class="styled-input agile-styled-input-top form-group">
							<select class="category2" name="emplued" id="emplued" required>
										@if(isset($gurinfo->osncode_id))
											@if($gurinfo->employed)
												<option value="{{$gurinfo->employed}}">{{$gurinfo->employed}}</option>
											@endif
										@endif
								<option value="">Are You Employed</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						</div>
						<input type="submit" value="save and continue">
				</form>
			</div>
		</div>
	</div>
	<!-- admission form -->

	
@endsection