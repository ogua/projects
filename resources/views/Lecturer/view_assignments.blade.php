@extends('layouts.main')


@section('title')
  OSMS | Post Assignment
@endsection

@section('mtitle')
  OSMS Lecturer Management
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
        <h3 class="box-title">View Assignments</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th colspan="7">Online Assignments Posted by {{auth()->user()->name}}</th>
                      </tr>
                    <tr>
                      <th>#</th>
                      <th>Programme</th>
                      <th>Course Code</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Doc</th>
                      <th width="30%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($assingment as $row)
                        <tr>
                          <td>
                      {{$loop->iteration}}
                          </td>
                          <td>{{$row->programme}}</td>
                          <td>{{$row->course_code}}</td>
                          <td>{{$row->assignment_title}}</td>
                          <td>{{$row->assignment_description}}</td>
                          <td>
                            <a href="{{asset('storage')}}/{{$row->lecdoc}}" target="_blank" class="btn btn-success" ><i class='fa fa-download'></i></a>
                          </td>
                          <td>
                            <a href="{{route('lecturer-student-assignment')}}" class="btn btn-default" ><i class='fa fa-plus'></i>New</a> |

                            <a href="{{route('lecturer-student-assignment-submiited', ['id'=>$row->id])}}" class="btn btn-success" ><i class='fa fa-eye'></i>View</a> |

                            <a href="{{route('lecturer-student-assignment-edit', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-edit'></i>Edit</a> |

                            <a href="{{route('lecturer-student-assignment-delete', ['id'=>$row->id])}}" onclick="return  confirm('Are you sure You want to Delete')" title="Delete" class="btn btn-danger" ><i class='fa fa-trash'></i>Delete</a>
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
