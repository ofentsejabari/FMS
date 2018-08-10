<?php include 'headers.php';?>   

        <!-- Start BWL Searchable Accordion -->
        
        <div class="bwl_acc_container" id="accordion_nav_box_arrow">
            
            <div class="accordion_search_container">
                <input type="text" class="accordion_search_input_box search_icon" value="" placeholder="Search ..." />
            </div> <!-- end .bwl_acc_container -->
            
            <div class="search_result_container"></div> <!-- end .search_result_container -->
                        <?php
                                   $vehicleTypes = getCarTypes($db_link);
                                   while($types= mysqli_fetch_row($vehicleTypes)){
                        ?>
                        <section>
                            <h2 class="acc_title_bar"><a href="#"><?php echo $types[1] ?></a></h2>
                            <div class="acc_container">
                                <div class="block">
                                               <?php
                                                    $result= getvehicleDetailsByType($db_link,$types[0]);
                                                    while($row= mysqli_fetch_row($result)){
                                                        echo "<div><a href='?plate=".$row[0]."' >".$row[0]."</a></div>";
                                                    }?>
                                </div>
                            </div>
                        </section>
                       <?php } ?>
        </div> <!-- end .bwl_acc_container -->
        
        <!-- End BWL Searchable Accordion -->

        
       <?php include 'scripts.php';?>   
        <script type="text/javascript">
            
            $(function(){
                
         
                
                // Accordion with arrow navigation box.
                $("#accordion_nav_box_arrow").bwlAccordion({
                    nav_box: 'arrow'
                });

            
                
            });
            
        </script>
    <!--    <script type="text/javascript" src="demo-assets/prism/prism.js"></script>   -->  
  