@extends('layouts.main')


@section('title')
  OSMS | Manage Candidates
@endsection

@section('mtitle')
  Polls Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
      @if($positions == 'null')

      <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    Please make sure, there is an active poll
      </div>

    @else


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
                  <h3 class="box-title">Add Candidate</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <!-- form start -->

                <form method="post" action="{{route('add-candidates-save')}}" >
          @csrf

          <input type="hidden" name="votetype" value="{{$type->id}}">

          <div class="form-group  @error('indexnumber') has-error @enderror">
                 <label class="control-label" for="inputError">Index Number</label>
                 <input type="text" class="form-control" value="{{old('indexnumber')}}" name="indexnumber" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('indexnumber') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('fullname') has-error @enderror">
                 <label class="control-label" for="inputError">Fullname</label>
                 <input type="text" class="form-control" value="{{old('fullname')}}" name="fullname" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('fullname') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('addposition') has-error @enderror">
                 <label class="control-label" for="inputError">Position</label>
                 <select class="form-control" name="addposition">
                  <option value="{{old('addposition')}}">{{old('addposition')}}</option>
                  @foreach($positions as $positions)
                  <option value="{{$positions->name}}">{{$positions->name}}</option>
                  @endforeach
                 </select>
                  <span class="help-block">@error('addposition') {{ $message }} @enderror</span>
            </div>
            <input type="submit" name="submit" value="Add Candidate" class="btn btn-success">

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
                  <h3 class="box-title">All Candidates</h3>
                </div>
                <!-- /.box-header -->
                 <div class="box-body">

                  <!--- table start here -->
                    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Img</th>
                  <th>Index Number</th>
                  <th>Fullname</th>
                  <th>Positions</th>
                  <th>Edit</th>
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
                      <td><a href="{{route('edit-candidates', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a></td>
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
            


    @endif

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
