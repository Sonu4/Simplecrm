<?php

        /** 
          * API file to upload/ update user profile pic as a note attachment for the user record.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
		$siteUrl                 = "";
		$userName                = "";
		$password                = "";
		$userSimplecrmId         = "";
		$success_status          = "yes";

		$siteUrl                 = urldecode($_REQUEST["url"]);
		$api_url                 = "$siteUrl/service/v4_1/rest.php";
		$jsonParam               = urldecode($_REQUEST["jsonParam"]);
		$jsonParam               = json_decode($jsonParam);

		$userSimplecrmId         = $jsonParam->id;
		$userName                = $jsonParam->userName;
		$password                = $jsonParam->password;

		// login ---------------------------------------------
		$login_parameters = array(
			"user_auth" => array(
				"user_name" => $userName,
				"password" => md5($password),
				"version" => "1"
			),
			"application_name" => "RestTest",
			"name_value_list" => array(),
		);

		$login_result   = call("login", $login_parameters, $api_url);
		$assignedUserId = $login_result->name_value_list->user_id->value;

		// get session id
		$sessionID = $login_result->id;

		if (empty($sessionID)) {
			$success_status = "no";
		}

		/***************  file upload logic - start ***************/

		// $picture_unique_id = $userName."_".$userSimplecrmId;
		$picture_unique_id = $userName;

		// Logic to store file - start

		$file_path = "uploads/";
		    
		//Loop through each file

		$success = array();
		$failure = array();
			        
		for($i=0; $i<count($_FILES['uploaded_file']['name']); $i++) {
			//Get the temp file path
			$tmpFilePath = $_FILES['uploaded_file']['tmp_name'][$i];

			$filenamee = $_FILES['uploaded_file']['name'][$i];  

			// $filenamee = rawurldecode($filenamee);

			//Make sure we have a filepath
			if ($tmpFilePath != ""){
				//Setup our new file path
				$newFilePath = "uploads/".$picture_unique_id."_".$_FILES['uploaded_file']['name'][$i];

				//Upload the file into the temp dir
				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					$success[] = $newFilePath;
				}else{
					$failure[] = $newFilePath;
				}
			}
		}
			    
		$result = array("username" => $username, "Success"=>$success,"Failure"=>$failure);  
		//echo json_encode($result);

		// Logic to store file - end

		// Add logic to create notes under the user record - start

		$files = glob("uploads/$picture_unique_id*".".*");

		// Process through each file in the list
		// and output its extension
		if (count($files) > 0){

			foreach ($files as $file){

				$info = pathinfo($file);

				//create note ----------------------------------------------- 
				$set_entry_parameters = array(
					//session id
					"session" => $sessionID,

					//The name of the module
					"module_name" => "Notes",

					//Record attributes
					"name_value_list" => array(
						//to update a record, you will nee to pass in a record id as commented below
						//array("name" => "id", "value" => "9b170af9-3080-e22b-fbc1-4fea74def88f"),
						array("name" => "name", "value" => $info["filename"]),
						// array("name" => "parent_type", "value" => "Opportunities"),
						// array("name" => "parent_id", "value" => $res_id),
						array("name" => "record_source_c", "value" => "mobile"),
						array("name" => "users_notes_1users_ida", "value" => $userSimplecrmId),
						array("name" => "notes_type_c", "value" => "in direct"),
						array("name" => "assigned_user_id", "value" => $assignedUserId),
						array("name" => "description", "value" => "Attachment of mobile user."),
					),
				);

				$set_entry_result = call("set_entry", $set_entry_parameters, $api_url);

				$note_id = $set_entry_result->id;

				if (empty($note_id)) {
					$success_status = "no";
				}

				$file_name      = $info["filename"];
				$file_extension = $info["extension"];
				//$directory_path = "uploads";
				$directory_path = $info["dirname"];

				//create note attachment -------------------------------------- 
				$contents = file_get_contents ($directory_path."/".$file_name.".".$file_extension);
				//$contents = file_get_contents ($directory_path."/".$info["basename"]);

				$new_file_name = str_replace($picture_unique_id."_", "", $file_name);
				//$new_file_name = chop($file_name,$picture_unique_id);

				$set_note_attachment_parameters = array(
					//session id
					"session" => $sessionID,

					//The attachment details
					"note" => array(
						//The ID of the note containing the attachment.
						'id' => $note_id,

						//The name of the attachment
						'filename' => $new_file_name.'.'.$file_extension,

						//The binary contents of the file.
						'file' => base64_encode($contents),
					),
				);

				$set_note_attachment_result = call("set_note_attachment", $set_note_attachment_parameters, $api_url);

				//remove files after successfull creation of notes
				if (is_file($directory_path."/".$info["basename"])) {
					unlink($directory_path."/".$info["basename"]);
				}
			}
		}

		else{
			// No file name exists
			$success_status = "no";
		}

		// Add logic to create notes under the user record - end

		/***************  file upload logic - end ***************/

		$outputArrr = array();
		$outputArrr['Android'] = $success_status;
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
