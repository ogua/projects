@extends('layouts.main')


@section('title')
  OSMS | Visitors Record
@endsection

@section('mtitle')
  OSMS Visitors Record
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
		              <h3 class="box-title">Record A Visit</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		             	 <form method="post" role="form" action="{{route('save-visitor')}}" id="record-enqury" autocomplete="off" enctype="multipart/form-data">

		             	 	 <div class="box-body">
								@csrf
								<div class="form-group  @error('fullname') has-error @enderror">
							         <label class="control-label" for="fullname">Fullname</label>
							         <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('fullname') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('phone-number') has-error @enderror">
							         <label class="control-label" for="phone-number">Phone Number</label>
							         <input type="text" class="form-control" name="phone-number" id="phone-number" value="{{ old('phone-number') }}" placeholder="Enter ..." required>
							          <span class="help-block">@error('phone-number') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('idcard') has-error @enderror">
							         <label class="control-label" for="idcard">ID Card ID</label>
							         <input type="idcard" value="{{ old('idcard') }}" class="form-control" name="idcard" id="idcard" placeholder="Enter ..." >
							          <span class="help-block">@error('idcard') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('noofpersons') has-error @enderror">
							         <label class="control-label" for="noofpersons">No of Persons</label>
							         <input type="text" value="{{ old('noofpersons') ? : 1 }}" class="form-control" name="noofpersons" id="noofpersons" placeholder="Enter ..." required>
							          <span class="help-block">@error('noofpersons') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('purpose') has-error @enderror">
							         <label class="control-label" for="purpose">Purpose</label>
							         <textarea name="purpose" id="purpose" class="form-control" rows="4" cols="4" required>{{ old('purpose') }}</textarea>
							          <span class="help-block">@error('purpose') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('intime') has-error @enderror">
							         <label class="control-label" for="intime">In Time</label>
							         <input type="time" value="{{ old('intime') }}" class="form-control" name="intime" id="intime" placeholder="Enter ..." required>
							          <span class="help-block">@error('intime') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('outtime') has-error @enderror">
							         <label class="control-label" for="outtime">Out Time</label>
							         <input type="time" value="{{ old('outtime') }}" class="form-control" name="outtime" id="outtime" placeholder="Enter ..." >
							          <span class="help-block">@error('outtime') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('note') has-error @enderror">
							         <label class="control-label" for="note">Note</label>
							         <textarea name="note" id="note" class="form-control" rows="4" cols="4" >{{ old('note') }}</textarea>
							          <span class="help-block">@error('note') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('fileinput') has-error @enderror">
							         <label class="control-label" for="fileinput">Document</label>
							         <input type="file" class="form-control" name="fileinput" id="file" accept="*pdf" >
							          <span class="help-block">@error('fileinput') {{ $message }} @enderror</span>
							    </div>

						    <input type="submit" name="submit" value="Record Details" class="btn btn-success">
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
		                  <th>Fullame</th>
		                  <th>Phone Number</th>
		                  <th>ID</th>
		                  <th>Purpose</th>
		                  <th>Intime</th>
		                  <th>Outtime</th>
		                  <th>Doc</th>
		                  <th width="25%">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($visitors as $visitor)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$visitor->fullname}}</td>
		                			<td>{{$visitor->phone}}</td>
		                			<td>{{$visitor->idcard}}</td>
		                			<td>{{$visitor->purpose}}</td>
		                			<td>{{$visitor->intime}}</td>
		                			<td>{{$visitor->outtime ? : 'waiting..' }}</td>
		                			<td>{!!$visitor->doc ? 
		                				'<a href="'.asset('storage').'/'.$visitor->doc.'"  class="btn btn-info" ><i class="fa fa-download"></i></a>' : 'No Doc' !!}</td>
		                			 <td>
					                  	<a href="{{route('edit-visitor', ['id'=>$visitor->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Update</a>
					                  	<a href="{{route('delete-visitor', ['id'=>$visitor->id])}}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" ><i class='fa fa-trash'></i>Delete</a>
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
