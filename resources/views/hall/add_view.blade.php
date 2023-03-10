@extends('layouts.main')


@section('title')
  OSMS | Add - View Lecture Hall
@endsection

@section('mtitle')
  New Hall
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
  <div class="row">
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add - View Lecture Hall</h3>
      </div>
      <div class="box-body">
       <form method="post" action="{{route('add-view-lecture-hall-save')}}" >
          @csrf
          <div class="form-group  @error('hallname') has-error @enderror">
                 <label class="control-label" for="inputError">Hall name</label>
                 <input type="text" autocomplete="false" class="form-control" value="{{old('hallname')}}" name="hallname" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('hallname') {{ $message }} @enderror</span>
            </div>
            <div class="form-group  @error('hallcapacity') has-error @enderror">
                 <label class="control-label" for="inputError">Hall Capacity</label>
                 <input type="number" class="form-control" value= "{{old('hallcapacity')}}" name="hallcapacity" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('hallcapacity') {{ $message }} @enderror</span>
            </div>

            <input type="submit" name="submit" value="Add Hall" class="btn btn-success">

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
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Capacity</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($hall as $row)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                       <td>{{$row->name}}</td>
                      <td>
                      {{$row->capacity}}
                      </td>
                      <td>
                        <a href="{{route('edit-hall', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a>

                        <a href="{{route('delete-hall', ['id'=>$row->id])}}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger" ><i class='fa fa-trash'></i>Delete</a>

                      </td>
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
