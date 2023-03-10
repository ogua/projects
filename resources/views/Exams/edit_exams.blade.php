@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Edit Quiz
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')


<div class="row">
  <!-- left column -->
  <div class="col-md-4">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Examination</h3>
      </div>
      <div class="box-body">
        <form method="post" action="{{route('update-exams')}}" style="margin :4px;">
          @csrf

          <input type="hidden" name="hiddenid" value="{{$exams->id}}">

          <div class="form-group  @error('examstitle') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Exams Title</label>
                 <input type="text" class="form-control" value="{{$exams->title}}" name="examstitle" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('examstitle') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('totalquestions') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Total Of Questions</label>
                 <input type="number" class="form-control" value="{{$exams->totalquestion}}" name="totalquestions" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('totalquestions') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('questiontoshow') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Number of Questions to Display </label>
                 <input type="number" class="form-control" value="{{$exams->questiontoshow}}" name="questiontoshow" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('questiontoshow') {{ $message }} @enderror</span>
            </div>

             <div class="form-group  @error('rightanswermarks') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Marks For Right Answer</label>
                 <input type="number" class="form-control" value="{{$exams->mfr}}" name="rightanswermarks" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('rightanswermarks') {{ $message }} @enderror</span>
            </div>


            <div class="form-group  @error('wronganswermarks') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Marks For Wrong Answer</label>
                 <input type="number" class="form-control" value="{{$exams->mfw}}" name="wronganswermarks" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('wronganswermarks') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('timelimit') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Time Limit in Minutes</label>
                 <input type="number" class="form-control" value="{{$exams->minutes}}" name="timelimit" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('timelimit') {{ $message }} @enderror</span>
            </div>

            <div class="form-group @error('programme')has-error @enderror">
                      <label>Programme</label>
                      <select class="form-control" name="programme">
                        <option value="{{$exams->programme}}">{{$exams->programme}}</option>
                          <option>{{ old('programme') }}</option>
                  @foreach($prog as $row)
                        <option value="{{$row->name}}">{{$row->name}}</option>
                      @endforeach
                      </select>
                    <span class="help-block">@error('programme'){{ $message }}@enderror</span>
                    </div>

            <div class="form-group  @error('coursecode') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Course Code</label>
                 <input type="text" class="form-control" value="{{$exams->coursecode}}" name="coursecode" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('coursecode') {{ $message }} @enderror</span>
            </div>


            <div class="form-group  @error('descexams') has-error @enderror">
                 <label class="control-label" for="inputError">Exams Description</label>
                 <textarea cols="3" class="form-control" rows="3" name="descexams">{{$exams->description}}</textarea>
                  <span class="help-block">@error('descexams') {{ $message }} @enderror</span>
            </div>
            <div class="form-group  @error('retry') has-error @enderror">
                 <label class="control-label" for="inputError">Retry Multiple Times</label>
                  <select class="form-control" name="retry">
                    <option value="{{$exams->retry}}">{{$exams->retry}}</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  <span class="help-block">@error('descexams') {{ $message }} @enderror</span>
            </div>

            <input type="submit" name="submit" value="Update Information" class="btn btn-success">

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
