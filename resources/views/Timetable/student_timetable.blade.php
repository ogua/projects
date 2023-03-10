@extends('layouts.main')


@section('title')
  OSMS | Student Timetable
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
        <h3 class="box-title">Timetable</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Level</th>
                  <th>Session</th>
                  <th>Type</th>
                  <th>Semester</th>
                  <th>Academic Year</th>
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
                          {{$row->semester}}
                          </td>
                          <td>
                          {{$row->academicyear}}
                          </td>
                          <td>
                            <a href="{{asset('storage')}}/{{$row->url}}" target="_blank"  class="btn btn-info" ><i class='fa fa-download'></i></a>
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