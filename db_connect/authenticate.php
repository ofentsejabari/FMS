<?php

	session_start();//
	include("db_connect.php");
	$db_link=db_connect();//
	 
	$errors = array();      // array to hold validation errors
	$data   = array();      // array to pass back data

	// Server side validation of variables
    // if any of these variables don't exist, add an error to our $errors array
    if(empty($_GET['username'])){
        $errors['username'] = 'Unrecognized/ invalid username fomart.';
		
	}

    if(empty($_GET['userpassword'])){
        $errors['userpassword'] = 'Unrecognized/ invalid password format';
		
	}
	
	//--return a response -------------------------------------------

    // if there are any errors in our errors array, return a success boolean of false
    if(!empty($errors)){
        $data['success'] = false;
        $data['errors']  = $errors;
    }else{

		$user = login($_GET['username'],  sha1($_GET['userpassword']),$db_link);
			
		if(is_array($user)){
			//-- set session variables
			$_SESSION["fmsuser"] = $user['staff_id'];
			$data['message'] = $user['password_reseted'];
			
			
			$data['success'] = true;
			
			
		}
		else{
			$errors['authfailure'] = 'User authentication failed : check username and password combination';
			$data['success'] = false;
            $data['errors']  = $errors;		
		}
        
	}

    // return all our data to an AJAX call
    echo json_encode($data);


?>