@extends('layouts.main')


@section('title')
  OSMS | Edit Fee Master
@endsection

@section('mtitle')
   Edit Fee Master
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

            <div class="row">
            	  <!-- left column -->
		        <div class="col-md-4">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Edit Mandatory Fees For <b class="text-info"> {{$mandatory->academicyear}} Academic Year </b> </h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            <!-- form start -->
                  <form method="post" role="form" action="{{ route('update_fees_master', ['id'=> $mandatory->id]) }}" id="addmandatory">
                     <div class="box-body">
                @csrf

                <div class="form-group @error('level')has-error @enderror">
                            <label>Level</label>
                            <select class="form-control select2" name="level" id="level" required>
                                <option>{{ old('level', $mandatory->level) }}</option>
                                        <option value="Level 100">Level 100</option>
                                        <option value="Level 200">Level 200</option>
                                        <option value="Level 300">Level 300</option>
                                        <option value="Level 300">Level 400</option>
                            </select>
                            <span class="help-block" id="levelerror" style="color: red;">@error('level'){{ $message }}@enderror</span>
                          </div>





                          <div class="form-group @error('session')has-error @enderror">
                            <label>Check Session</label> 

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Morning Session" name="session" @if ($mandatory->session == 'Morning Session' )
                                  checked 
                                @endif type="checkbox" >
                              Morning Session</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" @if ($mandatory->session == 'Evening Session' )
                                  checked 
                                @endif value="Evening Session" name="session" type="checkbox" >
                              Evening Session</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Weekend Session" @if ($mandatory->session == 'Weekend Session' )
                                  checked 
                                @endif name="session" type="checkbox" >
                              Weekend Session</label>
                            </div>

                            <span class="help-block" id="sessionerror" style="color: red;">@error('session[]'){{ $message }}@enderror</span>
                          </div>


                  <div class="form-group  @error('title') has-error @enderror">
                       <label class="control-label" for="title">Title</label>
                       <input type="text" value="{{ old('title', $mandatory->fee) }}" class="form-control" name="title" id="title" placeholder="Enter ... " required>
                        <span class="help-block">@error('title') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group  @error('feecode') has-error @enderror">
                       <label class="control-label" for="feecode">FeeCode</label>
                       <input type="text" value="{{ old('feecode', $mandatory->feecode) }}" class="form-control" name="feecode" id="feecode" placeholder="Enter ... " required>
                        <span class="help-block">@error('feecode') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group  @error('fee') has-error @enderror">
                       <label class="control-label" for="fee">Fee GH&cent;</label>
                       <input type="number" value="{{ old('fee', $mandatory->feeamount) }}" class="form-control" name="fee" id="fee" placeholder="Enter ... " required>
                        <span class="help-block">@error('fee') {{ $message }} @enderror</span>
                  </div>
        
        
                  <input type="submit" name="submit" value="Update Fee For {{
                    $mandatory->academicyear}} Academic Year" class="btn btn-success">
              </div>
            </form> 

          
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


   $(document).on("submit","#addmandatory",function(e){
   		e.preventDefault(); 
      alert('working');
      return;
   		    //$("#starttime").romoveClass("has-error"); 
   		    //$("#couses-display").romoveClass("has-error");            
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('save_fees_master_man')}}',
                      type: 'POST',
      			          contentType: false,
      			          processData: false,
      			          cache: false,
      			          dataType: 'json',
      			          data: new FormData(this),
                      success: function(data){                      	

                      	if (data.success) {
                      		// $("#displayhere").html(data.success);
                      		 swal("Success! Fee Added Successfully!", {
							               icon: "success",
							             });

                      		clearfileds();
                      		//$('#meetings').DataTable().ajax.reload();
                      	}


                      	if (data.error) {

                      		swal("Warning! Fee Already Added!", {
                             icon: "warning",
                           });

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
