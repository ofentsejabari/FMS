
<link rel="stylesheet" href="assets/magnific_popup/dist/magnific-popup.css">
<script src="assets/magnific_popup/dist/jquery.magnific-popup.js"></script>

<script>
	$(document).ready(function() {
		$('.popup-with-form').magnificPopup({
			type: 'inline'
		});
		
		$(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
	});
	});
	

</script>	
<!DOCTYPE html>
<html>
	<?php include("headers.php");	?>
    
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
						Fleet Inventory
					  </h1>
					  <ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Fleet Inventory</li>
					  </ol>
				</section>

				<!-- Main content -->
				<section class="content">
                                  
                                        
                                        <form name="addForm" id="addForm" style=" padding:10px; height:100%; " role="form">
                                                        <div class="box box-info">
                                                                    <div class="box-header with-border">
                                                                             <h3 class="box-title">Vehicle Form</h3>
                                                                    </div>
                                                            
                                                            
                                                                    <div class="box-body">
                                                                     
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                        
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Body Type</label>
                                                                                                <select class="form-control select2"  style="width: 100%;" required>
                                                                                                    <?php
                                                                                                        $result=getCarTypes($db_link);
                                                                                                       while($row1=mysqli_fetch_row($result))
                                                                                                        { 
                                                                                                    ?>
															<option value='<?php echo $row1[0]?>'><?php echo $row1[1] ?></option>
                                                                                                    <?php   } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                    
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label>Vehicle Transmission</label>
                                                                                                <select class="form-control select2"  style="width: 100%;" required>
                                                                                                    <option value='1'>manual</option>	
                                                                                                    <option value='2'>automatic</option>
                                                                                                </select>
                                                                                            </div>
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Vehicle Registration No.</label>
                                                                                                <div class="input-group ">
                                                                                                   <div class="input-group-addon">
                                                                                                       <i class="fa fa-registered"></i>
                                                                                                    </div>
                                                                                                    <input id='registration' type="text" class="form-control" required>

                                                                                                    
                                                                                                </div>
                                                                                            </div>    
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label>Vehicle Tracker Identifier</label>
                                                                                                <div class="input-group ">
                                                                                                   <div class="input-group-addon">
                                                                                                       <i class="fa fa-map-marker"></i>
                                                                                                    </div>
                                                                                                    <input id='identifier' type="text" class="form-control" required>

                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label>Color</label>
                                                                                                
                                                                                                    <input id='color' type="text" class="form-control" required>
                                                                                             </div>


                                                                                </div>
                                                                                <div class="col-md-6">

                                                                                            <div class="form-group">
                                                                                                <label>Vehicle Model</label>
                                                                                                <input id='model' type="text" class="form-control" required>
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label>Manufacture</label>
                                                                                                <input id='model' type="text" class="form-control" required>
                                                                                            </div>
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Registration Date</label>

                                                                                                    <div class="input-group date">
                                                                                                        <div class="input-group-addon">
                                                                                                          <i class="fa fa-calendar"></i>
                                                                                                        </div>
                                                                                                        <input type="text" class="form-control pull-right" id="datepicker">
                                                                                                    </div>
                                                                                            <!-- /.input group -->
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Registration Date</label>

                                                                                                    <div class="input-group date">
                                                                                                        <div class="input-group-addon">
                                                                                                          <i class="fa fa-calendar"></i>
                                                                                                        </div>
                                                                                                        <input type="text" class="form-control pull-right" id="datepicker">
                                                                                                    </div>
                                                                                            <!-- /.input group -->
                                                                                            </div>

                                                                                    <h4>With checkbox and radio inputs</h4>

                                                                                    <div class="row">
                                                                                      <div class="col-lg-6">
                                                                                        <div class="input-group">
                                                                                              <span class="input-group-addon">
                                                                                                <input type="checkbox">
                                                                                              </span>
                                                                                          <input type="text" class="form-control">
                                                                                        </div>
                                                                                        <!-- /input-group -->
                                                                                      </div>
                                                                                      <!-- /.col-lg-6 -->
                                                                                      <div class="col-lg-6">
                                                                                        <div class="input-group">
                                                                                              <span class="input-group-addon">
                                                                                                <input type="radio">
                                                                                              </span>
                                                                                          <input type="text" class="form-control">
                                                                                        </div>
                                                                                        <!-- /input-group -->
                                                                                      </div>
                                                                                      <!-- /.col-lg-6 -->
                                                                                    </div>
                                                                                    <!-- /.row -->

                                                                                    <h4>With buttons</h4>

                                                                                    <p class="margin">Large: <code>.input-group.input-group-lg</code></p>

                                                                                    <div class="input-group input-group-lg">
                                                                                      <div class="input-group-btn">
                                                                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action
                                                                                          <span class="fa fa-caret-down"></span></button>
                                                                                        <ul class="dropdown-menu">
                                                                                          <li><a href="#">Action</a></li>
                                                                                          <li><a href="#">Another action</a></li>
                                                                                          <li><a href="#">Something else here</a></li>
                                                                                          <li class="divider"></li>
                                                                                          <li><a href="#">Separated link</a></li>
                                                                                        </ul>
                                                                                      </div>
                                                                                      <!-- /btn-group -->
                                                                                      <input type="text" class="form-control">
                                                                                    </div>
                                                                                    <!-- /input-group -->
                                                                                    <p class="margin">Normal</p>

                                                                                    <div class="input-group">
                                                                                      <div class="input-group-btn">
                                                                                        <button type="button" class="btn btn-danger">Action</button>
                                                                                      </div>
                                                                                      <!-- /btn-group -->
                                                                                      <input type="text" class="form-control">
                                                                                    </div>
                                                                                    <!-- /input-group -->
                                                                                    <p class="margin">Small <code>.input-group.input-group-sm</code></p>

                                                                                    <div class="input-group input-group-sm">
                                                                                      <input type="text" class="form-control">
                                                                                          <span class="input-group-btn">
                                                                                            <button type="button" class="btn btn-info btn-flat">Go!</button>
                                                                                          </span>
                                                                                    </div>
                                                                                    <!-- /input-group -->
                                                                                  </div>
                                                                            </div>    
                                                                    <!-- /.box-body -->
                                                                  </div>

                                        </form>
                              </section>
					<!-- right col -->
			</div>
			  <!-- /.row (main row) -->

		
		  <!-- /.content-wrapper -->
		<?php include("footer.php"); ?>

			<!-- Control Sidebar -->
		<?php include("settings.php"); ?>
			<!-- /.control-sidebar -->
		  <!-- Add the sidebar's background. This div must be placed
			   immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
        <?php include("scripts.php");?>
 
</body>
</html>


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
  })
  </script>  

