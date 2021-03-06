
<?php 

	include("headers.php");
?>
	<body class="hold-transition lockscreen">
	<!-- Automatic element centering -->
		<div class="lockscreen-wrapper">
				<div class="lockscreen-logo">
					<a><b>FMS</b></a>
				</div>
				
			<!-- User name -->
				<div class="lockscreen-name">John Doe</div>

				  <!-- START LOCK SCREEN ITEM -->
				<div class="lockscreen-item">
					<!-- lockscreen image -->
					<div class="lockscreen-image">
						<img src="dist/img/user1-128x128.jpg" alt="User Image">
					</div>
					<!-- /.lockscreen-image -->

					<!-- lockscreen credentials (contains the form) -->
					<form class="lockscreen-credentials">
					  <div class="input-group">
						<input type="password" class="form-control" placeholder="password">

						<div class="input-group-btn">
						  <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
						</div>
					  </div>
					</form>
					<!-- /.lockscreen credentials -->

				  </div>
		  <!-- /.lockscreen-item -->
		  <div class="help-block text-center">
			Enter your password to retrieve your session
		  </div>
		  <div class="text-center">
				<a href="login.php?log=off">Or sign in as a different user</a>
		  </div>
		  <div class="lockscreen-footer text-center">
			Copyright &copy; <?php echo date("Y"); ?> <b><a href="https://www.bitri.co.bw" class="text-black">BITRI IST</a></b><br>
			All rights reserved
		  </div>
		</div>

	</body>
	
<?php 
	include("scripts.php");
?>
