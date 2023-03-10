@extends('layouts.main')


@section('title')
  OSMS | Edit Candidate Info
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

      @if (session()->has('messages'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    {{ session('messages') }}
                </div>
      @endif

            <div class="row">
      
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Candidate Info</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <!-- form start -->

                <form method="post" action="{{route('update-candidate-info')}}" >
          @csrf

          <input type="hidden" name="hiddenid" value="{{$candidate->id}}">

          <div class="form-group  @error('indexnumber') has-error @enderror">
                 <label class="control-label" for="inputError">Index Number</label>
                 <input type="text" class="form-control" value="{{$candidate->indexnumber}}" name="indexnumber" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('indexnumber') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('fullname') has-error @enderror">
                 <label class="control-label" for="inputError">Fullname</label>
                 <input type="text" class="form-control" value="{{$candidate->fullname}}" name="fullname" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('fullname') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('addposition') has-error @enderror">
                 <label class="control-label" for="inputError">Position</label>
                 <select class="form-control" name="addposition">
                  <option value="{{$candidate->position}}">{{$candidate->position}}</option>
                  @foreach($positions as $positions)
                  <option value="{{$positions->name}}">{{$positions->name}}</option>
                  @endforeach
                 </select>
                  <span class="help-block">@error('addposition') {{ $message }} @enderror</span>
            </div>
            <input type="submit" name="submit" value="Update Candidate info" class="btn btn-success">

        </form> 

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
