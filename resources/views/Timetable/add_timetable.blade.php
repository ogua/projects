@extends('layouts.main')


@section('title')
  OSMS | Generate Timetable
@endsection

@section('mtitle')
  Timetable
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Timetable</h3>
      </div>
      <div class="box-body">
        <form method="post" action="#" id="submitTmetable">
          @csrf

            <div class="row">
              <div class="col-md-6">
                <div class="form-group @error('level')has-error @enderror">
                    <label>Level</label>
                    <select class="form-control" name="level" id="level" required>
                        <option>{{ old('level') }}</option>
                                <option value="Level 100">Level 100</option>
                                <option value="Level 200">Level 200</option>
                                <option value="Level 300">Level 300</option>
                                <option value="Level 400">Level 400</option>
                    </select>
                    <span class="help-block" id="levelerror" style="color: red;">@error('level'){{ $message }}@enderror</span>
                    </div>
              </div>
              <div class="col-md-6">
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
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
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
              </div>
              <div class="col-md-6" id="couses-display">
                <div class="form-group @error('session')has-error @enderror">
                    <label>Courses</label>
                    <select class="form-control" name="cou">
                        <option>{{ old('session') }}</option>
                    </select>
                    <span class="help-block" id="courseerror" style="color: red;">@error('session'){{ $message }}@enderror</span>
                    </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-6">
                <div class="form-group  @error('totstudent') has-error @enderror">
                 <label class="control-label" for="inputError">Total Students</label>
                 <input type="number"  class="form-control" name="totstudent" id="totstudent" placeholder="Enter ...">
                  <span class="help-block">@error('totstudent') {{ $message }} @enderror</span>
            </div>
              </div>
              <div class="col-md-6">
                <div class="form-group has-success">
                     <label class="control-label" for="togrrp">Total Students Left For Grouping</label>
                     <input type="number" class="form-control" value= "{{old('totsgropleft')}}" name="totsgropleft" id="totsgropleft" placeholder="Enter ...">
                      <span class="help-block">@error('totsgropleft') {{ $message }} @enderror</span>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-6">
                <div class="form-group  @error('hallname') has-error @enderror">
                 <label class="control-label" for="inputError">Select Lecture Hall (Group 1)</label>
                <select class="form-control" name="hall1" id="hall1" required>
                  <option></option>
                  @foreach($hall as $halls)
                    <option value="{{$halls->name}},{{$halls->capacity}}">{{$halls->name}} - Capacity: {{$halls->capacity}}</option>
                  @endforeach
                      </select>
                  <span class="help-block" id="hallerror" style="color: red;">@error('hallname') {{ $message }} @enderror</span>
            </div>

            <input type="hidden" id="hall1left" class="form-control">


            <div class="form-group  @error('hallname') has-error @enderror">
                 <label class="control-label" for="inputError">Select Lecture Hall (Group 2)</label>
                <select class="form-control" name="hall2" id="hall2">
                  <option></option>
                  @foreach($hall as $halls)
                    <option value="{{$halls->name}},{{$halls->capacity}}">{{$halls->name}} - Capacity: {{$halls->capacity}}</option>
                  @endforeach
                      </select>
                  <span class="help-block">@error('hallname') {{ $message }} @enderror</span>
            </div>


            <input type="hidden" id="hall2left" class="form-control">



            <div class="form-group  @error('hallname') has-error @enderror">
                 <label class="control-label" for="inputError">Select Lecture Hall (Group 3)</label>
                <select class="form-control" name="hall3" id="hall3">
                  <option></option>
                  @foreach($hall as $halls)
                    <option value="{{$halls->name}},{{$halls->capacity}}">{{$halls->name}} - Capacity: {{$halls->capacity}}</option>
                  @endforeach
                      </select>
                  <span class="help-block">@error('hallname') {{ $message }} @enderror</span>
            </div>


            <input type="hidden" id="hall3left" class="form-control">        

            <div class="form-group  @error('hallname') has-error @enderror">
                 <label class="control-label" for="inputError">Select Lecture Hall (Group 4)</label>
                <select class="form-control" name="hall4" id="hall4">
                  <option></option>
                  @foreach($hall as $halls)
                    <option value="{{$halls->name}},{{$halls->capacity}}">{{$halls->name}} - Capacity: {{$halls->capacity}}</option>
                  @endforeach
                      </select>
                  <span class="help-block">@error('hallname') {{ $message }} @enderror</span>
            </div>
              </div>

              <input type="hidden" id="hall4left" class="form-control">

              <div class="col-md-6" id="displaylecturer">
                <div class="form-group  @error('lect1') has-error @enderror">
                     <label class="control-label" for="lectgoup">Select Lecturer For Group 1</label>
                     <select class="form-control" name="grp1" id="grp1">
                  <option></option>
          
                        </select>
                      <span class="help-block" id="lecterror" style="color: red;">@error('hallcapacity') {{ $message }} @enderror</span>
                </div>


                <div class="form-group  @error('lect1') has-error @enderror">
                     <label class="control-label" for="lectgoup">Select Lecturer For Group 2</label>
                     <select class="form-control" name="grp2" id="grp2">
                  <option></option>
          
                        </select>
                      <span class="help-block">@error('hallcapacity') {{ $message }} @enderror</span>
                </div>


                <div class="form-group  @error('lect1') has-error @enderror">
                     <label class="control-label" for="lectgoup">Select Lecturer For Group 3</label>
                     <select class="form-control" name="grp3" id="grp3">
                  <option></option>
          
                        </select>
                      <span class="help-block">@error('hallcapacity') {{ $message }} @enderror</span>
                </div>


                <div class="form-group  @error('lect1') has-error @enderror">
                     <label class="control-label" for="lectgoup">Select Lecturer For Group 4</label>
                     <select class="form-control" name="grp4" id="grp4">
                  <option></option>
          
                        </select>
                      <span class="help-block">@error('hallcapacity') {{ $message }} @enderror</span>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <div class="form-group  @error('totstudent') has-error @enderror">
                 <label class="control-label" for="day">Select Lecture Day</label>
                 <select class="form-control" name="day" id="day" required>
                  <option></option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
                        </select>
                  <span class="help-block" id="dayerror" style="color: red;">@error('totstudent') {{ $message }} @enderror</span>
            </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <label>Credit Hours For this Course: 
                    @if(!empty($credithours))
                      {{$credithours}}
                    @endif
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" id="starttime">
                         <label class="control-label" for="togrrp">Lecture Start</label>
                         <input type="time" class="form-control" value="" name="stime" id="stime" placeholder="Enter ..." required>
                          <span class="help-block" id="stimeeerror" style="color: red;">@error('totsgropleft') {{ $message }} @enderror</span>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                         <label class="control-label" for="togrrps">Lecture End</label>
                         <input type="time" class="form-control" value= "" name="etime" id="etime" placeholder="Enter ..." required>
                          <span class="help-block" id="etmeeerror" style="color: red;">@error('totsgropleft') {{ $message }} @enderror</span>
                    </div>

                  </div>  
                </div>
                
              </div>
            </div>            

          <input type="submit" name="submit" value="Add Timetable" class="btn btn-success">

        </form> 


            <div id="displayhere"></div>
            <div id="lecturdisplay1"></div>
            <div id="lecturdisplay2"></div>
            <div id="lecturdisplay3"></div>
            <div id="lecturdisplay4"></div>

      </div>
    </div>
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


    //get cources by level
    $(document).on("change","#level",function(e){
    	e.preventDefault();
    	var level = $(this).val();
        var code = $("#programme").val();
        var _token = $('meta[name=csrf-token]').attr('content');

        if (code == "") {

        }else{

        	$.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('courses-timetable-bylevel')}}',
                    type: 'POST',
                    data: {_token : _token , code: code, level: level},
                    success: function(data){ 

                    	//alert(data);

                        $("#couses-display").html(data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
             }); 	

        }



    });




    //get total students 
    $(document).on("change","#cousers",function(e){
      e.preventDefault();
      var Ccode = $(this).val();
      var code = $("#programme").val();
      var level = $("#level").val();


      var rands = ['300','500','600','450'];
      var item = rands[Math.floor(Math.random() * rands.length)];



     // alert(item);

      //return;

       var _token = $('meta[name=csrf-token]').attr('content');
              
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('total-students-by-cousre')}}',
                    type: 'POST',
                    data: {_token : _token , code: code, level: level},
                    success: function(data){ 

                    	//alert(data);

                        //$("#totstudent").val(data);

                        $("#totstudent").val(item);
                        $("#totsgropleft").val(item);

                        $("#hall1left").val(item);
                        getlecturerbycode(Ccode);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });   


    });




    function getlecturerbycode(Ccode){
    	     $.ajax({
                    url: '{{route('getall-lecturers')}}',
                    data: {Ccode: Ccode},
                    success: function(data){ 
                    	//alert(data);
                      $("#displaylecturer").html(data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
            });   
    }



   $(document).on("change","#hall1",function(e){
      e.preventDefault();
      var hall = $(this).val();
      var totleft = $("#totsgropleft").val();
      var hall1left = $("#hall1left").val();
              
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('substr-number')}}',
                    data: {hall: hall},
                    success: function(data){ 

                    	//alert(data);
                    	//var totleft $("#totsgropleft").val();

                    	//var leftnow = totleft - data;

                    	//$("#totsgropleft").val(leftnow);



                        $("#totsgropleft").val(hall1left - data);

                        $("#hall2left").val(hall1left - data);

                        $("#hall2").val("");
                        $("#hall3").val("");
                        $("#hall4").val("");
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });   

    });


   $(document).on("change","#hall2",function(e){
      e.preventDefault();
      var hall = $(this).val();
      var totleft = $("#totsgropleft").val();
      var hall2left = $("#hall2left").val();

      var hal1 = $("#hall1").val();

      if (hal1 == hall) {
      	alert(hall+ " Has been occuped");
      	 $(this).val("");
      	 $("#totsgropleft").val(hall2left);
      	return;
      }

              
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('substr-number')}}',
                    data: {hall: hall},
                    success: function(data){ 

                    	//alert(data);
                    	//var totleft $("#totsgropleft").val();

                    	//var leftnow = totleft - data;

                    	//$("#totsgropleft").val(leftnow);
                       $("#totsgropleft").val(hall2left - data);
                       $("#hall3left").val(hall2left - data);

                        $("#hall3").val("");
                        $("#hall4").val("");

                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });   

    });


   $(document).on("change","#hall3",function(e){
      e.preventDefault();
      var hall = $(this).val();
      var totleft = $("#totsgropleft").val();
      var hall3left = $("#hall3left").val();

      var hal1 = $("#hall1").val();
      var hal2 = $("#hall2").val();

      if (hal1 == hall || hal2 == hall) {
      	alert(hall+ " Has been occuped");
      	 $(this).val("");
      	 $("#totsgropleft").val(hall3left);
      	return;
      }
              
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('substr-number')}}',
                    data: {hall: hall},
                    success: function(data){ 

                    	//alert(data);
                    	//var totleft $("#totsgropleft").val();

                    	//var leftnow = totleft - data;

                    	//$("#totsgropleft").val(leftnow);
                        $("#totsgropleft").val(hall3left - data);
                        $("#hall4left").val(hall3left - data);

                        $("#hall4").val("");
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });   

    });




   $(document).on("change","#hall4",function(e){
      e.preventDefault();
      var hall = $(this).val();
      var totleft = $("#totsgropleft").val();
      var hall4left = $("#hall4left").val();        	
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('substr-number')}}',
                    data: {hall: hall},
                    success: function(data){ 

                    	//alert(data);

                    	//var totleft $("#totsgropleft").val();

                    	//var leftnow = totleft - data;

                    	//$("#totsgropleft").val(leftnow);

                        $("#totsgropleft").val(hall4left - data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });   

    });



   $(document).on("submit","#submitTmetable",function(e){
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
                    url: '{{route('save-timetable-save')}}',
                      type: 'POST',
			          contentType: false,
			          processData: false,
			          cache: false,
			          dataType: 'json',
			          data: new FormData(this),
                      success: function(data){
                      	clearfields();

                      	

                      	if (data.success) {
                      		$("#displayhere").html(data.success);
                      		resetFormfields();
                      	}


                      	if (data.ggg) {
                      		console.log(data.ggg);
                      	}


                      	if (data.error) {

                      		if (data.grp1) {
                      			//$("#lecterror").text(data.grp1);
                      			$("#lecturdisplay1").html(data.grp1);
                      			//alert(data.grp1);
                      		}


                      		if (data.stime) {
                      			//$("#stimeeerror").text(data.stime);
                      			//alert(data.stime);
                      			$("#displayhere").html(data.stime);
                      			//$("#starttime").addClass('has-error');

                      		}

                      		if (data.cousers) {
                      			$("#courseerror").text(data.cousers);
                      			//$("#couses-display").addClass('has-error');
                      		}

                      		if (data.grp11) {
                      			//$("#lecterror2").text(data.grp2);
                      			$("#lecturdisplay2").html(data.grp11);
                      			//alert(data.grp2);
                      		}

                      		if (data.grp12) {
                      			//$("#lecterror3").text(data.grp3);
                      			$("#lecturdisplay3").html(data.grp12);
                      			//alert(data.grp3);
                      		}

                      		if (data.grp13) {
                      			//$("#lecterror4").text(data.grp4);
                      			$("#lecturdisplay4").html(data.grp13);
                      			//alert(data.grp4);
                      		}


                      		

                      	}
                    	
                    },
                       error: function (xhr,status,data) {
                      // error: function (data) {	
                      	
                      	if (xhr.status == 400) {

                      	if (xhr.responseJSON.errors.level) {
                    		$("#levelerror").text('Please select Level To Proceed');
                    	}else{
                    		$("#levelerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.session) {
                    		$("#sessionerror").text('Please select Session To Proceed');
                    	}else{
                    		$("#sessionerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.programme) {
                    		$("#progerror").text('Please select Programme To Proceed');
                    	}else{
                    		$("#progerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.cousers) {
                    		$("#courseerror").text('Please select A Course To Proceed');
                    	}else{
                    		$("#courseerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.hall1) {
                    		$("#hallerror").text('Please select Lecture Hall To Proceed');
                    	}else{
                    		$("#hallerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.grp1) {
                    		$("#lecterror").text('Please select A Lecturer To Proceed');
                    	}else{
                    		$("#lecterror").text('');
                    	}

                    	if (xhr.responseJSON.errors.day) {
                    		$("#dayerror").text('Please select Day For Lectures To Proceed');
                    	}else{
                    		$("#dayerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.stime) {
                    		$("#stimeeerror").text('Please select Start Time To Proceed');
                    	}else{
                    		$("#stimeeerror").text('');
                    	}

                    	if (xhr.responseJSON.errors.etime) {
                    		$("#etmeeerror").text('Please select End Time To Proceed');
                    	}else{
                    		$("#etmeeerror").text('');
                    	}

                      	
                      }

                      console.log(data);
                        //console.log('Error:', data.responseText);
                      }
                });   

   });



function clearfields(){
	$("#etmeeerror").text('');
	$("#stimeeerror").text('');
	$("#lecterror").text('');
    $("#dayerror").text('');
    $("#hallerror").text('');
    $("#levelerror").text('');
	$("#sessionerror").text('');
	$("#progerror").text('');
	$("#courseerror").text('');
}



function resetFormfields(){
	$("#cousers").val('');

	$("#hall1").val('');
	$("#hall2").val('');
	$("#hall3").val('');
	$("#hall4").val('');

	$("#grp1").val('');
	$("#grp2").val('');
	$("#grp3").val('');
	$("#grp4").val('');


	//$("#stime").val('');
	//$("#etime").val('');
	$("#day").val('');

	
}





  });

</script>


@endsection