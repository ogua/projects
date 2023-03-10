@extends('layouts.main')


@section('title')
  OSMS | Add Polls
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


      <div class="row">
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Poll</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <!-- form start -->

                  <form method="post" action="{{route('save-polls')}}" >
                    @csrf
                    <div class="form-group  @error('polltype') has-error @enderror">
                           <label class="control-label" for="inputError">Polls Type</label>
                           <input type="text" class="form-control" value="{{old('polltype')}}" name="polltype" id="inputError" placeholder="Enter ...">
                            <span class="help-block">@error('polltype') {{ $message }} @enderror</span>
                      </div>
                      <input type="submit" name="submit" value="Add Poll" class="btn btn-success">

                  </form>       
                 <!-- / form start -->
               </div>
              </div>
              <!-- /.box -->
            </div>



           <!-- second term -->

            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Poles</h3>
                </div>
                <!-- /.box-header -->
                 <div class="box-body">
                  <!--- table start here -->
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Open Poll For Voting</th>
                          <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($type as $row)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                               <td>{{$row->type}}</td>
                              <td>
                                @if($row->status == 1)
                                  <input type="checkbox" checked data-toggle="toggle" cid="{{$row->id}}" class="checkit" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger">
                                @else
                                  <input type="checkbox" cid="{{$row->id}}" class="checkit" data-toggle="toggle" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger">
                                @endif
                              </td>
                              <td>
                                @if($row->startvote == 1)
                                  <input type="checkbox" checked data-toggle="toggle" cid="{{$row->id}}" class="votenow" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger">
                                @else
                                  <input type="checkbox" cid="{{$row->id}}" class="votenow" data-toggle="toggle" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger">
                                @endif
                              </td>
                              <td><a href="{{route('edit-polls', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a></td>
                            </tr>
                          @endforeach
                        </tbody>
                     </table>

                    <!--- /table start here -->
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





    //Start voting script started here

    //start
    $(document).on("change",".votenow", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      var _token = $('meta[name=csrf-token]').attr('content');
    
      if ($(this).prop('checked')) {
          
        if (confirm("Open Polls For Voting ?")) {
            $.ajax({
                    url: '{{route('start-vote-polls')}}',
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
         
        if (confirm("Close Polls Now !")) {
            $.ajax({
                    url: '{{route('start-vote-polls')}}',
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
