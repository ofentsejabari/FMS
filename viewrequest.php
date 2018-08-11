<!DOCTYPE html>
<html>
    <?php 
        include("headers.php");
        $page="request";
    ?>
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!--top-navigation-------->	
            <?php include("topNav.php"); ?>

            <!-- Left side column. contains the logo and sidebar -->
            <?php include("sideNav.php");
                $result = getRequestByID($db_link, $_GET["id"]);
            ?>

                        
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        
                        <h1> Request Details <small> <?php  echo '#'.$result[1]; ?> </small> </h1>
                      
                        <ol class="breadcrumb">
                            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="fleetrequests.php">Fleet Requets</a></li> 
                        </ol>
                      
                    </section>
                  
                    
                    <!-- Main content -->
                    <section class="content">
                        
                        <div class="nav-tabs-custom">


                            <div class="tab-content">

                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">

                                    <?php
                                        echo "<li class='time-label'>
                                                   <span class='bg-green'> ".explode(" ", $result[4])[0]."</span>
                                              </li>";
                                    ?>

                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo explode(" ", $result[4])[1]; ?></span>

                                            <h3 class="timeline-header"><a href="#"> <?php echo $result[0] ?> </a> 
                                                 <?php echo strtoupper(getBranchName($db_link, $result[26])). " to ". strtoupper($result[5]); ?> </h3>

                                            <div class="timeline-body">

                                                <div class="row invoice-info">
                                                    <div class="col-sm-12 invoice-col">
                                                        
<!--                                                        <ol>
                                                            <li>fullname -<?php echo $result[0]; ?></li>
                                                            <li>request_id -<?php echo $result[1]; ?></li>
                                                            <li>staff_id -<?php echo $result[2]; ?></li>
                                                            <li>vehicle_id -<?php echo $result[3]; ?></li>
                                                            <li>request_date -<?php echo $result[4]; ?></li> 
                                                            <li>request_destination - <?php echo $result[5]; ?></li>
                                                            <li>request_reason -<?php echo $result[6]; ?></li>
                                                            <li>request_approver_id -<?php echo $result[7]; ?></li>
                                                            <li>request_supervisor_id -<?php echo $result[8]; ?></li> 
                                                            <li>request_level -<?php echo $result[9]; ?></li>
                                                            <li>start_date -<?php echo $result[10]; ?></li>
                                                            <li>end_date -<?php echo $result[11]; ?></li>
                                                            <li>request_view -<?php echo $result[12]; ?></li>
                                                            <li>request_rejectReason -<?php echo $result[13]; ?></li>
                                                            <li>request_travellers -<?php echo $result[14]; ?></li>
                                                            <li>request_approval_date -<?php echo $result[15]; ?></li>
                                                            <li>request_supervisor_date -<?php echo $result[16]; ?></li>
                                                            <li>request_closure -<?php echo $result[17]; ?></li> 
                                                            <li>request_vehicle_transmission -<?php echo $result[18]; ?></li>
                                                            <li>type_id -<?php echo $result[19]; ?></li>
                                                            <li>request_duty_nature -<?php echo $result[20]; ?></li>
                                                            <li>request_supervisor_reason -<?php echo $result[21]; ?></li>
                                                            <li>request_cancelled -<?php echo $result[22]; ?></li>
                                                            <li>request_keyCollectiondate -<?php echo $result[23]; ?></li>
                                                            <li>request_keyReturnDate -<?php echo $result[24]; ?></li>
                                                            <li>request_supervisorRejectReason -<?php echo $result[25]; ?></li>
                                                            <li>branch_id -<?php echo $result[26]; ?></li>
                                                            <li>request_approval_note -<?php echo $result[27]; ?></li>
                                                            <li>request_driver -<?php echo $result[28]; ?></li>
                                                            <li>key_return_reminder -<?php echo $result[29]; ?></li>
                                                                
                                                                
                                                        </ol>-->


                                                        <p class="lead">Trip Summary</p>

                                                        <div class="row">
                                                            
                                                            <div class="col-md-4">
                                                                
                                                                <table class="table table-responsive table-striped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><p>Trip Start:</p></th>
                                                                            <td><?php echo $result[10]; ?></td>
                                                                            <th>Trip Ends:</th>
                                                                            <td><?php echo $result[11]; ?></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Assigned Supervisor:</th>
                                                                            <td><?php 
                                                                                    if($result[16] != ""){
                                                                                        if(strlen($result[25]) > 2){
                                                                                            echo getUserFull($db_link,$result[8]).
                                                                                                ' <span class="label label-danger">Rejected</span> '; 
                                                                                        }else{
                                                                                            echo getUserFull($db_link,$result[8]).
                                                                                                ' <span class="label label-success">Approved</span> ';
                                                                                        }
                                                                                    }else{
                                                                                        echo getUserFull($db_link,$result[8]).
                                                                                                ' <span class="label label-warning">Pending</span> '; 
                                                                                    }

                                                                                ?></td>

                                                                            <?php if($result[7] != "0"){ ?>
                                                                            <th>Fleet Officer:</th>
                                                                            <td><?php 
                                                                                    if($result[13] == ""){
                                                                                        echo getUserFull($db_link,$result[7]).
                                                                                                ' <span class="label label-success">Approved</span> '; 
                                                                                    }else{
                                                                                        echo getUserFull($db_link,$result[7]).
                                                                                                ' <span class="label label-danger">Rejected</span> '; 
                                                                                    }

                                                                                ?></td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-4">
                                                                
                                                                <table class="table table-responsive table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <th><p>Keys Status:</p></th>
                                                                        <td>
                                                                            <?php
                                                                            
                                                                                if($result[23] != "0"){
                                                                                    echo getUserFull($db_link,$result[7]).'<br>'.
                                                                                                $result[23].' <span class="label label-success">Collected</span> '; 
                                                                                }else if($result[24] != "0"){
                                                                                    echo getUserFull($db_link,$result[7]).'<br>'.
                                                                                                $result[24].' <span class="label label-success">Returned</span> ';
                                                                                }else{
                                                                                    echo getUserFull($db_link,$result[7]).'<br>'.
                                                                                                ' <span class="label label-warning">Not Collected</span> '; 
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr >
                                                                        
                                                                        <?php if($result[3] != "0"){ ?>
                                                                            <th><p>Reserved Vehicle:</p></th>
                                                                            <td>
                                                                                <?php

                                                                                    if($result[3] != "0"){
                                                                                        echo '<h4> <span class="label label-lg label-primary"> &nbsp &nbsp'.
                                                                                                mysqli_fetch_row(getvehicleDetails($db_link, $result[3]))[0].'&nbsp &nbsp</span> </h4>'; 
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                        <?php } ?>
                                                                        
                                                                    </tr>
                                                              </tbody></table>
                                                                
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-4">
                                                                
                                                                <table class="table table-responsive table-striped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th >Purpose of Trip:</th>
                                                                            <td ><?php echo $result[6]; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /.col -->
                                                </div>

                                            </div>

                                            <div class="timeline-footer">

                                                <?php 
                                                
                                                    if($result[23] == "0" && $result[22] == "0" && $result[2] == $_SESSION['fmsuser'] && strlen($result[25]) == 2){
                                                        //-- keys not collected and request not cancelled already--
                                                        echo "<button type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#cancel-request'> 
                                                                Cancel Request 
                                                             </button>";
                                                    }
                                                    
                                                    if($result[8] == $_SESSION['fmsuser']){

                                                        if($result[22] == "0" && $result[15] == "" && $result[16] == ""){//-- Not Cancelled, Not approved, Not supervisor processed --

                                                            echo " <button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#reject-request'> 
                                                                    Reject 
                                                                   </button>
                                                                   
                                                                   <button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#approve-request'> 
                                                                    Approve 
                                                                   </button>";
                                                        } 
                                                    }
                                                    
                                                    if($result[22] == "1"){
                                                        
                                                        echo '<h4><span class="label label-danger">Trip Cancelled</span></h4>';
                                                        
                                                    }
                                                    
                                                ?>
                                            </div>
                                            <!--------------------------------------->

                                        </div>
                                    </li>



                                    <?php 
                                        if($result[16] != ""){
                                            //-- Processed by supervisor --

                                            if(explode(" ", $result[4])[0] != explode(" ", $result[16])[0]){

                                                echo"<li class='time-label'>
                                                    <span class='bg-blue'> ".explode(" ", $result[16])[0]." </span>
                                                </li>";
                                            }


                                            echo "
                                                <li>
                                                    <i class='fa fa-user bg-aqua'></i>

                                                    <div class='timeline-item'>
                                                        <span class='time'><i class='fa fa-clock-o'></i> ".explode(" ", $result[16])[1]."</span>";

                                            if(strlen($result[25]) <= 2){ //
                                                       echo " <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[8])."</a> accepted trip request.
                                                        </h3>

                                                        <div class='timeline-body'>
                                                            Request waiting for fleet officer approval. 
                                                        </div>
                                                        
                                                        ";
                                            }else{
                                                echo "  <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[8])."</a> rejected your trip request.
                                                        </h3>

                                                        <div class='timeline-body'>
                                                            ". $result[13] ." 
                                                        </div>
                                                        <div class='timeline-footer'><p >  ".$result[25]. " </p>
                                                        ";
                                            }
                                            
                                            
                                            if($result[7] == "0" && $result[22] != "1" && $_SESSION['userrole'] == "1"){ //-- not processes by fleet officer and not cancelled --
                                                echo"<div class='timeline-footer'>
                                                          <button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#fleet-reject-request'> 
                                                                    Reject Request
                                                                   </button>
                                                                   
                                                                   <button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#fleet-approve-request'> 
                                                                    Approve Request
                                                                   </button>
                                                     </div>";
                                            }          
                                            echo " </div> </li>";
                                        }

                                        
                                        
                                        

                                        if($result[13] == "" && $result[7] != "0"){
                                            //-- approved by fleet office (request_rejectReason == "")--

                                            if(explode(" ", $result[4])[0] != explode(" ", $result[15])[0]){

                                                echo"<li class='time-label'>
                                                        <span class='bg-blue'> ".explode(" ", $result[15])[0]." </span>
                                                    </li>";
                                            }


                                            echo "
                                                <li>
                                                    <i class='fa fa-user bg-purple'></i>

                                                    <div class='timeline-item'>
                                                        <span class='time'><i class='fa fa-clock-o'></i> ".explode(" ", $result[15])[1]."</span>

                                                        <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[7])."</a> accepted trip request.
                                                        </h3>

                                                        <div class='timeline-body'>
                                                            Trip has been assigned vehicle -  <b><a href='#'>". mysqli_fetch_row(getvehicleDetails($db_link, $result[3]))[0] ."</a></b>.
                                                            Please collect the keys within 30 minutes. Failure to collect the keys within specified period may result in reallocation of the vehicle.
                                                                
                                                        </div>";
                                            
                                                    if($result[23] == "0" ){//-- keys not collected
                                                       
                                                        if(getVehicleStatus($db_link,$result[3])){
                                                            echo"<div class='timeline-footer'>
                                                                <button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#collect-keys'> 
                                                                    Collect Keys
                                                                   </button>
                                                            ";
                                                        }else{
                                                            echo"<div class='timeline-footer'>
                                                                <span class='label label-warning'>Vehicle not available</span> 
                                                            ";
                                                            
                                                        }
                                                    }
                                                    if($result[24] == "0" && $result[23] != "0" ){//-- keys not collected
                                                        
                                                        echo"<div class='timeline-footer'>
                                                                <button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#return-keys'> 
                                                                    Return Keys
                                                                </button>";
                                                    }
                                                        
                                                echo" </div> </li>";
                                        }
                                        
                                        
                                        if($result[13] != ""){
                                            //-- rejected by fleet office (request_rejectReason == "")--

                                            if(explode(" ", $result[4])[0] != explode(" ", $result[15])[0]){

                                                echo"<li class='time-label'>
                                                        <span class='bg-blue'> ".explode(" ", $result[15])[0]." </span>
                                                    </li>";
                                            }


                                            echo "
                                                <li>
                                                    <i class='fa fa-user bg-purple'></i>

                                                    <div class='timeline-item'>
                                                        <span class='time'><i class='fa fa-clock-o'></i> ".explode(" ", $result[15])[1]."</span>

                                                        <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[7])."</a> rejected trip request.
                                                        </h3>

                                                        <div class='timeline-body'>". $result[13].".
                                                                
                                                        </div>
                                                    </div>
                                                </li>";
                                        }

                                    ?>

                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>

                                  </ul>

                            </div>

                        </div>
                        
                    <!-- /.nav-tabs-custom -->
                    </section>
                    
                    
                </div>
                <!-- /.content-wrapper -->
            
                
                <div class="modal fade" id="return-keys">
                    
                    <div class="modal-dialog">
                        
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Return Keys</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <p> Returning keys will also close the trip and no further actions will take place.</p>
                                </div>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="returnKeyreturnKey('<?php echo $result[1] ?>')">Continue</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    
                </div>
                
                
                
                <div class="modal fade" id="collect-keys">
                    
                    <div class="modal-dialog">
                        
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Collect Keys</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <p> Keys collected already?</p>
                                </div>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="collectKey('<?php echo $result[1] ?>')">Yes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    
                </div>
             
            
                
                <div class="modal fade" id="reject-request">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Reject Request <small><?php echo "#".$result[1]; ?></small></h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Reason(s)</label>
                                    <textarea class="form-control" rows="3" placeholder="Reason(s) for rejection" id='reason' required="Required"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="rejectRequest('<?php echo $result[1] ?>', '<?php echo $_SESSION['fmsuser'] ?>')">Save changes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->  
                
                
                
                <div class="modal fade" id="approve-request">
                    
                    <div class="modal-dialog">
                        
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Approve Request</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <p> Are you sure you want to approve this trip request?</p>
                                </div>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="approveRequest('<?php echo $result[1] ?>', '<?php echo $_SESSION['fmsuser'] ?>')">Save changes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    
                </div>
                
                
                
                <div class="modal fade" id="cancel-request">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Cancel Request</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <p>Are you sure you want to cancel request?</p>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="cancelRequest('<?php echo $result[1] ?>')">Save changes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                
                
            
                
                <div class="modal fade" id="fleet-reject-request">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Reject Request <small><?php echo "#".$result[1]; ?></small></h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Reason(s)</label>
                                    <textarea class="form-control" rows="3" placeholder="Reason(s) for rejection" id='fleetReason' required="Required"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="fleetRejectRequest('<?php echo $result[1] ?>', '<?php echo $_SESSION['fmsuser'] ?>')">Save changes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->  
                
                
                
                <div class="modal fade" id="fleet-approve-request">
                    
                    <div class="modal-dialog">
                        
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Approve Request</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                               
                                
                                <div class="form-group">
                                    <label>Assign Vehicles</label>
                                    <select id="vehicle" class="form-control"  data-placeholder="Assign vehicle" style="width: 100%;" required>
                                        <?php
                                           
                                            $types = getCarTypes($db_link);
                                            
                                            while($row = mysqli_fetch_row($types)){
                                                
                                                echo "<optgroup label='".$row[1]."'><optgroup>";
                                                
                                                $rs = getAvailableCars($db_link, $row[0], $result[26]);
                                                
                                                while($row1 = mysqli_fetch_row($rs)){
                                                    if($row1[2] == "1"){
                                                        echo " <option value='".$row1[1]."'> ".$row1[0]." <span class='small'>( M )</span> </option> ";
                                                    }else{
                                                        echo " <option value='".$row1[1]."'> ".$row1[0]." <span class='small'>( A )</span> </option> ";                                                        
                                                    }
                                                }
                                            }
                                            
                                        ?>
                                    </select>
                                    
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" rows="3" placeholder="Approval note" id='note' required="Required"></textarea>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            
                            <div class="modal-footer">
                                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-primary" onclick="fleetApproveRequest('<?php echo $result[1] ?>', '<?php echo $_SESSION['fmsuser'] ?>')">Save changes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    
                </div>
                
                
            
            <?php include("footer.php"); ?>

            <!-- Control Sidebar -->
            <?php include("settings.php"); ?>

            <div class="control-sidebar-bg"></div>
          
        </div>
    <!-- ./wrapper -->

    <?php include("scripts.php"); ?>
    
    
    <script>
          
            
        function cancelRequest( request_id ){

            var formData = $(this).serialize();
            $.ajax({
                type : 'GET',
                url  : 'db_connect/validate.php?status=cancel&request_id=' + request_id,
                data : formData,
                dataType : 'html',
                success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
            });
        }
        
        
        function rejectRequest( request_id , user){
            if(document.getElementById('reason').value != ""){
                var formData = $(this).serialize();

                $.ajax({
                    type : 'GET',
                    url  : 'db_connect/validate.php?status=supervisorReject&request_id=' + request_id
                    +'&reason='+document.getElementById('reason').value+'&user_id=' + user,
                    data : formData,
                    dataType : 'html',
                    success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
                });
            }else{
                document.getElementById('reason').setAttribute("style", "border: 1px solid red;");  
            }
        }
        
        
        function approveRequest(request_id, user){

            $.ajax({
                type : 'GET', // define the type of HTTP verb we want to use (POST for our form)
                url : 'db_connect/validate.php?status=supervisor_approval' +'&user_id='+user +'&request_id='+request_id,
                dataType 	: 'html',
                success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
            });		 
        }
        
        
        function fleetRejectRequest(request_id, user){
            if(document.getElementById('fleetReason').value != ""){
                var formData = $(this).serialize();
                $.ajax({
                        type 		: 'GET',
                        url 		: 'db_connect/validate.php?status=reject&request_id='+request_id
                        +'&reason='+document.getElementById('fleetReason').value+'&user_id='+user,
                        data 		: formData,
                        dataType 	: 'html',
                        success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
                });
            }else{
                document.getElementById('fleetReason').setAttribute("style", "border: 1px solid red;");  
            }
        }
        
        
        function fleetApproveRequest(request_id, user){

            if(document.getElementById('vehicle').value != ""){
                $.ajax({
                    type : 'GET', // define the type of HTTP verb we want to use (POST for our form)
                    url  : 'db_connect/validate.php?status=approval'
                            + '&request_id=' + request_id
                            + '&vehicle_id=' + document.getElementById('vehicle').value
                            + '&user_id=' + user
                            + '&note='+ document.getElementById('note').value,
                    dataType 	: 'html',
                    success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
                });	
            }else{
                document.getElementById('vehicle').setAttribute("style", "border: 1px solid red;");  
            }
            
        }
        
        
        function collectKey(request_id){
            
            var formData = $(this).serialize();
            $.ajax({
                   type : 'GET',
                   url 	: 'db_connect/validate.php?status=collection&request_id='+request_id,
                   data : formData,
                   dataType : 'html',
                   success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
            });
        }


        function returnKey(request_id){
            
            alert('db_connect/validate.php?status=return&request_id='+request_id)
            
            var formData = $(this).serialize();
            $.ajax({
                type: 'GET',
                url: 'db_connect/validate.php?status=return&request_id='+request_id,
                data: formData,
                dataType: 'html',
                success: function(data){ window.location = "viewrequest.php?id=" + request_id; }
            });
        }
        
        
    </script>  
    

    </body>
</html>