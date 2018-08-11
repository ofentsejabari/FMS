
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
	<?php include("headers.php");	
             $page="inventory";
             $subpage="all";
             
             if(isset($_GET['plate'])){
                    $vehicle_id=getVehicleId($db_link,$_GET['plate']);   
                    $result=getvehicleDetails($db_link,$vehicle_id);
                    $vehicle="";
                    if($result){
                       $vehicle=mysqli_fetch_row($result);
                    }   
                    
             }       
             
             
             
             
             
             
             
             
             
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
						Fleet Inventory
					  </h1>
					  <ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Fleet Inventory</li>
					  </ol>
				</section>

				<!-- Main content -->
				<section class="content">
                                  
                                        
                                        <form name="addForm" id="addForm" style=" padding:10px;" role="form">
                                                        
                                                
                                                        <div class="box box-info">
                                                                    <div class="box-header with-border">
                                                                             <h3 class="box-title">Vehicle Form</h3>
                                                                    </div>
                                                            
                                                            
                                                                    <div class="box-body">
                                                                     
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                        
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Body Type</label>
                                                                                                <select id="bodyType" class="form-control select2"  style="width: 100%;" required>
                                                                                                    <?php
                                                                                                        $result=getCarTypes($db_link);
                                                                                                       while($row1=mysqli_fetch_row($result))
                                                                                                        { 
                                                                                                    ?>
                                                                                                                        <option selected='<?php if(isset($_GET['plate'])){ if($row1[0]==$vehicle[0]){ echo "selected";}}?>' value='<?php echo $row1[0]?>'><?php echo $row1[1] ?></option>
                                                                                                    <?php   } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                    
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label>Vehicle Transmission</label>
                                                                                                <select id="transmission" class="form-control select2"  style="width: 100%;" required>
                                                                                                    <option selected='<?php if(isset($_GET['plate'])){ if('1'==$vehicle[19]){ echo "selected";}}?>'  value='1'>manual</option>	
                                                                                                    <option selected='<?php if(isset($_GET['plate'])){ if('2'==$vehicle[19]){ echo "selected";}}?>' value='2'>automatic</option>
                                                                                                </select>
                                                                                            </div>
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Vehicle Registration No.</label>
                                                                                                <div class="input-group ">
                                                                                                   <div class="input-group-addon">
                                                                                                       <i class="fa fa-registered"></i>
                                                                                                    </div>
                                                                                                    <input value='<?php if(isset($_GET['plate'])){echo $_GET['plate'] ;}?>'  id='registration' type="text" class="form-control" required>

                                                                                                    
                                                                                                </div>
                                                                                            </div>    
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label>Vehicle Tracker Identifier</label>
                                                                                                <div class="input-group ">
                                                                                                   <div class="input-group-addon">
                                                                                                       <i class="fa fa-map-marker"></i>
                                                                                                    </div>
                                                                                                    <input   id='trackerId' type="text" class="form-control">

                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                    
                                                                                             <div class="form-group">
                                                                                                <label>Color</label>
                                                                                                
                                                                                                    <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[10] ;}?>'  id='color' type="text" class="form-control" required>
                                                                                             </div>


                                                                                </div>
                                                                                <div class="col-md-6">

                                                                                            <div class="form-group">
                                                                                                <label>Vehicle Model</label>
                                                                                                <input id='model' value='<?php if(isset($_GET['plate'])){echo $vehicle[1] ;}?>'  type="text" class="form-control" required>
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label>Manufacture</label>
                                                                                                <input id='manufacture' value='<?php if(isset($_GET['plate'])){echo $vehicle[2] ;}?>'  type="text" class="form-control" required>
                                                                                            </div>
                                                                                    
                                                                                    
                                                                                    
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label>Manufacture Year</label>

                                                                                                    <div class="input-group date">
                                                                                                        <div class="input-group-addon">
                                                                                                          <i class="fa fa-calendar"></i>
                                                                                                        </div>
                                                                                                        <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[17] ;}?>' type="text" class="form-control pull-right " id="year" required>
                                                                                                    </div>
                                                                                            <!-- /.input group -->
                                                                                            </div>
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Registration Date</label>

                                                                                                    <div class="input-group date">
                                                                                                        <div class="input-group-addon">
                                                                                                          <i class="fa fa-calendar"></i>
                                                                                                        </div>
                                                                                                        <input value='<?php if(isset($_GET['plate'])){echo $vehicle[13] ;}?>' type="text" class="datepicker  form-control pull-right" id="registrationDate" required>
                                                                                                    </div>
                                                                                            <!-- /.input group -->
                                                                                            </div>

                                                                                   
                                                                                    <!-- /input-group -->
                                                                                  </div>
                                                                            </div>    
                                                                    <!-- /.box-body -->
                                                              
                                                  <fieldset>
                                                                      <legend style=" color:#009900; font-size:14px">Technical Details</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Fuel Orientation</label>
                                                                                                <select id="fuel" class="form-control select2"  style="width: 100%;" required>
                                                                                                    <option  selected='<?php if(isset($_GET['plate'])){ if('Petrol'==$vehicle[12]){ echo "selected";}}?>' value='Petrol'>Petrol</option>	
                                                                                                    <option selected='<?php if(isset($_GET['plate'])){ if('Diesel'==$vehicle[12]){ echo "selected";}}?>' value='Diesel'>Diesel</option>
                                                                                                </select>
                                                                                            </div>
                                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Engine Number</label>
                                                                                              
                                                                                                    <input value='<?php if(isset($_GET['plate'])){echo $vehicle[15] ;}?>' id='engine' type="text" class="form-control" required>

                                                                                            </div>    
                                                                    
                                                                                            <div class="form-group">
                                                                                                <label>Engine Capacity</label>
                                                                                               
                                                                                                    <input value='<?php if(isset($_GET['plate'])){echo $vehicle[2] ;}?>' id='capacity' type="text" class="form-control" required>

                                                                                            </div>   
                                                                </div>
                                                               
                                                                <div class="col-md-6">
                                                                           
                                                                            <div class="form-group">
                                                                                    <label>Chassis Number</label>
                                                                                    
                                                                                        <input value='<?php if(isset($_GET['plate'])){echo $vehicle[14] ;}?>' id='chassis' type="text" class="form-control" required>
                                                                            </div> 
                                                                    
                                                                            <div class="form-group">
                                                                                    <label>mileage</label>
                                                                                        <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[5] ;}?>' onkeypress="return isNumber(event)" id='mileage' type="text" class="form-control" required>
                                                                                  
                                                                            </div> 
                                                                    
                                                                            
                                                                </div>
                                                            </div> 
                                                 </fieldset>
                                                                    <?php if(!isset($_GET['plate'])){ ?>'
                                                                    
                                                 <fieldset>
                                                    <legend style=" color:#009900; font-size:14px">Service details</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    
                                                                    <div class="form-group">
                                                                             <label>Service Mileage</label>
                                                                             <input  onkeypress="return isNumber(event)"  id='serviceMileage' type="text" class="form-control">
                                                                             
                                                                    </div> 
                                                                    
                                                                    <div class="form-group">
                                                                            <label>Service Date</label>

                                                                                <div class="input-group date">
                                                                                    <div class="input-group-addon">
                                                                                      <i class="fa fa-calendar"></i>
                                                                                    </div>
                                                                                    <input type="text" class="datepicker  form-control pull-right" id="serviceDate">
                                                                                </div>
                                                                        <!-- /.input group -->
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                             <label>Service Center</label>
                                                                             <input onkeypress="return isNumber(event)"  id='serviceCenter' type="text" class="form-control">
                                                                             
                                                                    </div> 
                                                                    
                                                                </div>
                                                            <div class="col-md-6">
                                                                    
                                                                    <div class="form-group">
                                                                             <label>Service Type</label>
                                                                             <input  id='serviceType' type="text" class="form-control">
                                                                             
                                                                    </div> 
                                                                    
                                                                   <div class="form-group">
                                                                             <label>Service Amount</label>
                                                                             <input onkeypress="return isNumber(event)"  id='serviceAmount' type="text" class="form-control">
                                                                             
                                                                    </div> 
                                                                    
                                                                    <div class="form-group">
                                                                             <label>Officer </label>
                                                                             <input   id='officer' type="text" class="form-control">
                                                                    </div> 
                                                                    
                                                            </div>
                                                                
                                                                
                                                            </div>
                                                 </fieldset>
                                                                    <?php } ?>
                                                 <fieldset>                       
                                                        <legend style=" color:#009900; font-size:14px">Purchase Details</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Purchase Date</label>

                                                                                <div class="input-group date">
                                                                                    <div class="input-group-addon">
                                                                                      <i class="fa fa-calendar"></i>
                                                                                    </div>
                                                                                    <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[4] ;}?>' type="text" class="datepicker  form-control pull-right" id="purchaseDate" required>
                                                                                </div>
                                                                        <!-- /.input group -->
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
                                                                                 <label>Dealer</label>
                                                                                 <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[3] ;}?>' id='dealer' type="text" class="form-control" required>
                                                                        </div> 
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                             <label>Purchase Amount</label>
                                                                             <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[7] ;}?>' onkeypress="return isNumber(event)"  id='purchaseAmount' type="text" class="form-control" required>
                                                                             
                                                                        </div> 
                                                             
                                                                        <div class="form-group">
                                                                                 <label>Purchase Officer</label>
                                                                                 <input  value='<?php if(isset($_GET['plate'])){echo $vehicle[18] ;}?>'  id='purchaseOfficer' type="text" class="form-control" required>
                                                                        </div> 
                                                                </div>
                                                            </div>   
                                                </fieldset>
                                                <fieldset>                       
                                                        <legend style=" color:#009900; font-size:14px">Branch Details</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                            
                                                                    <select id="branch" class="form-control select2"  style="width: 100%;" required>	
                                                                        <?php
										$result=getBranches($db_link);
										if($result){ 
											while($row=mysqli_fetch_row($result))
											{
                                                                                                if(!isset($_GET['plate'])){
                                                                                                	echo "<option   value='".$row[0]."'>".$row[1]."</option>";
                                                                                                }
                                                                                                else{
                                                                                                    //CHECK VEHICLE BRANCH
                                                                                                    if($vehicle[20]==$row[0]){
                                                                                                        echo "<option selected='selected'  value='".$row[0]."'>".$row[1]."</option>";
                                                                                                        
                                                                                                    }
                                                                                                    echo "<option   value='".$row[0]."'>".$row[1]."</option>";
                                                                                                    
                                                                                                }
											}
										}	 
									?>
                                                                    </select>    
                                                                    
                                                                </div>
                                                            </div>    
                                                </fieldset>            
                                            </div> 
                                                            
                                            <div class="box-footer">
                                                <?php  if(!isset($_GET['plate'])){?>
                                                            <button onclick="vehicleForm('<?php echo $_SESSION['fmsuser']; ?>')"  class="btn btn-primary">Submit</button>
                                                <?php }
                                                    else{ 
                                                ?>
                                                            <button onclick="vehicleUpdateForm('<?php echo $_SESSION['fmsuser']; ?>','<?php echo getVehicleId($db_link,$_GET['plate']); ?>')"  class="btn btn-primary">Update</button>
                                                    <?php } ?>

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

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    
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
    $('.datepicker').datepicker({
      autoclose: true
    });
    
    
    
    $('#year').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

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
  
  function vehicleForm(user_id){
           
         
         
    if(document.getElementById('chassis').value!="" && document.getElementById('capacity').value!="" 
    && document.getElementById('engine').value!="" && document.getElementById('fuel').value!=""
    && document.getElementById('registration').value!="" && document.getElementById('year').value!=""
    && document.getElementById('manufacture').value!="" &&  document.getElementById('color').value!=""
    && document.getElementById('registrationDate').value!="" && document.getElementById('registration').value!=""
    && document.getElementById('transmission').value!="" && document.getElementById('bodyType').value!=""
    && document.getElementById('dealer').value!="" && document.getElementById('purchaseDate').value!=""
    && document.getElementById('purchaseAmount').value!="" ){
    
   

	var formData = $(this).serialize();
	  
	$.ajax({
		type 		: 'GET', // define the type of HTTP verb we want to use (POST for our form)
		url 		: 'db_connect/validate.php?status=addFleet&user_id='+user_id
		+'&type_id='+document.getElementById('bodyType').value
                +'&plateNumber='+document.getElementById('registration').value
		+'&model='+document.getElementById('model').value
                +'&manufacture='+document.getElementById('manufacture').value
		+'&year='+document.getElementById('year').value
                +'&color='+document.getElementById('color').value
		+'&fuel='+document.getElementById('fuel').value
                +'&engine='+document.getElementById('engine').value
		+'&engineType='+document.getElementById('capacity').value
                +'&chassis='+document.getElementById('chassis').value
		+'&mileage='+document.getElementById('mileage').value
                +'&pDate='+document.getElementById('purchaseDate').value
		+'&dealer='+document.getElementById('dealer').value
                +'&purchaseAmount='+document.getElementById('purchaseAmount').value
		+'&staffPurchase='+document.getElementById('purchaseOfficer').value
		+'&regDate='+document.getElementById('registrationDate').value
		+'&branch='+document.getElementById('branch').value
		+'&gear_id='+document.getElementById('transmission').value
		+'&smileage='+document.getElementById('serviceMileage').value
		+'&sdate='+document.getElementById('serviceDate').value
		+'&stype='+document.getElementById('serviceType').value
		+'&scenter='+ document.getElementById('serviceCenter').value
		+'&samt='+document.getElementById('serviceAmount').value
		+'&sofficer='+document.getElementById('officer').value
		+'&identifier='+document.getElementById('trackerId').value,
                data 		: formData,
		dataType 	: 'html',
		success		:  
		function(data){
          
                    window.location="inventory.php?plate="+document.getElementById('registration').value;
		}
					
	});
			
    }

}

function vehicleUpdateForm(user_id,vehicle_id){
    
        if(document.getElementById('chassis').value!="" && document.getElementById('capacity').value!="" 
    && document.getElementById('engine').value!="" && document.getElementById('fuel').value!=""
    && document.getElementById('registration').value!="" && document.getElementById('year').value!=""
    && document.getElementById('manufacture').value!="" &&  document.getElementById('color').value!=""
    && document.getElementById('registrationDate').value!="" && document.getElementById('registration').value!=""
    && document.getElementById('transmission').value!="" && document.getElementById('bodyType').value!=""
    && document.getElementById('dealer').value!="" && document.getElementById('purchaseDate').value!=""
    && document.getElementById('purchaseAmount').value!="" ){
    

	var formData = $(this).serialize();
	  
	$.ajax({
		type 		: 'GET', // define the type of HTTP verb we want to use (POST for our form)
		url 		: 'db_connect/validate.php?status=updateInventory&user_id='+user_id
                +'&vehicleId='+vehicle_id
		+'&type_id='+document.getElementById('bodyType').value
                +'&plateNumber='+document.getElementById('registration').value
		+'&model='+document.getElementById('model').value
                +'&manufacture='+document.getElementById('manufacture').value
		+'&year='+document.getElementById('year').value
                +'&color='+document.getElementById('color').value
		+'&fuel='+document.getElementById('fuel').value
                +'&engine='+document.getElementById('engine').value
		+'&engineType='+document.getElementById('capacity').value
                +'&chassis='+document.getElementById('chassis').value
		+'&mileage='+document.getElementById('mileage').value
                +'&pDate='+document.getElementById('purchaseDate').value
		+'&dealer='+document.getElementById('dealer').value
                +'&purchaseAmount='+document.getElementById('purchaseAmount').value
		+'&staffPurchase='+document.getElementById('purchaseOfficer').value
		+'&regDate='+document.getElementById('registrationDate').value
		+'&branch='+document.getElementById('branch').value
		+'&gear_id='+document.getElementById('transmission').value
		+'&identifier='+document.getElementById('trackerId').value,
                data 		: formData,
		dataType 	: 'html',
		success		:  
		function(data){
          
                    window.location="inventory.php?plate="+document.getElementById('registration').value;
		}
					
	});
}
}
  </script>  

