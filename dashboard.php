    <div class="row">
            <div class="col-lg-3 col-xs-6">
			  <!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
				  <h3>
                                      <?php 
                                            $result= getRequestHistory($db_link);
                                            echo mysqli_num_rows($result);
                                      ?>
                                  </h3>

				  <p>Total Requests</p>
				</div>
				<div class="icon">
				  <i class="fa fa-bell"></i>
				</div>
                            <a href="fleetrequests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
            </div>
            <div class="col-lg-3 col-xs-6">
			  <!-- small box -->
                    <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php 
                                       $result =getPlateNumbers($db_link);
                                       echo mysqli_num_rows($result);
                                  ?>
                                </h3>

                                <p>Total Vehicles</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-car"></i>
                            </div>
                        <a href="inventory.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
            </div>
		
        <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                              <?php 
                                      $result=getUsers($db_link);
                                      echo mysqli_num_rows($result);
                              ?>
                        </h3>

                        <p>Registered Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
        <!-- ./col -->
    </div>
      <!-- /.row -->
      <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Vehicle Types</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="canvas-holder">
			<canvas id="chart-area" width="200" height="50"/>
                    </div>

                </div>
            <!-- /.box-body -->
            </div>
          
            <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Requets-Trips (Current Year)</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="canvas-holder">
			<canvas id="canvas" height="150" width="500"/>
                    </div>
                </div>
              <!-- /.box-body -->
            </div>
            
        </section> 
    </div>

		

	<script>

		var doughnutData = [
				<?php 
                                    $result = getCarTypes($db_link);
                                    
                                    $color = array("#F7464A","#0080ff","#00FF00","#ff0080","#ffbf00","#00FF00","#00bfff","#8000ff","#ff00bf");
                                    $count=0;
                                        while($row= mysqli_fetch_row($result)){ 
                                                $res= getVehicleTypeNo($db_link,$row[0]);
                                                echo "{
                                                value: '".$res."',
                                                color:'".$color[$count]."',
                                                highlight: '#FF5A5E',
                                                label: '".$row[1]."'
                                            },"; 
                                            $count++;
                                        }
                                    ?>

			];

			
                        
                	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
                        var lineChartData = {
                                labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
                                datasets : [
                                        {
                                                label: "My First dataset",
                                                fillColor : "rgba(220,220,220,0.2)",
                                                strokeColor : "rgba(220,220,220,1)",
                                                pointColor : "rgba(220,220,220,1)",
                                                pointStrokeColor : "#fff",
                                                pointHighlightFill : "#fff",
                                                pointHighlightStroke : "rgba(220,220,220,1)",
                                                data : [
                                                        <?php
                                                            $dates=array();
                                                            for($i=0;$i<12;$i++){
                                                                
                                                                $dates[$i]=date("Y")."-0".($i+1);
                                                                $no=getTripNo($db_link,$dates[$i]);
                                                                echo "".$no.",";
                                                            }
                                                            
                                                                
                                                                
                                                        ?>
                                                        ]
                                        },
                                        {
                                                label: "My Second dataset",
                                                fillColor : "rgba(151,187,205,0.2)",
                                                strokeColor : "rgba(151,187,205,1)",
                                                pointColor : "rgba(151,187,205,1)",
                                                pointStrokeColor : "#fff",
                                                pointHighlightFill : "#fff",
                                                pointHighlightStroke : "rgba(151,187,205,1)",
                                                data : [
                                                      
                                                    ]
                                        }
                                ]

                        }

                        window.onload = function(){
                                var ctx = document.getElementById("canvas").getContext("2d");
                                window.myLine = new Chart(ctx).Line(lineChartData, {
                                        responsive: true
                                });
                                
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
                        }        
                       

	</script>