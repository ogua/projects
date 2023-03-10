@extends('layouts.main')


@section('title')
  OSMS | Upload Timetable
@endsection

@section('mtitle')
  Upload Timetable
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
<div class="row">
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Upload Timetable</h3>
      </div>
      <div class="box-body">
        <div id="displayhere"></div>

            <form method="post" action="{{route('save-timetable')}}" id="getTmetable" enctype="multipart/form-data">
          @csrf
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

                    <div class="form-group @error('type')has-error @enderror">
                    <label>Type</label>
                    <select class="form-control" name="type" id="type" required>
                        <option>{{ old('type') }}</option>
                                <option value="DEGREE">Degree</option>
                                <option value="DIPLOMA">Diploma</option>
                                <option value="MASTER">Masters</option>
                    </select>
                    <span class="help-block" id="sessionerror" style="color: red;">@error('type'){{ $message }}@enderror</span>
                    </div>


                    <div class="form-group @error('pdf-file')has-error @enderror">
                    <label>Pdf File</label>
                    <input type="file" name="pdf-file" id="pdf-file" accept="application/pdf" class="form-control" required>
                    <span class="help-block" id="pdferror" style="color: red;">@error('pdf-file'){{ $message }}@enderror</span>
                    </div>


                     <input type="submit" name="submit" value="Upload Timetable" class="btn btn-success">

                </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Level</th>
                  <th>Session</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($timetable as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                       <td>{{$row->level}}</td>
                          <td>
                          {{$row->session}}
                          </td>
                          <td>
                          {{$row->type}}
                          </td>
                          <td>
                            <a href="{{route('edit-timetable', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a>

                            <a href="{{route('delete-timetable', ['id'=>$row->id])}}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" ><i class='fa fa-trash'></i>Delete</a>

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

   $(document).on("submit","#getTmetable",function(e){
   	e.preventDefault();  
    $("#pdferror").text('');
            $.ajax({
                    url: '{{route('save-timetable')}}',
                    type: 'POST',
			        contentType: false,
			        processData: false,
			        cache: false,
                    dataType: 'json',
			        data: new FormData(this),
                    success: function(data){ 
                       $("#displayhere").html(data.success);
                       clearallfield();
                    },
                      error: function (xhr, status, data) {
                        if (xhr.status == 400) {
                           $("#pdferror").text("Please upload only pdf files");
                        }
                      }
                });   
   });


   function clearallfield(){
      $("#level").val('');
      $("#session").val('');
      $("#type").val('');
      $("#pdf-file").val('');
   }


         //            $(document).on("click","#print",function(e){
   	     //               $('#timetable').DataTable({
					    //    dom: 'lBfrtip',
					    //    buttons: [
					    //       'copy',
					    //       'csv',
					    //       'excel',
					    //       'pdf',
					    //       'print'
					    //   ]
					    // });
         //            });



  });

</script>


@endsection