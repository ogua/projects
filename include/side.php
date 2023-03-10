 <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> NAVIGATION </li>
        <li class="actie treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>   
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>User Registration</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-circle-o"></i>Add User</a></li>
            <li><a href="admusers.php"><i class="fa fa-circle-o"></i>View Users</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Slots</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="slotedit.php?id=0"><i class="fa fa-circle-o"></i> Edit Slot</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i>
            <span>Customer Feedbacks</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adminfeedback.php"><i class="fa fa-circle-o"></i>View Feedbacks</a></li>						
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-shield"></i>
            <span>Transactions</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
		    <li><a href="transac.php"><i class="fa fa-circle-o"></i>View Transactions</a></li>
			<li><a href="transacedit.php?id=0"><i class="fa fa-circle-o"></i>Delect Transactions</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-qq"></i>
            <span>Generate Report</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="transacReport.php"><i class="fa fa-circle-o"></i>Transaction Report</a></li>
			<li><a href="inditransacReport.php"><i class="fa fa-circle-o"></i>Individual Transactions Report</a></li>
            <li><a href="usersReport.php"><i class="fa fa-circle-o"></i>User Report</a></li> 
            <li><a href="feedbackreport.php"><i class="fa fa-circle-o"></i>Feedback Report</a></li>	
          </ul>
        </li>	
        </ul>
    </section>
    <!-- /.sidebar -->