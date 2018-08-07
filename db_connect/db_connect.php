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
    
    function getBranchName($db_link,$branch_id){
        
            $query="SELECT `branch_name` FROM `branch` WHERE `branch_id`=".$branch_id;
            $results  = mysqli_query($db_link,$query);
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
    
    
    
?>