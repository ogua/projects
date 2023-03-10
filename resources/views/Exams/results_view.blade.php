@extends('layouts.main')


@section('title')
  OSMS | Online Examination - View Results
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
  
<div class="row">
  <!-- left column -->
  <div class="col-md-7 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Try Examination Results</h3>
      </div>
      <div class="box-body">
        
                <?php
                  $loops = 1; 
              ?>

                @foreach($examsresults as $results)
                  <?php 
                    $questions = App\Question::where('id',$results->question_id)
                    ->with('qestionOptions')
            ->get();
                  ?>
                  @foreach($questions as $question)
                    <b>Question &nbsp;  {{$loops}} &nbsp;::<br />
              {{$question['question']}}</b>

            @if($results->status == 'correct')
              <div class="form-group">
                  @foreach($question->qestionOptions as $options)
                    @if($options['id'] == $results->option_id)
                    <div class="radio">
                                <label>
                                  <input type="radio" name="ans{{$loops}}" id="optionsRadios1" value="{{$options['id']}}" checked>
                                  {{$options['option']}}
                                </label>
                             </div>

                             @else

                             <div class="radio">
                                <label>
                                  <input type="radio" name="ans{{$loops}}" id="optionsRadios1" value="{{$options['id']}}" >
                                  {{$options['option']}}
                                </label>
                             </div>
                        @endif
                       @endforeach
                      </div>
            @else
              <div class="form-group has-error">
                  @foreach($question->qestionOptions as $options)
                    @if($options['id'] == $results->option_id)
                    <div class="radio">
                                <label>
                                  <input type="radio" name="ans{{$loops}}" id="optionsRadios1" value="{{$options['id']}}" checked>
                                  {{$options['option']}}
                                </label>
                             </div>

                             @else

                             <div class="radio">
                                <label>
                                  <input type="radio" name="ans{{$loops}}" id="optionsRadios1" value="{{$options['id']}}" >
                                  {{$options['option']}}
                                </label>
                             </div>
                        @endif
                       @endforeach
                      </div>
            @endif  
  
              <b>Answer &nbsp; 
              {{$results->answer}}</b> <br><br>

            <hr>
                  
                  @endforeach
          <?php
                    $loops++;
                ?>
                @endforeach
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

   function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var myVar = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            //timer = duration;
             clearInterval(myVar);
             submitform();
        }
    }, 1000);
}




  });

</script>




<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("timer");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
@endsection
