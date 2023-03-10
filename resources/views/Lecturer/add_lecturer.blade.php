@extends('layouts.main')


@section('title')
  OSMS | Add Lecturer
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
        <h3 class="box-title">Add A Lecturer</h3>
      </div>
      <div class="box-body">
        <form action="{{ route('lecturer-reg-lecturer-save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('fullname')has-error @enderror">
                        <label class="control-label" for="inputSuccess">Fullname</label>
                        <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('fullname'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @error('gender')has-error @enderror">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option>{{ old('gender') }}</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <span class="help-block">@error('gender'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('dateofbirth') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Date of Birth</label>
                        <input type="date" class="form-control" value="{{ old('dateofbirth') }}"  name="dateofbirth" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('dateofbirth'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @error('faculty') has-error @enderror">
                    <label>Faculty</label>
                    <select class="form-control" name="faculty">
                    <option>{{ old('faculty') }}</option> 
                    @foreach($faculty as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                    </select>
                    <span class="help-block">@error('faculty'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('religion') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Religion</label>
                        <input type="text" class="form-control" value="{{ old('religion') }}" name="religion" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('religion'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-md-6">
                <div class="form-group @error('mobile') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Mobile Number</label>
                        <input type="text" class="form-control" value="{{ old('mobile') }}" name="mobile" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('mobile'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('qualification') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Qualification</label>
                        <input type="text" class="form-control" value="{{ old('qualification') }}" name="qualification" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('qualification'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @error('email') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Email</label>
                        <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('email'){{ $message }}@enderror</span>
                    </div>
                </div>

                
            </div>

             <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('courses') has-error @enderror ">
                        <label>Assgn Courses to Lecturer</label>
                        <select class="form-control select2" name="courses[]" multiple="multiple" required>
                          @foreach($courses as $row)
                             <option value="{{$row->code}}">{{$row->title}} - {{$row->code}} </option>
                          @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group @error('address') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Address</label>
                        <textarea class="form-control" name="address" cols="4" rows="4" placeholder="Enter Address..">{{ old('address') }}</textarea>
                        <span class="help-block">@error('address'){{ $message }}@enderror</span>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('image') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Pic</label>
                        <input type="file" class="form-control"name="image" id="inputSuccess">
                        <span class="help-block">@error('image'){{ $message }}@enderror</span>
                    </div>
                </div>
                
                
            </div>


            <input type="submit" class="btn btn-info" value="Add Lecturer">
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
