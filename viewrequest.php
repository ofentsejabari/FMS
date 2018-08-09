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
            <?php include("sideNav.php");?>

                        
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1> Request Details <small>#007612</small> </h1>
                      
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

                                        $result = getRequestByID($db_link, $_GET["id"]);
                                        //print_r($result);

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

                                                        <ol>
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
                                                                
                                                                
                                                        </ol>

                                                    </div>
                                                    <!-- /.col -->
                                                </div>

                                            </div>

                                            <div class="timeline-footer">

                                                <?php 

                                                    if($result[23] != "0" && $result[22] != "1"){
                                                        //-- keys not collected and request not cancelled already--
                                                        echo "<a class='btn btn-primary btn-xs'>Cancel Request</a>";
                                                    }


                                                    if($result[21] == "0" && $result[15] == "" && $result[16] == ""){//-- Not Cancelled, Not approved, Not supervisor processed --
                                                        echo " <button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modal-default'> 
                                                                Reject 
                                                               </button>
                                                               <a class='btn btn-success btn-xs'>Approve</a>";
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

                                            if($result[13] == ""){ //
                                                       echo " <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[8])."</a> accepted trip request.
                                                        </h3>

                                                        <div class='timeline-body'>
                                                            Request waiting for fleet officer approval. 
                                                        </div>
                                                        ";
                                            }else{
                                                echo " <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[8])."</a> rejected your trip request.
                                                        </h3>

                                                        <div class='timeline-body'>
                                                            ". $result[13] ." 
                                                        </div>
                                                        ";
                                                
                                            }
                                            
                                            
                                            if($result[7] != "" && $result[22] != "1"){ //-- not proceed and not cancelled --
                                                echo "<div class='timeline-footer'>
                                                            <a class='btn btn-success btn-xs'>Approve</a>
                                                            <a class='btn btn-danger btn-xs'>Reject</a>
                                                        </div>";
                                            }
                                                        
                                            echo " </div> </li>";
                                        }





                                        if($result[15] != ""){
                                            //-- Processed by supervisor --

                                            if(explode(" ", $result[4])[0] != explode(" ", $result[15])[0]){

                                                echo"<li class='time-label'>
                                                        <span class='bg-blue'> ".explode(" ", $result[15])[0]." </span>
                                                    </li>";
                                            }


                                            echo "
                                                <li>
                                                    <i class='fa fa-user bg-aqua'></i>

                                                    <div class='timeline-item'>
                                                        <span class='time'><i class='fa fa-clock-o'></i> ".explode(" ", $result[15])[1]."</span>

                                                        <h3 class='timeline-header'><a href='#'>".getUserFull($db_link,$result[7])."</a> accepted trip request.
                                                        </h3>

                                                        <div class='timeline-body'>
                                                            Assigned Vehicle -  ". getV$result[3] ."
                                                        </div>

                                                        <div class='timeline-footer'>
                                                            <a class='btn btn-warning btn-xs'>Keys Collected</a>
                                                            <a class='btn btn-warning btn-xs'>Return Keys</a>
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
            
             
            
                
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Default Modal</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <p>One fine body&hellip;</p>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->    
                
                
            
            
            <?php include("footer.php"); ?>

            <!-- Control Sidebar -->
            <?php include("settings.php"); ?>

            <div class="control-sidebar-bg"></div>
          
        </div>
    <!-- ./wrapper -->

    <?php include("scripts.php"); ?>

    </body>
</html>