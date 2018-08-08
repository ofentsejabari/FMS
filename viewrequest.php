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
                        <h1>
                            Request Details
                            <small>#007612</small>
                        </h1>
                      
                        <ol class="breadcrumb">
                            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="fleetrequests.php">Fleet Requets</a></li>
                            <!--<li class="active">Invoice</li>-->
                        </ol>
                      
                    </section>
                  
                  

                    <div class="pad margin no-print">
                        <div class="callout callout-info" style="margin-bottom: 0!important;">
                            <h4><i class="fa fa-check-circle"></i> Approved:</h4>
                        </div>
                    </div>

                    
                    
                    <!-- Main content -->
                    <section class="invoice">
                        
                        
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header ">
                                    <i class="fa fa-globe"></i> Ofentse Jabari - BITRI B to KARAKUBIS
                                    <small class="pull-right">Date: 2/10/2014</small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                
<!--                                <button type="button" class="btn btn-success pull-right">
                                    <i class="fa fa-credit-card"></i> Submit Payment
                                </button>
                                
                                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                    <i class="fa fa-download"></i> Generate PDF
                                </button>-->
                            </div>
                        </div>
                      
                      
                      
                    </section>
                    <!-- /.content -->
                    
                    
                    
                  <div class="clearfix"></div>
                </div>
                <!-- /.content-wrapper -->
            
             
            
            
            
            <?php include("footer.php"); ?>

            <!-- Control Sidebar -->
            <?php include("settings.php"); ?>

          <div class="control-sidebar-bg"></div>
        </div>
    <!-- ./wrapper -->

    <?php include("scripts.php"); ?>

    </body>
</html>
