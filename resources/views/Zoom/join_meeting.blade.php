@extends('layouts.main')


@section('title')
  OSMS | Join Meeting
@endsection

@section('mtitle')
  OSMS Join Meeting
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

            @if (session()->has('message'))
	            <div class="alert alert-success">
	                {{ session('message') }}
	            </div>
            @endif

            <div class="alert alert-success">
	               You Can Either Join From Your Phone Using The Meeting ID Or <br> Click On Join To Join The Meeting Using Browser... 
	        </div>

            <div class="row">
		       <!-- second term -->

		        <div class="col-md-12">
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
		                  <th>Meeting Title</th>
		                  <th>Meeting ID</th>
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
        ajax: '{{ route('student-all-meeting') }}',
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
            {data: 'title'},
            {data: 'zoomid'},
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