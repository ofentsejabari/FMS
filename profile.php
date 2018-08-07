<?php  
    //
    $queryResult= getStaffProfile($db_link,$_SESSION['fmsuser']);
    $myProfile= mysqli_fetch_row($queryResult);

?>
    <!-- Main content -->
    <section class="content">

		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">

						<h3 class="profile-username text-center"><?php echo $_SESSION['fullname']; ?></h3>

						<p class="text-muted text-center"><!--work--><?php echo $_SESSION['designation']; ?></p>

					</div>
				<!-- /.box-body -->
				</div>
          <!-- /.box -->


        </div>
		
		
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
         
		<ul class="nav nav-tabs">
                    <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
                    <li><a href="#request" data-toggle="tab">My Requests</a></li>
                    <li><a href="#settings" data-toggle="tab">My Stats</a></li>
                </ul>
			
            <div class="tab-content">
		<div class="active tab-pane" id="account">
			<!-- Post -->
                            <div class="box-footer">
                                <button type="button" onclick="editForm(false)" class="btn btn-default "><i class="fa fa-edit"></i> Edit</button>
                            </div>     
                        
                            <hr>
                            <div class="row">
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="profileForm">
                                    
                                    <input id="user" value="<?php echo $_SESSION['fmsuser']; ?>" hidden="hidden" />
                                    
                                    <div class="col-md-6">
					<div class="form-group">
						<label for="firstname">Firstname</label>
						<input type="text" class="form-control" value="<?php echo $myProfile[2] ?>" id="firstname" placeholder="Firstname" disabled required>
						
					</div>
					
					<div class="form-group">
						<label for="lastname">Surname</label>
						<input type="text" class="form-control" value="<?php echo $myProfile[3] ?>" id="lastname" placeholder="Firstname" disabled required>
						
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" class="form-control" placeholder="Email" value="<?php echo $myProfile[3] ?>" id="email" disabled required>
						</div>
					</div>
					
					<div class="form-group">
                                            <label>Designation</label>
                                            <select id="designation" class="form-control" disabled required>
                                                <option value="">Select Designation</option>
                                                <?php 
                                                    $designations=getDesignations($db_link);
                                                    while($row=mysqli_fetch_row($designations)){
                                                        if($row[0]== $myProfile[8]){
                                                            echo "<option selected value='".$row[0]."'>".$row[1]."</option>";
                                                        }
                                                        else{
                                                            echo "<option  value='".$row[0]."'>".$row[1]."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
					</div>
					
                                    </div>
                                    <div class="col-md-6">
					<div class="form-group">
                                            <label for="middlename">Middlename</label>
                                            <input type="text" class="form-control" value="<?php echo "" ?>" id="middlename" placeholder="Firstname" disabled>
					</div>
					
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" value="<?php echo $myProfile[1] ;?>" id="username" placeholder="Username" disabled required>
					</div>
					
					<div class="form-group">
						<label>Department</label>
						<select id="department" class="form-control" disabled required>
							<option value="">Select Department</option>
							<?php 
								$departments=getDepartments($db_link);
                                                                while($row=mysqli_fetch_row($departments)){
                                                                   
                                                                    if($row[0]== $myProfile[7]){
									echo "<option selected value='".$row[0]."'>".$row[1]."</option>";
                                                                    }
                                                                    else{
                                                                        echo "<option  value='".$row[0]."'>".$row[1]."</option>";
                                                                    } 
                                                               }
								
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Roles</label>
						<select id="role" class="form-control" disabled required>
							<option value="">Select Role</option>
							<?php 
								$roles=getRoles($db_link);
                                                                while($row=mysqli_fetch_row($roles)){
                                                                    
                                                                    if($row[0]== $myProfile[4]){
									echo "<option selected value='".$row[0]."'>".$row[1]."</option>";
                                                                    }
                                                                    else{
                                                                        echo "<option  value='".$row[0]."'>".$row[1]."</option>";
                                                                    }
								}
							?>
						</select>
					</div>
					
                                    </div>
                                    <div class="col-md-12">
                                         
                                            <div class="box-footer">
                                               
                                                <button id="save" type="submit" class="btn btn-success pull-right" disabled>Save</button>
                                            </div>
                                    </div>	
				</form>
					
			</div>		
			
		</div> 
                
                
                
                
                
		
		<!-- /.tab-pane -->
                <div class="tab-pane" id="request">
                    <!---------------->
                    
                    <!-- /.box -->	
                </div>
                <!-- /.tab-pane -->
                
                
                
                

                <div class="tab-pane" id="settings">
              
			  </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
	
<script>
  $(function () {
        $('#myRequest').DataTable();
  });
  
  function editForm(val)
  {
        document.getElementById("firstname").disabled = val;
        document.getElementById("lastname").disabled = val;
        document.getElementById("email").disabled = val;
        document.getElementById("designation").disabled = val;
        document.getElementById("middlename").disabled = val;
        document.getElementById("username").disabled = val;
        document.getElementById("department").disabled = val;
        document.getElementById("role").disabled = val;
        document.getElementById("save").disabled = val;
   }
  
  $('#profileForm').submit(function(event) {
    var formData = $(this).serialize();
      $.ajax({
		type : 'GET', // define the type of HTTP verb we want to use (POST for our form)
		url  : 'db_connect/validate.php?status=editUser'
                        '&user='+document.getElementById("user").value(),
			'&firstname ='+document.getElementById("firstname").value(),
                        '&lastname ='+document.getElementById("lastname").value(),
                        '&email ='+document.getElementById("email").value(),
                        '&designation ='+document.getElementById("designation").value(),
                        '&middlename ='+document.getElementById("middlename").value(),
                        '&username ='+document.getElementById("username").value(),
                        '&department ='+document.getElementById("department").value(),
                        '&role ='+document.getElementById("role").value()
		data 		: formData,
		dataType 	: 'html',
		success		:  
		function(data){
			
		}
		
        });
     });    
</script>