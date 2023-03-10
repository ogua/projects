 <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> NAVIGATION </li>
        <li class="active treeview">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>   
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Event</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addEvent.php"><i class="fa fa-circle-o"></i>		Add Event</a></li>
			<li><a href="viewEvents.php"><i class="fa fa-circle-o"></i>		View Events</a></li>
			</ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Send Notification</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="sendnotification.php"><i class="fa fa-circle-o"></i>Send Notification Now</a></li> 
			<li><a href="https://console.firebase.google.com/u/3/project/upsaalert-54ecd/notification/compose" target="_blank"><i class="fa fa-circle-o"></i>Send Notification Periodic </a></li> 
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-puzzle-piece"></i>
            <span>Generate Report</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
		  <li><a href="reportallEvents.php"><i class="fa fa-circle-o"></i>Report for All Events</a></li>
		   <li><a href="reportUpcomEvent.php"><i class="fa fa-circle-o"></i>Report for Upcoming Events</a></li>
            <li><a href="reportOutGone.php"><i class="fa fa-circle-o"></i>Report for OutGone Events</a></li>
          </ul>
        </li>
        </ul>