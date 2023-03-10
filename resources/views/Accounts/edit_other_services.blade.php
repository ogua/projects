@extends('layouts.main')


@section('title')
  OSMS | 
@endsection

@section('mtitle')
  Edit Other Services Fees
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
		              <h3 class="box-title">Edit Other Services Fees</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            <!-- form start -->
                  <form method="post" role="form" action="{{route('save_other_services')}}" id="add-mandatory-fees">
                     <div class="box-body">
                @csrf
                <input type="hidden" name="hiddenid" value="{{$otherservce->id}}">

                 <div class="form-group  @error('title') has-error @enderror">
                       <label class="control-label" for="title">Fee Title</label>
                       <input type="text" value="{{$otherservce->title}}" class="form-control" name="title" id="title" placeholder="Enter ..." required>
                        <span class="help-block">@error('title') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group  @error('fee') has-error @enderror">
                       <label class="control-label" for="fee">Fee GH&cent;</label>
                       <input type="number" value="{{$otherservce->fee}}" class="form-control" name="fee" id="fee" placeholder="Enter ... " required>
                        <span class="help-block">@error('fee') {{ $message }} @enderror</span>
                  </div>

        
                  <input type="submit" name="submit" value="Update Fee" class="btn btn-success">
              </div>
            </form> 
		            

		             <!-- / form start -->
		            </div>
		          </div>
		          <!-- /.box -->
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
