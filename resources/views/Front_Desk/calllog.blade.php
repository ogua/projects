@extends('layouts.main')


@section('title')
  OSMS | Call Logs
@endsection

@section('mtitle')
  OSMS Call Logs
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
		              <h3 class="box-title">Record Call</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		             	 <form method="post" role="form" action="{{route('save-call')}}" id="record-enqury" autocomplete="off" enctype="multipart/form-data">

		             	 	 <div class="box-body">
								@csrf

								<div class="form-group @error('calltype')has-error @enderror">
				                    <label>Call Type</label>
				                    <select class="form-control" name="calltype" id="calltype" required>
				                        <option>{{ old('calltype') }}</option>
				                        <option value="Incomng">Incomng</option>
				                        <option value="Outgoing">Outgoing</option>	
				                    </select>
				                    <span class="help-block" id="levelerror" style="color: red;">@error('calltype'){{ $message }}@enderror</span>
			                    </div>

								<div class="form-group  @error('fullname') has-error @enderror">
							         <label class="control-label" for="fullname">Caller Fullname</label>
							         <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('fullname') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('phone-number') has-error @enderror">
							         <label class="control-label" for="phone-number">Phone Number</label>
							         <input type="text" class="form-control" name="phone-number" id="phone-number" value="{{ old('phone-number') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('phone-number') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('callduration') has-error @enderror">
							         <label class="control-label" for="callduration">Call Duration (minutes)</label>
							         <input type="number" value="{{ old('callduration') }}" class="form-control" name="callduration" id="idcard" placeholder="Enter ..." required>
							          <span class="help-block">@error('callduration') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('followupdate') has-error @enderror">
							         <label class="control-label" for="noofpersons">Followup Date</label>
							         <input type="date" value="{{ old('followupdate') ? : 1 }}" class="form-control" name="followupdate" id="followupdate" placeholder="Enter ..." >
							          <span class="help-block">@error('followupdate') {{ $message }} @enderror</span>
							    </div>
							

							    <div class="form-group  @error('note') has-error @enderror">
							         <label class="control-label" for="note">Note</label>
							         <textarea name="note" id="note" class="form-control" rows="4" cols="4" >{{ old('note') }}</textarea>
							          <span class="help-block">@error('note') {{ $message }} @enderror</span>
							    </div>							   

						    <input type="submit" name="submit" value="Record Call" class="btn btn-success">
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
		              <h3 class="box-title">All Records</h3>
		            </div>
		            <!-- /.box-header -->
		             <div class="box-body table-responsive">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>S.N</th>
		                  <th>Type</th>
		                  <th>From</th>
		                  <th>Phone Number</th>
		                  <th>Duraton</th>
		                  <th>Next Followup</th>
		                  <th>Note</th>
		                  <th width="25%">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($calllogs as $calllog)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$calllog->type}} Call</td>
		                			<td>{{$calllog->fullname}}</td>
		                			<td>{{$calllog->phone}}</td>
		                			<td>{{$calllog->duration}}</td>
		                			<td>{{$calllog->followupdate}}</td>
		                			<td>{{$calllog->note}}</td>	                			
		                			 <td>
					                  	<a href="{{route('edit-call', ['id'=>$calllog->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Update</a>
					                  	<a href="{{route('delete-call', ['id'=>$calllog->id])}}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" ><i class='fa fa-trash'></i>Delete</a>
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
