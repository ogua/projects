@extends('layouts.main')


@section('title')
  OSMS | Edit Uploaded Timetable
@endsection

@section('mtitle')
  Edit Uploaded Timetable
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
        <h3 class="box-title">Edit Uploaded Timetable</h3>
      </div>
      <div class="box-body">
            <div id="displayhere"></div>

            <form method="post" action="{{route('update-timetable')}}" id="getTmetable" enctype="multipart/form-data">
                    @csrf

            <input type="hidden" name="hiddenid" value="{{$timetable->id}}">
                    <div class="form-group @error('level')has-error @enderror">
                    <label>Level</label>
                    <select class="form-control" name="level" id="level" required>
                        <option value="{{ $timetable->level }}">{{ $timetable->level }}</option>
                         <option>-------------------</option>
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
                        <option value="{{ $timetable->session }}">{{ $timetable->session }}</option>
                         <option>-------------------</option>
                                <option value="Morning Session">Morning Session</option>
                                <option value="Evening Session">Evening Session</option>
                                <option value="Weekend Session">Weekend Session</option>
                    </select>
                    <span class="help-block" id="sessionerror" style="color: red;">@error('session'){{ $message }}@enderror</span>
                    </div>

                    <div class="form-group @error('type')has-error @enderror">
                    <label>Type</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="{{ $timetable->type }}">{{ $timetable->type }}</option>
                                 <option>-------------------</option>
                                <option value="DEGREE">Degree</option>
                                <option value="DIPLOMA">Diploma</option>
                                <option value="MASTER">Masters</option>
                    </select>
                    <span class="help-block" id="sessionerror" style="color: red;">@error('type'){{ $message }}@enderror</span>
                    </div>


                    <div class="form-group @error('pdf-file')has-error @enderror">
                    <label>Upload New Pdf File</label>
                    <input type="file" name="pdf-file" accept="application/pdf" class="form-control" >
                    <span class="help-block" id="pdferror" style="color: red;">@error('pdf-file'){{ $message }}@enderror</span>
                    </div>


                     <input type="submit" name="submit" value="Update Timetable" class="btn btn-success">

                </form>
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
    $("#pdferror").text('');
            $.ajax({
                    url: '{{route('update-timetable')}}',
                    type: 'POST',
			        contentType: false,
			        processData: false,
			        cache: false,
                    dataType: 'json',
			        data: new FormData(this),
                    success: function(data){ 
                       $("#displayhere").html(data.success);
                    },
                      error: function (xhr, status, data) {
                        if (xhr.status == 400) {
                           $("#pdferror").text("Please upload only pdf files");
                        }
                      }
                });   
   });


                    $(document).on("click","#print",function(e){
   	                   $('#timetable').DataTable({
					       dom: 'lBfrtip',
					       buttons: [
					          'copy',
					          'csv',
					          'excel',
					          'pdf',
					          'print'
					      ]
					    });
                    });



  });

</script>


@endsection