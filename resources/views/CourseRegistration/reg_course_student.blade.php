@extends('layouts.main')


@section('title')
  OSMS | Course Registration
@endsection

@section('mtitle')
  Course Registration
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

    <div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>
      <div class="box-body">
        @if(!$course->isEmpty())    
          <a href="{{route('student-print-course',['prog'=>$studentinfo->programme, 'currentlevel'=>$studentinfo->currentlevel,'semester'=>$semester, 'academicyear'=>$academicyear])}}" class="btn btn-success">Print Course Registered</a>
        @else
        <form method="post" action="{{route('student-reg-course-now',['prog'=>$studentinfo->programme, 'currentlevel'=>$studentinfo->currentlevel,'semester'=>$semester, 'academicyear'=>$academicyear])}}">
          @csrf
            <input type="submit" name="submit" value="Register Couses Now" class="btn btn-success">
        </form>
        @endif
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>
      <div class="box-body">
        <table id="example3" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th colspan="4">Couses Registered For {{$academicyear}} Academic Year</th>
                      </tr>
                    <tr>
                      <th>#</th>
                      <th>Couse Code</th>
                      <th>Couse Title</th>
                      <th>Credit Hours</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($course as $courses)
                      <tr>
                        <td>{{$courses->id}}</td>
                        <td>{{$courses->cource_code}}</td>
                        <td>{{$courses->cource_title}}</td>
                        <td>{{$courses->credithours}}</td>
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
