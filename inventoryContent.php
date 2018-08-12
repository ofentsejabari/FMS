
<div class="row">
        <div class="col-lg-3">
            
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Controls</h3>
                </div>
                <div class="box-body">
                    
                  <!-- /btn-group -->
                  <div class="input-group">
                      <a type="button" href="addVehicleForm.php"  class="btn btn-primary "> Add</a>
                    </div>
                  
                  <!-- /input-group -->
                </div>
          </div>
        
            <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Vehicles </h4>
                </div>
                <div class="box-body">
                      <!-- the events -->
                      <div style="min-height:450px" class="" id="external-events">




                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input class="form-control" type="text" id="myInput"  onkeyup="myFunction()" placeholder="Search" />
                            </div>
                          <BR>
                            <div class="box-body">
                                <div class="box-group" id="accordion">
                                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                    <div class="panel box box-primary">
                                        
                                        <?php
                                            $result= getCarTypes($db_link);
                                            if($result){
                                                while($row= mysqli_fetch_row($result)){
                                        ?>
                                        <div class="box-header with-border">
                                            <a  data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row[0]?>">
                                                <h4 class="box-title">

                                                    <?php echo $row[1]; ?>

                                                </h4>
                                                <i class="fa fa-angle-down pull-right"></i>
                                            </a>
                                        </div>
                                        <div id="collapse<?php echo $row[0]?>" class="panel-collapse collapse out">
                                            <div class="box-body">  
                                                <?php 
                                                    $result1= getvehicleDetailsByType($db_link, $row[0]);
                                                    if ($result1){
                                                            while($row1= mysqli_fetch_row($result1)){

                                                                echo "<a href='?plate=$row1[0]'>".$row1[0]." </a>";

                                                            }
                                                    }
                                                ?>

                                            </div>
                                        </div>
                                            <?php } }?>
                                    </div>

                                </div>
                            </div>


                          
                      </div>
                </div>
              <!-- /.box-body -->
            </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9"  >
            <div class="box box-info box-solid ">
                <div class="box-header with-border">
                   <h3 class="box-title">Vehicle Profile</h3>
                </div>
                  <div class="box-body" style="min-height:600px;">
                        <div class="row">
                        <?php 
                               
                                if(isset($_GET['plate'])){
                                    $vehicle_id=getVehicleId($db_link,$_GET['plate']);   
                                    $result=getvehicleDetails($db_link,$vehicle_id);
                                    if($result){
                                        $vehicle=mysqli_fetch_row($result);
                         ?>
                                         <div class="col-md-4">
                                                 <!-- Widget: user widget style 1 -->
                                                <div class="box box-widget widget-user-2">
                                                   <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-yellow">
                                                        <div class="widget-user-image">
                                                            <img class="img-circle" src="images/carIcon3.png" alt="User Avatar">
                                                        </div>
                                                     <!-- /.widget-user-image -->
                                                        <h3 class="widget-user-username"> <b> <?php echo $_GET['plate']; ?> </b></h3>
                                                        <h5 class="widget-user-desc"><?php echo $vehicle[1]; ?></h5>
                                                    </div>
                                                   <div class="box-footer no-padding">
                                                     <ul class="nav nav-stacked">
                                                         <li><a href="#">Reg. valid until end of:<span class="pull-right badge bg-green">
                                                               <?php 
                                                                   if($vehicle[13]!=""){
                                                                       $date = DateTime::createFromFormat("m/d/Y",$vehicle[13]);
                                                                       echo $date->format("M")." ".$date->format("Y");
                                                                   }    
                                                               ?>
                                                               </span></a></li>
                                                       <li><a href="#">Mileage <span class="pull-right badge bg-aqua"><?php echo $vehicle[5]; ?> km</span></a></li>
                                                     
                                                       <li><a href="#">Total Trips <span class="pull-right badge bg-blue">31</span></a></li>
                                                       <li> <a href="addVehicleForm.php?plate=<?php echo $_GET['plate']; ?>"> <i class="fa fa-pencil "></i> <span>edit</span> </a></li>
                                                     </ul>
                                                   </div>
                                                </div>
                                                 <!-- /.widget-user -->
                                           </div>
                                            
                                            <div class="col-md-8">
                                                      <div class="col-md-12">
                                                                 <div class="box box-warning ">
                                                                   <div class="box-header with-border">
                                                                     <h3 class="box-title">Profile Details</h3>

                                                                     <div class="box-tools pull-right">
                                                                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                                       </button>
                                                                     </div>
                                                                     <!-- /.box-tools -->
                                                                   </div>
                                                                   <!-- /.box-header -->
                                                                   <div class="box-body">
                                                                        <div>
                                                                     <div>Make: <?php echo $vehicle[2]; ?> </div>
                                                                     <div>Model:  <?php echo $vehicle[1]; ?> </div>
                                                                     <div>Body Type:  <?php echo getCarType($db_link,$vehicle[11]); ?> </div>
                                                                     <div>Color:  <?php echo $vehicle[10]; ?></div>
                                                                     <div>Transmission:  <?php if($vehicle[19]=="2"){echo "Automatic";}else{ echo "Manual";}; ?></div>

                                                                 </div>
                                                             </div>
                                                             <!-- /.box-body -->
                                                           </div>
                                                           <!-- /.box -->
                                                      </div>
                                                     
                                                      <div class="col-md-12">
                                                                 <div class="box box-success ">
                                                                   <div class="box-header with-border">
                                                                     <h3 class="box-title">Technical Details</h3>

                                                                     <div class="box-tools pull-right">
                                                                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                                       </button>
                                                                     </div>
                                                                     <!-- /.box-tools -->
                                                                   </div>
                                                                   <!-- /.box-header -->
                                                                   <div class="box-body">
                                                                        <div>
                                                                     <div>Fuel Orientation:  <b> <?php echo $vehicle[12]; ?> </b></div>
                                                                     <div>Engine No:  <b> <?php echo $vehicle[15]; ?> </b></div>
                                                                     <div>Engine Capacity:  <b> <?php echo $vehicle[9]; ?> </b></div>
                                                                     <div>Chassis Number:  <b> <?php echo $vehicle[14]; ?> </b></div>
                                                                     
                                                                 </div>
                                                         </div>
                                                         <!-- /.box-body -->
                                                       </div>
                                                       <!-- /.box -->
                                                     </div>
                                                
                                                    
                                                      <div class="col-md-12">
                                                             <div class="box box-info collapsed-box">
                                                                   <div class="box-header with-border">
                                                                     <h3 class="box-title">Purchase Details</h3>

                                                                     <div class="box-tools pull-right">
                                                                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                                       </button>
                                                                     </div>
                                                                     <!-- /.box-tools -->
                                                                   </div>
                                                                   <!-- /.box-header -->
                                                                   <div class="box-body">
                                                                        <div>
                                                                             <div>Purchase Date:  <b> <?php echo $vehicle[4]; ?> </b></div>
                                                                             <div>Dealer:  <b> <?php echo $vehicle[3]; ?> </b></div>
                                                                             <div>Purchase Amount:  <b> <?php echo $vehicle[6]; ?> </b></div>
                                                                             <div>Purchasing Officer:  <b> <?php echo $vehicle[18]; ?> </b></div>
                                                                           
                                                                        </div>
                                                                 </div>
                                                         <!-- /.box-body -->
                                                             </div>
                                                       <!-- /.box -->
                                                     </div>
                                     </div>
                                                                          
                                              
                                <?php }}?>
                                                                                                      
                                                                 <!-- /.box-body -->
                                                             </div>
                                               </div>

                    </div>
      </div>
   


  <div class="modal" id="modal-default">
          <div class="modal-dialog ">
            <div class="modal-content col-md-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Vehicle Form</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" onclick="" class="btn btn-primary">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<script>

    
    function addVehicle(){
         $("#modal-default").modal();
        
        
    }
</script>
    <!-- /.row -->