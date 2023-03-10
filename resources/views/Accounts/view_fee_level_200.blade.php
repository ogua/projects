@extends('layouts.main')


@section('title')
  OSMS | Fee Master
@endsection

@section('mtitle')
   Fee Master
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

            <div class="row">
		        <div class="col-md-12">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Level 200 Mandatory Fees For <b class="text-info"> {{$year}} Academic Year </b> </h3>
		            </div>
		            <!-- /.box-header -->
		             <div class="box-body table-responsive">

		             	<!--- table start here -->
		              <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Level</th>
                      <th>Session</th>
                      <th>Fee Title</th>
                      <th>Fee Code</th>
                      <th>Fee</th>
                      <th>Academic Year</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($semesterfee as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$row->level}}</td>
                          <td>{{$row->session}}</td>
                          <td>{{$row->fee}}</td>
                          <td>{{$row->feecode}}</td>
                          <td>GH &cent;{{$row->feeamount}}</td>
                          <td>{{$row->academicyear}}</td>
                          <td>
                          
                            <a href="{{ route('edit_fees_master',['id'=>$row->id]) }}" class="btn btn-success" title="view"><i class='fa fa-eye'></i></a>
                            <a href="{{ route('delete_fees_master',['id'=> $row->id]) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" title="delete"><i class='fa fa-trash' ></i></a>
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


   $(document).on("submit","#addmandatory",function(e){
   		e.preventDefault(); 
      //alert('working');
      //return;
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
