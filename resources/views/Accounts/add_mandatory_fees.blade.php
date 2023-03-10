@extends('layouts.main')


@section('title')
  OSMS | Add Mandatory Fees
@endsection

@section('mtitle')
  Add Mandatory Fees
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
		              <h3 class="box-title">Add Mandatory Fees</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            <!-- form start -->
                  <form method="post" role="form" action="{{route('save-mandatory-fees')}}" id="add-mandatory-fees">
                     <div class="box-body">
                @csrf
                <div class="form-group  @error('title') has-error @enderror">
                       <label class="control-label" for="title">Fee Title</label>
                       <input type="text" class="form-control" name="title" id="title" placeholder="Enter ..." required>
                        <span class="help-block">@error('title') {{ $message }} @enderror</span>
                  </div>
        
                  <input type="submit" name="submit" value="Add Fee" class="btn btn-success">
              </div>
            </form> 
		            

		             <!-- / form start -->
		            </div>
		          </div>
		          <!-- /.box -->
		        </div>



		       <!-- second term -->

		        <div class="col-md-8">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">All Mandatory Fees</h3>
		            </div>
		            <!-- /.box-header -->
		             <div class="box-body table-responsive">

		             	<!--- table start here -->
		              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Fee Title</th>
                      <th>Fee Code</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($mandatory as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$row->title}}</td>
                          <td>{{$row->feecode}}</td>
                          <td>
                            
                            <a href="{{ route('edit-mandatory-fees',['id'=>$row->id]) }}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a>
                            <a href="{{ route('edit-mandatory-fees',['id'=>$row->id]) }}" class="btn btn-success" ><i class='fa fa-eye'></i>View</a>
                            <a href="{{ route('delete-mandatory-fees',['id'=> $row->id]) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger"><i class='fa fa-trash-o'></i>Delete</a>
                          <form id="dele_{{$row->id}}" action="" 
                            method="POST" style="display: none;">                  
                                @csrf
                          </form>  
                </td>

                        </tr>
                      @endforeach
                    </tbody>
                 </table>
		                <!--- /table start here -->
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
