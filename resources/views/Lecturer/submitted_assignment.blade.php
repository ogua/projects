@extends('layouts.main')


@section('title')
  OSMS | Submitted Assignments
@endsection

@section('mtitle')
  OSMS Lecturer Management
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
        <h3 class="box-title">Submitted Assignments</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th colspan="7">Online Assignments Posted by {{auth()->user()->name}}</th>
                      </tr>
                    <tr>
                      <th>#</th>
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>Level</th>
                      <th>Doc</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($assingment as $row)
                        <tr>
                          <td>
                      {{$loop->iteration}}
                          </td>
                          <td>{{$row->studentid}}</td>
                          <td>{{$row->studentname}}</td>
                          <td>
                            @foreach($user as $users)
                              @if($users->indexnumber == $row->studentid)
                              {{$users->currentlevel}} 
                              @endif
                            @endforeach
                          </td>
                          <td>
                            <a href="{{asset('storage')}}/{{$row->studoc}}" target="_blank" class="btn btn-success" ><i class='fa fa-download'></i></a>
                          </td>
                          <!-- <td>
                            <input type="number" name="marks" class="form-control marks_{{$row->id}}">
                          </td>
                          <td>
                            <a href="{{route('lecturer-student-assignment-delete', ['id'=>$row->id])}}" onclick="return  confirm('Are you sure You want to Delete')" title="Delete" class="btn btn-info" ><i class='fa fa-check-square-o'></i>Submit</a>
                          </td> -->
                          
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
    $(document).on("change",".checkit", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      var _token = $('meta[name=csrf-token]').attr('content');
    
      if ($(this).prop('checked')) {
          
        if (confirm("Confirm Academic Year Activation")) {
            $.ajax({
                    url: '{{route('academic-year-update-status')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, status: 1},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            alert(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

          }


      }else{
         
        if (confirm("Confirm Academic Year Deactivation !")) {
            $.ajax({
                    url: '{{route('academic-year-update-status')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, status: 0},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            alert(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

          }

      }
          
     
    });
    //end

  });

</script>


@endsection
