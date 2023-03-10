@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Add Quiz
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
  <div class="row">
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Examination</h3>
      </div>
      <div class="box-body">
       <form method="post" action="{{route('save-exams')}}" style="margin :4px;">
          @csrf

          <div class="form-group  @error('examstitle') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Exams Title</label>
                 <input type="text" class="form-control" value="{{old('examstitle')}}" name="examstitle" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('examstitle') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('totalquestions') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Total Of Questions</label>
                 <input type="number" class="form-control" value="{{old('totalquestions')}}" name="totalquestions" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('totalquestions') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('questiontoshow') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Number of Questions to Display </label>
                 <input type="number" class="form-control" value="{{old('questiontoshow')}}" name="questiontoshow" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('questiontoshow') {{ $message }} @enderror</span>
            </div>


             <div class="form-group  @error('rightanswermarks') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Marks For Right Answer</label>
                 <input type="number" class="form-control" value="{{old('rightanswermarks')}}" name="rightanswermarks" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('rightanswermarks') {{ $message }} @enderror</span>
            </div>


            <div class="form-group  @error('wronganswermarks') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Marks For Wrong Answer</label>
                 <input type="number" class="form-control" value="{{old('wronganswermarks')}}" name="wronganswermarks" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('wronganswermarks') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('timelimit') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Time Limit in Minutes</label>
                 <input type="number" class="form-control" value="{{old('timelimit')}}" name="timelimit" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('timelimit') {{ $message }} @enderror</span>
            </div>

            <div class="form-group @error('programme')has-error @enderror">
                      <label>Programme</label>
                      <select class="form-control" name="programme">
                          <option>{{ old('programme') }}</option>
                  @foreach($prog as $row)
                        <option value="{{$row->name}}">{{$row->name}}</option>
                      @endforeach
                      </select>
                    <span class="help-block">@error('programme'){{ $message }}@enderror</span>
                    </div>

            <div class="form-group  @error('coursecode') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Course Code</label>
                 <input type="text" class="form-control" value="{{old('coursecode')}}" name="coursecode" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('coursecode') {{ $message }} @enderror</span>
            </div>


            <div class="form-group  @error('descexams') has-error @enderror">
                 <label class="control-label" for="inputError">Exams Description</label>
                 <textarea cols="3" class="form-control" rows="3" name="descexams">{{old('descexams')}}</textarea>
                  <span class="help-block">@error('descexams') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('retry') has-error @enderror">
                 <label class="control-label" for="inputError">Retry Multiple Times</label>
                  <select class="form-control" name="retry">
                    <option value="{{old('retry')}}">{{old('retry')}}</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  <span class="help-block">@error('descexams') {{ $message }} @enderror</span>
            </div>

            <input type="submit" name="submit" value="Add Exams" class="btn btn-success">

        </form> 
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>
      <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>title</th>
                  <th>Programme</th>
                  <th>Course code</th>
                  <th>Minutes</th>
                  <th>TQ</th>
                  <th>Show</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($exams as $row)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$row->title}}</td>
                          <td>{{$row->programme}}</td>
                          <td>{{$row->coursecode}}</td>
                          <td>{{$row->minutes}} min</td>
                         <td>{{$row->totalquestion}}</td>
                         <td>{{$row->questiontoshow}}</td>
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
