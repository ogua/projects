@extends('layouts.main')


@section('title')
  OSMS | Online Polls
@endsection

@section('mtitle')
  Polls Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

      @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Success!</h4>
                          {{ session('message') }}
        </div>
      @endif

      <div id="displayfeedback"></div>

            <div class="row">
      
                <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Start Polls</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="updatevoting">
                <!-- form start -->

                  <table id="example18" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th colspan="6">Position {{$position->name}}</th>
                  </tr>
                <tr>
                  <th>#</th>
                  <th>Img</th>
                  <th>Index Number</th>
                  <th>Fullname</th>
                  <th>Positions</th>
                  <th>Vote</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($candidates as $row)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        @foreach($users as $user)
                          @if($user->id == $row->user_id)
                            <img src="{{asset('storage')}}/{{$user->pro_pic}}" class="img-circle"width="50" height="50">
                          @endif
                        @endforeach
                      </td>
                      <td>{{$row->indexnumber}}</td>
                          <td>{{$row->fullname}}</td>
                          <td>{{$row->position}}</td>
                          <input type="hidden" value="{{$row->position}}" id="position_{{$row->id}}">

                          @if(!empty($vote))
                            <td><input type="radio" name="radio" id="votecheck_{{$row->id}}" cid="{{$row->id}}"   class="radioinput" value="{{$row->fullname}}" checked="true"></td>
                          @else
                             <td><input type="radio" name="radio" id="votecheck_{{$row->id}}" cid="{{$row->id}}"   class="radioinput" value="{{$row->fullname}}"></td>
                          @endif
                    </tr>
                  @endforeach
                  <tr>
                    <td colspan="2"><a href="#" id="getids" cid="{{$position->id}}" class=" btn pull-right btn-info">&larr; Previous</a></td>
                    <td colspan="2"></td>
                    <td colspan="2"><a href="#" id="getid" cid="{{$position->id}}" class=" btn btn-info">&rarr; Next</a></td>
                  </tr>
                </tbody>
             </table>

                 <!-- / form start -->
                </div>
              </div>
              <!-- /.box -->
            </div>



           
        </div>




@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    //start
    $(document).on("click","#getid", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      $("#displayfeedback").text('');
      var _token = $('meta[name=csrf-token]').attr('content');      
            $.ajax({
                    url: '{{route('vote-next')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid},
                    success: function(data){
                      if(data.match("finished")){
                         alert("Voting Completed Successfully!");
                          window.location.href='/Polls/vote'; 
                      }else{
                         $("#updatevoting").html(data);
                      }
						         
                    },
                      error: function (data) {
                        console.log('Error:', data);
                       
                      }
                });      
    });

    //Previous
     $(document).on("click","#getids", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
       $("#displayfeedback").text('');
      var _token = $('meta[name=csrf-token]').attr('content');      
            $.ajax({
                    url: '{{route('vote-previous')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid},
                    success: function(data){
                        if (data == "") {
                          alert('Voting Starts From Here');
                        }else{
                          $("#updatevoting").html(data);
                        }
                    },
                      error: function (data) {
                        console.log('Error:', data);
                      }
                });      
    });
    //end


    $(document).on("click",".radioinput", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      var position = $("#position_"+cid).val();
      var name = $(this).val();
      var _token = $('meta[name=csrf-token]').attr('content');      
        if (confirm("Do you want to vote for "+ name)) {
            $.ajax({
                    url: '{{route('vote-save')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, position: position, name: name},
                    success: function(data){
                      $("#votecheck_"+cid).prop("checked",true);
                      $("#displayfeedback").html(data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                      }
                });
          }        
    });


  });

</script>


@endsection
