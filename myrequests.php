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
                        <a href="compose.html" class="btn btn-success btn-block margin-bottom">New Request</a>

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
                                  <li ><a href="notifications.php"><i class="fa fa-inbox"></i> Notifications
                                  <span class="label label-primary pull-right">12</span></a></li>
                                  
                                  <li class="active"><a href="myrequests.php"><i class="fa fa-envelope-o"></i> My Request</a></li>
                                
                                  <!-- Supervisour -->
                                  <li><a href="triprequests.php"><i class="fa fa-file-text-o"></i> Trip Requests </a></li>
                                
                                  <!-- Fleet Officer -->
                                  <li><a href="fleetrequests.php"><i class="fa fa-filter"></i> Fleet Request <span class="label label-warning pull-right">65</span></a>
                                  </li>
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
                                    <li><a href="#"><i class="fa fa-circle text-yellow"></i> Pending </a></li>
                                    <li><a href="#"><i class="fa fa-circle text-success"></i> Approved </a></li>
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
                                            while($row = mysqli_fetch_row($result)){
                                                
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
                                                
                                                
                                                //-- Cancelled --
                                                if($row[21] == "1"){
                                                    echo "  <tr>
                                                            <td class='mailbox-star'><a href='#'><i class='fa fa-circle text-red'></i></a></td>
                                                            <td class='mailbox-name'><a href='#'><i class='fa fa-pencil text-yellow'></i></a></td>
                                                            
                                                            <td class='mailbox-date'><a href='viewrequest.php'><b>(".$row[10]." - ".$row[11].")</b> -"
                                                            . "From <b>".strtoupper(getBranchName($db_link,$row[26]))."</b>"
                                                            . " to  <b>".strtoupper($row[5])."</b> </a>
                                                            </td>
                                                                
                                                            <td class='mailbox-date'>".$val."</td>
                                                            <td class='mailbox-date'></td>
                                                        </tr>";
                                                    
                                                }else if($row[21] == "0"){
                                                    //--  --
                                                    if($row[11] == "0"){
                                                        
                                                        echo "<tr>
                                                                <td class='mailbox-star'><a href='#'><i class='fa fa-circle text-green'></i></a></td>
                                                                <td class='mailbox-name'><a href='#'><i class='fa fa-pencil text-yellow'></i></a></td>
                                                                <td class='mailbox-date'><a href='viewrequest.php'><b>(".$row[10]." - ".$row[11].")</b> -"
                                                                    . "From <b>".strtoupper(getBranchName($db_link,$row[26]))."</b>"
                                                                    . " to  <b>".strtoupper($row[5])."</b> </a>
                                                                    </td>

                                                                <td class='mailbox-date'>".$val."</td>
                                                                <td class='mailbox-date'></td>
                                                            </tr>";
                                                        
                                                    }else{
                                                        
                                                        echo "<tr>
                                                                <td class='mailbox-star'><a href='#'><i class='fa fa-circle text-green'></i></a></td>
                                                                <td class='mailbox-name'><a href='#'><i class='fa fa-pencil text-yellow'></i></a></td>
                                                                <td class='mailbox-date'><a href='viewrequest.php'><b>(".$row[10]." - ".$row[11].")</b> -"
                                                                    . "From <b>".strtoupper(getBranchName($db_link,$row[26]))."</b>"
                                                                    . " to  <b>".strtoupper($row[5])."</b> </a>
                                                                    </td>

                                                                <td class='mailbox-date'>".$val."</td>
                                                                <td class='mailbox-date'></td>
                                                            </tr>";
                                                        
                                                    }
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
