<?php 


    function db_connect()
    {
                    $username="sms";
                    $address="192.168.100.77";
                    $password="sms12345";
                    $db="bitri_fms";

                    $db_link = mysqli_connect($address,$username,$password,$db);

                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                     return $db_link;

    }



    function login($username,$password,$db_link){

        $sql = "SELECT * FROM staff where staff_username='".$username."' AND staff_password='".$password."'";
        $result  = mysqli_query($db_link,$sql);
        if($result != false){

                if(mysqli_num_rows($result) > 0){
                        //--update last login field
                        $row = mysqli_fetch_assoc($result);

                        return $row;
                }
                return false;
        }

        return false;
    }
    
    //============================================ USER DETAILS ==========================================================
    
    /**
     * 
     * @param type $db_link
     * @param type $staff_id
     * @return type
     */
    
    
    function getUserFull($db_link,$staff_id)
    {
            $sql="SELECT CONCAT_WS(' ',`staff_firstname`,`staff_surname`) FROM staff WHERE staff_id='$staff_id'";
            $results  = mysqli_query($db_link,$sql);
            if(mysqli_num_rows($results))
            {
                    $data=mysqli_fetch_row($results);
                    return $data[0];
            }
    }
    
    function getStaffDesignationById($db_link,$staff_id,$designation_id)
    {
            $sql="SELECT designation_name FROM designations,staff WHERE `designations`.`designation_id`='$designation_id' and `staff_id`='$staff_id'";
            $results  = mysqli_query($db_link,$sql);
            if(mysqli_num_rows($results))
            {
                    $data=mysqli_fetch_row($results);
                    return $data[0];
            }
    }
    
    function getUserDesignation($db_link,$staff_id)
    {
	$sql="SELECT `designation_name`,`dept_name` FROM `designations`,`staff`,`department`"
                . " WHERE staff_id='$staff_id' AND `department`.`dept_id`=`staff`.`dept_id` "
                . " AND `designations`.`designation_id`=`staff`.`designation_id`";
        
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		
		return $data[1]."-".$data[0];
	}
    }
    
    function getRoleId($db_link,$user_id){
	$query="SELECT `role_id` FROM `staff` WHERE `staff_id`=".$user_id;
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
    }
    
    function getStaffProfile($db_link,$staff_id)
    {
            $sql="SELECT `staff_id`, `staff_username`, `staff_firstname`, `staff_surname`,`role_id`,
             `staff_password`,`supervisor_id`,`dept_id`,`designation_id`,`staff_email`
             FROM `staff` WHERE delete_status=0 
             AND `staff_id`=".$staff_id;
            
            $results  = mysqli_query($db_link,$sql);
            if($results){
                    if(mysqli_num_rows($results))
                    {
                            return $results;
                    }
            }	
    }
    
    //====================================== REQUEST DETAILS ========================================================
    
    
    
    function getRequestHistory($db_link){
        
            $sql = "SELECT `vehicle_id`, CONCAT_WS(' ',`staff_firstname`,`staff_surname`)
               ,`request_date`,`request`.`start_date`
               ,`end_date`,`request_destination`
               ,`request_reason`,`request_level`
               ,`request_travellers`,`request_approver_id`
            ,`request_approval_date`,`request_id`
               ,`request_rejectReason`,`request_view`
               ,`request_vehicle_transmission`,type_id
               ,`request_cancelled`,`request`.`branch_id`
            ,`designation_id`,`dept_id`
               ,`request_driver`
               FROM `request`,`staff`
            WHERE `staff`.`staff_id`=`request`.`staff_id` 
            and (request_supervisor_date!='' || role_id=7 || role_id=5 || role_id=6 ) and request_supervisor_reason='' ORDER BY request_date DESC LIMIT 60 "  ;

            $results  = mysqli_query($db_link,$sql);
            if(mysqli_num_rows($results))
            {
                    return $results;
            }
    }
    
    //====================================== BRANCH DETAILS ========================================================
    
    function getBranchName($db_link,$branch_id){
        
            $query="SELECT `branch_name` FROM `branch` WHERE `branch_id`=".$branch_id;
            $results  = mysqli_query($db_link,$query);
            if(mysqli_num_rows($results))
            {
                    $data=mysqli_fetch_row($results);
                    return $data[0];
            }
	
    }
    
    //====================================== DEPARTMENT DETAILS ========================================================
    
   
    /**
     * 
     * @param type $db_link
     * @param type $dept_id
     * @return type
     */
    function getDepartmentName($db_link,$dept_id){
	
	$sql="SELECT dept_name FROM department WHERE dept_id=".$dept_id;
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
	
    }
    
    function getDepartments($db_link){
	
	$sql="SELECT dept_id , dept_name FROM department WHERE 1 ORDER BY dept_name ASC";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
    }
    
    
    //=======================================================================================================================
    
    function getDesignations($db_link){
	
	$sql="SELECT * FROM designations WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		
		return $results;
	}
    }
    
    function getRoles($db_link){
	$query="SELECT * FROM `role` WHERE 1";
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
    }

    
    function getCarTypes($db_link)
    {
            $sql="SELECT * FROM vehicle_type WHERE 1";
            $results  = mysqli_query($db_link,$sql);
            if(mysqli_num_rows($results))
            {
                    return $results;
            }
    }
    
    function getSupervisors($db_link){
        
	$query="SELECT CONCAT_WS(' ',`staff_firstname`,`staff_surname`),`staff_id` FROM `staff` WHERE (`role_id`=2 || `role_id`=6 || `role_id`=5 || `role_id`=7)  and `delete_status`=0";
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
    }
    
    function getMyRequests($db_link,$staff){
        
         $sql = "SELECT `request_date` FROM `request`
                  WHERE  `staff_id`=".$staff;
                         $results  = mysqli_query($db_link,$sql);

                         if($results){
                                 if(mysqli_num_rows($results))
                                 {
                                         return $results;
                                 }
                         }	


    }
    function getMyTrips($db_link,$staff){
        $sql = "SELECT `request_date` FROM `request`
                         WHERE  `staff_id`=".$staff." and `vehicle_id`!=0";
                                $results  = mysqli_query($db_link,$sql);

                                if($results){
                                        if(mysqli_num_rows($results))
                                        {
                                                return $results;
                                        }
                                }	
    }
    
    
    function getUsers($db_link){
        
	$sql = "SELECT `staff_id`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`) FROM staff WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if($results){
            if(mysqli_num_rows($results)) {
		
                return $results;
            }
	}	
    }
    
    
    
    function getBranches($db_link){
	
	$sql = "SELECT branch_id,branch_name FROM branch WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results)){
            return $results;
	}
    }
    
    
    
    
    function getNoAvailableCars($db_link,$car_typeId){
        
	$sql = "SELECT count(*) FROM `vehicle` WHERE vehicle_status='0' and type_id =".$car_typeId;
	$results  = mysqli_query($db_link,$sql);
        
	if(mysqli_num_rows($results)){
            $data = mysqli_fetch_row($results);
            return $data[0];
	}
    }
    
    
    function getMySupervisors($db_link,$staff_id){
	
	$query = " SELECT `staff_id`, CONCAT_WS(' ',`staff_firstname`,`staff_surname`) AS name FROM `staff` "
                ." WHERE (`role_id`=2 || `role_id`=6 || `role_id`=5 || `role_id`=7) and staff_surname!='fms' "
                ." AND `delete_status`=0 and staff_id!=".$staff_id." "
                ." ORDER BY name ASC";
	$results  = mysqli_query($db_link,$query);
        
	if(mysqli_num_rows($results)){
            return $results;
	}
	
    }
    
    
    function getDepartmentUsers($db_link,$dept_id){
    
        $sql="SELECT staff_id, CONCAT_WS(' ',`staff_firstname`,`staff_surname`) AS name,  dept_id FROM staff WHERE dept_id ='$dept_id' ORDER BY name ASC";
        $results  = mysqli_query($db_link,$sql);
        if(mysqli_num_rows($results)){
            return $results;
        }
    }
   
    
    function getMyRequestHistory($db_link,$staff_id){
        
	$query="SELECT `vehicle_id`, CONCAT_WS(' ',
			`staff_firstname`,`staff_surname`),`request_date`,`request`.`start_date`,
			`end_date`,`request_destination`,`request_reason`,`request_level`,
			`request_travellers`,`request_approver_id`
			,`request_approval_date`,`request_id`,`request_rejectReason`,`request_view`
			,`request_vehicle_transmission`,`type_id`
			 FROM `request`,`staff`
			 WHERE `staff`.`staff_id`=`request`.`staff_id` 
			 and `request`.`staff_id`=".$staff_id;
		
	$results  = mysqli_query($db_link,$query);
	if($results){
            if(mysqli_num_rows($results)){
                return $results;
            }
	}
}
    
?>
