@extends('admin.layout')


@section('title')
	Add Posts
@endsection


@section('subtitle')

@endsection

@section('content')

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Pic Art</th>
              <th scope="col">Event Title</th>
              <th scope="col">Event Description</th>
              <th scope="col">Event Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          	@foreach ($posts as $row)
          	<tr>
          		<td>{{$loop->iteration}}</td>
          		<td>
          			@if ($row->picart)

                  <img class="profile-user-img img-responsive img-circle" src="{{asset('storage')}}/{{$row->picart}}" alt="User profile picture" width="128" height="128">

                  @endif

                </td>
          		<td>{{$row->title}}</td>
          		<td>{{$row->edesc}}</td>
          		<td>{{$row->edate}}</td>
          		<td>

          			<a href="{{ route('edit_post',['id' => $row->id]) }}" class="btn btn-info"><i class='fa fa-edit'></i></a>
          			
          			<a href="{{ route('delete_post',['id' => $row->id]) }}" class="btn btn-danger" onclick="return confirm('Are You Sure ?')"  ><i class='fa fa-trash'></i></a>
          		
          		</td>
          	</tr>
          	@endforeach
            
          </tbody>
        </table>
      </div>
@endsection


@section('main_content_extral')

@endsection










@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    
  	//start
    $(document).on("","#", function(e){
      e.preventDefault();
      
     
    });
    //end


  });

</script>


@endsection