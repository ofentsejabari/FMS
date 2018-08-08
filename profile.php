
<div class="row">

    
      <div class="col-md-3">
          <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username"><?php echo $_SESSION['fullname']; ?></h3>
                    <h5 class="widget-user-desc"><?php echo $_SESSION['designation']; ?></h5>
                </div>
            
                <div class="widget-user-image">
                    <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">
                                <?php 
                                    $requestNo=getMyRequests($db_link,$_SESSION['fmsuser']);
                                    $number= mysqli_num_rows($requestNo);

                                    echo $number; ?>
                            </h5>
                            <span class="description-text">Total Requests</span>
                        </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">
                            <?php
                                $tripNo =getMyTrips($db_link,$_SESSION['fmsuser']);
                                echo  mysqli_num_rows($tripNo);
                            ?>
                        </h5>
                        <span class="description-text">Total Trips</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
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
                                <div class="checkbox">
                                    <input id="edit" onclick="checkAction()" type="checkbox" data-toggle="toggle" data-on="Editing" data-off="Disabled">
                             
                                </div>    
                                <!--<a type="button" href="#" onclick="editForm(false)"><i class="fa fa-edit"></i> Edit</a>--->
                            </div>     
                        
                            <div class="row">
                                <form  id="profileForm">
                                    
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
                                            <label>Email</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input class="form-control" placeholder="Email" value="<?php echo $myProfile[9] ?>" type="email" id="email" disabled required>
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
						<label for="username">Username</label>
						<input type="text" class="form-control" value="<?php echo $myProfile[1] ;?>" id="username" placeholder="Username" disabled required>
					</div>
					
					<div class="form-group">
						<label>Department</label>
						<select id="department" class="form-control select2" disabled required>
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
                                               
                                                <button id="save" onclick="submitForm()"  type="submit" class="btn btn-success pull-right" disabled>Save</button>
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
