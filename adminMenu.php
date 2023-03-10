 <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> NAVIGATION </li>
        <li class="active treeview">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>   
          </a>
        </li>
		<?php
			if(!empty($_SESSION['role'])){
				
			}else{
				echo'
					<li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Add Admin</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-circle-o"></i>		Add Admin</a></li>
			<li><a href="vusers.php"><i class="fa fa-circle-o"></i>		View All Admin</a></li>
			</ul>
        </li>
		 <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Add Farmers</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="farmers.php"><i class="fa fa-circle-o"></i>		Add Farmer</a></li>
			<li><a href="farmersv.php"><i class="fa fa-circle-o"></i>		View All Farmers</a></li>
			</ul>
        </li>
				';
			}
		?>
        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Fertilizers</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="fertilizer.php"><i class="fa fa-circle-o"></i>Add Fertilizer</a></li> 
            <li><a href="vfertilizer.php"><i class="fa fa-circle-o"></i>View Fertilizers Recorded</a></li> 
		  </ul>
        </li>
		
		<?php
			if(!empty($_SESSION['role'])){
				echo'<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Training</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="vtrainings.php"><i class="fa fa-circle-o"></i>View Training Details</a></li> 
		  </ul>
        </li>';
			}else{
				echo'<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Training</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="trainings.php"><i class="fa fa-circle-o"></i>Notify Training Session</a></li> 
            <li><a href="vtrainings.php"><i class="fa fa-circle-o"></i>View Training Details</a></li> 
		  </ul>
        </li>';
			}
		?>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Equipments</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="equipments.php"><i class="fa fa-circle-o"></i>Record Equipment Bought</a></li> 
            <li><a href="vequipments.php"><i class="fa fa-circle-o"></i>View Farm Equipments</a></li>          
		 </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Farm Land</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="landbought.php"><i class="fa fa-circle-o"></i>Record Land Bought</a></li> 
            <li><a href="Seeds.php"><i class="fa fa-circle-o"></i>Record Crops Planted</a></li>          
			<li><a href="pesticide.php"><i class="fa fa-circle-o"></i>Record Pesticide Bought</a></li>          
		    <li><a href="insceticide.php"><i class="fa fa-circle-o"></i>Record Insecticide Bought</a></li>          
		</ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Manage Account</span>
            <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profileac.php"><i class="fa fa-circle-o"></i>Manage Account</a></li> 
			<li><a href="passwordchnge.php"><i class="fa fa-circle-o"></i>Change Password</a></li> 
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
		  <li><a href="reportcrops.php"><i class="fa fa-circle-o"></i>Report for Crops Planted</a></li>
		  <li><a href="reportEmployee.php"><i class="fa fa-circle-o"></i>Report for Employees</a></li>
          <li><a href="reportequip.php"><i class="fa fa-circle-o"></i>Report for Equipments Bought</a></li>
		  </ul>
        </li>
        </ul>