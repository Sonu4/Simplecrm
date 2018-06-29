<?php

$adminUsername    = "";
$adminPassword    = "";
$siteUrl          = "";
$userName         = "";
$userPassword     = "";
$firstName        = "";
$lastName         = "";
$email            = "";
$mobilePhone 	  = "";
$workPhone        = "";
$title            = "";
$recordSource     = "";
$socialMediaID    = "";
$socialMediaType  = "";
$userSimplecrmId  = "";
$existing_user_status  = "";

$adminUsername    = "admin";
$adminPassword    = "$"."imp!ecrm@$32!";

$siteUrl          = urldecode($_REQUEST["url"]);
$api_url          = "$siteUrl/service/v4_1/rest.php";

$jsonParam        = urldecode($_REQUEST["jsonParam"]);
$jsonParam        = json_decode($jsonParam);

$userName         = $jsonParam->userName;
$userPassword     = $jsonParam->userPassword;
$firstName        = $jsonParam->firstName;
$lastName         = $jsonParam->lastName;
$email            = $jsonParam->email;
$mobilePhone      = $jsonParam->mobilePhone;
$workPhone        = $jsonParam->workPhone;
$title            = $jsonParam->title;
$recordSource     = $jsonParam->recordSource;
$socialMediaID    = $jsonParam->socialMediaID;
$socialMediaType  = $jsonParam->socialMediaType;

$description      = "User created from Mobile App/ Social Media";
$userStatus       = "Active";
$userType         = "RegularUser";

		// check whether the user exist in the system
        include 'db.php';
    	$prefix = "";
    	$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

	    if( $connection ){
	        mysql_query ("set character_set_results='utf8'");
	        $db_selected = mysql_select_db($mysql_database, $connection);

			$sql     = "SELECT id, user_name,status FROM users WHERE user_name = '$userName' AND deleted = 0";
	        $results = mysql_query($sql, $connection);
			$row     = mysql_fetch_array($results);

			// update user data
			if ($row) {

				$existing_user_status       = $row['status'];

				if ($existing_user_status == 'Inactive') {
					$userStatus = 'Inactive';
				}

				$userSimplecrmId = $row['id'];

				// login ---------------------------------------------
				$login_parameters = array(
					"user_auth" => array(
						"user_name" => $adminUsername,
						"password" => md5($adminPassword),
						"version" => "1"
					),
					"application_name" => "RestTest",
					"name_value_list" => array(),
				);

				$login_result = call("login", $login_parameters, $api_url);

				// get session id
				$session_id = $login_result->id;

				// create user -------------------------------------
				$set_entry_parameters = array(
					// session id
					"session" => $session_id,
					// The name of the module from which to retrieve records.
					"module_name" => "Users",
					// Record attributes
					"name_value_list" => array(
						// to update a record, you will nee to pass in a record id as commented below
						array("name" => "id", "value" => $userSimplecrmId),
						array("name" => "first_name", "value" => $firstName),
						array("name" => "last_name", "value" => $lastName),
						array("name" => "status", "value" => $userStatus),
						array("name" => "UserType", "value" => $userType),
						array("name" => "email1", "value" => $email),
						array("name" => "phone_mobile", "value" => $mobilePhone),
						array("name" => "title", "value" => $title),
						array("name" => "description", "value" => $description),
						array("name" => "phone_work", "value" => $workPhone),
						// array("name" => "record_source_c", "value" => $recordSource),
						array("name" => "user_social_media_id_c", "value" => $socialMediaID),
						array("name" => "user_social_media_type_c", "value" => $socialMediaType),
						array("name" => "user_hash", "value" => md5($userPassword)),
						array("name" => "employee_status", "value" => $userStatus),

					),

				);

				$set_entry_result = call("set_entry", $set_entry_parameters, $api_url);
			}

			// create new user
		    if (!$row) {

				// login ---------------------------------------------
				$login_parameters = array(
					"user_auth" => array(
						"user_name" => $adminUsername,
						"password" => md5($adminPassword),
						"version" => "1"
					),
					"application_name" => "RestTest",
					"name_value_list" => array(),
				);

				$login_result = call("login", $login_parameters, $api_url);
				$session_id   = $login_result->id;

				// create user -------------------------------------
				$set_entry_parameters = array(
					// session id
					"session" => $session_id,
					// The name of the module from which to retrieve records.
					"module_name" => "Users",
					// Record attributes
					"name_value_list" => array(
						// to update a record, you will nee to pass in a record id as commented below
						// array("name" => "id", "value" => "aba06326-9a44-aab5-9795-58d8b45fe475"),
						array("name" => "user_name", "value" => $userName),
						array("name" => "first_name", "value" => $firstName),
						array("name" => "last_name", "value" => $lastName),
						array("name" => "status", "value" => $userStatus),
						array("name" => "UserType", "value" => $userType),
						array("name" => "email1", "value" => $email),
						array("name" => "phone_mobile", "value" => $mobilePhone),
						array("name" => "title", "value" => $title),
						array("name" => "description", "value" => $description),
						array("name" => "phone_work", "value" => $workPhone),
						array("name" => "record_source_c", "value" => $recordSource),
						array("name" => "user_social_media_id_c", "value" => $socialMediaID),
						array("name" => "user_social_media_type_c", "value" => $socialMediaType),
						array("name" => "user_hash", "value" => md5($userPassword)),
						array("name" => "employee_status", "value" => $userStatus),
					),
				);

				$set_entry_result = call("set_entry", $set_entry_parameters, $api_url);
				$userSimplecrmId  = $set_entry_result->id;

				// To handle no permission issue
				$result_name         = $set_entry_result->name;
				$result_description  = $set_entry_result->description;

				// assign role -------------------------------------
				$roleId = "9d75872c-6f13-9bf6-0233-58d1f85fa4e6";
		        $set_assign_role_parameters = array(
			        // session id
			        "session" => $session_id,
			        // The name of the module from which to retrieve records.
			        "module_name" => "ACLRoles",
			        // Record attributes
			        "name_value_list" => array(
				        array("name" => "id", "value" => $roleId),
				        array("name" => "user_id", "value" => $userSimplecrmId),
				        array("name" => "role_id", "value" => $roleId),
			        ),
		        );

				$assign_result = call("set_entry", $set_assign_role_parameters, $api_url);

			} 
	        mysql_close($connection);
	    }

		$outputArrr = array();
		$outputArrr['Android'] = $userSimplecrmId;
		//echo ( json_encode($outputArrr));
		print_r( json_encode($outputArrr));


		// function to make cURL request
		function call($method, $parameters, $url) {

			ob_start();
			$curl_request = curl_init();
			curl_setopt($curl_request, CURLOPT_URL, $url);
			curl_setopt($curl_request, CURLOPT_POST, 1);
			curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
			curl_setopt($curl_request, CURLOPT_HEADER, 1);
			curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
			$jsonEncodedData = json_encode($parameters);
			$post = array(
			"method" => $method,
			"input_type" => "JSON",
			"response_type" => "JSON",
			"rest_data" => $jsonEncodedData
			);
			curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
			$result = curl_exec($curl_request);
			curl_close($curl_request);
			$result = explode("\r\n\r\n", $result, 2);
			$response = json_decode($result[1]);
			ob_end_flush();
			return $response;
		}

?>
