<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}" />
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::to('dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/DataTables/datatables.min.css')}}">

   <!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/select2/dist/css/select2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="shortcut icon" href="{{ URL::to('images/logo.png')}}" type="image/x-icon"/>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="{{ URL::to('bower_components/bootstrap-toggle/css/bootstrap-toggle.css')}}" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/shadow/shadow.css')}}">

<style>
.sticky {
  position: fixed;
  top: 0;
  box-shadow: 5px 10px #888888;

}
  .compact{
    background-image: url('images/walter.png');
  }


#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(images/loading2.gif) no-repeat center center;
  z-index: 10000;
}

</style>
   
</head>
<body class="hold-transition skin-blue sidebar-mini" oncontextmenu="return true;">
<div class="wrapper">
@include('sweetalert::alert')
  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WD</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WALTERS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
          <!-- Messages: style can be found in dropdown.less-->
          

		  
          <!-- Tasks: style can be found in dropdown.less -->
        
      

<!-- end Language --->



		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               @if(Auth::user()->img != "")
                   <img src="{{ asset('storage') }}/{{Auth::user()->img}}" class="user-image" alt="User Image">
                @else
                 <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                @endif

              <span class="hidden-xs"> {{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 @if(Auth::user()->img != "")
                   <img src="{{ asset('storage') }}/{{Auth::user()->img}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="local image">
                @endif

                <p>
                {{ Auth::user()->name }}
                  <small>Member since {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat"></a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           @if(Auth::user()->img != "")
                   <img src="{{ asset('storage') }}/{{Auth::user()->img}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="local image">
            @endif
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

  
       <!-- sidebar menu: : style can be found in sidebar.less -->
     


        <!-- sidebar menu: : style can be found in sidebar.less -->
     
    <!-- /.sidebar -->


     <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @hasanyrole('admin|worker')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('home') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Branch Management</span>
            <span class="pull-right-container">
              <?php
                $bacnk = App\Branch::all()->count();
              ?>
              <span class="label label-primary pull-right">{{$bacnk}}</span>
            </span>
          </a>
          <ul class="treeview-menu">

            @hasanyrole('admin')
            <li><a href="{{route('add-branch')}}"><i class="fa fa-circle-o"></i>Add - View Branch</a></li>
            @endhasanyrole

          @hasanyrole('worker')
             <li><a href="{{route('view-branch')}}"><i class="fa fa-circle-o"></i>View Branch</a></li>
          @endhasanyrole
            <!-- <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> All Branches</a></li> -->
          </ul>
        </li>


         <li class="@if(Request::segment(3) == 'inventory')
                        active                  
                      @endif treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Product Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @hasanyrole('admin')
            <li><a href="{{route('add-product')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
              @endhasanyrole
             @hasanyrole('admin|worker')
              <li><a href="{{route('view-product')}}"><i class="fa fa-circle-o"></i>View Inventory</a></li>
             @endhasanyrole
          </ul>
        </li>
        @endhasanyrole 

       <!--  @hasanyrole('worker')
         <li><a href="{{route('record-usersales')}}"><i class="fa fa-circle-o"></i> Record Sales</a></li>

          <li><a href="{{route('record-usersales-view')}}"><i class="fa fa-circle-o"></i>Sales Per Day</a></li>
        @endhasanyrole -->

          <?php
              $branches = App\Branch::all();
          ?>


        @hasanyrole('admin|worker')
        <li class="treeview @if(Request::segment(4) == 'sales')
                        active                  
                      @endif ">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($branches as $branch)
                  <li class="> treeview">
                    <a href="#">
                      <i class="fa fa-pie-chart"></i>
                      <span>{{$branch->branchloc}} </span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{route('record-sales',['code'=>$branch->branchode])}}"><i class="fa fa-circle-o"></i> Record Sales</a></li>
                      <li><a href="{{route('sales-per-day',['code'=>$branch->branchode])}}"><i class="fa fa-circle-o"></i>Sales Per Day</a></li>
                      <li><a href="{{route('sales-per-month',['code'=>$branch->branchode])}}"><i class="fa fa-circle-o"></i>Sales Per Month</a></li>
                      <li><a href="{{route('sales-per-product',['code'=>$branch->branchode])}}"><i class="fa fa-circle-o"></i>Sales Per Product</a></li>
                      <li><a href="{{route('all-sales',['code'=>$branch->branchode])}}"><i class="fa fa-circle-o"></i>All Sales</a></li>
                    </ul>
                  </li>

            @endforeach
          </ul>
        </li>
       
      @endhasanyrole
       @hasanyrole('admin')
        <li class="@if(Request::segment(1) == 'UserManagement')
                        active                  
                      @endif treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('add-user',['user'=> 'worker'])}}"><i class="fa fa-circle-o"></i>Add Worker</a></li>
             <li><a href="{{route('add-user',['user'=> 'admin'])}}"><i class="fa fa-circle-o"></i>Add Admin</a></li>
              @hasanyrole('super_admin')
            <li><a href="{{route('add-user-role')}}"><i class="fa fa-circle-o"></i>Add User Role / Perm</a></li>
            <li><a href="{{route('users-roles-display')}}"><i class="fa fa-circle-o"></i>Users and Their Roles</a></li>
            <!-- <li><a href="{{route('logout-user-force')}}"><i class="fa fa-circle-o"></i>Force Logout User</a></li>

 -->
             @endhasanyrole
          </ul>
        </li>
         @endhasanyrole

        <!-- <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Send Mail</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> -->
       

      <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li> -->

       
       <!--  <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>











   
    <!-- /.sidebar -->
    
    <!--- End Menu --------->
     </section>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('mtitles')
        <small> @yield('mtitlesub') </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> @yield('mtitle')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            @yield('main_content')



            @yield('content')
            
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2020 - <?php echo date('Y'); ?><a href="#"> OguSes IT Solutions</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
     
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ URL::to('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::to('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::to('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ URL::to('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ URL::to('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::to('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ URL::to('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL::to('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::to('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ URL::to('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ URL::to('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ URL::to('bower_components/jquery-slimscroll/jquery.slimscroll.min.j')}}s"></script>
<!-- FastClick -->
<script src="{{ URL::to('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::to('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::to('dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{ URL::to('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ URL::to('bower_components/DataTables/datatables.min.js')}}"></script>
<script src="{{ URL::to('bower_components/bootstrap-toggle/js/bootstrap-toggle.js')}}"></script>

<script src="{{ URL::to('js/jquery.PrintArea.js')}}"></script>

<script>
  $(function () {


     $('.select2').select2()

    //loadmenu();

    $('#example1').DataTable({
       dom: 'lBfrtip',
      buttons: [
          'copy',
          'csv',
          'excel',
          'pdf',
          'print'
      ]
    });
    
    $('#example3').DataTable({
       dom: 'lBfrtip',
      buttons: [
          'copy',
          'csv',
          'excel',
          'pdf',
          'print'
      ]
    });

    $('#example4').DataTable({
       dom: 'lBfrtip',
      buttons: [
          'copy',
          'csv',
          'excel',
          'pdf',
          'print'
      ]
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })


    $(document).on("click","#delete_booking", function(e){
      e.preventDefault();
      alert("working..");
    });

    


  });
</script>

@yield('script')
@livewireScripts
</body>
</html>
