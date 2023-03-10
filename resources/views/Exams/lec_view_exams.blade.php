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
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">All Examinations Published</h3>
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
                  <th>Multiple Try</th>
                  <th width="20%">Action</th>
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
                         <td>{{$row->retry}}</td>
                        <?php
                           $checks = App\Examcheck::where('exam_id',$row->id)->first();
                        ?>
                      <td>
                          @if($checks)
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info{{$row->id}}">
                            Add More Questions
                          </button>
                         
                          <div class="modal modal-info fade" id="modal-info{{$row->id}}">
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
                                       <input type="Number" class="form-control" id="question_{{$row->id}}" placeholder="Enter ...">
                                        <span class="help-block">@error('coursecode') {{ $message }} @enderror</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                  <button type="button" cid="{{$row->id}}" class="btn btn-outline" id="addnow">Add Now</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>

                          @else
                            <a href="{{route('add-questions', ['id'=>$row->id])}}" class="btn btn-success" ><i class='fa fa-plus'></i>Add Questions</a>
                          @endif

                        <a href="{{route('edit-exams', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a></td>
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



    $(document).on("click","#addnow",function(e){
      e.preventDefault();
      var examid =  $(this).attr("cid");
      var number = $("#question_"+examid).val();
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
