@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Start Exams
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

<div class="row" id="timer" style="background-color: #fff;">
  <div class="col-md-7 col-md-offset-2">
   <h2>Timer <span id="time">{{$mins}}</span></h2>
 </div>
</div> 

<div class="row">
  <!-- left column -->
  <div class="col-md-7 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Start Exams</h3>
      </div>
      <div class="box-body">
          <form method="post" action="{{route('submit-exams')}}" id="formsubmit">
          @csrf

          <input type="hidden" name="examsid" value="{{$examsid}}">

          <input type="hidden" name="examtotal" value="{{$examtot}}">
          
          <?php
              $loops = 1; 
          ?>

          @foreach($questions as $stuquestion)
            @php
              $qestion = \App\Question::where('id',$stuquestion->question_id)->first();
            @endphp

            <b>Question &nbsp;  {{$loops}} &nbsp;::<br />
            {{$qestion->question}}</b>
            <input type="hidden" name="que{{$loops}}" value="{{$qestion->id}}">
                
            <div class="form-group">
            @php
              $qestionoption = \App\QestionOption::where('question_id',$stuquestion->question_id)->get();
            @endphp

            @foreach($qestionoption as $options)
              <div class="radio">
                              <label>
                                <input type="radio" name="ans{{$loops}}" id="optionsRadios1" value="{{$options->id}}" >
                                {{$options->option}}
                              </label>
              </div>

            @endforeach

            </div>

            <div class="form-group">
                   <label class="control-label" for="inputError"></label>
              </div>

              <hr style="border: 1px solid #ccc;">
             <?php
              $loops++;
              ?>
          @endforeach

            <input type="submit" name="submitform" value="Submit" class="btn btn-success">

        </form> 
      </div>
    </div>
  </div>
</div>  
@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){


    function checkExamsStatus(){

    }

   function startTimer(duration, display) {

    if(localStorage.getItem("counter")){

      //var timer = duration, minutes, seconds;
      var timers = localStorage.getItem("counter");

      if(timers.indexOf(':') != -1){
        console.log("itcontainit"+timers);
      }else{
        localStorage.setItem("counter", duration);
        console.log(localStorage.getItem("counter"));

        var timer = localStorage.getItem("counter");
        var minutes = localStorage.getItem("counter");
        var seconds = 0;
        //var timer = , localStorage.getItem("counter"), seconds;
      }

    }else{

      var timer = duration, minutes, seconds;
    }


    var myVar = setInterval(function () {

        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        localStorage.setItem("counter", minutes + ":" + seconds);

        console.log(localStorage.getItem("counter"));

        display.textContent = localStorage.getItem("counter");

        if (--timer < 0) {
            //timer = duration;
             clearInterval(myVar);
             submitform();
        }

    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * {{$mins}},
    display = document.querySelector('#time');

    if(localStorage.getItem("counter")){
      //there is a counter

       startTimer(localStorage.getItem("counter"), display);

    }else{

       localStorage.setItem("counter", fiveMinutes + ":" + "59");

       startTimer(fiveMinutes, display);
    }
};


function submitform(){
  document.getElementById("formsubmit").submit();
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
