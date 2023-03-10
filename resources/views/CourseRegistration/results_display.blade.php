@extends('layouts.main')


@section('title')
  OSMS | Student Portal
@endsection

@section('mtitle')
  OSMS Student Portal
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
        <h3 class="box-title">Student Portal</h3>
      </div>
      <div class="box-body">
        <div class="row" >
          <div class="col-md-2">
            <img width="50" height="100"src="{{URL::to('images/UPSA.png')}}"/>
          </div>
      <div class="col-md-8">
        <h1 class="text-center">Ogua College Management System</h1>
        <hr>
        <h3 class="text-center">Transcript of Academic Record</h3>
        <h3 class="text-center">Academic Affairs Directorate</h3>
        
        <div class="row">
          <div class="col-md-8">
            <ul class="list-unstyled">
              <li>Name: {{$studentinfo->fullname}}</li>
              <li>Date of Birth: {{$studentinfo->dateofbirth}}</li>
              <li>Programme: {{$studentinfo->programme}}</li>
          </ul>
          </div>
           <div class="col-md-4">
              <ul class="list-unstyled pull-right">
                <li>Student Number: {{$studentinfo->indexnumber}}</li>
                <li >Sex: {{$studentinfo->gender}}</li>
                <li >Period: {{$studentinfo->admitted}}</li>
               </ul>
           </div>
        </div>
        
      </div>
      <div class="col-md-2">
        <img class="pull-right"width="150" height="150"src="{{asset('storage')}}/{{auth()->user()->pro_pic}}"/>
      </div>

    </div>

      <br><br>
       <div class="clearfix">
     <!--  Student Information -->
        @foreach($regsem as $regesms)
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th colspan="2" bgcolor="#ccc">{{$regesms->academicyear}} Academic Year {{$regesms->semester}}</th>
                      <th bgcolor="#ccc" class="text-center">Credits</th>
                      <th bgcolor="#ccc" class="text-center">Grade</th>
                      <th bgcolor="#ccc" class="text-center">Grade Points</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($course as $row)
                        @if($regesms->academicyear ==  $row->academic_year && $regesms->semester == $row->semester)
                              <tr>
                                <td>{{$row->cource_code}}</td>
                                <td>{{$row->cource_title}}</td>
                                <td class="text-center">{{$row->credithours}}</td>
                                <td class="text-center">{{$row->grade}}</td>
                                <td class="text-center">{{$row->total_gp}}</td>
                              </tr>
                          @endif
                      @endforeach
                      
                    </tbody>
                 </table>
            
                 @foreach($examsresults as $reslts)
                     @if($regesms->academicyear ==  $reslts->year && $regesms->semester == $reslts->semester)
                    <ul class="list-inline" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;background-color: #ccc;">
                      <li>TCR: {{$reslts->credithours}}</li>
                      <li>TGP: {{$reslts->totalgp}}</li>
                      <li>GPA: {{$reslts->totalgp/$reslts->credithours}}</li>
                      <li>CCR: {{$reslts->totalgp}}</li>
                      <li>CGV: {{$reslts->credithours}}</li>
                      <li>CGPA: {{$reslts->gpa}}</li>
                    </ul>
                    @endif
                  @endforeach
              @endforeach
              
          <!-- /.box -->

        </div>

          <br><br>

          <div class="container text-center" style="padding: 15px;width: 70%;">
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(substr(auth()->user()->indexnumber,3), 'S25+')}}" alt="barcode" />
            <br/>
            <br/>
            
          </div>

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
