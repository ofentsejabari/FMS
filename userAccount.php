	<!------------->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
		<span class="hidden-xs"><?php   echo $_SESSION['fullname']; ?></span>
    </a>
	
	<!------user-dropdown------->
    <ul class="dropdown-menu">
              <!-- User image -->
        <li class="user-header">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
                     <?php
					echo $_SESSION['fullname'];
				 ?>
					<small>
						<?php 
							$results=getUserFullDept($db_link,$_SESSION['fmsuser']);
							echo $results;
						?>
					</small>
                </p>
        </li>
			  
              <!-- Menu Body -->
				<!---refer to original--->
				
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="userProfile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?log=off" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
    </ul>
          
          