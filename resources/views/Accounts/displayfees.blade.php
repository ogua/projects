@extends('layouts.main')


@section('title')
  OSMS | Student Portal
@endsection

@section('mtitle')
  OSMS Student Fees Information
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

  <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <a href="{{ route('search_student') }}" class="btn btn-success">&larr;back</a>
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Student Fees Information</h3>
      </div>
      <div class="box-body">
          <div class="col-md-2">
            <img width="50" height="100"src="{{URL::to('images/UPSA.png')}}"/>
          </div>
      <div class="col-md-8">
        <h1 class="text-center">Ogua College Management System</h1>
        <hr>
        <h3 class="text-center">Student Fees Information</h3>        
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
        <img class="pull-right"width="150" height="150" 
        src="{{asset('storage')}}/{{$user->pro_pic}}"/>
      </div>

      
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Student Fees Information </h3>
      </div>
      <div class="box-body">
          <div class="box-body table-responsive">

                  <!--- table start here -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Fee Title</th>
                      <th>Fee Code</th>
                      <th>Fee</th>
                      <th>Paid</th>
                      <th>Owed</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($semesterfee as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$row->fee}}</td>
                          <td>{{$row->feecode}}</td>
                          <td>GH &cent;{{$row->feeamount}}.00</td>
                          <td>GH &cent;{{$row->paid}}.00</td>
                          <td>GH &cent;{{$row->owed}}.00</td>
                        </tr>
                      @endforeach
                    </tbody>
                 </table>
                    <!--- /table start here -->
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
