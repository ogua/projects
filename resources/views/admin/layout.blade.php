<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Dashboard | Stella Jomo Ministry</title>

    <link rel="canonical" href="">

    

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('web/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('web/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{URL::to('web/css/AdminLTE.css')}}" rel="stylesheet">

    {{-- <link href="{{URL::to('web/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .form-group{
            margin-bottom: 15px;
      }

      label{
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
      }

      .form-group.has-error .help-block{
         color: #dd4b39;
      }
      
      .alert {
  position: relative;
  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.alert-heading {
  color: inherit;
}

.alert-link {
  font-weight: 700;
}

.alert-dismissible {
  padding-right: 4rem;
}

.alert-dismissible .close {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  padding: 0.75rem 1.25rem;
  color: inherit;
}

.alert-primary {
  color: #004085;
  background-color: #cce5ff;
  border-color: #b8daff;
}

.alert-primary hr {
  border-top-color: #9fcdff;
}

.alert-primary .alert-link {
  color: #002752;
}

.alert-secondary {
  color: #383d41;
  background-color: #e2e3e5;
  border-color: #d6d8db;
}

.alert-secondary hr {
  border-top-color: #c8cbcf;
}

.alert-secondary .alert-link {
  color: #202326;
}

.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
}

.alert-success hr {
  border-top-color: #b1dfbb;
}

.alert-success .alert-link {
  color: #0b2e13;
}

.alert-info {
  color: #0c5460;
  background-color: #d1ecf1;
  border-color: #bee5eb;
}

.alert-info hr {
  border-top-color: #abdde5;
}

.alert-info .alert-link {
  color: #062c33;
}

.alert-warning {
  color: #856404;
  background-color: #fff3cd;
  border-color: #ffeeba;
}

.alert-warning hr {
  border-top-color: #ffe8a1;
}

.alert-warning .alert-link {
  color: #533f03;
}

.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}

.alert-danger hr {
  border-top-color: #f1b0b7;
}

.alert-danger .alert-link {
  color: #491217;
}

.alert-light {
  color: #818182;
  background-color: #fefefe;
  border-color: #fdfdfe;
}

.alert-light hr {
  border-top-color: #ececf6;
}

.alert-light .alert-link {
  color: #686868;
}

.alert-dark {
  color: #1b1e21;
  background-color: #d6d8d9;
  border-color: #c6c8ca;
}

.alert-dark hr {
  border-top-color: #b9bbbe;
}

.alert-dark .alert-link {
  color: #040505;
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ URL::to('web/css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Stella Jomo Ministry</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName()
                         == 'dashboard' )
                    active                  
                     @endif" href="{{ route('dashboard') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName()
                         == 'add_post' )
                    active                  
                     @endif" href="{{ route('add_post') }}">
              <span class="fa fa-plus"></span>
              Add Post
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName()
                         == 'all_post' )
                    active                  
                     @endif" href="{{ route('all_post') }}">
              <span class="fa fa-clone"></span>
              All Post
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName()
                         == 'contacts' )
                    active                  
                     @endif" href="#">
              <span class="fa fa-envelope"></span>
              Contacts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName()
                         == 'add-user' )
                    active                  
                     @endif" href="#">
              <span class="fa fa-user-plus"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName()
                         == 'all-user' )
                    active                  
                     @endif" href="#">
              <span class="fa fa-user"></span>
              All Users
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('title')</h1>
      </div>

      <h2>@yield('subtitle')</h2>

      @include('notify.alert')

      @yield('content')
      
    </main>
  </div>
</div>


    <script src="{{ URL::to('web/assets/dist/js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>
