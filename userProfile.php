<!DOCTYPE html>
<html>
	<?php include("headers.php");	?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
			
			<!--top-navigation-------->	
				<?php include("topNav.php"); ?>
			<!-- Left side column. contains the logo and sidebar -->
				<?php include("sideNav.php");?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					  <h1>
						User Profile
					  </h1>
					  <ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">User Profile</li>
					  </ol>
				</section>

				<!-- Main content -->
				<section class="content">
                                    <?php include("profile.php"); ?>
				</section>
				<!-- right col -->
			</div>
			  <!-- /.row (main row) -->

			</section>
			<!-- /.content -->
		
		  <!-- /.content-wrapper -->
		<?php include("footer.php"); ?>

		<!-- Control Sidebar -->
		<?php include("settings.php"); ?>
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

		<?php include("scripts.php");?>

</body>
</html>
