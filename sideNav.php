<aside class="main-sidebar">
		
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
		  <!-- Sidebar user panel -->
		  <div class="user-panel">
			<div class="pull-left image">
			  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			  <p><?php echo $_SESSION['fullname']; ?></p>
			  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		  </div>
		  
		  
		  
		  <!-- search form -->
				<!---refer to original--->
		  <!-- /.search form -->
		  
		  
		  <!-- sidebar menu: : style can be found in sidebar.less -->
		  <ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				
				
				<li class="<?php if($page=="dashboard"){echo 'active';} ?> treeview">
				  <a href="#">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li class="<?php if($subpage=="orgdash"){echo 'active';} ?>"><a href="home.php"><i class="fa fa-circle-o text-red"></i>Organizational</a></li>
					<li><a href="index2.html"><i class="fa fa-circle-o text-green"></i>Fleet Tracker</a></li>
				  </ul>
				</li>
			
			
				<li class="<?php if($page=="inventory"){echo 'active';} ?> treeview">
				  <a href="#">
					<i class="fa fa-files-o"></i>
					<span>Fleet Inventory</span>
					<span class="pull-right-container">
					  <small class="label pull-right bg-yellow">12</small>
					  <small class="label pull-right bg-green">16</small>
					  <small class="label pull-right bg-red">5</small>
					</span>
				  </a>
				  <ul class="treeview-menu">
                                      <li class="<?php if($subpage=="all"){echo 'active';} ?>"><a   href="inventory.php"><i class="fa fa-circle-o"></i>All Vehicles</a></li>
					<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i>Available</a></li>
					<li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Requiring Service </a></li>
					<li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Disposable</a></li>
				  </ul>
				</li>
			
				<li class="<?php if($page=="request"){echo 'active';} ?>">
				  <a href="fleetrequests.php">
					<i class="fa fa-th"></i> <span>Requests</span>
					<span class="pull-right-container">
					  <small class="label pull-right bg-green">12</small>
					</span>
				  </a>
				</li>
				
				
				<li class="<?php if($page=="tracker"){echo 'active';} ?> ">
					  <a href="tracker.php">
						<i class="fa fa-pie-chart"></i>
						<span>Fleet Tracker</span>
						
					  </a>
					 
				</li>
				
				<li class="<?php if($page=="calendar"){echo 'active';} ?>">
                                    <a  href="tripCalendar.php">
					<i class="fa fa-calendar"></i>
					<span>Trip Calendar</span>
					
				  </a>
				</li>
				
				<li class="<?php if($page=="reports"){echo 'active';} ?> treeview">
				  <a href="#">
					<i class="fa fa-file"></i> <span>Reports</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li class="<?php if($page=="gate"){echo 'active';} ?>"><a href="gateLogs.php"><i class="fa fa-circle-o"></i> Gate logs</a></li>
					<li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
					<li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
				  </ul>
				</li>
			
			
				
				<li class="header">LABELS</li>
				<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
			  </ul>
			</section>
			<!-- /.sidebar -->
</aside>
