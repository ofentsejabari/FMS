<!DOCTYPE html>
<html>
	<?php 
                include("headers.php");	
                $result= getStaffProfile($db_link,$_SESSION['fmsuser']);
                if($result){
                    $myProfile= mysqli_fetch_row($result);
                }
           ?>
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
        
        
        <script>
          
  function editForm(val)
  {
        document.getElementById("firstname").disabled = val;
        document.getElementById("lastname").disabled = val;
        document.getElementById("designation").disabled = val;
        document.getElementById("username").disabled = val;
        document.getElementById("department").disabled = val;
        document.getElementById("role").disabled = val;
        document.getElementById("email").disabled = val;
        document.getElementById("save").disabled = val;
                    
    }
                
 $('#edit').change(function() {

      editForm(!$(this).prop('checked'));   
  });

  function submitForm(){
      
        if(document.getElementById("firstname").value!="" && document.getElementById("lastname").value!="" && document.getElementById("username").value!="" 
           && document.getElementById("designation").value!="" && document.getElementById("department").value!="" && document.getElementById("role").value!="" 
           && document.getElementById("role").value!="" ){
          
   
                    
                    $.ajax({
			type : 'GET', // define the type of HTTP verb we want to use (POST for our form)
			url : 'db_connect/validate.php?status=editUser'
					+'&user='+document.getElementById('user').value
					+'&lastname='+document.getElementById('lastname').value
					+'&firstname='+document.getElementById('firstname').value
					+'&username='+document.getElementById('username').value
					+'&role='+document.getElementById('role').value
					+'&department='+document.getElementById('department').value
					+'&designation='+document.getElementById('designation').value
                                        +'&email='+document.getElementById('email').value
					,
					dataType 	: 'html',
					success		:  
					function(data){
                                            window.location="userProfile.php";
                                        }
                    });
					
                                       
        }
  }
        </script>

</body>
</html>

    
