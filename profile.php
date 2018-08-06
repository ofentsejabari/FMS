
    <!-- Main content -->
    <section class="content">

		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">

						<h3 class="profile-username text-center"><?php echo ""; ?></h3>

						<p class="text-muted text-center"><!--work--><?php echo ""; ?></p>


						<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
					</div>
				<!-- /.box-body -->
				</div>
          <!-- /.box -->

          <!-- About Me Box -->
			<!--<div class="box box-primary">
				
				
				<div class="box-header with-border">
				  <h3 class="box-title">About Me</h3>
				</div>
            
				<div class="box-body">
					<strong><i class="fa fa-book margin-r-5"></i> Education</strong>

					  <p class="text-muted">
						B.S. in Computer Science from the University of Tennessee at Knoxville
					  </p>

					  <hr>

					  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

					  <p class="text-muted">Malibu, California</p>

					  <hr>

					  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

					  <p>
						<span class="label label-danger">UI Design</span>
						<span class="label label-success">Coding</span>
						<span class="label label-info">Javascript</span>
						<span class="label label-warning">PHP</span>
						<span class="label label-primary">Node.js</span>
					  </p>

					  <hr>

					  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
				</div>
        
			</div>--->
          <!-- /.box -->
        </div>
		
		
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
         
			<ul class="nav nav-tabs">
				  <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
				  <li><a href="#request" data-toggle="tab">My Requests</a></li>
				  <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
			
            <div class="tab-content">
				<div class="active tab-pane" id="account">
					<!-- Post -->
					<div class="row">
							<form>
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstname">Firstname</label>
												<input type="text" class="form-control" value="<?php echo "" ?>" id="firstname" placeholder="Firstname" disabled>
												
											</div>
											
											<div class="form-group">
												<label for="lastname">Surname</label>
												<input type="text" class="form-control" value="<?php echo "" ?>" id="lastname" placeholder="Firstname" disabled>
												
											</div>
											
											<div class="form-group">
												<label for="lastname">Email</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
													<input type="email" class="form-control" placeholder="Email" id="email" disabled>
												</div>
											</div>
											
											<div class="form-group">
												<label>Designation</label>
												<select class="form-control" disabled>
													<option value="">Select Designation</option>
													<?php 
														//while(){
															echo "<option></option>";
														//}
													?>
												</select>
											</div>
											
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Middlename</label>
												<input type="text" class="form-control" value="<?php echo "" ?>" id="middlename" placeholder="Firstname" disabled>
												
											</div>
											
											<div class="form-group">
												<label for="department">Username</label>
												<input type="text" class="form-control" value="<?php echo "" ?>" id="department" placeholder="Firstname" disabled>
												
											</div>
											
											<div class="form-group">
												<label>Department</label>
												<select class="form-control" disabled>
													<option value="">Select Department</option>
													<?php 
														//while(){
															echo "<option></option>";
														//}
													?>
												</select>
											</div>
											
											<div class="form-group">
												<label>Role</label>
												<select class="form-control" disabled>
													<option value="">Select Role</option>
													<?php 
														//while(){
															echo "<option></option>";
														//}
													?>
												</select>
											</div>
											
										</div>
										<div class="col-md-12">
											<div class="box-footer">
												<button type="submit" class="btn btn-success pull-right" disabled>Save</button>
											</div>
										</div>	
							</form>
							
					</div>		
					
				</div> 
			  
				<!-- /.tab-pane -->
				<div class="tab-pane" id="request">
					<!---------------->
						 <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="myRequest" class="table table-bordered table-striped">
					<thead>
						<tr>
							  <th>Status</th>
							  <th>Request date</th>
							  <th>Destination</th>
							  <th>Departure</th>
							  <th>Trip start date</th>
							  <th>Trip end date</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						  <td>Trident</td>
						  <td>Internet Explorer 4.0</td>
						  <td>Win 95+</td>
						  <td> 4</td>
						  <td>X</td>
						  <td>X</td>
						</tr>
					
					</tbody>
					<tfoot>
						<tr>
							  <th>Status</th>
							  <th>Request date</th>
							  <th>Destination</th>
							  <th>Departure</th>
							  <th>Trip start date</th>
							  <th>Trip end date</th>
						</tr>
					</tfoot>
				</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
					<!---------------->	
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
</script>