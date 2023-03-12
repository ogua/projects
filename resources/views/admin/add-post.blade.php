@extends('admin.layout')


@section('title')
	Add Posts
@endsection


@section('subtitle')

@endsection

@section('content')


<div class="row">
	<!-- left column -->
	<div class="col-md-4">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-body">
				<!-- form start -->
				<form method="post" role="form" action="{{ route('save_post') }}" enctype="multipart/form-data">
					<div class="box-body">
						@csrf
						<div class="form-group  @error('picart') has-error @enderror">
							<label class="control-label" for="picart">Event Pic Art (900*500 | 350*250)</label>
							<input type="file" class="form-control" name="picart" id="picart" placeholder="Enter ..." required>
							<span class="help-block">@error('picart') {{ $message }} @enderror</span>
						</div>

						<div class="form-group  @error('title') has-error @enderror">
							<label class="control-label" for="title">Event Title</label>
							<input type="text" class="form-control" name="title" id="title" placeholder="Enter ..." >
							<span class="help-block">@error('title') {{ $message }} @enderror</span>
						</div>


						<div class="form-group  @error('eventdesc') has-error @enderror">
							<label class="control-label" for="eventdesc">Event Description</label>
							<textarea cols="4" rows="4" class="form-control" name="eventdesc"></textarea>
							<span class="help-block">@error('eventdesc') {{ $message }} @enderror</span>
						</div>


						<div class="form-group  @error('eventdate') has-error @enderror">
							<label class="control-label" for="eventdate">Event Date</label>
							<input type="date" class="form-control" name="eventdate" id="eventdate" placeholder="Enter ..." >
							<span class="help-block">@error('eventdate') {{ $message }} @enderror</span>
						</div>

						<input type="submit" name="submit" value="Add Event" class="btn btn-success">
					</div>
				</form> 


				<!-- / form start -->
			</div>
		</div>
		<!-- /.box -->
	</div>
	<!-- second term -->

	</div>
</div>



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