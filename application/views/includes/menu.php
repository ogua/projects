    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('name'); ?></p>
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
		<?php
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'welcome/index'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url()
			){
				?>
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
            <li><a href="<?php echo base_url()?>welcome/index"><i class="fa fa-circle-o"></i>Dashboard</a></li>
          </ul>
        </li>
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>welcome/index"><i class="fa fa-circle-o"></i>Dashboard</a></li>
          </ul>
        </li>
				<?php
			}

			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'welcome/mainprog' || 
			'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/nonmembers'
				
			){
				
				?>
				<li class="active treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Member Registration</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>welcome/mainprog"><i class="fa fa-circle-o"></i> New Member</a></li>
            <li><a href="<?php echo base_url()?>members/"><i class="fa fa-circle-o"></i>View All Members</a></li>
			<li><a href="<?php echo base_url()?>members/nonmembers"><i class="fa fa-circle-o"></i>View All Stopped Members</a></li>
          </ul>
        </li>
				
				<?php
			}else{
				?>
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
            <li><a href="<?php echo base_url()?>welcome/mainprog"><i class="fa fa-circle-o"></i> New Member</a></li>
            <li><a href="<?php echo base_url()?>members/"><i class="fa fa-circle-o"></i>View All Members</a></li>
			<li><a href="<?php echo base_url()?>members/nonmembers"><i class="fa fa-circle-o"></i>View All Stopped Members</a></li>
          </ul>
        </li>
				<?php
			}
			
			
			if(
			'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'welcome/visitors' 
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/allvisitors'				
			){
				
				?>
				<li class="active treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Guest Registration</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>welcome/visitors"><i class="fa fa-circle-o"></i> New Visitors</a></li>
			<li><a href="<?php echo base_url()?>members/allvisitors"><i class="fa fa-circle-o"></i>View All Visitors</a></li>
          </ul>
        </li>
				
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Guest Registration</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>welcome/visitors"><i class="fa fa-circle-o"></i> New Visitors</a></li>
			<li><a href="<?php echo base_url()?>members/allvisitors"><i class="fa fa-circle-o"></i>View All Visitors</a></li>
          </ul>
        </li>
				<?php
			}
			
			
			if(
			'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/ushers' 
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/instrumentalist'
            || 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/choir'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'members/media'	
			){
				
				?>
				<li class="active treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Denominations</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>members/ushers"><i class="fa fa-circle-o"></i> All Ushers</a></li>
			<li><a href="<?php echo base_url()?>members/instrumentalist"><i class="fa fa-circle-o"></i>All Instrumentalists</a></li>
			<li><a href="<?php echo base_url()?>members/choir"><i class="fa fa-circle-o"></i>All choristers</a></li>
			<li><a href="<?php echo base_url()?>members/media"><i class="fa fa-circle-o"></i>All Media Men</a></li>
          </ul>
        </li>
				
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Denominations</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>members/ushers"><i class="fa fa-circle-o"></i> All Ushers</a></li>
			<li><a href="<?php echo base_url()?>members/instrumentalist"><i class="fa fa-circle-o"></i>All Instrumentalists</a></li>
			<li><a href="<?php echo base_url()?>members/choir"><i class="fa fa-circle-o"></i>All choristers</a></li>
			<li><a href="<?php echo base_url()?>members/media"><i class="fa fa-circle-o"></i>All Media Men</a></li>
          </ul>
        </li>
				<?php
			}
			
			
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'tithe/'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'tithe/viewalltithe'
			
			){
			 ?>
			 <li class="active treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Tithe</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>tithe/"><i class="fa fa-circle-o"></i>Record Tithe</a></li>
			<li><a href="<?php echo base_url()?>tithe/viewalltithe"><i class="fa fa-circle-o"></i>View All Tithe Paid</a></li>
          </ul>
        </li>
			<?php					
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Tithe</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>tithe/"><i class="fa fa-circle-o"></i>Record Tithe</a></li>
			<li><a href="<?php echo base_url()?>tithe/viewalltithe"><i class="fa fa-circle-o"></i>View All Tithe Paid</a></li>
          </ul>
        </li>
				<?php
			}
					
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'welfare/'
				|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'welfare/viewallwelfare'
			){
				?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Welfare</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>welfare/"><i class="fa fa-circle-o"></i>Record Welfare</a></li>
			<li><a href="<?php echo base_url()?>welfare/viewallwelfare"><i class="fa fa-circle-o"></i>View All Welfare Paid</a></li>
          </ul>
        </li>
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Welfare</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>welfare/"><i class="fa fa-circle-o"></i>Record Welfare</a></li>
			<li><a href="<?php echo base_url()?>welfare/viewallwelfare"><i class="fa fa-circle-o"></i>View All Welfare Paid</a></li>
          </ul>
        </li>
				<?php
			}		
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'attendance/'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'attendance/viewattendance'
			){
				?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-check"></i>
            <span>Membership Attendance</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>attendance/"><i class="fa fa-circle-o"></i> Record Attendance</a></li>
			<li><a href="<?php echo base_url()?>attendance/viewattendance"><i class="fa fa-circle-o"></i>View Attendance Details</a></li> 			
          </ul>
        </li>
				<?php
			}else{
				?>
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
            <li><a href="<?php echo base_url()?>attendance/"><i class="fa fa-circle-o"></i> Record Attendance</a></li>
			<li><a href="<?php echo base_url()?>attendance/viewattendance"><i class="fa fa-circle-o"></i>View Attendance Details</a></li> 			
          </ul>
        </li>
				<?php
			}			
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'pledge'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'pledge/viewpledge'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'pledge/recoredpledge'
			){
				?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-shield"></i>
            <span>Record Pledge</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>pledge"><i class="fa fa-circle-o"></i>Record New Pledge</a></li>
			<li><a href="<?php echo base_url();?>pledge/viewpledge"><i class="fa fa-circle-o"></i>View Pledge</a></li>
            <li><a href="<?php echo base_url();?>pledge/recoredpledge"><i class="fa fa-circle-o"></i>Add To A Recent Pledge</a></li>  
          </ul>
        </li>
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-shield"></i>
            <span>Record Pledge</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>pledge"><i class="fa fa-circle-o"></i>Record New Pledge</a></li>
			<li><a href="<?php echo base_url();?>pledge/viewpledge"><i class="fa fa-circle-o"></i>View Pledge</a></li>
            <li><a href="<?php echo base_url();?>pledge/recoredpledge"><i class="fa fa-circle-o"></i>Add To A Recent Pledge</a></li>  
          </ul>
        </li>
				<?php
			}
			
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'sms/'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'sms/sendgroup'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'sms/smsyouth'
			|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'sms/smsvisitors'
			){
				?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Send Sms</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>sms/"><i class="fa fa-circle-o"></i>Send Sms</a></li>
			<li><a href="<?php echo base_url();?>sms/sendgroup"><i class="fa fa-circle-o"></i>Send To All Members</a></li>
			<li><a href="<?php echo base_url();?>sms/smsyouth"><i class="fa fa-circle-o"></i>Send To The Youth</a></li>
			<li><a href="<?php echo base_url();?>sms/smsvisitors"><i class="fa fa-circle-o"></i>Send To Visitors</a></li>
            <li><a href="#" id="checkbalance"><i class="fa fa-circle-o"></i>Check Sms Balance</a></li>  
          </ul>
        </li>
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Send Sms</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>sms/"><i class="fa fa-circle-o"></i>Send Sms</a></li>
			<li><a href="<?php echo base_url();?>sms/sendgroup"><i class="fa fa-circle-o"></i>Send To All Members</a></li>
			<li><a href="<?php echo base_url();?>sms/smsyouth"><i class="fa fa-circle-o"></i>Send To The Youth</a></li>
			<li><a href="<?php echo base_url();?>sms/smsvisitors"><i class="fa fa-circle-o"></i>Send To Visitors</a></li>
            <li><a href="#" id="checkbalance"><i class="fa fa-circle-o"></i>Check Sms Balance</a></li>  
          </ul>
        </li>
				<?php
			}			
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'mail'
			){
				?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Send Mail</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>mail"><i class="fa fa-circle-o"></i>Send Mail</a></li>
          </ul>
        </li>
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Send Mail</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>mail"><i class="fa fa-circle-o"></i>Send Mail</a></li>
          </ul>
        </li>
				<?php
			}
			
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'mail/backup'){
				?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-download"></i>
            <span>Backup</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>mail/backup"><i class="fa fa-circle-o"></i>Download Database Backup</a></li>
          </ul>
        </li>
				<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-download"></i>
            <span>Backup</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>mail/backup"><i class="fa fa-circle-o"></i>Download Database Backup</a></li>
          </ul>
        </li>
				<?php
			}
			
			if('http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'report'
				|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'report/reportTithe'
				|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'report/reportWelfare'
				|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'report/attendance'
				|| 'http://localhost'.$_SERVER['REQUEST_URI'] == base_url().'report/pledge'
			){
			?>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Generate Report</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>report"><i class="fa fa-circle-o"></i>Report For Members</a></li>
             <li><a href="<?php echo base_url();?>report/reportTithe"><i class="fa fa-circle-o"></i>Report For Tithing</a></li>
            <li><a href="<?php echo base_url();?>report/reportWelfare"><i class="fa fa-circle-o"></i>Report For Welfare</a></li>
            <li><a href="<?php echo base_url();?>report/attendance"><i class="fa fa-circle-o"></i>Report For Attendance</a></li>
            <li><a href="<?php echo base_url();?>report/pledge"><i class="fa fa-circle-o"></i>Report For Pledge</a></li>
		</ul>
        </li>
			<?php
			}else{
				?>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Generate Report</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>report"><i class="fa fa-circle-o"></i>Report For Members</a></li>
             <li><a href="<?php echo base_url();?>report/reportTithe"><i class="fa fa-circle-o"></i>Report For Tithing</a></li>
            <li><a href="<?php echo base_url();?>report/reportWelfare"><i class="fa fa-circle-o"></i>Report For Welfare</a></li>
            <li><a href="<?php echo base_url();?>report/attendance"><i class="fa fa-circle-o"></i>Report For Attendance</a></li>
            <li><a href="<?php echo base_url();?>report/pledge"><i class="fa fa-circle-o"></i>Report For Pledge</a></li>
		    <li><a href="<?php echo base_url();?>report/table"><i class="fa fa-circle-o"></i>Learn</a></li>
		</ul>
        </li>
				<?php
			}
		?>      
        </ul>
    </section>