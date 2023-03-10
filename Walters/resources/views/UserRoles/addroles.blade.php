@extends('layouts.main')


@section('title')
   Add UserRole
@endsection

@section('mtitle')
  User Management
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
                  <h3 class="box-title">Add User Roles</h3>
                </div>
                 <div class="box-body">
                   	<form method="post" action="{{route('user-role-save')}}">
					@csrf
					<div class="form-group  @error('role') has-error @enderror">
				         <label class="control-label" for="inputError">Role name</label>
				         <input type="text" class="form-control" name="role" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('role') {{ $message }} @enderror</span>
				    </div>
				    
				    <input type="submit" name="submit" value="Add Role" class="btn btn-success">
				</form> 

					<hr>

				<form method="post" action="{{route('user-permission-save')}}">
					@csrf
					<div class="form-group  @error('Permission') has-error @enderror">
				         <label class="control-label" for="inputError">Add Permission</label>
				         <input type="text" class="form-control" name="Permission" id="inputError" placeholder="Enter ... Permission">
				          <span class="help-block">@error('Permission') {{ $message }} @enderror</span>
				    </div>
				    
				    <input type="submit" name="submit" value="Add Permission" class="btn btn-success">
				</form> 

                 </div>
                    
              </div>

            </div>


            <div class="col-md-4">
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Assign Permissions</h3>
                </div>
              		<table id="example3" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>User Role</th>
		                  <th>Assign Permission</th>
		                  <th>Edit</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($role as $row)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$row->name}}</td>
		                			<td><a href="{{route('assingn-role-to-permission', ['id'=>$row->id])}}" class="btn btn-success" ><i class='fa fa-lock'></i>Assign</a></td>

		            <td>
				<a href="#" onclick="document.getElementById('dele_doc_{{$row->id}}').submit();" class="btn btn-info"><i class='fa fa-pencil-square-o'></i>Edit</a>
							<form id="dele_doc_{{$row->id}}" 
								action="{{ route('edit-role-perm', ['id'=> $row->id ]) }}" method="POST" style="display: none;">			            
							<input type="hidden" name="type" value="role">
				       			@csrf
				               </form>	
								</td>

		                		</tr>
		                	@endforeach
		                </tbody>
		             </table>
              </div>
             
            </div>


            <div class="col-md-4">
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">User Permissions</h3>
                </div>
              		<div class="box-body">
		               	@if (session()->has('messages'))
			            <div class="alert alert-success">
			                {{ session('messages') }}
			            </div>
		               @endif
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>User Permissions</th>
		                  <th>Edit</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($Permission as $row)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$row->name}}</td>
		                			<td>
				<a href="#" onclick="document.getElementById('delete_doc_{{$row->id}}').submit();" class="btn btn-info"><i class='fa fa-pencil-square-o'></i>Edit</a>
							<form id="delete_doc_{{$row->id}}" 
								action="{{ route('edit-role-perm', ['id'=> $row->id ]) }}" method="POST" style="display: none;">			            
							<input type="hidden" name="type" value="perm">
				       			@csrf
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
