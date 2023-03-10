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
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Timetable Generate</h3>
      </div>
      <div class="box-body">
        <div id="displayhere"></div>

            <form method="post" action="{{route('lecturer_timetable')}}" id="getTmetable">
                    @csrf

            <div class="row">
                <div class="col-md-4">
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
                </div>
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="form-group @error('session')has-error @enderror">
                    <label>Type</label>
                    <select class="form-control" name="type" id="type" required>
                        <option>{{ old('session') }}</option>
                                <option value="DEGREE">Degree</option>
                                <option value="DIPLOMA">Diploma</option>
                                <option value="MASTER">Masters</option>
                    </select>
                    <span class="help-block" id="sessionerror" style="color: red;">@error('session'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>

            


                  <input type="submit" name="submit" value="Generate Timetable" class="btn btn-success">

                </form> 
             
              
              <div class="clearfix"></div>
                        
             <div class="col-md-8 col-md-offset-2" id="timetableget"></div>
             {{-- <a href="#" id="print" class="btn btn-success">Generate</a> --}}
      </div>
    </div>
  </div>
</div>
@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

   $(document).on("submit","#getTmetable",function(e){
   	e.preventDefault();  
            $.ajax({
                    url: '{{route('lecturer_timetable')}}',
                    type: 'POST',
			        contentType: false,
			        processData: false,
			        cache: false,
			        data: new FormData(this),
                    success: function(data){ 
                       $("#timetableget").html(data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });   
   });


   $(document).on("click","#print",function(e){
     e.preventDefault();
       var mode = 'iframe'; // popup
       var close = mode == "popup";
       var options = { mode : mode, popClose : close};
       $("#print_it").printArea(options);
     });



  });

</script>


@endsection