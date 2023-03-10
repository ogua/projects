@extends('layouts.main')


@section('title')
  Walters Dream Big | Add A {{$user}}
@endsection

@section('mtitle')
  Add {{$user}}
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

         @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    {{ session('message') }}
                </div>
            @endif

             @if (session()->has('messages'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    {{ session('messages') }}
                </div>
            @endif


       <div class="row">
      
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add A New {{$user}}</h3>
                </div>
                 <div class="box-body">
                    <form method="POST" action="{{ route('reg-user',['users'=> $user]) }}" enctype="multipart/form-data">

            @csrf
  
      <div class="form-group has-feedback">
        <input type="file" class="form-control  @error('img') is-invalid has-error @enderror" 
        name="img" value="{{ old('img') }}"  autofocus >
        <span class="fa fa-file-image-o form-control-feedback"></span>
        @error('img')
                        <span class="invalid-feedback has-error" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                                @enderror
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control  @error('fname') is-invalid has-error @enderror" 
        name="fname" value="{{ old('fname') }}" required  autofocus placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('fname')
                        <span class="invalid-feedback has-error" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                                @enderror
      </div>


      <div class="form-group has-feedback">
        <input type="text" class="form-control  @error('name') is-invalid has-error @enderror" 
        name="name" value="{{ old('name') }}" required  autofocus placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
                        <span class="invalid-feedback has-error" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                                @enderror
      </div>


      <div class="form-group has-feedback">
        <input type="email" 
        class="form-control @error('email') is-invalid has-error @enderror" 
        name="email" 
        value="{{ old('email') }}" 
        required  
        placeholder="Email">
        
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
                                    <span class="invalid-feedback has-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>


      <div class="form-group has-feedback">
        <input type="text" class="form-control  @error('phone') has-error is-invalid @enderror" 
        name="phone" value="{{ old('phone') }}" required  autofocus placeholder="Phone Number">
        <span class="fa fa-phone form-control-feedback"></span>
        @error('phone')
                        <span class="invalid-feedback has-error" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                                @enderror
      </div>


            <div class="form-group  @error('branch') has-error @enderror">
                 <label class="control-label" for="inputError" style="margin-left: 10px;">Branch Working</label>

                  <select name="branch" class="form-control">
                  <option value="{{old('branch')}}">{{old('branch')}}</option>
                  @foreach($branches as $branch)
                    <option value="{{$branch->branchode}}">{{$branch->branchloc}} - Branch</option>
                  @endforeach
                </select>
                 
        </div>




      <div class="form-group has-feedback">
        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required   placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
                                    <span class="invalid-feedback has-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!-- <input type="checkbox"> I agree to the <a href="#">terms</a> -->
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
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
