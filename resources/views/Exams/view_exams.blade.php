@extends('layouts.main')


@section('title')
  OSMS | Online Examination - View Examinations
@endsection

@section('mtitle')
  Examination Management
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
        <h3 class="box-title">View Examination</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>title</th>
                  <th>Programme</th>
                  <th>Course code</th>
                  <th>Minutes</th>
                  <th>Marks</th>
                  <th>Description</th>
                  <th width="20%">Action</th>
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
                          <td>{{$row->totalquestion * $row->mfr}}</td>
                          <td>{{$row->description}}</td>
                      <td><a href="{{route('start-exmas-score', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-eye'></i>Score</a>               

                        <a href="{{route('lecturer-exam-view', ['id'=>$row->id])}}" class="btn btn-success" ><i class='fa fa-eye'></i>View Questions</a>

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
