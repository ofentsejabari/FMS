

<style>
* {
  box-sizing: border-box;
}


#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
  overflow-y: scroll;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}

 .block {
    text-align: center;
    vertical-align: middle;
}

.circle {
    border:#004276 2px solid;
    border-radius: 200px;
    color: #00193A;
    height: 250px;
    width: 250px;
    padding:20px;
    display: table;
}
.circle p {
    vertical-align: left;
    display: table-cell;
    
}
</style>
<div class="row">
        <div class="col-md-3">
            
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                    
                  <!-- /btn-group -->
                  <div class="input-group">
                        
                        <div class="input-group-btn">
                            
                            <a type="button" class="btn btn-primary btn-flat"> <i class="fa fa-add"></i>Add</a>
                        </div>
                        
                        
                    <!-- /btn-group -->
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
                      <div style="height:450px" class="" id="external-events">




                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input class="form-control" type="text" id="myInput"  onkeyup="myFunction()" placeholder="Search" />
                            </div>
                          <BR>
                            <ul  style="height:400px" id="myUL">
                                   <?php
                                        $result= getInventory($db_link);
                                        while($row= mysqli_fetch_row($result)){
                                            echo "<li><a href='?plate=".$row[0]."' >".$row[0]."</a></li>";
                                        }
                                    ?>
                            </ul>
                          
                      </div>
                </div>
              <!-- /.box-body -->
            </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body ">
                  <!-- THE CALENDAR -->
                    <div style="min-height:700px">

                        <?php 
                               
                                if(isset($_GET['plate'])){
                                    $vehicle_id=getVehicleId($db_link,$_GET['plate']);   
                                    $result=getvehicleDetails($db_link,$vehicle_id);
                                    if($result){
                                    $vehicle=mysqli_fetch_row($result);
                         ?>
                                        <div class="container">
                                           <div class="row">
                                               <div class="col-md-5 block">
                                                   <div class="circle">
                                                      
                                                        <div><h4>Reg No <b> <?php echo $_GET['plate']; ?> </b></h4></div>
                                                        <br>
                                                        <div>
                                                            <div>Chassis No:  <b> <?php echo $vehicle[14]; ?> </b></div>
                                                            <div>Engine No:  <b> <?php echo $vehicle[15]; ?> </b></div>
                                                            <div>Make:  <b> <?php echo $vehicle[2]; ?> </b></div>
                                                            <div>Model:  <b> <?php echo $vehicle[1]; ?> </b></div>
                                                            <div>Body Type:  <b> <?php echo getCarType($db_link,$vehicle[11]); ?> </b></div>
                                                            <div>Color:  <b> <?php echo $vehicle[10]; ?> </b></div>
                                                            <div>Valid until end of:  </div>
                                                       </div>
                                                        <b> <?php $date = DateTime::createFromFormat("Y-m-d",$vehicle[13]);
                                                                echo $date->format("M")." ".$date->format("Y");
                                                                ?></b>
                                                       
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                <?php }}?>
                    </div>
                </div>
              <!-- /.box-body -->
            </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
   
<script>

    
    function myFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
    <!-- /.row -->