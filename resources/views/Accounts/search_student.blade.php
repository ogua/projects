@extends('layouts.main')


@section('title')
  OSMS | Students Wallet Information
@endsection

@section('mtitle')
  Students Wallet Information
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

  <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Students Wallet Information</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N</th>
                      <th>img</th>
                      <th>Fullname</th>
                      <th>Index Number</th>
                      <th>Session</th>
                      <th>Programme</th>
                      <th>Wallet Balance (GH&cent;)</th>
                      <th width="30%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($wallet as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>
                              <img src="{{asset('storage')}}/{{$row->pro_pic}}" class="img-circle"width="50" height="50">
                          </td>
                          <td>{{$row->name}}</td>
                          <td>{{$row->indexnumber}}</td>
                          <td>
                              @foreach($studentinfo as $stdnt)
                                  @if($row->id == $stdnt->user_id)
                                   {{$stdnt->session}}
                                  @endif
                              @endforeach
                          </td>
                          <td>
                              @foreach($studentinfo as $stdnt)
                                  @if($row->id == $stdnt->user_id)
                                   {{$stdnt->programme}}
                                  @endif
                              @endforeach
                          </td>
                          <td>GH&cent;{{$row->balance}}.00</td>
                          <td>
                            <a href="{{ route('pay_students_fes',['indexnumber'=>$row->indexnumber]) }}" class="btn btn-success" title="view"><i class='fa fa-eye'></i>Debit Wallet</a>

                            <a href="{{ route('view_student_fees',['indexnumber'=>$row->indexnumber]) }}" class="btn btn-info" title="view"><i class='fa fa-eye'></i>View Fees</a>
                           
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
              </table>
      </div>
    </div>
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
