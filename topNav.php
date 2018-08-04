 <header class="main-header">
   
	<!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>FMS</b>Admin</span>
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
				<li class="dropdown messages-menu">	
					<?php include("navMessages.php"); ?>
				</li>
				
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">	
					<?php include("navNotif.php"); ?>
				</li>
				
				<!-- Tasks: style can be found in dropdown.less -->
				<li class="dropdown tasks-menu">	
					<?php include("navTask.php");?>
				</li>
				
			    <!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<?php include("userAccount.php")?>
				</li>
				
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
    </nav>
  </header>
 