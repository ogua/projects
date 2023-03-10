@extends('layouts.main')


@section('title')
  OSMS | Post Assignment
@endsection

@section('mtitle')
  OSMS Lecturer Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

<div class="row">
  <!-- left column -->
  <div class="col-md-5">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Assignment</h3>
      </div>
      <div class="box-body">
        <form method="post" action="{{route('lecturer-student-assignment-update')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="hiddenid" value="{{$assingment->id}}">
          <div class="form-group @error('programme')has-error @enderror">
                      <label>Programme</label>
                      <select class="form-control" name="programme">
                         <option value="{{$assingment->programme}}">{{$assingment->programme}}</option>
                  @foreach($prog as $row)
                        <option value="{{$row->name}}">{{$row->name}}</option>
                      @endforeach
                      </select>
                      <span class="help-block">@error('programme'){{ $message }}@enderror</span>
                    </div>

          <div class="form-group  @error('coursecode') has-error @enderror">
                 <label class="control-label" for="inputError">Course Code</label>
                 <input type="text" class="form-control"  value="{{ $assingment->course_code }}" name="coursecode" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('coursecode') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('assignmenttitle') has-error @enderror">
                 <label class="control-label" for="inputError">Assignment Title</label>
                 <input type="text"  value="{{ $assingment->assignment_title }}" class="form-control" name="assignmenttitle" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('assignmenttitle') {{ $message }} @enderror</span>
            </div>

             <div class="form-group  @error('assignmentdesc') has-error @enderror">
                 <label class="control-label" for="inputError">Assignment Description</label>
                 <textarea cols="4" rows="4" name="assignmentdesc" class="form-control">{{$assingment->assignment_description}}</textarea>
                  <span class="help-block">@error('assignmentdesc') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('deadline') has-error @enderror">
                 <label class="control-label" for="inputError">Assignment Deadline</label>
                 <input type="date"  value="{{ $assingment->subenddate }}" class="form-control" name="deadline" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('deadline') {{ $message }} @enderror</span>
            </div>

             <div class="form-group  @error('assingmentdoc') has-error @enderror">
                 <label class="control-label" for="inputError">Upload Assignment Doc</label>
                 <input type="file" class="form-control" name="assingmentdoc" id="inputError">
                  <span class="help-block">@error('assingmentdoc') {{ $message }} @enderror</span>
            </div>

                    
            <input type="submit" name="submit" value="Update Assignment" class="btn btn-success">
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
