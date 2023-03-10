@extends('layouts.main')


@section('title')
  OSMS | Poll Results
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
                  <h3 class="box-title">Poll Results</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <!-- form start -->

                    <div class="form-group  @error('addposition') has-error @enderror">
                 <label class="control-label" for="inputError">Position</label>
                 <select class="form-control" id="position" name="addposition">
                  <option value="{{old('addposition')}}">{{old('addposition')}}</option>
                  @foreach($positions as $positions)
                  <option value="{{$positions->name}}">{{$positions->name}}</option>
                  @endforeach
                 </select>
                  <span class="help-block">@error('addposition') {{ $message }} @enderror</span>
            </div>

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
                  <h3 class="box-title">Displayed Results</h3>
                </div>
                <!-- /.box-header -->
                 <div class="box-body" id="displayher">

                  <!--- table start here -->
                  
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
                            //$("#displayher").html($data);
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

    $(document).on("change","#position", function(e){
				e.preventDefault();
				var name = $(this).val();
				var _token = $('meta[name=csrf-token]').attr('content');
				//alert(name);
				$.ajax({
                    url: '{{route('gets-results-polls')}}',
                    type: 'POST',
                    data: {_token : _token , name: name},
                    success: function(data){
                        //alert(data);
                        $("#displayher").html(data);
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data).show();
                      }
                });


			});

  });

</script>


@endsection
