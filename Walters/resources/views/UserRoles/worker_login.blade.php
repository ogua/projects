@extends('layouts.main2')

@section('infos')
 Worker login 
@endsection


@section('login_here')

     <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    
             @if (session()->has('messages'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    {{ session('messages') }}
                </div>
            @endif

    <form  action="{{ route('login-worker-script') }}" method="post">

    @csrf

      <div class="form-group has-feedback">
        <input type="text" class="form-control  @error('uname') is-invalid @enderror" name="uname" placeholder="Username" value="{{ old('uname') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('uname')
                 <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                 </span>
             @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password"  name="password" required autocomplete="current-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

    <!-- <a href="{{ route('register') }}" class="text-center">new membership</a> -->
    <a href="{{ route('login') }}" class="text-center">Login as an Admin</a>

  </div>
  <!-- /.login-box-body -->
@endsection

