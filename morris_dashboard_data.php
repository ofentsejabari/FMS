
<?php
$data=getInventory($db_link);
	$results=getVehicleDep($db_link);
	$toBeDisposed=0;
	$new=0;
	$firstHalf=0;
	$secondHalf=0;
	$numOfCars=0;
	while($row=mysqli_fetch_row($results))
	{
		$numOfCars=$numOfCars+1;
		$yeardif=date("Y")-substr($row[2],6) ;
		$amountTodep=$row[1]-($row[1]*($row[6]/100));
		$dep=$amountTodep/$row[5];
		$depToDate=$row[1]-($dep*$yeardif);
		
		if ($row[4]==1){ 
					if($yeardif==0)
					{	
							 $new=$new+1;
					}
					else{
						if($depToDate<0){
										$toBeDisposed=$toBeDisposed+1;
						}
						else
						{
							if ($yeardif<=2 && $yeardif>0){
								
								$firstHalf=$firstHalf+1;
							}
							else{
								
								$secondHalf=$secondHalf+1;
							}
						}
					}
		}
	}	

 ?>
<script type="text/javascript">
window.onload = function () {


		
			var chart2 = new CanvasJS.Chart("chartContainer2", {
			
				animationEnabled: true,
				theme: "theme2",
				data: [
				{
					type: "doughnut",
					indexLabelFontFamily: "Garamond",
					indexLabelFontSize: 20,
					startAngle: 0,
					indexLabelFontColor: "dimgrey",
					yValueFormatString: "#.##",
					indexLabelLineColor: "darkgrey",
					toolTipContent: "{y} %",

					dataPoints: [
				
					{ y: <?php echo 100*$new/$numOfCars ;?>, indexLabel: "new {y}%" },
					{ y: <?php echo 100 *$toBeDisposed/$numOfCars ;?>, indexLabel: "to be disposed {y}%" },
					{ y: <?php echo 100*$firstHalf/$numOfCars;?>, indexLabel: "1st half of useful life {y}%" },
					{ y: <?php echo 100*$secondHalf/$numOfCars ;?>, indexLabel: "2nd half of useful life  {y}%" }
						

					]
				}
				]
			});

			chart2.render();
	
	}
	</script>

	
