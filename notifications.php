<!DOCTYPE html>
<html>
    <?php 
        include("headers.php");
        $page="request";
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
                                                    
                                                    while($row = mysqli_fetch_row($result)){
                                                        if($row[9] == "0"){
                                                            $unread+=1;                    
                                                        }
                                                    }
                                                    if($unread > 0){
                                                        echo '<span class="label label-warning pull-right">'.$unread."</span>";
                                                    }
                                                
                                                }?></a> </li>
                                      <li><a href="myrequests.php"><i class="fa fa-envelope-o"></i> My Request</a></li>

                                      <!-- Supervisour -->
                                      <li><a href="triprequests.php"><i class="fa fa-file-text-o"></i> Trip Requests </a></li>

                                      <li class="active"><a href="notifications.php"><i class="fa fa-inbox"></i> Notifications
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
                                          <li><a href="#"><i class="fa fa-circle text-aqua"></i> Unread</a></li>
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
                                    <h3 class="box-title">System Notifications</h3>
                                </div>
                                <!-- /.box-header -->

                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                        <tr>
                                          <th> - </th>
                                          <th> </th>
                                          <th> </th>
                                          <th> </th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td class="mailbox-star"><a href="#"><i class="fa fa-circle text-aqua"></i></a></td>
                                                <td class="mailbox-name">Ofentse Jabari</td>
                                                <td class="mailbox-subject"><a href="read-mail.html"><b>Approved by Supervisor</b></a></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>

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
                $('#example1').DataTable()
            })
        </script>


    </body>
</html>
