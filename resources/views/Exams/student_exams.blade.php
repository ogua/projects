@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Student View Examinations
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

<div class="alert alert-danger">
  Please Dont Refresh Your Browser when Exams is in Session
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Student Online Examination</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>title</th>
                  <th>Programme</th>
                  <th>Course code</th>
                  <th>Minutes</th>
                  <th>Description</th>
                  <th>Total Questions</th>
                  <th>Retryable</th>
                  <th>Start</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($exams as $row)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$row->title}}</td>
                          <td>{{$row->programme}}</td>
                          <td>{{$row->coursecode}}</td>
                          <td>{{$row->minutes}} min</td>
                          <td>{{$row->description}}</td>
                       <td>{{$row->questiontoshow}}</td>
                       <td>{{$row->retry}}</td>

                       <?php
                         $core = \App\ExamScore::where('exam_id',$row->id)
                           ->where('user_id',auth()->user()->id)->first();
                        ?>
                        <!-- Check if exams has retry -->
                        @if($row->retry == 'Yes')

                            <td>
                              <a href="{{route('start-exmas-now', ['id'=>$row->id])}}" class="btn btn-info" onclick="return confirm('Start Examination Now')"> <i class="fa fa-refresh"> </i>Try Exams</a>
                            </td>

                        @else

                            @if($core)

                              <td>
                                  <a href="#" class="btn btn-danger"><i class="fa fa-refresh"></i>Completed</a>
                              </td>

                            @else
                               <td>
                                  <a href="{{route('start-exmas-now', ['id'=>$row->id])}}" class="btn btn-info" onclick="return confirm('Start Examination Now, Once started, You can Start it again')"> <i class="fa fa-windows"> </i>Start Exams</a>
                              </td>

                            @endif

                        @endif
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
          
        if (confirm("Activate This Poll")) {
            $.ajax({
                    url: '{{route('confirm-polls')}}',
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
         
        if (confirm("Deactivate this Poll !")) {
            $.ajax({
                    url: '{{route('confirm-polls')}}',
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
