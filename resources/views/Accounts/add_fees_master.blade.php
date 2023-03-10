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
            	  <!-- left column -->
		        <div class="col-md-4">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Add Mandatory Fees For <b class="text-info"> {{$year}} Academic Year </b> </h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            <!-- form start -->
                  <form method="post" role="form" action="{{ route('save_fees_master_man') }}" id="addmandatory">
                     <div class="box-body">
                @csrf

                <input type="hidden" name="academicyear" value="{{$year}}">


                <div class="form-group @error('level')has-error @enderror">
                            <label>Level</label>
                            <select class="form-control select2" name="level" id="level" required>
                                <option>{{ old('level') }}</option>
                                        <option value="Level 100">Level 100</option>
                                        <option value="Level 200">Level 200</option>
                                        <option value="Level 300">Level 300</option>
                                        <option value="Level 400">Level 400</option>
                            </select>
                            <span class="help-block" id="levelerror" style="color: red;">@error('level'){{ $message }}@enderror</span>
                          </div>





                          <div class="form-group @error('session')has-error @enderror">
                            <label>Check Session</label> 

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Morning Session" name="session[]" type="checkbox" >
                              Morning Session</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Evening Session" name="session[]" type="checkbox" >
                              Evening Session</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Weekend Session" name="session[]" type="checkbox" >
                              Weekend Session</label>
                            </div>

                            <span class="help-block" id="sessionerror" style="color: red;">@error('session[]'){{ $message }}@enderror</span>
                          </div>

                          <div class="form-group @error('title')has-error @enderror">
                            <label>Mandatory Fee</label>
                            <select class="form-control select2" name="title" id="title" required>
                                <option>{{ old('title') }}</option>
                                @foreach($mandatory as $progs)
                                  <option value="{{$progs->title}} - {{$progs->feecode}} ">{{$progs->title}} - {{$progs->feecode}}</option>
                                @endforeach
                            </select>
                            <span class="help-block" id="progerror" style="color: red;">@error('title'){{ $message }}@enderror</span>
                        </div>

                <div class="form-group  @error('fee') has-error @enderror">
                       <label class="control-label" for="fee">Fee GH&cent;</label>
                       <input type="number" class="form-control" name="fee" id="fee" placeholder="Enter ... " required>
                        <span class="help-block">@error('fee') {{ $message }} @enderror</span>
                  </div>
        
                  <input type="submit" name="submit" value="Add Fee For {{$year}} Academic Year" class="btn btn-success">
              </div>
            </form> 


            <!---- Second form here ---->

            <br><br>
            <fieldset>
              <legend>Others Services Fees{{$year}} Academic Year </legend>
          

            <form method="post" role="form" action="{{ route('save_fees_master_otherservice') }}" id="addmandatory">
                     <div class="box-body">
                @csrf

                <input type="hidden" name="academicyear" value="{{$year}}">


                <div class="form-group @error('level')has-error @enderror">
                            <label>Level</label>
                            <select class="form-control select2" name="level" id="level" required>
                                <option>{{ old('level') }}</option>
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
                                <input class="form-check-input" value="Morning Session" name="session[]" type="checkbox" >
                              Morning Session</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Evening Session" name="session[]" type="checkbox" >
                              Evening Session</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" value="Weekend Session" name="session[]" type="checkbox" >
                              Weekend Session</label>
                            </div>
                            
                            <span class="help-block" id="sessionerror" style="color: red;">@error('session[]'){{ $message }}@enderror</span>
                          </div>

                      <div class="form-group @error('title')has-error @enderror">
                            <label>Other Service Fee</label>
                            <select class="form-control select2" name="title" id="title" required>
                                <option>{{ old('title') }}</option>
                                @foreach($otherservce as $progs)
                                  <option value="{{$progs->title}} - {{$progs->feecode}} - {{$progs->fee}}">{{$progs->title}} - {{$progs->fee}}</option>
                                @endforeach
                            </select>
                            <span class="help-block" id="progerror" style="color: red;">@error('title'){{ $message }}@enderror</span>
                        </div>
        
                  <input type="submit" name="submit" value="Add Fee For {{$year}} Academic Year" class="btn btn-success">
              </div>
            </form>

            </fieldset>

		            

		             <!-- / form start -->
		            </div>
		          </div>
		          <!-- /.box -->
		        </div>




            <!--- middle fees others --->

          


		       <!-- second term -->

		        <div class="col-md-8">
		          <!-- general form elements -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Mandatory Fees For <b class="text-info"> {{$year}} Academic Year </b> </h3>
		            </div>
		            <!-- /.box-header -->
		             <div class="box-body table-responsive">

		             	<!--- table start here -->
		              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Level</th>
                      <th>Session</th>
                      <th>Fee Title</th>
                      <th>Fee Code</th>
                      <th>Fee</th>
                      <th>Academic Year</th>
                      <th width="45%">Action</th>
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
