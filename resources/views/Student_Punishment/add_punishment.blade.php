@extends('layouts.main')


@section('title')
  OSMS | Student fine
@endsection

@section('mtitle')
  OSMS Students fine
@endsection


@section('mtitlesub')

@endsection



@section('main_content')


<div class="row">
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Students Fine</h3>
      </div>
      <div class="box-body">
          <div class="box-body">
          <form wire:submit.prevent="submitform" >
          <div class="form-group  @error('academic') has-error @enderror">
                 <label class="control-label" for="inputError">Academic Year</label>
                 <input type="text" class="form-control" wire:model="academic" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('academic') {{ $message }} @enderror</span>
            </div>
            <div class="form-group  @error('semester') has-error @enderror">
                 <label class="control-label" for="inputError">Semester Year</label>
                <select wire:model="semester" class="form-control">
                    <option value=""></option>
                    <option value="First Semester">First Semester</option>
                    <option value="Second Semester">Second Semester</option>
                </select>
                  <span class="help-block">@error('semester') {{ $message }} @enderror</span>
            </div>

            <input type="submit" name="submit" value="Add Academic Year / Semester" class="btn btn-success">

        </form> 
      </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">All Academic Year</h3>
      </div>
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Academic Year</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                 
                </tbody>
             </table>
            
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
