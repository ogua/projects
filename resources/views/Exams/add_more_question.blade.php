@extends('layouts.main')


@section('title')
  OSMS | Online Examination - Add Qusetions
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
        <form method="post" action="{{route('save-questions',['totalquestions'=>$totalquestions])}}" style="margin :4px;">
          @csrf

          <input type="hidden" name="addmore" value="addmore">

          <input type="hidden" name="examsid" value="{{$examsid}}">
          @for($i=1; $i<=$totalquestions; $i++)
            
          <div class="form-group  @error('qns'.$i.'') has-error @enderror">
                 <label class="control-label" for="inputError">Question number&nbsp;{{$i}} &nbsp;</label>
                 <textarea cols="5" class="form-control" rows="3" placeholder="Write question number {{$i}} here..." name="qns{{$i}}" >{{old('qns'.$i.'')}}</textarea>
                  <span class="help-block">@error('qns'.$i.'') {{ $message }} @enderror</span>
            </div>


          <div class="form-group  @error('optiona'.$i.'') has-error @enderror">
                 <input type="text" class="form-control" value="{{old('optiona'.$i.'')}}" name="optiona{{$i}}"  placeholder="Enter option a">
                  <span class="help-block">@error('optiona'.$i.'') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('optionb'.$i.'') has-error @enderror">
                 <input type="text" class="form-control" value="{{old('optionb'.$i.'')}}" name="optionb{{$i}}"  placeholder="Enter option b">
                  <span class="help-block">@error('optionb'.$i.'') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('optionc'.$i.'') has-error @enderror">
                 <input type="text" class="form-control" value="{{old('optionc'.$i.'')}}" name="optionc{{$i}}"  placeholder="Enter option c">
                  <span class="help-block">@error('optionc'.$i.'') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('optiond'.$i.'') has-error @enderror">
                 <input type="text" class="form-control" value="{{old('optiond'.$i.'')}}" name="optiond{{$i}}"  placeholder="Enter option d">
                  <span class="help-block">@error('optiond'.$i.'') {{ $message }} @enderror</span>
            </div>

            

            <div class="form-group  @error('ans'.$i.'') has-error @enderror">
                 <label class="control-label" for="inputError">Select answer for question {{$i}}</label>
                 <select id="ans{{$i}}" name="ans{{$i}}" placeholder="Choose correct answer " class="form-control" >
                    <option value="{{old('ans'.$i.'')}}">{{old('ans'.$i.'')}}</option>
                <option value="a">option a</option>
                <option value="b">option b</option>
                <option value="c">option c</option>
                <option value="d">option d</option> 
            </select>
                  <span class="help-block">@error('ans'.$i.'') {{ $message }} @enderror</span>
            </div>

            <hr style="border: 1px solid #ccc;">
            @endfor

            <input type="submit" name="submit" value="Submit" class="btn btn-success">

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
