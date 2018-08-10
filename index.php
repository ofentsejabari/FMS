<?php
			$page="login";
			include("headers.php");
			
			if(isset($_SESSION['fmsuser']) && $_SESSION['fmsuser']!="")
			{	
				if($_GET['log']=="off"){
					session_unset(); 
				}
				else{
					header("Location: home.php");
				}	
			}
?>
		
<body class="hold-transition login-page">
    
     
	<div class="login-box">
      
		<div class="login-logo">
			<a href="#"><b>FMS</b></a>
		</div>
	  
		<div class="login-box-body">
			<p class="login-box-msg">Sign in</p>

			<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="loginForm" >
				<div class="form-group has-feedback">
                                    <input type="text" id="username"name="username" class="form-control" placeholder="Username" required>
					<span class="fa fa-user form-control-feedback"></span>
				</div>
				
				<div class="form-group has-feedback">
					<input type="password" id="userpassword" name="userpassword" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
					  <div class="checkbox icheck">
					  
					  </div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
					    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<!-- /.social-auth-links -->

			<a href="#">forgot password?</a><br>

		</div>
            <hr>
             <?php
				include("scripts.php");
		?>   
	</div>
		
    
    
        <div class="modal modal-warning fade" id="modal-warning">
                <div class="modal-dialog">
                  <div class="modal-content">
                    
                    <div class="modal-body text-center">
                      <p>Incorrect password and username combination  </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  </div>

                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
    
    
    
	<script>
		$('#loginForm').submit(function(event) {
			$('#error').remove();					
			var logindata = $(this).serialize();
			//alert(logindata);
			// process the form
			$.ajax({
				type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
				url         : 'db_connect/authenticate.php', // the url where we want to POST
				data        : logindata, // our data object
				dataType    : 'json' // what type of data do we expect back from the server
			}).done(function(data){
				
				if(data.success){
					
					window.location="home.php";
					
				}
                                else{
                                    $("#modal-warning").modal();
				}
				
			});
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();
			});
	</script>
</body>