@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Edit Questions
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
  
<div class="row">
  <!-- left column -->
  <div class="col-md-5 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Enter Online Exams Details</h3>
      </div>
      <div class="box-body">
        <form method="post" action="{{route('update-questions',['totalquestions'=>$totalquestions])}}" style="margin :4px;">
          @csrf

          <input type="hidden" name="examsid" value="{{$examsid}}">
          <?php
            $data =['optiona','optiona','optionb','optionc','optiond'];
            $option =['optiona','a','b','c','d'];
            $optionid =['optionid','aid','bid','cid','did'];
          ?>
            <?php
              $loops = 1;
            ?>
          @foreach($questions as $questions)
            
            <div class="form-group  @error('qns{{$loop->iteration}}') has-error @enderror">
                 <label class="control-label" for="inputError">Question number&nbsp;{{$questions->id}} &nbsp;</label>
                 <textarea cols="5" class="form-control" rows="3" placeholder="Write question number {{$loop->iteration}} here..." name="qns{{$loop->iteration}}" >{{$questions->question}}</textarea>
                  <span class="help-block">@error('qns{{$loop->iteration}}') {{ $message }} @enderror</span>
              </div>

            @foreach($questions->qestionOptions as $options)
              <input type="hidden" name="{{$optionid[$loop->iteration]}}{{$loops}}" value="{{$options->id}}">
              <div class="form-group  @error('{{$data[$loop->iteration]}}{{$loops}}') has-error @enderror">
                   <input type="text" class="form-control" value="{{$options->option}}" name="{{$data[$loop->iteration]}}{{$loops}}" id="inputError" placeholder="Enter option {{$option[$loop->iteration]}}">
                    <span class="help-block">@error('{{$data[$loop->iteration]}}{{$questions->id}}') {{ $message }} @enderror</span>
              </div>
              @endforeach

             <div class="form-group  @error('ans'.$loop->iteration.'') has-error @enderror">
                 <label class="control-label" for="inputError">Change Question {{$questions->id}} Answer</label>
                 <select id="ans{{$loop->iteration}}" name="ans{{$loop->iteration}}" placeholder="Choose correct answer " class="form-control" >
                    
                      @foreach($answer as $answers)
                        @if($answers->qestion_option_id == $options->question_id)
                          <option value="{{$answers->alpha}}">{{$answers->option}}</option>
                        @endif
                      @endforeach
                      @foreach($questions->qestionOptions as $options)
                          <option value="{{$option[$loop->iteration]}}">{{$options->option}}</option>
                      @endforeach
                      
            </select>
                  <span class="help-block">@error('ans{{$loop->iteration}}') {{ $message }} @enderror</span>
            </div>

            <br>
             <br>
              <hr class="rule" style="border: 1px solid #ccc;">

                <?php
              $loops++;
            ?>
          @endforeach

            <input type="submit" name="submit" value="Update Questions" class="btn btn-success">

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
