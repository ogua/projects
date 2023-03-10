@extends('layouts.main')


@section('title')
  OSMS | Student Results
@endsection

@section('mtitle')
  OSMS Lecturer Management
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
        <h3 class="box-title">REEnter Student Results</h3>
      </div>
      <div class="box-body">
        <form action="{{ route('lecturer-student-results-resave') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group @error('indexnumber')has-error @enderror">
                        <label class="control-label" for="inputSuccess">Student Index Number</label>
                        <input type="text" class="form-control" name="indexnumber" value="{{ old('indexnumber') }}" id="indexnumber" placeholder="Enter ...">
                        <span class="help-block">@error('indexnumber'){{ $message }}@enderror</span>
                    </div>

                   


                </div>

                <div class="col-md-4">
                    <div class="form-group @error('courcecode')has-error @enderror">
                        <label class="control-label" for="inputSuccess">Course Code</label>
                        <input type="text" class="form-control" name="courcecode" value="{{ old('courcecode') }}" id="courcecode" placeholder="Enter ...">
                        <span class="help-block">@error('courcecode'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" style="margin-top: 26px;">
                      <a href="#" class="btn btn-success" id="search">Search</a>
                    </div>
                </div>

                
            </div>



            <div class="row">
                <div class="col-md-6">
                     <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Fullname</label>
                        <input type="text" class="form-control" value="{{ old('fullname') }}"  name="fullname" id="fullname" placeholder="Enter ...">
                        <span class="help-block">@error('fullname'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group @error('iamarks') has-error @enderror">
                        <label class="control-label" for="inputSuccess">IA (Mid-Sem)Marks</label>
                        <input type="number" class="form-control" value="{{ old('iamarks') }}"  name="iamarks" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('iamarks'){{ $message }}@enderror</span>
                    </div>

                    <div class="form-group @error('exmasmarks') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Exams Marks</label>
                        <input type="Number" class="form-control" value="{{ old('exmasmarks') }}"  name="exmasmarks" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('exmasmarks'){{ $message }}@enderror</span>
                    </div>


                </div>

                
            </div>




            <input type="submit" class="btn btn-info" value="Update Result">
            </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    //start
    $(document).on("click","#search", function(e){
      e.preventDefault();
      var indexnumber = $("#indexnumber").val();
      var cousercode = $("#courcecode").val();

      if (indexnumber == "" || cousercode == "") {
      	alert("Index Number or Course Code Cant Be Empty!");
      	return;
      }
      var _token = $('meta[name=csrf-token]').attr('content');
    
    	//alert(indexnumber+cousercode);

            $.ajax({
                    url: '{{route('lecturer-student-fullname')}}',
                    type: 'POST',
                    data: {_token : _token , indexnumber: indexnumber, cousercode: cousercode},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            //alert(data.msg);
                            $("#error").hide();
                            $("#fullname").val(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });       
     
    });
    //end

  });

</script>


@endsection
