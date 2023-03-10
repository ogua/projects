	
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
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
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> NAVIGATION </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Dashboard</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Member Registration</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="formbiodata.html"><i class="fa fa-circle-o"></i> Bio Data</a></li>
            <li><a href="formrefrences.html"><i class="fa fa-circle-o"></i> Member's Refrees</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Military Information</a></li>
			<li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Offices Held</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Degrees</a></li>
			<li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Report</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Financials</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Payments</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Payment Invoice</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Financial Statement</a></li>  
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Financial Graph</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Report</a></li> 
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i>
            <span>Membership Attendance</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="AttendanceEntry.html"><i class="fa fa-circle-o"></i> Enter Attendance</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Attendance Graph</a></li> 
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Attendance Report</a></li>  
			
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-shield"></i>
            <span>Military Wing</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Military Performance</a></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Muster and Inspection</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Military Report</a></li>  
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-qq"></i>
            <span>Officers</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Comm. No. 497</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> 1st Battalion</a></li> 
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> 2nd Regiment</a></li>	
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Accra West Grand</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Supreme Subordinate</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Supreme </a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-puzzle-piece"></i>
            <span>Commandery Operations</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
		  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Comm. No. 497</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> 1st Battalion</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> 2nd Regiment</a></li>  
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Accra West Grand</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Supreme-Subordinate</a></li>  
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Secretariat</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
		  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Correspondence Registering</a></li>
		  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> To Do List</a></li>
		  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Events and Programs</a></li>
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Report</a></li>   
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pied-piper"></i>
            <span>Cadets</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Cadet Registration</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Cadet Officers</a></li> 
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Attendance</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Finance</a></li>
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Mentorship Program</a></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Cadet Report</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i>
            <span>Assets</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Asset Registration</a></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Asset Retiring</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Asset Report</a></li>  
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-trophy"></i>
            <span>Achievement</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Commandery Level</a></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Cadet Level</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Achievement Report</a></li>  
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i>
            <span>Security</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> User Setup</a></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Access Level</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> User Log</a></li>  
			<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Change Password</a></li> 
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Setup</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Entity Setup</a></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Item Setup</a></li>
          </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-exclamation-triangle"></i>
            <span>Alerts</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
        </li>   
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        
        </ul>
    </section>