@extends('layouts.main')


@section('title')
  OSMS | Create Meeting
@endsection

@section('mtitle')
  OSMS Create Meeting
@endsection


@section('mtitlesub')

@endsection



@section('main_content')


            <div id="displayhere"></div>


            <div class="row">
			
            	  <!-- left column -->
		        <div class="col-md-4">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Create A Meeting</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		             	 <form method="post" role="form" action="{{route('save-meeting')}}" id="create-meeting">
		             	 	 <div class="box-body">
								@csrf
								<div class="form-group  @error('title') has-error @enderror">
							         <label class="control-label" for="title">Meeting Title</label>
							         <input type="text" class="form-control" name="title" id="title" placeholder="Enter ..." required>
							          <span class="help-block">@error('title') {{ $message }} @enderror</span>
							    </div>

							    <div class="form-group  @error('start-time') has-error @enderror">
							         <label class="control-label" for="start-time">start Date & time</label>
							         <input type="datetime-local" class="form-control" name="start-time" id="start-time" placeholder="Enter ..." required>
							          <span class="help-block">@error('start-time') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group  @error('duration') has-error @enderror">
							         <label class="control-label" for="duration">Duration in Minutes</label>
							         <input type="number" class="form-control" name="duration" id="duration" placeholder="Enter ..." required>
							          <span class="help-block">@error('duration') {{ $message }} @enderror</span>
							    </div>


							    <div class="form-group @error('level')has-error @enderror">
				                    <label>Level</label>
				                    <select class="form-control" name="level" id="level" required>
				                        <option>{{ old('level') }}</option>
				                                <option value="Level 100">Level 100</option>
				                                <option value="Level 200">Level 200</option>
				                                <option value="Level 300">Level 300</option>
				                                <option value="Level 300">Level 400</option>
				                    </select>
				                    <span class="help-block" id="levelerror" style="color: red;">@error('level'){{ $message }}@enderror</span>
			                    </div>





			                    <div class="form-group @error('session')has-error @enderror">
				                    <label>Session</label>
				                    <select class="form-control" name="session" id="session" required>
				                        <option>{{ old('session') }}</option>
				                                <option value="Morning Session">Morning Session</option>
				                                <option value="Evening Session">Evening Session</option>
				                                <option value="Weekend Session">Weekend Session</option>
				                    </select>
				                    <span class="help-block" id="sessionerror" style="color: red;">@error('session'){{ $message }}@enderror</span>
			                    </div>


			                    <div class="form-group @error('programme')has-error @enderror">
				                    <label>Programme</label>
				                    <select class="form-control" name="programme" id="programme" required>
				                        <option>{{ old('programme') }}</option>
				                        @foreach($prog as $progs)
				                        	<option value="{{$progs->code}}">{{$progs->name}}</option>
				                        @endforeach
				                    </select>
				                    <span class="help-block" id="progerror" style="color: red;">@error('programme'){{ $message }}@enderror</span>
				                </div>

				            	<div class="form-group @error('session')has-error @enderror" id="couses-display">
				                    <label>Courses</label>
				                    <select class="form-control" name="cou">
				                        <option>{{ old('session') }}</option>
				                    </select>
				                    <span class="help-block" id="courseerror" style="color: red;">@error('session'){{ $message }}@enderror</span>
				                </div>

							    
							    <input type="submit" name="submit" value="Create Meeting" class="btn btn-success">
							</div>
						</form> 

		          </div>
		          <!-- /.box -->
		        </div>



		       <!-- second term -->

		        <div class="col-md-8">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">All Meetings</h3>
		            </div>
		            <!-- /.box-header -->
		             <div class="box-body">
		              <table id="meetings" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>S.N</th>
		                  <th>Lecture Name</th>
		                  <th>Programme</th>
		                  <th>Level</th>
		                  <th>Session</th>
		                  <th>Course Code</th>
		                  <th>Meeting Starts</th>
		                  <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                	
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
    $(document).on("change","#programme", function(e){
      e.preventDefault();
      var cid = $(this).val();
      var level = $("#level").val();
      var session = $("#session").val();

      if (level == "" || session == "") {
      	if (level == "") {
      		$("#levelerror").text('Level Cant Be Empty');
      	}else{
      		$("#levelerror").text('');
      	}


      	if (session == "") {
      		$("#sessionerror").text('Session Cant Be Empty');
      	}else{
      		$("#sessionerror").text('');
      	}

      	return;
      }else{
      	 $("#levelerror").text('');
      	 $("#sessionerror").text('');
      }


      //alert(cid + level + session);
      //return;
            var _token = $('meta[name=csrf-token]').attr('content');     
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('courses-timetable')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, level: level, session: session},
                    success: function(data){ 

                    	//alert(data);

                        $("#couses-display").html(data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });    
     
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
   	 $("#title").val("");
   	 $("#start-time").val("");
   	 $("#duration").val("");
   	 $("#level").val("");
   	 $("#session").val("");
   	 $("#programme").val("");
   	 $("#cousers").val("");
   }







	$('#meetings').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('all-meeting') }}',
        dom: 'lBfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ],
        columns: [
        	{data:  'DT_RowIndex'},
            {data: 'lec_name'},
            {data: 'programme'},
            {data: 'level'},
            {data: 'session'},
            {data: 'cousers'},
            {data: 'starttime'},
            {data: 'action', name: 'action'}
        ]




    });


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
