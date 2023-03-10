@extends('layouts.main')


@section('title')
  Add User Role
@endsection

@section('mtitle')
  Add User Roles
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

          @if (session()->has('message'))
	            <div class="alert alert-success">
	                {{ session('message') }}
	            </div>
            @endif
	<div class="row">
      
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Assign Permissions</h3>
                </div>
                 <div class="box-body">
                   <form method="post" action="{{route('assingn-role-to-permission-save')}}">
					@csrf
					<label>Check Permssions To Assign for <h3>{{$role->name}}</h3></label>
					<input type="hidden" name="roleid" value="{{$role->id}}">
				    <div class="box-body">
		              <table class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>User Permissions for {{$role->name}}</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($Permission as $row)
		                		<tr>
		                			<td>
		                				<div class="form-group">
									    <div class="custom-control custom-checkbox">
									      <input type="checkbox" value="{{$row->id}}" class="custom-control-input" id="customCheck1" name="permissions[]"
									      	@if($role->permissions->pluck('id')->contains($row->id)) checked
									      	@endif
									      >
									    </div>
									  </div>
		                			</td>
		                			<td>{{$row->name}}</td>
		                	  </tr>
		                	@endforeach
		                </tbody>
		             </table>
	            </div>    
				    <input type="submit" name="submit" value="Assign Permission(s) to Role" class="btn btn-success">
				</form> 
                 </div>
                    
              </div>

            </div>


            <div class="col-md-8">
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Roles & Permissions</h3>
                </div>
              		<div class="box-body">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>Role</th>
		                  <th>Permission</th>
		                  <th>Edit Perm</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($role_per as $row)
		                		<tr>
		                			<td>{{$row->name}}</td>
		                			<td>
		                {{ implode(', ', $row->permissions->pluck('name')->toArray())}}
		                			</td>
		                			<td>
							<form action="{{ route('edit-role-assign-to-permission', ['id'=> $row->id ]) }}" method="POST">
				       			@csrf
				       			<input type="submit" name="submit" class="btn btn-info" value="Edit">
				       			<!-- <a href="#" class="btn btn-info"><i class='fa fa-pencil-square-o'></i>Edit</a> -->
				               </form>	

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

   

  });

</script>


@endsection
