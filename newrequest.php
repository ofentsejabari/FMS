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
                New Request
                <small></small>
            </h1>
            
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="fleetrequests.php">Requests</a></li>
                <li class="active">New Request</li>
            </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Request Details</h3>

                    <div class="box-tools pull-right">
    <!--                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
                    </div>
                </div>
              
              
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="requestForm">
                        <input id="user" type="text" value="<?php echo $_SESSION['fmsuser']; ?>" hidden/>
                        <div class="row">

                            <div class="col-md-6">

                                <!--Destination-->
                                <div class="form-group">
                                    <label>Destination</label>

                                    <input id="destination" type="text" class="form-control" placeholder="Destination" required>

                                </div>
                                
                               
                                <!--Drivers-->
                                <div class="form-group">
                                    <label>Driver(s)</label>
                                    <select id="drivers" class="form-control select2" multiple="multiple" data-placeholder="Select driver(s)" style="width: 100%;" required>
                                        <?php
                                            
                                            $departments = getDepartments($db_link);
                                            
                                            while($dept = mysqli_fetch_row($departments)){
                                                
                                                echo "<optgroup label='".$dept[1]."'><optgroup>";
                                                $result = getDepartmentUsers($db_link, $dept[0]);
                                                
                                                while($row = mysqli_fetch_row($result)){
                                                    echo " <option value='".$row[0]."'> ".$row[1]." </option> ";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>


                                 
                                <div class="form-group">
                                    <label>Departure Branch</label>
                                    <select id="branch" class="form-control select2"  style="width: 100%;" required>
                                        <?php 
                                            $result = getBranches($db_link);
                                            while($row = mysqli_fetch_row($result)){
                                                echo " <option value='".$row[0]."'> ".$row[1]." </option> ";
                                            }
                                        ?>
                                    </select>
                                </div>


                                <!--trip purpose-->
                                <div class="form-group">
                                    
                                    <label>Trip Purpose</label>
                                    <textarea id="reason" class="textarea" id="purpose" name="purpose" rows="10" cols="80" style="width: 100%;" required>

                                    </textarea>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <!--travelling offices-->
                                <div class="form-group">
                                    <label>Travelling Officers</label>
                                    <select id="travelling" class="form-control select2" multiple="multiple" data-placeholder="Select travelling officers" style="width: 100%;" required>
                                        <?php 
                                            $departments = getDepartments($db_link);
                                            
                                            while($dept = mysqli_fetch_row($departments)){
                                                
                                                echo "<optgroup label='".$dept[1]."'><optgroup>";
                                                $result = getDepartmentUsers($db_link, $dept[0]);
                                                
                                                while($row = mysqli_fetch_row($result)){
                                                    echo " <option value='".$row[0]."'> ".$row[1]." </option> ";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    
                                    <label>Trip Period</label>
                                    <div class="input-group">

                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input  type="text" class="form-control pull-right" id="reservation" required>

                                    </div>


                                    <div class="form-group">

                                        <label>Supervisor</label>
                                        <select id="supervisor" class="form-control select2"  style="width: 100%;" required>
                                            <?php 
						$result =getSupervisors($db_link);
                                                
						while($row = mysqli_fetch_row($result)){
                                                    echo " <option value='".$row[1]."'> ".$row[0]." </option> ";
						}
                                            ?>
                                        </select>

                                    </div>
                                    
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->


                        </div>


                        <div class="box-header with-border">
                            <h3 class="box-title">Vehicle Preferences</h3>

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Gearbox /Transmission</label>

                                    <select id="transmission" class="form-control select2" style="width: 100%;" required>
                                        <option value="1">Automatic</option>
                                        <option value="2">Manual</option>
                                        <option value="3">Either</option>
                                    </select>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Vehicle Type</label>
                                    <select id="vehicleType" class="form-control select2"  style="width: 100%;" required>
                                        <?php 
                                            $results = getCarTypes($db_link);
                                            if($results){

                                                while($row = mysqli_fetch_row($results)){

                                                    $number_available = getNoAvailableCars($db_link,$row[0]);
                                                    echo "<option value =".$row[0].">".$row[1]."  ( ".$number_available." )</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-default"><i class="fa fa-trash"></i> &nbsp; Clear </button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> &nbsp; Send </button>
                            </div>
                            <a href="fleetrequests.php"  class="btn btn-default"><i class="fa fa-times"></i> &nbsp; Discard </a>
                        </div>

                    </form>

                </div>
                <!-- /.box -->

          </div>
          
          
        </section>
        <!-- /.content -->
    </div>
    
    
    
    <!---modal---->
        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
             
              <div class="modal-body text-center">
                    <p>Successfully Submitted</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    
      <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning Modal</h4>
              </div>
              <div class="modal-body">
                <p>An error occured while submiting.. plese refresh the page and try again.. if the error persists contact administator</p>
              </div>
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
    
    
    
    <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>

    <!-- Control Sidebar -->
    <?php include("settings.php"); ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include("scripts.php"); ?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
    
    
    $('.textarea').wysihtml5()
    
    
  })
  
  
  
  /**
   * 
   */
  
$('#requestForm').submit(function(event) {
    
      // drivers department trasmission
        if(document.getElementById("destination").value!="" && document.getElementById("drivers").value!=""
           && document.getElementById("branch").value!="" && document.getElementById("reason").value!="" 
           && document.getElementById("travelling").value!="" && document.getElementById("reservation").value!="" 
           && document.getElementById("supervisor").value!="" && document.getElementById("transmission").value!=""
           && document.getElementById("vehicleType").value!=""
                ){
                   
                    var logindata = $(this).serialize();
                    
                    $.ajax({
                            type : 'GET', // define the type of HTTP verb we want to use (POST for our form)
                            url : 'db_connect/validate.php?status=request'
                            +'&user='+document.getElementById("user").value
                            +'&destination='+document.getElementById("destination").value
                            +'&drivers='+document.getElementById("drivers").value
                            +'&branch='+document.getElementById("branch").value
                            +'&reason='+document.getElementById("reason").value
                            +'&travelling='+document.getElementById("travelling").value
                            +'&reservation='+document.getElementById("reservation").value
                            +'&supervisor='+document.getElementById("supervisor").value
                            +'&transmission='+document.getElementById("transmission").value
                            +'&vehicleType='+document.getElementById("vehicleType").value
                            ,
                            dataType 	: 'html',
                            success: function(data){ window.location = "myrequests.php"; }
                    });
					
                                       
        }
        else{
            
            $("#modal-warning").modal();
        }
        
        event.preventDefault();
  });
  
  
</script>
</body>
</html>
