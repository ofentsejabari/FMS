<?php
session_start();
include('db_connect.php');
$db_link=db_connect();
//$db_link1=db_connect1();
function php2MySqlTime($phpDate){
    return date("Y-m-d H:i:s", $phpDate);
}
function js2PhpTime($jsdate){
  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
    $ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
    //echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
    $ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
    //echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }
  return $ret;
}

if($_GET['status']=="approval"){
	
			$query="UPDATE `request` SET `vehicle_id`='".$_GET['vehicle_id']."' ,
			 `request_approver_id`='".$_GET['user_id']."'
			,`request_approval_date`=now(), `request_approval_note`='".$_GET['note']."'
			WHERE `request_id`=".$_GET['request_id'];
			
                        $result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
                        
			$resultSet=getRequestDetails($db_link,$_GET['request_id']);
			
			$query2="INSERT INTO `jqcalendar`(`Id`, `Subject`, `Location`, `Description`, `StartTime`, `EndTime`, `IsAllDayEvent`, `Color`, `RecurringRule`) 
			VALUES (0,'".getPlateNumeber($db_link,$_GET['vehicle_id'])."','".$resultSet[1]."','".$resultSet[4]."','".php2MySqlTime(js2PhpTime($resultSet[2]))."','".php2MySqlTime(js2PhpTime($resultSet[3]))."',0,'".rand(0,13)."','')";
			
			$result1=mysqli_query($db_link,$query2)or die(mysqli_error($db_link));
		
			
			
			if($result){
				echo "successfull";	
				$result=getRequestDetails($db_link,$_GET['request_id']);
				$username1=getUser($db_link,$result[0]);
				$username=getUser($db_link,$result[0]);
				$body="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Status: Approved by Fleet Officer"
								."\n"
								."Officer:".getUserFull($db_link,$_GET['user_id'])
								."\n"
								
								."Employee : ".getUserFull($db_link,$result[0])
								."\n Destination :".$result[1]
								."\n Trip start:".$result[2]
								."\n Trip End:".$result[3]
								."\n Reason :".substr($result[4],3,-4)
								."\n Vehicle Reg:".getPlateNumeber($db_link,$_GET['vehicle_id'])
								."\n Note :".$_GET['note']
								."\n"
								." Please come collect the vehicle keys 30 minutes before the trip at our offices"
								."\n"
								."\n"
								."site : http://whitespaces.bitri.co.bw/fms/"
								."\n"
								.""
								;
				$subject="FMS: VEHICLE REQUEST";
				
				
				emailSender1($username,$username1,$subject,$body);
						
			}
			else{
				echo "unsuccessful";
			}
 }
/*
	this UPDATES the request table upon rejection of a specific request (reason,user_id,)
*/
if($_GET['status']=="reject"){
	
		$query="UPDATE `request` SET `request_rejectReason`='".$_GET['reason']."' , `request_approver_id`='".$_GET['user_id']."'
		, `request_approval_date`=now() WHERE `request_id`=".$_GET['request_id'];
		
		$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
		if($result){
						
			echo "<p style='color:green'>success</strong></p>";
			$result=getRequestDetails($db_link,$_GET['request_id']);
			$subject="FMS: VEHICLE REQUEST";
			$to=getUser($db_link,$result[0]);
			$to1=getUser($db_link,$result[6]);
			$message="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Status: **REJECTED** by Fleet Officer"
								."\n"
								."Officer:".getUserFull($db_link,$_GET['user_id'])
								."\n"
								."Fleet Officer reason:".$_GET['reason']
								."\n"
								."Employee : ".getUserFull($db_link,$result[0])
								."\n Destination :".$result[1]
								."\n Trip start:".$result[2]
								."\n Trip End:".$result[3]
								."\n Reason :".substr($result[4],3,-4)
								."\n"
								."Visit site : http://whitespaces.bitri.co.bw/fms/"
								.""
								;
								
			emailSender1($to,$to1,$subject,$message);	
			
		}
		else{
			echo "<p style='color:red'><strong>unsuccessful</strong></p>";
		}							
 }

if ($_GET['status']=="updateOrganization")
{


        $query="UPDATE `organization` SET `org_name`='".$_GET['org_name']."',`org_abbr`='".$_GET['org_abbr']."',`org_physical`='".$_GET['physical']."',
		`org_postal`='".$_GET['postal']."',`org_email`='".$_GET['email']."',`org_website`='".$_GET['site']."',`org_theme`='".$_GET['color']."',
		`active`=1, `use_abbr`=".$_GET['logo']." WHERE 1";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
	
 }
 
 if($_GET['status']=="allocationStatus"){
	 
	 $query="SELECT `staff_id`,`request_destination` FROM `request` WHERE  request_keyCollectiondate='' and `vehicle_id`=".$_GET['vehicle_id'];
	 $result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
	 if($result){
			$data=mysqli_fetch_row($result);
			if($data[0]=="")
			{
				echo "confirm allocation of vehicle: ".getPlateNumeber($db_link,$_GET['vehicle_id'])."";
				
			}
			else{
				echo "This vehicle has already been assigned to <strong>".getUserFull($db_link,$data[0])." destination: ".$data[1]."</strong> do you want to overide the assignment";
			}
	}
	 else {
		 echo "<p style='color:red'><strong>unsuccessful</strong></p>";
	}
	 
	 
 }
 if($_GET['status']=="addDesignation"){
					$query="INSERT INTO `designations`(`designation_id`, `designation_name`, `designation_date`, `designation_creator`) 
					VALUES (0,'".$_GET['designation_name']."',now(),".$_GET['user_id'].")";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
	
 }
 
  if($_GET['status']=="addAuditSet"){
					$query="UPDATE `depreciation` SET `depr_rate`=".$_GET['depRate'].",
					`depr_usefulLife`=".$_GET['years'].",`depr_salvageValue`=".$_GET['salvage'].",
					`depr_inUse`=".$_GET['depMethodSelect']." WHERE 1";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
	
 }
 
 if($_GET['status']=="view"){
	
		$query="UPDATE `request` SET `request_view`=1 WHERE `request_id`=".$_GET['request_id'];
		 
		$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
		if($result){
			echo "<p style='color:green'>success</strong></p>";
		}
		else{
			echo "<p style='color:red'><strong>unsuccessful</strong></p>";
		}							
 }
 
 if($_GET['status']=="addFleet"){
 
				$query="INSERT INTO  `vehicle`(`vehicle_id`, `vehicle_manufacture`, `vehicle_model`, `vehicle_plateNumber`, `vehicle_year`,
					 `vehicle_Fuel`, `vehicle_engineType`, `vehicle_registrationDate`, `vehicle_engineNumber`, `vehicle_chasisNumber`,
					 `vehicle_color`,`vehicle_status`, `type_id`,`vehicle_trasmission`) 
					 VALUES (0,'".$_GET['manufacture']."','".$_GET['model']."','".$_GET['plateNumber']."','".$_GET['year']."','".$_GET['fuel']."',
					 '".$_GET['engineType']."','".$_GET['regDate']."','".$_GET['engine']."','".$_GET['chassis']."','".$_GET['color']."','0',
					 ".$_GET['type_id'].",".$_GET['gear_id'].")";
					 
				
					 
				$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
                                
				if($result){
				
					$vehicle_id=getVehicleId($db_link,$_GET['plateNumber']);
					$smileage="";
					if($_GET['smileage']=="")
					{
						$smileage=$_GET['mileage'];
					}
					else{
						$smileage=$_GET['smileage'];
					}
					
					$query2="INSERT INTO `service_records`(`service_id`, `vehicle_id`, `service_date`, `service_center`, `service_type`, 
						`service_amount`, `staff_id`,`user_id`,`service_mileage`,`date_captured`) VALUES (0,'".$vehicle_id."','".$_GET['sdate']."'
						,'".$_GET['scenter']."','".$_GET['stype']."','".$_GET['samt']."','".$_GET['sofficer']."','".$_GET['user_id']."','".$smileage."',now())";
						
					$result2=mysqli_query($db_link,$query2)or die(mysqli_error($db_link));
							
					$query1="INSERT INTO `vehicle_details`(`vehicle_details_id`, `vehicle_id`, `vehicle_details_mileage`,
					`vehicle_details_purchaseDate`, `vehicle_details_carDealer`, `vehicle_details_amount`, `vehicle_details_receivedBy`,
					`vehicle_details_insuranceNo`, `vehicle_details_barcode`, `vehicle_details_photo`, `vehicle_details_purchasingOfficer`,`branch_id`)
					VALUES (0,'".$vehicle_id."','".$_GET['mileage']."','".$_GET['pDate']."','".$_GET['dealer']."','".$_GET['purchaseAmount']."',
					'".$_GET['user_id']."','','','','".$_GET['staffPurchase']."','".$_GET['branch']."')";
					
					$result1=mysqli_query($db_link,$query1)or die(mysqli_error($db_link));	
					
					if($result1){
						
							//update(0,$_GET['plateNumber'],$deviceid);
							echo "<p style='color:green'>success</strong></p>";
						
					
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					} 
				}
				else{
					echo "<p style='color:red'><strong>unsuccessful</strong></p>";
				}
}

if($_GET['status']=="delInventory")
{
	$query="UPDATE `vehicle` SET `del`=1 WHERE vehicle_id =".getVehicleId($db_link,$_GET['vehicleId']);
	$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
	
	if($result){
		echo "<p style='color:green'>success</strong></p>";
	}
	else{
		echo "<p style='color:red'><strong>unsuccessful</strong></p>";
	}
}


if($_GET['status']=="forgotForm")
{
  $user=substr($_GET['email'],0,-12);
  $password=generateRandomString($length = 10);
  $query="UPDATE `staff` SET `staff_password`='".sha1($password)."',`password_reseted`=1 WHERE staff_username ='".$user."'";
							
	$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
	if($result){
	
					$subject="FMS: ACCOUNT";
						$to=$user;
						$message="Password reset"
								."\n"
								."__________________________________________"
								."\n"
								."Username:".$to
								."\n"
								."Password : ".$password
								."\n"
								."Visit site : http://whitespaces.bitri.co.bw/fms/"
								;	
						emailSender($to,$subject,$message);
			echo "<p style='color:green'>success</strong></p>";
	}
	else{
			echo "<p style='color:red'><strong>unsuccessful</strong></p>";
	}

}
  if($_GET['status']=="addService"){
	  $query="INSERT INTO `service_records`(`service_id`, `vehicle_id`, `service_date`, `service_center`, `service_type`, 
	  `service_amount`, `staff_id`,`user_id`,`service_mileage`) VALUES (0,'".$_GET['plate']."','".$_GET['sdate']."'
	  ,'".$_GET['center']."','".$_GET['stype']."','".$_GET['amt']."','".$_GET['officer']."','".$_GET['user_id']."','".$_GET['smileage']."')";
	  

							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
}

if($_GET['status']=="addBranch"){
	
	  $query="INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES (0,'".$_GET['bra_name']."')";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
}
if($_GET['status']=="addDept"){
	
	  $query="INSERT INTO `department`(`dept_id`, `dept_name`) VALUES (0,'".$_GET['dept_name']."')";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
}
  
   if($_GET['status']=="addInsurance"){
	  $query="INSERT INTO `insurance_profiles`(`insurance_id`, `insurance_name`, `insurance_branch`, `insurance_tel`, `insurance_address`, `insurance_email`) VALUES (0,'".$_GET['insurance_name']."','".$_GET['branch']."'
	  ,'".$_GET['tel']."','".$_GET['address']."','".$_GET['email']."')";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}
}



   if($_GET['status']=="addFuel"){
	  $query="INSERT INTO `fuel_history`(`fuel_id`, `trip_id`, `filling_station`, `filling_attendant`, `amount`, `staff_id`, `receipt_name`, `fuel_liters`)
	  VALUES (0,".$_GET['trip_id'].",'".$_GET['filling']."','".$_GET['attandant']."','".$_GET['amt']."',".$_GET['user_id'].",'','".$_GET['litres']."')";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){	
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}  
  }

   if($_GET['status']=="asignInsurance"){
	  $query="INSERT INTO `insurance_policy`(`policy_id`, `vehicle_id`, `insurance_id`, `policy_no`, `policy_name`, `cover_amount`, `policy_start_date`, `installments`) VALUES (0,'".$_GET['plate']."','".$_GET['insurance_profile']."','".$_GET['policy']."'
	  ,'".$_GET['name']."','".$_GET['amount']."','".$_GET['date']."','".$_GET['installments']."')";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){	
						echo "<p style='color:green'>success</strong></p>";
					}
					else{
						echo "<p style='color:red'><strong>unsuccessful</strong></p>";
					}  
  }
  if($_GET['status']=="accident"){
  		  $query="INSERT INTO `accident_report`(`accident_id`, `trip_id`, `reg_no`, `name`, `tel`, `owner`, 
		  `physical_add`, `postal_add`, `police_report`, `insurance1`, `insurance2`)
		  VALUES (0,'".$_GET['trip']."','".$_GET['reg']."','".$_GET['driver']."','".$_GET['tel']."','".$_GET['owner']."',
		  '".$_GET['elm1']."','".$_GET['elm2']."','".$_GET['qoute']."','','')";
			
		$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
		if($result){	
						echo "<p style='color:green'>success</strong></p>";
		}
		else{
		
			echo "<p style='color:green'>unsuccessful</strong></p>";
		}
		  

  }
  
if($_GET['status']=="request"){
    
                                  $startEnd =explode("-",$_GET['reservation']);
                                //  echo $startEnd[0]." ".$startEnd[1];
	 
				  $query="INSERT INTO `request`(`request_id`, `staff_id`, `vehicle_id`, `request_date`, `request_destination`, 
				  `request_reason`, `request_approver_id`, `request_supervisor_id`, `request_level`, `start_date`, `end_date`, 
				  `request_view`, `request_rejectReason`, `request_travellers`, `request_approval_date`, `request_supervisor_date`,
				   `request_closure`, `request_vehicle_transmission`, `type_id`, `request_duty_nature`, `request_supervisor_reason`,`branch_id`,`request_driver`)
					VALUES (0,".$_GET['user'].",0,now(),'".$_GET['destination']."','".$_GET['reason']."',0,'".$_GET['supervisor']."',
					0,'".$startEnd[0]."','".$startEnd[1]."',0,'',".$_GET['travelling'].",'','',
					0,".$_GET['transmission'].",".$_GET['vehicleType'].",'','',".$_GET['branch'].",'".$_GET['drivers']."')";
							
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));

					if($result){

								echo "success \n";
								$subject="FMS: VEHICLE REQUEST";
								$message="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Employee : ".getUserFull($db_link,$_GET['user'])
								."\n Destination :".$_GET['destination']
								."\n Trip start:".$startEnd[0]
								."\n Trip End:".$startEnd[1]
								."\n Reason :".substr($_GET['reason'],3,-4)
								
								."\n"
								."Visit site : http://whitespaces.bitri.co.bw/fms/"
								.""
								;
								if($_GET['supervisor']=="0"){
										
										emailSender('fms',$subject,$message);
								}
								else{
									$to= getStaffProfile($db_link,$_GET['supervisor']);
                                                                        $data=mysqli_fetch_row($to);
									//emailSender($data[1],$subject,$message);
								}
								
					}
					else{
						echo "unsuccessful";
					}
	  
	  
	  
  }
/*              
*	UPDATE THE INVENTORY
*/  

if($_GET['status']=="updateInventory"){
    
                    $query="UPDATE `vehicle` SET `vehicle_manufacture`='".$_GET['manufacture']."',`vehicle_model`='".$_GET['model']."',
                    `vehicle_plateNumber`='".$_GET['plateNumber']."',`vehicle_year`='".$_GET['year']."',`vehicle_Fuel`='".$_GET['fuel']."',`vehicle_engineType`='".$_GET['engineType']."',
                    `vehicle_registrationDate`='".$_GET['regDate']."',`vehicle_engineNumber`='".$_GET['engine']."',`vehicle_chasisNumber`='".$_GET['chassis']."',
                    `vehicle_color`='".$_GET['color']."',`type_id`=".$_GET['type_id'].",`vehicle_trasmission`=".$_GET['gear_id']." 
                    WHERE `vehicle_id`=".$_GET['vehicleId']."";	

                    $result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
		
                    if($result){
				
				$query1="UPDATE `vehicle_details` SET 
				`vehicle_details_mileage`='".$_GET['mileage']."',`vehicle_details_purchaseDate`='".$_GET['pDate']."',`vehicle_details_carDealer`='".$_GET['dealer']."',
				`vehicle_details_amount`='".$_GET['purchaseAmount']."',`vehicle_details_receivedBy`='".$_GET['user_id']."',
				`vehicle_details_purchasingOfficer`='".$_GET['staffPurchase']."',
				`branch_id`='".$_GET['branch']."' WHERE `vehicle_id`='".$_GET['vehicleId']."'";
				
				$result1=mysqli_query($db_link,$query1)or die(mysqli_error($db_link));	
				
				    if($result1){
						echo "update successful \n";
					}
					else{
						echo "update unsuccessful \n";
					}
				
			}	
				
			else{
				echo "unsuccessful \n";
			}
}
/*
*
*	RESET PASSWORD
*/
if($_GET['status']=="resetPassword"){
  $user=getUser($db_link,$_GET['user_id']);
  $password=generateRandomString($length = 10);
  $query="UPDATE `staff` SET `staff_password`='".sha1($password)."',`password_reseted`=1 WHERE staff_username ='".$user."'";
							
	$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
	if($result){
	
					$subject="FMS: ACCOUNT";
						$to=$user;
						$message="Password reset"
								."\n"
								."__________________________________________"
								."\n"
								
								."\n"
								."Username:".$to
								."\n"
								."Password : ".$password
								."\n"
								."Access system : http://whitespaces.bitri.co.bw/fms/"
								;	
						emailSender($to,$subject,$message);
			echo "<p style='color:green'>success</strong></p>";
	}
	else{
			echo "<p style='color:red'><strong>unsuccessful</strong></p>";
	}
	
} 
  
if($_GET['status']=="addUser"){
				  $password=generateRandomString($length = 10);
				  $query="INSERT INTO `staff`(`staff_id`, `staff_surname`, `staff_firstname`, `staff_username`, `staff_password`, `staff_photo`, `role_id`, `delete_status`,`supervisor_id`,`dept_id`,`designation_id`,`last_login`)
				  VALUES (0,'".$_GET['lastname']."','".$_GET['firstname']."','".$_GET['username']."',
				  '".sha1(trim($password))."','','".$_GET['role']."',0,0,".$_GET['department'].",".$_GET['designation'].",'')";
						
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
					
						$subject="FMS: ACCOUNT";
						$to=$_GET['username'];
						$message="\n"
								."Account created"
								."\n"
								."__________________________________________"
								."\n"
								."Username:".$to
								."\n"
								."Password : ".$password
								."\n"
								."Access system : http://whitespaces.bitri.co.bw/fms/"
								;	
						emailSender($to,$subject,$message);
						echo " success";
					}
					else{
						echo "Unsuccessful";
					}
}


if($_GET['status']=="editUser"){
    
            $query="UPDATE `staff`
                    SET `staff_surname`='".$_GET['lastname']."',
                   `staff_firstname`='".$_GET['firstname']."',
                   `staff_username`='".$_GET['username']."',
                   `role_id`='".$_GET['role']."',
                   `dept_id`=".$_GET['department'].",
                   `designation_id`=".$_GET['designation']."
                    WHERE staff_id=".$_GET['user'];


            $result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
            if($result){
                
                echo " success";
            }
            else{
                  echo "Unsuccessful";
	}
}


if($_GET['status']=='passwordChange'){

			$query="UPDATE `staff` SET `staff_password`='".sha1($_GET['password'])."',`password_reseted`=0 WHERE `staff_id`=".$_GET['user_id'];

			$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));
						if($result)
						{
							
									echo 'SUCCESSFULLY SUBMITTED';
							
						}
						else{
									echo "unsuccessful";
							
						}
}
if($_GET['status']=="supervisor_approval")
{
	 
				  $query="UPDATE `request` 
				  		SET `request_supervisor_id`=".$_GET['user_id']." ,`request_supervisor_date` = now() 
				  		WHERE request_id=".$_GET['request_id'];
						
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
					
							
						$result=getRequestDetails($db_link,$_GET['request_id']);
						
						$subject="FMS: VEHICLE REQUEST";
						$to=getUser($db_link,$result[0]);
						$to1=getUser($db_link,$result[6]);
						$message="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Status: Approved by Supervisor"
								."\n"
								."Supervisor:".getUserFull($db_link,$_GET['user_id'])
								."\n"
								."Employee : ".getUserFull($db_link,$result[0])
								."\n Destination :".$result[1]
								."\n Trip start:".$result[2]
								."\n Trip End:".$result[3]
								."\n Reason :".substr($result[4],3,-4)
								."\n"
								."\n Access system : http://whitespaces.bitri.co.bw/fms/"
								.""
								;	
								
						emailSender2($to,$to1,$subject,$message);
						
						echo "success";
					
					}
					else{
						echo "Unsuccessful";
					}
}

if($_GET['status']=="cancel")
{
	                $query="UPDATE `request` 
				  		SET `request_cancelled`=1
				  		WHERE `request_id`=".$_GET['request_id'];
						
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
						
						$result=getRequestDetails($db_link,$_GET['request_id']);
						$subject="FMS: VEHICLE REQUEST";
							
						$to=getUser($db_link,$result[6]);
						$message="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Status: *** REQUEST - CANCELLED ***  "
								."\n"
								."Employee : ".getUserFull($db_link,$result[0])
								."\n Destination :".$result[1]
								."\n Trip start:".$result[2]
								."\n Trip End:".$result[3]
								."\n Reason :".substr($result[4],3,-4)
								."\n"
								."Access system : http://whitespaces.bitri.co.bw/fms/"
								.""
								;
								
							
						emailSender($to,$subject,$message);
						echo "<p >success</strong></p>";	
														
					}
					else{
						echo "Unsuccessful";
					}
}

if($_GET['status']=="collection"){					
					
        $query="UPDATE `request` SET request_keyCollectiondate=now()
		WHERE `request_id`=".$_GET['request_id'];
			
				
       $result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
	if($result){
		//update vehicle status
		$query1="UPDATE `vehicle` SET `vehicle_status`=1 WHERE vehicle_id=".$vehicle_id;
		$result1=mysqli_query($db_link,$query1)or die(mysqli_error($db_link));
		
		
		$result=getRequestDetails($db_link,$_GET['request_id']);
		$to=getUser($db_link,$result[6]);
		$to1=getUser($db_link,$result[0]);
		$subject="FMS: VEHICLE REQUEST";
				$message="Request Details"
				."\n"
				."__________________________________________"
				."\n"
				."Status: ***VEHICLE COLLECTED****  "
				."\n"
				."Employee : ".getUserFull($db_link,$result[0])
				."\n Destination :".$result[1]
				."\n Trip start:".$result[2]
				."\n Trip End:".$result[3]
				."\n Reason :".substr($result[4],3,-4)
				."\n"
				."Access system : http://whitespaces.bitri.co.bw/fms/"
				.""
				;
				
		emailSender1($to,$to1,$subject,$message);
		
		echo "<p >success</strong></p>";
	}
	else{
		echo "Unsuccessful";
	}
}





if($_GET['status']=="return")
{
	                $query="UPDATE `request`
				  		SET `request_keyReturnDate`=now() ,`request_closure`='1' 
				  		WHERE `request_id`=".$_GET['request_id'];
					$vehicle_id=getRequestVehicleId($db_link,$_GET['request_id']);	
					$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
					if($result){
					
						$query1="UPDATE `vehicle` SET `vehicle_status`=0 WHERE vehicle_id=".$vehicle_id;
						$result1=mysqli_query($db_link,$query1)or die(mysqli_error($db_link));
						
						$result=getRequestDetails($db_link,$_GET['request_id']);
						$to=getUser($db_link,$result[6]);
						$to1=getUser($db_link,$result[0]);
						$subject="FMS: VEHICLE REQUEST";
								$message="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Status: ***VEHICLE KEYS RETURNED****  "
								."\n"
								."Employee : ".getUserFull($db_link,$result[0])
								."\n Destination :".$result[1]
								."\n Trip start:".$result[2]
								."\n Trip End:".$result[3]
								."\n Reason :".substr($result[4],3,-4)
								."\n"
								."Access system : http://whitespaces.bitri.co.bw/fms/"
								.""
								;
								
						emailSender1($to,$to1,$subject,$message);
						
					
						echo "success";
													
					}
					else{
						echo "Unsuccessful";
					}
}

if($_GET['status']=="supervisorReject"){

				$query="UPDATE `request` 
							SET `request_supervisorRejectReason`='".$_GET['reason']."', `request_supervisor_date` = now()
							WHERE `request_id`=".$_GET['request_id'];
							
						$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
						if($result){
							$result=getRequestDetails($db_link,$_GET['request_id']);
							$to=getUser($db_link,$result[0]);
							$subject="FMS: VEHICLE REQUEST";
								$message="Request Details"
								."\n"
								."__________________________________________"
								."\n"
								."Status: ***REJECTED**** by Supervisor"
								."\n"
								."Supervisor:".getUserFull($db_link,$_GET['user_id'])
								."\n"
								."Reject Reason:".$_GET['reason']
								."\n"
								."Employee : ".getUserFull($db_link,$result[0])
								."\n Destination :".$result[1]
								."\n Trip start:".$result[2]
								."\n Trip End:".$result[3]
								."\n Reason :".substr($result[4],3,-4)
								."\n"
								."Access system : http://whitespaces.bitri.co.bw/fms/"
								.""
								;
								
							emailSender($to,$subject,$message);
							echo "success";
												
						}
						else{
							echo "Unsuccessful";
						}

}

if($_GET['status']=="delUser"){
		
						$query="UPDATE `staff` 
							SET `delete_status`=1
							WHERE `staff_id`=".$_GET['staff_id'];
							
						$result=mysqli_query($db_link,$query)or die(mysqli_error($db_link));	
						if($result){
							echo "success";
						}
						else{
							echo "Unsuccessful";
						}

}
?>
