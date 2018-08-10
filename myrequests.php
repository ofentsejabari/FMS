<!DOCTYPE html>
<html>
	<?php include("headers.php"); ?>
    
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
                    Fleet Requests
                    <small>Control panel</small>
                </h1>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active">Requests</li>
                </ol>
            </section>

            
            <!-- Main content -->
            <section class="content">
                
                <div class="row">
                    <div class="col-md-3">
                        <a href="newrequest.php" class="btn btn-success btn-block margin-bottom">New Request</a>

                        <div class="box box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title">Folders</h3>

                              <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                              </div>
                            </div>

                            <div class="box-body no-padding">
                                
                              <ul class="nav nav-pills nav-stacked">
                                  
                                  <!-- Fleet Officer -->
                                  <li ><a href="fleetrequests.php"><i class="fa fa-filter"></i> Fleet Request 
                                            
                                        <?php 
                                        $result = getRequestHistory($db_link); 
                                        $unread = 0;
                                        if($result){
                                            echo '<span class="label label-warning pull-right">';
                                            while($row = mysqli_fetch_row($result)){
                                                if($row[13] == "0"){
                                                    $unread+=1;                    
                                                }
                                            }
                                        
                                            echo $unread."</span>"; 
                                        
                                        }?></a> </li>
                                  
                                  <li class="active"><a href="myrequests.php"><i class="fa fa-envelope-o"></i> My Request</a></li>
                                
                                  <!-- Supervisour -->
                                  <li><a href="triprequests.php"><i class="fa fa-file-text-o"></i> Trip Requests </a></li>
                                  
                                  <li ><a href="notifications.php"><i class="fa fa-inbox"></i> Notifications
                                  <span class="label label-primary pull-right">12</span></a></li>
                                
                                  
                              </ul>
                                
                            </div>
                            
                          <!-- /.box-body -->
                        </div>



                        <!-- /. box -->
                        <div class="box box-solid">
                              <div class="box-header with-border">
                                  <h3 class="box-title">Labels</h3>

                                  <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                  </div>
                              </div>

                              <div class="box-body no-padding">
                                  <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"><i class="fa fa-circle text-red"></i> Cancelled</a></li>
                                    <li><a href="#"><i class="fa fa-circle text-maroon"></i> Rejected </a></li>
                                    <li><a href="#"><i class="fa fa-circle text-yellow"></i> Pending </a></li>
                                    <li><a href="#"><i class="fa fa-circle text-green"></i> Approved </a></li>
                                    <li><a href="#"><i class="fa fa-circle text-blue"></i> Complete </a></li>
                                    
                                  </ul>
                              </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        
                    </div>
                    
                    
                    
                    <!-- /.col -->
                    <div class="col-md-9">

                        <div class="box">
                            
                            <div class="box-header">
                                <h3 class="box-title">My Requests</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <table id="requests" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th> - </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th > </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php  
                                            $result = getMyRequestHistory($db_link, $_SESSION['fmsuser']);
                                            
                                            if($result){
                                                while($row = mysqli_fetch_row($result)){

                                                    $f = "<ol>
                                                                <li>fullname -".$row[0]."</li>
                                                                <li>request_id -". $row[1]."</li>
                                                                <li>staff_id -". $row[2]."</li>
                                                                <li>vehicle_id -". $row[3]."</li>
                                                                <li>request_date -". $row[4]."</li> 
                                                                <li>request_destination -". $row[5]."</li>
                                                                <li>request_reason -". $row[6]."</li>
                                                                <li>request_approver_id -". $row[7]."</li>
                                                                <li>request_supervisor_id -". $row[8]."</li> 
                                                                <li>request_level -".$row[9]."</li>
                                                                <li>start_date -". $row[10]."</li>
                                                                <li>end_date -". $row[11]."</li>
                                                                <li>request_view -". $row[12]."</li>
                                                                <li>request_rejectReason -". $row[13]."</li>
                                                                <li>request_travellers -". $row[14]."</li>
                                                                <li>request_approval_date -". $row[15]."</li>
                                                                <li>request_supervisor_date -". $row[16]."</li>
                                                                <li>request_closure -". $row[17]."</li> 
                                                                <li>request_vehicle_transmission -". $row[18]."</li>
                                                                <li>type_id -". $row[19]."</li>
                                                                <li>request_duty_nature -". $row[20]."</li>
                                                                <li>request_supervisor_reason -". $row[21]."</li>
                                                                <li>request_cancelled -". $row[22]."</li>
                                                                <li>request_keyCollectiondate -". $row[23]."</li>
                                                                <li>request_keyReturnDate -". $row[24]."</li>
                                                                <li>request_supervisorRejectReason -". $row[25]."</li>
                                                                <li>branch_id -". $row[26]."</li>
                                                                <li>request_approval_note -". $row[27]."</li>
                                                                <li>request_driver -". $row[28]."</li>
                                                                <li>key_return_reminder -". $row[29]."</li>


                                                            </ol>";

                                                    $date1 = date_create(date(""));
                                                    $date2 = date_create($row[4]);

                                                    $val="";
                                                    $diff = date_diff($date2,$date1);

                                                    if($diff -> format("%a")>= 1){
                                                        $val = $diff -> format("%a days ago");

                                                    }else{
                                                        if($diff -> format("%h") < 1){
                                                            $val = $diff -> format("%i mins ago");
                                                        }
                                                        else{
                                                            $val = $diff -> format("%h hours ago");
                                                        }
                                                    }


                                                    $fm = "";

                                                    if($row[16] != "" && $row[15] != ""){$fm = "text-green";}
                                                    if($row[16] == "" || $row[15] == ""){$fm = "text-yellow";}
                                                    if($row[24] == "1"){$fm = "text-blue";}

                                                    if($row[22] != "0"){$fm = "text-red";}

                                                    if(strlen($row[13]) > 0 || strlen($row[25]) > 2){$fm = "text-maroon";}

                                                    echo "<tr>  <td class='mailbox-star'><a href='#'><i class='fa fa-circle ".$fm."'></i></a></td>
                                                                <td class='mailbox-name'><a href='#'><i class='fa fa-pencil text-yellow'></i></a></td>

                                                                <td class='mailbox-date'><a href='viewrequest.php?id=".$row[1]."'><b>(".$row[10]." - ".$row[11].")</b> -"
                                                                . "From <b>".strtoupper(getBranchName($db_link,$row[26]))."</b>"
                                                                . " to  <b>".strtoupper($row[5])."</b> </a>
                                                                </td>

                                                                <td class='mailbox-date'>".$val."</td>
                                                                <td class='mailbox-date'></td>
                                                          </tr>";
                                                }
                                            }
                                       ?>               
                                    </tbody>
                                    
                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        
                    <!-- /.box -->
                    </div>
                    
                <!-- /.col -->
                </div>
                <!-- /.row -->
                
                
            </section>
            <!-- right col -->
            
        </div>

        <!-- /.content-wrapper -->
        <?php include("footer.php"); ?>

        <!-- Control Sidebar -->
        <?php include("settings.php"); ?>
        
        <div class="control-sidebar-bg"></div>
    </div>
    
    
    

    <?php include("scripts.php"); ?>
    
    
    <script>
        $(function () {
          $('#requests').DataTable()
        })
    </script>
    

</body>
</html>
