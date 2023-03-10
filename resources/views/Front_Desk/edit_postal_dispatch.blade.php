@extends('layouts.main')


@section('title')
  OSMS | Edit Postal Dispatch
@endsection

@section('mtitle')
  OSMS Edit Postal Dispatch
@endsection


@section('mtitlesub')

@endsection



@section('main_content')


            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    {{ session('message') }}
                </div>
            @endif

            <div id="displayhere"></div>


            <div class="row">
			
            	  <!-- left column -->
		        <div class="col-md-4">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Edit Postal Dispatch</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		             	 <form method="post" role="form" action="{{route('save-postal-dispatch')}}" id="record-enqury" autocomplete="off" enctype="multipart/form-data">

		             	 	<input type="hidden" name="hiddenid" value="{{ $dispatch->id }}">
		             	 	 <div class="box-body">
								@csrf
								<div class="form-group  @error('totitle') has-error @enderror">
							         <label class="control-label" for="totitle">To Title</label>
							         <input type="text" class="form-control" name="totitle" id="totitle" value="{{ $dispatch->to }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('totitle') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('ref') has-error @enderror">
							         <label class="control-label" for="ref">Reference No</label>
							         <input type="text" class="form-control" name="ref" id="ref" value="{{ $dispatch->ref }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('ref') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('address') has-error @enderror">
							         <label class="control-label" for="address">Address</label>
							         <textarea name="address" id="address" class="form-control" rows="4" cols="4" >{{ $dispatch->address }}</textarea>
							          <span class="help-block">@error('address') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('fromtitle') has-error @enderror">
							         <label class="control-label" for="fromtitle">From Title</label>
							         <input type="text" value="{{ $dispatch->from }}" class="form-control" name="fromtitle" id="idcard" placeholder="Enter ..." required>
							          <span class="help-block">@error('fromtitle') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('docdate') has-error @enderror">
							         <label class="control-label" for="docdate">Date on Document</label>
							         <input type="date" class="form-control" name="docdate" id="docdate" value="{{ $dispatch->docdate }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('docdate') {{ $message }} @enderror</span>
							    </div>							

							    <div class="form-group  @error('doc') has-error @enderror">
							         <label class="control-label" for="doc">Attach Document</label>
							         <input type="file" class="form-control" name="doc" id="doc" value="{{ old('doc') }}" placeholder="Enter ..." >
							          <span class="help-block">@error('doc') {{ $message }} @enderror</span>
							    </div>							   

						    <input type="submit" name="submit" value="Update" class="btn btn-success">
							</div>
						</form> 

		          </div>
		          <!-- /.box -->
		        </div>



		       <!-- second term -->

		        <div class="col-md-9">
		          
		        </div>



		              
		    </div>
            
            

@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    
  	//start
    $(document).on("","#", function(e){
      e.preventDefault();
      
     
    });
    //end


   $(document).on("submit","#create-meeting",function(e){
   		e.preventDefault(); 
   		    //$("#starttime").romoveClass("has-error"); 
   		    //$("#couses-display").romoveClass("has-error");            
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('save-meeting')}}',
                      type: 'POST',
			          contentType: false,
			          processData: false,
			          cache: false,
			          dataType: 'json',
			          data: new FormData(this),
                      success: function(data){                      	

                      	if (data.success) {
                      		// $("#displayhere").html(data.success);
                      		 swal("Success! Meeting Schedule Successfully!", {
							      icon: "success",
							 });

                      		clearfileds();
                      		$('#meetings').DataTable().ajax.reload();
                      	}


                      	if (data.error) {
                      		
                      	}
                    	
                    },
                       // error: function (xhr,status,data) {
                        error: function (data) {	
                      	
                      	if (xhr.status == 400) {
	                      	if (xhr.responseJSON.errors.level) {
	                    		$("#levelerror").text('Please select Level To Proceed');
	                    	}else{
	                    		$("#levelerror").text('');
	                    	}
                      	
                        }

                        console.log(data);
                        //console.log('Error:', data.responseText);
                      }
                });   

   });


   function clearfileds(){
   	
   }







	$(document).on("click",".del-meeting",function(e){
		e.preventDefault();
		var id = $(this).attr("cid");

		swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this meeting.",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {

			   	 var _token = $('meta[name=csrf-token]').attr('content');     
                 $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('del-meeting')}}',
                    type: 'POST',
                    data: {_token : _token , id: id},
                    success: function(data){ 

                        swal("Meeting Deleted Successfully!",{
                        	icon: 'success',
                        });


                        $('#meetings').DataTable().ajax.reload();

                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });  

			  }
		});


	});






  });

</script>


@endsection
