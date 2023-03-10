@extends('layouts.main')


@section('title')
  OSMS | Postal Dispatch
@endsection

@section('mtitle')
  OSMS Postal Dispatch
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
		        <div class="col-md-3">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Record Postal Dispatch</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		             	 <form method="post" role="form" action="{{route('save-postal-dispatch')}}" id="record-enqury" autocomplete="off" enctype="multipart/form-data">

		             	 	 <div class="box-body">
								@csrf
								<div class="form-group  @error('totitle') has-error @enderror">
							         <label class="control-label" for="totitle">To Title</label>
							         <input type="text" class="form-control" name="totitle" id="totitle" value="{{ old('totitle') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('totitle') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('ref') has-error @enderror">
							         <label class="control-label" for="ref">Reference No</label>
							         <input type="text" class="form-control" name="ref" id="ref" value="{{ old('ref') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('ref') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('address') has-error @enderror">
							         <label class="control-label" for="address">Address</label>
							         <textarea name="address" id="address" class="form-control" rows="4" cols="4" >{{ old('address') }}</textarea>
							          <span class="help-block">@error('address') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('fromtitle') has-error @enderror">
							         <label class="control-label" for="fromtitle">From Title</label>
							         <input type="text" value="{{ old('fromtitle') }}" class="form-control" name="fromtitle" id="idcard" placeholder="Enter ..." required>
							          <span class="help-block">@error('fromtitle') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('docdate') has-error @enderror">
							         <label class="control-label" for="docdate">Date on Document</label>
							         <input type="date" class="form-control" name="docdate" id="docdate" value="{{ old('docdate') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('docdate') {{ $message }} @enderror</span>
							    </div>							

							    <div class="form-group  @error('doc') has-error @enderror">
							         <label class="control-label" for="doc">Attach Document</label>
							         <input type="file" class="form-control" name="doc" id="doc" value="{{ old('doc') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('doc') {{ $message }} @enderror</span>
							    </div>							   

						    <input type="submit" name="submit" value="Save" class="btn btn-success">
							</div>
						</form> 

		          </div>
		          <!-- /.box -->
		        </div>



		       <!-- second term -->

		        <div class="col-md-9">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Postal Dispatch List</h3>
		            </div>
		            <!-- /.box-header -->
		             <div class="box-body table-responsive">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>S.N</th>
		                  <th>To</th>
		                  <th>From</th>
		                  <th>Ref</th>
		                  <th>Address</th>
		                  <th>Date</th>
		                  <th>doc</th>
		                  <th width="25%">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($dispatches as $dispatch)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$dispatch->to}} </td>
		                			<td>{{$dispatch->from}}</td>
		                			<td>{{$dispatch->ref}}</td>
		                			<td>{{$dispatch->address}}</td>
		                			<td>{{$dispatch->docdate}}</td>
		                			<td>{!!$dispatch->doc ? 
		                				'<a href="'.asset('storage').'/'.$dispatch->doc.'"  class="btn btn-info" ><i class="fa fa-download"></i></a>' : 'No Doc' !!}</td>
		                			 <td>
					                  	<a href="{{route('edit-postal-dispatch', ['id'=>$dispatch->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Update</a>
					                  	<a href="{{route('delete-postal-dispatch', ['id'=>$dispatch->id])}}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" ><i class='fa fa-trash'></i>Delete</a>
					                  </td>
		                		</tr>
		                	@endforeach
		                </tbody>
		             </table>
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
