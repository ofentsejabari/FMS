	<?php 
function db_connect()
{
		$username="root";
		$address="127.0.0.1";
		$password="";
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
					//mysqli_query("UPDATE `staff` SET `lastlogin`= NOW() WHERE `staff_id`='".$row['staff_id']."'");
			 
			 		return $row;
				}
			 	return false;
	    	}
		
			return false;
}

function getSecurity($db_link){
	$sql = "SELECT * FROM `security` WHERE 1";
			$results  = mysqli_query($db_link,$sql);
			if(mysqli_num_rows($results))
			{
				
				return $results;
			}
			else{
				return false;
			}
}

function getAudit($db_link){
	$sql = "SELECT * FROM `depreciation` WHERE 1";
			$results  = mysqli_query($db_link,$sql);
			if(mysqli_num_rows($results))
			{
				
				return $results;
			}
			else{
				return false;
			}
}



 



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function getTheme($db_link)
{
	$result=getOrgDetails($db_link);
	return $result[7];
}

function getLogo($db_link){
	$result=getOrgDetails($db_link);
	return $result[8];
}
function getLogoOption($db_link)
{
	$result=getOrgDetails($db_link);
	return $result[10];
}
function getSite($db_link){
	$result=getOrgDetails($db_link);
	return $result[6];
}

function getAbbr($db_link)
{
	$result=getOrgDetails($db_link);
	return $result[2];
}
function getOrgDetails($db_link)
{
	$sql="SELECT * FROM `organization` WHERE active=1";
	$result  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($result))
	{
		$data=mysqli_fetch_row($result);
		return $data;
	}
	else{
		return false;
	}
	
}


function email($username,$subject,$body)
{
		date_default_timezone_set('Etc/UTC');

		require 'includes/PHPMailer-master/PHPMailerAutoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Set the hostname of the mail server
		$mail->Host = "mail.bitri.co.bw";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 25;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = false;
		//Set who the message is to be sent from
		$mail->setFrom('f@bitri.co.bw', 'FMS');
		//Set who the message is to be sent to
		$mail->addAddress($username."@bitri.co.bw", $username."");
		
		//Set the subject line
		$mail->Subject = "".$subject;
		//Replace the plain text body with one created manually
		$mail->Body = "".$body;
		//Attach an image file
		if (!$mail->send()) {
			//echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			//echo "Message sent!";
		}
}

function emailSender($username,$subject,$body)
{
		date_default_timezone_set('Etc/UTC');

		require '../includes/PHPMailer-master/PHPMailerAutoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		$mail->Host = "mail.bitri.co.bw";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 25;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = false;
		//Set who the message is to be sent from
		$mail->setFrom('fms@bitri.co.bw', 'FMS');
		//Set who the message is to be sent to
		$mail->addAddress($username."@bitri.co.bw", $username."");
		//Set the subject line
		$mail->IsHTML(true);
		
		$mail->Subject = "".$subject;
		//Read an HTML message body from an external file, convert referenced image
		//Replace the plain text body with one created manually
		$mail->Body = "".$body;
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "\n Email notification sent!";
		}

}

function emailSender1($username,$username2,$subject,$body)
{
			date_default_timezone_set('Etc/UTC');

			require '../includes/PHPMailer-master/PHPMailerAutoload.php';

			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			$mail->Host = "mail.bitri.co.bw";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('fms@bitri.co.bw', 'FMS');
			$mail->addAddress($username."@bitri.co.bw", $username."");
			$mail->addAddress($username2."@bitri.co.bw", $username2."");
			//Set the subject line
			$mail->Subject = "".$subject;
			//Read an HTML message body from an external file, convert referenced image
			//Replace the plain text body with one created manually
			$mail->Body = "".$body;
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Message sent!";
			}

}
function emailSender2($username,$username1,$subject,$body)
{
			date_default_timezone_set('Etc/UTC');

			require '../includes/PHPMailer-master/PHPMailerAutoload.php';

			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			$mail->Host = "mail.bitri.co.bw";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('fms@bitri.co.bw', 'FMS');
			
			//Set who the message is to be sent to
			$mail->addAddress($username."@bitri.co.bw", $username."");
			$mail->addAddress($username1."@bitri.co.bw", $username1."");
			$mail->addAddress("fms@bitri.co.bw", "FMS");
			//Set the subject line
			$mail->Subject = "".$subject;
			//Read an HTML message body from an external file, convert referenced image
			//Replace the plain text body with one created manually
			$mail->Body = "".$body;
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Message sent!";
			}
			 $mail->clearAddresses();

}

function getServiceAlert($db_link){
	$sql1="SELECT `vehicle_details`.`vehicle_id`,`service_mileage`,`vehicle_details_mileage`,`service_id` FROM `vehicle_details`,`service_records` 
	WHERE `vehicle_details`.`vehicle_id`=`service_records`.`vehicle_id`and (`vehicle_details_mileage`-`service_mileage`)>15000";
	
	$results  = mysqli_query($db_link,$sql1);
	$count=0;
	$body="This email serves as a reminder that : \n";
	$send=0;
	while($row=mysqli_fetch_row($results)){
		$miles=$row[2]-$row[1];
		
		if($miles>15000 && $miles < 20000){ //alert near service
			if(!notified($db_link,$row[0],$row[3]))
			{
				$query1="INSERT INTO `serviceAlertTable`(`serviceAlert_id`, `vehicle_id`, `serviceAlert_date`, `service_id`, `serviceAlert_type`)
				VALUES (0,".$row[0].",now(),".$row[3].",2)";
				$result_set = mysqli_query($db_link,$query1);
				
				$body=$body
					."\n Due Soon"
					."\n"
					."______________________"
					."\n"
					."vehicle reg : ".getPlateNumeber($db_link,$row[0])
					."\n"
					."current mileage :".$row[2]
					."\n"
					."last service mileage :".$row[1]
					;
					$send=1;
				//	email("cselepe","Service Reminder",$body);
			}
			
			$count=$count+1;
		}
		else if($miles>20000){
				if(!notified($db_link,$row[0],$row[3]))
				{
					$query1="INSERT INTO `serviceAlertTable`(`serviceAlert_id`, `vehicle_id`, `serviceAlert_date`, `service_id`, `serviceAlert_type`)
					VALUES (0,".$row[0].",now(),".$row[3].",2)";
					
					$result_set = mysqli_query($db_link,$query1);
					$body=$body.
					"\n Overdue"
					."\n _________________________"
					."\n"
					."vehicle reg : ".getPlateNumeber($db_link,$row[0])
					."\n"
					."current mileage :".$row[2]
					."\n"
					."last service mileage :".$row[1]
					."\n";
					$send=1;
					//email;
								
				}	
				$count=$count+1;
		}
		else{
			
		}
		
	}
	if($count!="" && $send==1)
	{
		email("cselepe","Service Reminders",$body);
	}
	if ($count==0)
	$count="";
	return $count;
}

function getVehicleDep($db_link)
{
	$sql = "SELECT `vehicle_plateNumber`,`vehicle_details_amount`,`vehicle_details_purchaseDate`,`depr_rate`,`depr_inUse`,`depr_usefulLife`,`depr_salvageValue`
	FROM `vehicle`,`vehicle_details`,`depreciation` WHERE `del`=0 and `vehicle_details`.`vehicle_id`=`vehicle`.`vehicle_id`" ;
			$results  = mysqli_query($db_link,$sql);
			if($results){
				if(mysqli_num_rows($results))
				{
						return $results;
				}
			}

}


function update($id,$name,$uniqueid)
{
        $data = [
            'id'       => $id, //add this
            'name'     => $name,
            'uniqueId' => $uniqueid,
        ];

        $device = new GuzzleHttp\Client([
            'base_uri' => 'http://whitespaces.bitri.co.bw/traccar/api/devices/',
            'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'body' => json_encode($data),
        ]);

        $res = $device->request('PUT',['auth' => ["traccar","B0n0k0p!l@"]]);
		$status = $res->getStatusCode();
        
		if ($status == 200) 
		{
            Flash::success(trans('content.alerts.deviceUpdateSuccess'))->important();  
            return redirect::to('devices');
        }
		else{
            Flash::success(trans('content.alerts.deviceUpdateError'))->important();  
            return redirect::to('devices');
        }
}


 
function getSingleVehicle($db_link,$type_id)
{
	$sql = "SELECT SUM(`vehicle_details_amount`) FROM `vehicle`,`vehicle_details`,`depreciation`
	WHERE `del`=0 and `vehicle_details`.`vehicle_id`=`vehicle`.`vehicle_id` and `type_id`='".$type_id."'" ;
			$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}

} 
function notified($db_link,$vehicle_id,$service){

		$sql="SELECT `vehicle_id`, `service_id`, `serviceAlert_type` FROM `serviceAlertTable` WHERE `vehicle_id`=".$vehicle_id." and `service_id`=".$service;
		$results  = mysqli_query($db_link,$sql);
		if(mysqli_num_rows($results))
			{
			  return true;
			}
			else{
				return false;
			}
		

}
function getServiceMileage($db_link,$vehicle_id){

	$sql="SELECT `service_mileage` FROM `service_records` WHERE `vehicle_id`=".$vehicle_id." ORDER BY service_id DESC LIMIT 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}

}
	
/*
	returns all cars in the inventory
*/
function getInventory($db_link){
	$sql = "SELECT  `vehicle_plateNumber`,`vehicle_model`,`vehicle_manufacture`,`vehicle_details_carDealer`,
		   `vehicle_details_purchaseDate`,`vehicle_details_mileage`,`vehicle_details_amount`,`vehicle_details_amount`,
		   `vehicle_status`,`vehicle_engineType` ,`vehicle_color`,`type_id`,`vehicle_Fuel`,`vehicle_registrationDate`
		   ,`vehicle_chasisNumber`,`vehicle_engineNumber`,`vehicle_details_photo`,`vehicle_year`,`vehicle_details_purchasingOfficer`
		   ,`vehicle_trasmission`,`branch_id`
		    FROM `vehicle`,`vehicle_details` 
			WHERE vehicle.del=0 and `vehicle_details`.`vehicle_id`=`vehicle`.`vehicle_id`" ;
			$results  = mysqli_query($db_link,$sql);
			if(mysqli_num_rows($results))
			{
			  return $results;
			}
			else{
				return false;
			}

}

function getInventory1($db_link){
	$sql = "SELECT  `vehicle_plateNumber` AS `Registration Number`,`vehicle_model` AS `Model`,`vehicle_manufacture` AS `Manufacture`,`vehicle_details_carDealer` AS `Dealership`,
		   `vehicle_details_purchaseDate` AS `Purchase Date`,`vehicle_details_mileage` AS `Mileage`,`vehicle_details_amount` AS `Purchase Amount`,`vehicle_details_amount` AS `Purchase Amount1`,
		   `vehicle_status` AS `Status`,`vehicle_engineType` AS `Engine Type`,`vehicle_color` AS `Color`,`type_id` AS `Type`,`vehicle_Fuel` AS `Fuel Orientation`,`vehicle_registrationDate` AS `Registration Date`
		   ,`vehicle_chasisNumber` AS `Chassis Number`,`vehicle_engineNumber` AS `Engine No.`,`vehicle_details_photo` AS `Photo`
		    FROM `vehicle`,`vehicle_details` 
			WHERE `vehicle_details`.`vehicle_id`=`vehicle`.`vehicle_id`" ;
			$results  = mysqli_query($db_link,$sql);
			if(mysqli_num_rows($results))
			{
			  
				return $results;
			}

}
function getDeviceId($db_link1,$plate){
	$sql="SELECT `id`, `name`, `uniqueid`, `lastupdate`, `positionid`, `groupid`, `attributes`, `phone`, `model`,
	`contact`, `category`,`disabled` FROM `devices` WHERE name='$plate'";
	$results  = mysqli_query($db_link1,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[2];
	}
}
function getVisitors($db_link){
$sql = "SELECT * FROM `visitor` WHERE 1" ;
			$results  = mysqli_query($db_link,$sql);
			if($results){
				if(mysqli_num_rows($results))
				{
						return $results;
				}
			}
	
	
}
function getFuelRecords($db_link){

			$sql = "SELECT * FROM `fuel_history` WHERE 1" ;
			$results  = mysqli_query($db_link,$sql);
			if($results){
				if(mysqli_num_rows($results))
				{
						return $results;
				}
			}

}

function getUsers($db_link)
{
	$sql="SELECT `staff_id`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`) FROM staff WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if($results){
		if(mysqli_num_rows($results))
		{
			
			return $results;
		}
	}	
}
function getStaff($db_link)
{
	$sql="SELECT `staff_id`, `staff_username`, `staff_firstname`, `staff_surname`,`role_id`,
	 `staff_password`,`supervisor_id`,`dept_id`,designation_id FROM `staff` WHERE delete_status=0";
	$results  = mysqli_query($db_link,$sql);
	if($results){
		if(mysqli_num_rows($results))
		{
			return $results;
		}
	}	
}




function getUser($db_link,$staff_id)
{
	$sql="SELECT `staff_username` FROM staff WHERE staff_id='$staff_id'";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
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
function getUserFullDept($db_link,$staff_id)
{
	$sql="SELECT CONCAT_WS(' ',`staff_firstname`,`staff_surname`),dept_id FROM staff WHERE staff_id='$staff_id'";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		$holder=getDepartmentName($db_link,$data[1]);
		return $data[0]."-".$holder;
	}
}
function getStaffDesignation($db_link,$staff_id)
{
	$sql="SELECT role_description FROM role,staff WHERE `role`.`role_id`=`staff`.`role_id` and `staff_id`='$staff_id'";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}

//the role is to be designation at work
function getStaffRole($db_link,$staff_id,$designation_id)
{
	$sql="SELECT designation_name FROM designations,staff WHERE `designations`.`designation_id`='$designation_id' and `staff_id`='$staff_id'";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}
function getDepartments($db_link){
	
	$sql="SELECT dept_id,dept_name FROM department WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}

function getDepartmentName($db_link,$dept_id){
	
	$sql="SELECT dept_name FROM department WHERE dept_id=".$dept_id;
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
	
}
function getVehicleModel($db_link,$plate){
	
	$sql="SELECT `vehicle_model` FROM `vehicle` WHERE vehicle_plateNumber='".$plate."'";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}
function getBranches($db_link){
	
	$sql="SELECT branch_id,branch_name FROM branch WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		
		return $results;
	}
}

function getDesignations($db_link){
	
	$sql="SELECT * FROM designations WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		
		return $results;
	}
}

function getRequestDetails($db_link,$request_id)
{
	$sql="SELECT `staff_id`,`request_destination`,`start_date`,`end_date`,`request_reason`,`request_supervisor_reason`
	,`request_supervisor_id` FROM `request` WHERE `request_id`='$request_id'";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data;
	}
}


function supervisor_rejected($db_link,$request_id)
{
	$query="SELECT `request_supervisorRejectReason`
				 FROM `request`
				 WHERE  request_id=".$request_id;
		
		$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if (strlen($data[0])==2){
				return false;
			}	
			else{
				return true;
			}
		}

}
function getMyDepartment($db_link,$staff_id){
	$query="SELECT `dept_id` FROM `staff` WHERE `staff_id`=".$staff_id;
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
	
}
function getMyBranch($db_link,$staff_id){
	$query="SELECT `branch_id` FROM `staff` WHERE `staff_id`=".$staff_id;
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
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
function getMySupervisors($db_link,$staff_id){
	
	$dept=getMyDepartment($db_link,$staff_id);
	$query="SELECT CONCAT_WS(' ',`staff_firstname`,`staff_surname`),`staff_id` FROM `staff` WHERE (`role_id`=2 || `role_id`=6 || `role_id`=5 || `role_id`=7) and staff_surname!='fms' and `delete_status`=0 and staff_id!=".$staff_id;
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
	
}


function supervisor_approved($db_link,$request_id){
		$query="SELECT `request_supervisor_date`
				 FROM `request`
				 WHERE  request_id=".$request_id;
		
		$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]==''){
				return false;
			}	
			else{
				return true;
			}
		}
}

/*
	a function for key return capture reminder
*/
function keyReturnReminder($db_link)
{
	$query="SELECT vehicle_id,`request`.request_id FROM `request`,`trip_details` 
	WHERE vehicle_id!=0 and request_closure=0 and request_cancelled=0 and request_keyCollectiondate!=0 
	and request_keyReturnDate=0 and return_date!='' and `request`.request_id=`trip_details`.request_id";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
	

}
function hasGateMile($db_link,$request_id)
{
	$query="SELECT `request`.request_id FROM `request`,`trip_details` 
	WHERE vehicle_id!=0 and request_closure=0 and request_cancelled=0 and request_keyCollectiondate!=0
	and request_keyReturnDate=0 and return_date=''
	and `request`.request_id=`trip_details`.request_id and `trip_details`.request_id=".$request_id;
	$results  = mysqli_query($db_link,$query);
	if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
			}

}

function getRoleId($db_link,$user_id)
{
	$sql="SELECT `role_id`FROM `staff` WHERE staff_id=".$user_id;
	$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
			}
}
/*
	returns all requests ever made
*/
function getRequestHistory($db_link){
			$sql = "SELECT `vehicle_id`, 
				CONCAT_WS(' ',`staff_firstname`,`staff_surname`),
				`request_date`,`request`.`start_date`,
			`end_date`,`request_destination`,`request_reason`,`request_level`,
			`request_travellers`,`request_approver_id`
			,`request_approval_date`,`request_id`,`request_rejectReason`,`request_view`,
			`request_vehicle_transmission`,type_id,`request_cancelled`,`request`.`branch_id`
			,`designation_id`,`dept_id`,`request_driver`
		    FROM `request`,`staff`
			WHERE `staff`.`staff_id`=`request`.`staff_id` 
			and (request_supervisor_date!='' || role_id=7 || role_id=5 || role_id=6 ) and request_supervisor_reason='' ORDER BY request_date DESC LIMIT 60 "  ;
			$results  = mysqli_query($db_link,$sql);
			if(mysqli_num_rows($results))
			{
				return $results;
			}


}
//supersor approvals table 
function getSupervisorApprovals($db_link,$staff_id)
{
			$sql = "SELECT `vehicle_id`, 
				CONCAT_WS(' ',
			`staff_firstname`,`staff_surname`),`request_date`,`request`.`start_date`,
			`end_date`,`request_destination`,`request_reason`,`request_level`,
			`request_travellers`,`request_approver_id`
			,`request_approval_date`,`request_id`,
			`request_rejectReason`,`request_view`,`request`.`staff_id`,`request_supervisor_date` 
			,`request_cancelled`,`request_supervisorRejectReason`,`branch_id`
			 FROM `request`,`staff`
			WHERE `staff`.`staff_id`=`request`.`staff_id` and `request_supervisor_id`=".$staff_id ;
			$results  = mysqli_query($db_link,$sql);
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

function getMyRequestsNo($db_link,$staff,$date){
	$sql = " SELECT Count(*) 
			FROM `request`
			WHERE `staff_id`='".$staff."' and request_date BETWEEN '".$date."-01' and '".$date."-31'";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
			}	
}
function getTripNo($db_link,$date){
	$sql = " SELECT Count(*) 
			FROM `trip_details`
			WHERE return_date  BETWEEN '".$date."-01' and '".$date."-31'";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
			}	
}

function getTripKilomters($db_link,$date){
	$sql = " SELECT SUM(closing_odo) ,SUM(	opening_odo)
			FROM `trip_details`
			WHERE return_date  BETWEEN '".$date."-01' and '".$date."-31'";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0]-$data[1];
				}
			}
}

function getMonTripKilomters($db_link,$date,$vehicle_id){
	$sql = " SELECT SUM(closing_odo) ,SUM(	opening_odo)
			FROM `trip_details`,`request`
			WHERE return_date  BETWEEN '".$date."-01' and '".$date."-31' 
			and `request`.`request_id`=`trip_details`.`request_id` and vehicle_id=".$vehicle_id;
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0]-$data[1];
				}
			}
}



function getVehTripKilomters($db_link,$vehicle_id){
	$sql = " SELECT SUM(closing_odo) ,SUM(	opening_odo)
			FROM `trip_details`,`request`
			WHERE  `trip_details`.`request_id`=`request`.`request_id` AND `vehicle_id`=".$vehicle_id;
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
				
						return $data[0]-$data[1];
					
					
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

function getMyTripNo($db_link,$staff,$date){
	$sql = " SELECT Count(*) 
			FROM `request`
			WHERE `staff_id`='$staff' and `vehicle_id`!=0 and request_date BETWEEN '".$date."-01' and '".$date."-31' ";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
			}	
}


function getMyTripDetails($db_link,$user_id){
		$sql = "SELECT  `vehicle_plateNumber`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`), `trip_details`.`start_date`,
		 `opening_odo`,`trip_details`.`return_date`,`closing_odo`,`request_destination`,`trip_details`.`trip_id`  
		 FROM `trip_details`,`staff`, `request` ,`vehicle`
		 WHERE `request`.`staff_id`=`staff`.`staff_id` 
		 AND `trip_details`.`request_id`=`request`.`request_id`
		 AND  `request`.`staff_id`=".$user_id."
		 AND `vehicle`.`vehicle_id`=`request`.`vehicle_id`";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					return $results;
				}
			}	
}

function getTripDetails($db_link){
		$sql = "SELECT  `vehicle_plateNumber`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`), `trip_details`.`start_date`,
		 `opening_odo`,`trip_details`.`return_date`,`closing_odo`,`request_destination`,
		 `trip_details`.`trip_id`,`staff`.`dept_id` ,`trip_details`.`request_id`
		 FROM `trip_details`,`staff`, `request` ,`vehicle`
		    WHERE `request`.`staff_id`=`staff`.`staff_id` AND `trip_details`.`request_id`=`request`.`request_id` 
			AND `vehicle`.`vehicle_id`=`request`.`vehicle_id` AND `del`=0
			ORDER BY `trip_details`.`trip_id` DESC";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					return $results;
				}
			}	
}

function getTripDetails1($db_link,$trip_id){
		$sql = "SELECT  `vehicle_plateNumber`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`), `trip_details`.`start_date`,
		 `opening_odo`,`trip_details`.`return_date`,`closing_odo`,`request_destination`,
		 `trip_details`.`trip_id`,`staff`.`dept_id` ,`trip_details`.`request_id`
		 FROM `trip_details`,`staff`, `request` ,`vehicle`
		    WHERE `request`.`staff_id`=`staff`.`staff_id` AND `trip_details`.`request_id`=`request`.`request_id` 
			AND `vehicle`.`vehicle_id`=`request`.`vehicle_id` AND `del`=0 AND `trip_details`.`trip_id`='".$trip_id."'
			ORDER BY `trip_details`.`trip_id` DESC";
			
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0]."-".$data[1]."-".$data[6];
				}
			}	
}

function getTripDetailsStats($db_link){
		$sql = "SELECT  `vehicle_plateNumber`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`), `trip_details`.`start_date`,
		 `opening_odo`,`trip_details`.`return_date`,`closing_odo`,`request_destination`,`trip_details`.`trip_id` 
		 FROM `trip_details`,`staff`, `request` ,`vehicle`
		    WHERE `request`.`staff_id`=`staff`.`staff_id` AND `trip_details`.`request_id`=`request`.`request_id` 
			AND `vehicle`.`vehicle_id`=`request`.`vehicle_id` AND `del`=0
			ORDER BY `trip_details`.`return_date`";
			$results  = mysqli_query($db_link,$sql);
			
			if($results){
				if(mysqli_num_rows($results))
				{
					return $results;
				}
			}	
}
function getPlateNumeber($db_link,$vehicle_id)
{
		$sql = "SELECT  `vehicle_plateNumber`
				FROM `vehicle`
		    WHERE `vehicle_id`='$vehicle_id'";
			$results  = mysqli_query($db_link,$sql);
			
			
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
}
function getFuelHistory($db_link){
	$sql="SELECT `vehicle_plateNumber`,`opening_odo`,`closing_odo`,CONCAT_WS(' ',`staff_firstname`,`staff_surname`),
	`fuel_history`.`amount`,`filling_station`,`filling_attendant`,`fuel_history`.`staff_id`,`receipt_name`,`fuel_liters` 
	FROM `fuel_history`,`trip_details`,`vehicle`,`staff` ,`request` 
	WHERE `fuel_history`.`trip_id`=`trip_details`.`trip_id` and `request`.`request_id`=`trip_details`.`request_id` 
	and `request`.`vehicle_id`=`vehicle`.`vehicle_id` and `request`.`staff_id`=`staff`.`staff_id`";
	
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					return $results;
				}
	}
}

function getFuelStats($db_link,$vehicle_id){
		$sql="SELECT Sum(amount) FROM `fuel_history`,`vehicle`,`request`,`trip_details` WHERE `vehicle_plateNumber`='$vehicle_id' 
		and `vehicle`.`vehicle_id`=`request`.`vehicle_id`
		and `trip_details`.`request_id`= `request`.`request_id` and `fuel_history`.`trip_id`=`trip_details`.`trip_id`";
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
	}

}
function getVehicles($db_link){
	$sql="SELECT `vehicle_id`,`type_id` FROM `vehicle` WHERE 1";
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					return $results;
				}
	}
	
}
function getVehicleTypeNo($db_link,$type_id){
	$sql="SELECT Count(*) FROM `vehicle`,vehicle_details WHERE `del`=0 and vehicle.vehicle_id=vehicle_details.vehicle_id and `type_id`=".$type_id;
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
	}			
	
}

function getVehicleUse($db_link,$staff_id){
	$sql="SELECT `vehicle_id` FROM `request` WHERE vehicle_id!='' and  `staff_id`=".$staff_id;
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					return $results;
				}
	}
	
}
function getEachVehicleUse($db_link,$vehicle_id){
	$sql="SELECT `end_date` FROM `request` WHERE vehicle_id=".$vehicle_id;
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					return $results;
				}
	}
	
}
function getVehicleUseNo($db_link,$vehicle_id,$staff_id){
		$sql="SELECT count(*) FROM `request` WHERE vehicle_id=".$vehicle_id." and `staff_id`=".$staff_id;
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
	}
	
}
function getVehicleTotalUseNo($db_link,$vehicle_id){
	$sql="SELECT count(*) FROM `request` WHERE request_cancelled=0 AND vehicle_id=".$vehicle_id;
	$results=mysqli_query($db_link,$sql);
	if($results){
			if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
	}
	
}
function getVehicleTotalUse($db_link){
		$sql="SELECT vehicle_id FROM `request` WHERE request_cancelled=0 AND vehicle_id!=''";
	$results=mysqli_query($db_link,$sql);
	if($results){
			return $results;
	}
	
}

function getMileage($db_link,$vehicle_id){
		$sql = "SELECT  `vehicle_details_mileage`
				FROM `vehicle_details`
		    WHERE `vehicle_id`='$vehicle_id'";
			$results  = mysqli_query($db_link,$sql);
			if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
}
function getPlateNumbers($db_link)
{
		$sql = "SELECT  `vehicle_id`,`vehicle_plateNumber`
				FROM `vehicle`
		    WHERE 1";
			$results  = mysqli_query($db_link,$sql);
			
			
				if(mysqli_num_rows($results))
				{
					return $results ;
				}
}
function getVehicleId($db_link,$plate)
{
		$sql = "SELECT  `vehicle_id`
				FROM `vehicle`
		    WHERE `vehicle_plateNumber`='$plate'";
			$results  = mysqli_query($db_link,$sql);
			
			
				if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
}

/*
	this method returns available cars under a the specified type
*/
function getAvailableCars($db_link,$car_typeId,$branch_id)
{
	$sql="SELECT `vehicle_plateNumber`,`vehicle`.`vehicle_id`,`vehicle_trasmission`
	 FROM `vehicle`,`vehicle_details`
	 WHERE vehicle_status='0' and del=0 and type_id=".$car_typeId." and `vehicle_details`.`vehicle_id`=`vehicle`.`vehicle_id` and `branch_id`=".$branch_id;
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}
function getRequestVehicleId($db_link,$request_id)
{
	$query="SELECT `vehicle_id` FROM request WHERE request_id=".$request_id;
		$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}

}
function getNoAvailableCars($db_link,$car_typeId)
{
	$sql="SELECT count(*)
	 FROM `vehicle`
	 WHERE vehicle_status='0' and type_id=".$car_typeId;
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}
function getNoAvailableType($db_link,$car_typeId,$gear)
{
	$sql="SELECT count(*)
	 FROM `vehicle`
	 WHERE vehicle_status='0' and type_id=".$car_typeId." and vehicle_trasmission=".$gear;
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}
/*
	this method returns the all car types
*/
function getCarTypes($db_link)
{
	$sql="SELECT * FROM vehicle_type WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}

function getServiceRecords($db_link){
	$sql="SELECT * FROM service_records WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
	
}
function getGateInspection($db_link)
{
	$sql="SELECT `vehicle_id`,`staff_id`,`jug`, `spare_wheel`, `wheel_spanner`,`trip_details`.`start_date`,`trip_details`.`return_date` ,`trip_details`.`request_id` FROM `gate_inspections`,`request`,`trip_details` 
			WHERE `request`.`request_id`=`trip_details`.`request_id` and `trip_details`.`trip_id`=`gate_inspections`.`trip_id`";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}
function getFleetInspection($db_link)
{
	$sql="SELECT * FROM `fleet_inspection` WHERE 1";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}
/*
	returns the results of inspections carried out by approved requestors
*/
function getSelfInspection($db_link)
{
	$sql="SELECT `self_inspection_id`,`vehicle_id`,`staff_id`,  `self_inspection`.`trip_id`, `oil`, `wipers`, `mirrors`, `radiator_water`,
				 `coolant`, `tyre_condition`, `fuel` `request_id`
		 FROM `self_inspection`,`trip_details`,`request`
		 WHERE `self_inspection`.`trip_id`=`trip_details`.`trip_id` and `trip_details`.`request_id`=`request`.`request_id`";
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}

function getInsuranceProfiles($db_link){
	$sql="SELECT * FROM `insurance_profiles` WHERE 1";
	$results = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}
function getInsuranceProfile($db_link,$insurance_id){
	$sql="SELECT * FROM `insurance_profiles` WHERE `insurance_id`=".$insurance_id;
	$results = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
}
function getInsurancePolicies($db_link){
	$sql="SELECT * FROM `insurance_policy` WHERE 1";
	$results = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}

function getCarType($db_link,$vtype)
{
	$sql="SELECT `type_name` FROM vehicle_type WHERE `type_id`=".$vtype;
	$results  = mysqli_query($db_link,$sql);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
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
function getSupervisors($db_link){
	$query="SELECT CONCAT_WS(' ',`staff_firstname`,`staff_surname`),`staff_id` FROM `staff` WHERE `role_id`=2 and `delete_status`=0";
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
}

function getRole($db_link,$user_id){
	$query="SELECT `role_id` FROM `staff` WHERE `staff_id`=".$user_id;
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}

function getRoleName($db_link,$role_id){
	$query="SELECT `role_description` FROM `role` WHERE `role_id`=".$role_id;
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}
function getMyApproved($db_link,$staff_id){
	$query="SELECT `vehicle_id`, 
				CONCAT_WS(' ',
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
		if(mysqli_num_rows($results))
		{
			return $results;
		}
	}
}

function getMyRequestAlert($db_link,$user_id){
	$query="SELECT COUNT(*) FROM request WHERE request_supervisor_id=".$user_id." and request_cancelled=0 and request_supervisor_date='' and request_supervisorRejectReason='' and vehicle_id=0";
	$results=mysqli_query($db_link,$query);
	if($results){
			if(mysqli_num_rows($results))
				{
					$data=mysqli_fetch_row($results);
					return $data[0];
				}
	}
}

function getApprovedStatus($db_link,$staff_id,$request_id){
	$query="SELECT `request_approver_id`,`request_approval_date`,`request_rejectReason`
	         FROM `request`,`staff`
			 WHERE `staff`.`staff_id`=`request`.`staff_id` 
			 and request_approver_id!='' and request_approval_date!=''
			 and `request_rejectReason`=''
			 and `request`.`staff_id`=".$staff_id." and request_id=".$request_id;
		
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		$data=mysqli_fetch_row($results);
		return $data[0];
	}
}
function isKeyCollected($db_link,$request_id){
		$query="SELECT `request_keyCollectiondate`,`request_keyReturnDate`
	         FROM `request`
			 WHERE  request_id=".$request_id;
		
		$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]==0 && $data[1]==0){
				return true;
			}	
			else{
				return false;
			}
		}

}

function keyCollected($db_link,$request_id){
		$query="SELECT `request_keyCollectiondate`,`request_keyReturnDate`
	         FROM `request`
			 WHERE  request_id=".$request_id;
		
		$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]==1 && $data[1]==0){
				return true;
			}	
			else{
				return false;
			}
		}

}
function isclosed($db_link,$request_id){
		$query="SELECT `request_closure`
				 FROM `request`
				 WHERE  request_id=".$request_id;
		
		$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]=='0'){
				return false;
			}	
			else{
				return true;
			}
		}
}

function cancelled($db_link,$request_id)
{

	$query="SELECT `request_cancelled`
				 FROM `request`
				 WHERE  request_id=".$request_id;
		
		$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]=='0'){
				return false;
			}	
			else{
				return true;
			}
		}
}

function getProcessedStatus($db_link,$request_id)
{
	$query="SELECT `request_approval_date` FROM request WHERE request_id=".$request_id;
	$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]==""){
				return false;
			}	
			else{
				return true;
			}
		}
}

function getAccidentHistory($db_link){
	
	$query="SELECT `accident_id`,`trip_id`,CONCAT_WS('-', `reg_no`, `name`, `tel`, `owner`, `physical_add`,
	`postal_add`)AS trp , `police_report` FROM `accident_report` WHERE 1";
	
	$results  = mysqli_query($db_link,$query);
	if(mysqli_num_rows($results))
	{
		return $results;
	}
	
}

function getRejectStatus($db_link,$request_id)
{
	$query="SELECT request_rejectReason FROM request WHERE request_id=".$request_id;
	$results  = mysqli_query($db_link,$query);
		if(mysqli_num_rows($results))
		{
			$data=mysqli_fetch_row($results);
			if ($data[0]==""){
				return false;
			}	
			else{
				return true;
			}
		}
}
	
?>
