@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Examinations Score
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
        <h3 class="box-title">Examination Score</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>img</th>
                  <th>Fullname</th>
                  <th>Index Number</th>
                  <th>Score</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($score as $row)
                    <tr>
                      <td>
                        {{$loop->iteration}}
                      </td>
                      <td>
                        @foreach($user as $users)
                          @if($users->id == $row->user_id)
                            <img src="{{asset('storage')}}/{{$users->pro_pic}}" height="50" width="50" class="img-circle">
                          @endif
                        @endforeach
                      </td>

                          <td>
                        @foreach($user as $users)
                          @if($users->id == $row->user_id)
                            {{$users->name}}
                          @endif
                        @endforeach
                      </td>

                       <td>
                        @foreach($user as $users)
                          @if($users->id == $row->user_id)
                            {{$users->indexnumber}}
                          @endif
                        @endforeach
                      </td>

                      <td>
                        {{$row->score}}
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
