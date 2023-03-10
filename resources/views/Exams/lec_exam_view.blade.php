@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Lecturer View Exams
@endsection

@section('mtitle')
  Examination Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
<div class="alert alert-info">Question are shuffled</div>
<div class="row">
  <!-- left column -->
  <div class="col-md-7 col-md-offset-2" style="height:950px; overflow: scroll; overflow-x: hidden;">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">View Exam</h3>
      </div>
      <div class="box-body">
        <form method="post" action="#" style="margin :4px;">
          @csrf

          <input type="hidden" name="examsid" id="examsid" value="{{$examsid}}">

          <input type="hidden" name="examtotal" value="{{$examtot}}">
          
          @foreach($questions as $question)
            <b>Question &nbsp;  {{$loop->iteration}} &nbsp;::<br />
            {{$question['question']}}</b>
            
              <input type="hidden" name="que{{$question['id']}}" value="{{$question['id']}}">
                <div class="form-group">
                  @foreach($question->qestionOptions as $options)
                  <div class="radio">
                              <label>
                                <input type="radio" name="ans{{$question['id']}}" id="optionsRadios1" value="{{$options['id']}}" >
                                {{$options['option']}}
                              </label>
                           </div>
                       @endforeach
                  </div>

                  @foreach($answer as $answers)
                    @if($answers->qestion_option_id == $options->question_id)
                      Answer: {{$answers->option}}
                    @endif
                  @endforeach

              <div class="form-group">
                   <label class="control-label" for="inputError"></label>
              </div>
              <br><br>

              <hr style="border: 1px solid #ccc;">
          @endforeach

            <a href="{{route('lecturer-question-edit', ['id'=>$examsid ])}}" class="btn btn-success">Edit Questions</a>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                Add More Questions
              </button>

          </form>
      </div>
    </div>
  </div>
</div>
 
         <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add More Questions</h4>
              </div>
              <div class="modal-body">
               <!--  <p>One fine body&hellip;</p> -->
                   <div class="form-group qnumber">
                     <label class="control-label" for="inputError">Number of Questionas to Add</label>
                     <input type="Number" class="form-control" id="question" placeholder="Enter ...">
                      <span class="help-block">@error('coursecode') {{ $message }} @enderror</span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" id="addnow">Add Now</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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


    $(document).on("click","#addnow",function(e){
      e.preventDefault();
      var number = $("#question").val();
      var examid = $("#examsid").val();
      var url = '/OnlineExamination/addQuestion/more/'+number+'/'+examid;
      if (number == "") {
        $(".qnumber").addClass("has-error");
      }else{
        window.location.href= url;
      }
      
    });


  });

</script>


@endsection
