<?php

        /** 
          * Main api file to create/ update records.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        include 'db.php';

        $username       = urldecode($_REQUEST["username"]);
        $password       = urldecode($_REQUEST["password"]);
        $url            = urldecode($_REQUEST["url"]);
        $module_name    = urldecode($_REQUEST["module_name"]);
        $custom_field   = strtolower($_REQUEST["module_name"])."_cstm";
        $api_url        = "$url/service/v4_1/rest.php";

    	//login ---------------------------------------------
    	$login_parameters = array(
    	"user_auth" => array(
    	"user_name" => $username,
    	"password" => md5($password),
    	"version" => "1"
    	),
    	"application_name" => "MobileUserAuthentication",
    	"name_value_list" => array(),
    	);
    	$loginResult = call("login", $login_parameters, $api_url);
       
        if (isset($loginResult->name) && $loginResult->name == 'Invalid Login') {
            $outputArrr = array();
            $outputArrr['Android'] = $loginResult;
            print_r( json_encode($outputArrr));

        } else {
            
            $current_user_id = $loginResult->name_value_list->user_id->value;

            $jsonFirst       = rawurldecode($_REQUEST["jsonParam"]); 
            $json            = rawurldecode($_REQUEST["jsonParam"]); 
            $jsonData        = json_decode($json);   
            
            $jsonData_data       = $jsonData->data;                
            $jsonData_data_count = count($jsonData_data);

            $resull = array();
            $nameValueList = array();
	        $k=0;
            $jsonData_data_array = array();
            for($k;$k<$jsonData_data_count;$k++){
                $jsonData_data_array_each = $jsonData_data[$k];

                foreach ($jsonData_data_array_each as $key => $value) {
                    $nameValueList[] = array("name" => $key, "value" => $value);
                }
                if(count($nameValueList)){
                    $resull[] = array_push($resull, $nameValueList);
                }
                $nameValueList = array();
            }

            $resull_count = count($resull);

            $p=0;
            $final_data_array = array();
            for($p;$p<$resull_count;$p++){
                $resull_each = $resull[$p];
                if (!is_numeric($resull_each)) {
                    $final_data_array [] = $resull_each;
                }
            }

            // Logic for creating new records
            $sessionID = $loginResult->id;
            $setEntryParameters = array(
                 //session id
                "session" => $sessionID,
                //The name of the module from which to retrieve records.
                "module_name" => $module_name,
                //Record attributes
                //to update a record, you will nee to pass in a record id as commented below
                "name_value_list" => $final_data_array,
            );
           
            $setEntryResult = call("set_entries", $setEntryParameters, $api_url);

            /************************* Handle Meetings/ Calls reminder issue - start *************************/
            if($module_name == 'Meetings' || $module_name == 'Calls'){

                $setEntryResult_ids = $setEntryResult->ids;
                $res_count          = sizeof($setEntryResult_ids);
                $y                  = 0;
 
                //check $res_count > 0{}
                for($y;$y<$res_count;$y++){

                    $record_id       = $setEntryResult_ids[$y];
                    $reminder_time   = "";
                    $ind_array       = $final_data_array[$y];
                    foreach($ind_array as $ind_arr){

                        if($ind_arr['name'] =='reminder_time'){
                            
                            $reminder_time  = $ind_arr['value'];

                            $connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);
                            if( $connection ) {

                                mysql_query ("set character_set_results='utf8'");
                                $db_selected = mysql_select_db($mysql_database, $connection);

                                date_default_timezone_set("UTC");
                                // $currentDateAndTime = date('Y-m-d H:i:s', time());
                                $currentDateAndTime = date("Y-m-d H:i:s");

                                $unique_id          = gen_uuid();
                                $module_name_lower  = strtolower($module_name);
                                $table_name         = $module_name_lower."_users";
                                $field_name         = substr($module_name_lower, 0, -1)."_id";

                                $sql11     = "UPDATE $table_name SET deleted = '1' WHERE $field_name ='$record_id' AND deleted ='0'";
                                mysql_query($sql11, $connection);

                                $sql12     = "DELETE FROM $table_name WHERE $field_name ='$record_id' AND deleted ='1' AND user_id='$current_user_id'";
                                mysql_query($sql12, $connection);

                                // Add users relationship for the meeting/ call
                                $sql10 = "INSERT INTO $table_name (id, $field_name, user_id, date_modified) VALUES 
                                          (UUID(),'$record_id', '$current_user_id', '$currentDateAndTime')";
                                $results10 = mysql_query($sql10, $connection);


                                $sql0     = "DELETE FROM reminders WHERE related_event_module='$module_name' 
                                             AND related_event_module_id ='$record_id' AND deleted ='0' 
                                             AND popup = '1'";
                                $sql0     = "UPDATE reminders SET deleted = '1' WHERE related_event_module='$module_name' 
                                             AND related_event_module_id ='$record_id' AND deleted ='0' 
                                             AND popup = '1'";
                                $results0 = mysql_query($sql0, $connection);

                                $sql1 = "INSERT INTO reminders (id, modified_user_id, created_by, deleted, popup, email, email_sent, timer_popup, timer_email, related_event_module, related_event_module_id, date_modified, date_entered) VALUES ('$unique_id', '$current_user_id', '$current_user_id', '0', '1', '0', '0', '$reminder_time', '$reminder_time', '$module_name', '$record_id', '$currentDateAndTime', '$currentDateAndTime')";
                                $results1 = mysql_query($sql1, $connection);

                                $sql44     = "DELETE FROM reminders_invitees WHERE related_event_module='$module_name' 
                                              AND related_event_module_id ='$record_id' AND deleted ='0'";
                                $sql44     = "UPDATE reminders_invitees SET deleted = '1' WHERE related_event_module='$module_name' 
                                              AND related_event_module_id ='$record_id' AND deleted ='0'";
                                // mysql_query($sql44, $connection);

                                $sql55 = "INSERT INTO reminders_invitees (id, modified_user_id, created_by, deleted, related_invitee_module, related_invitee_module_id, date_modified, date_entered, reminder_id) VALUES (UUID(), '$current_user_id', '$current_user_id', '0', 'Users', '$current_user_id', '$currentDateAndTime', '$currentDateAndTime','$unique_id')";
                                // mysql_query($sql55, $connection);

                                mysql_close($connection);
                            }
                        }
                    }
                }
            }
            /************************* Handle Meetings/ Calls reminder issue - end *************************/
            
            $setEntryResultArray = json_decode(json_encode($setEntryResult),true);

            $connection  = mysql_connect($mysql_hostname,$mysql_user,$mysql_password);
            if($connection){
                $mobile_id_c = array();
                foreach($setEntryResultArray['ids'] as $key=>$val){

                    mysql_query ("set character_set_results='utf8'");
                    $db_selected        = mysql_select_db($mysql_database, $connection);

                    $fetchMobileIdQuery = "SELECT id_c,mobile_id_c FROM ".$custom_field." WHERE id_c LIKE '$val'";

                    $resultsMobileId    = mysql_query($fetchMobileIdQuery, $connection);
                    $row                = mysql_fetch_assoc($resultsMobileId);

                    $mobile_id_c[] =$row;
                }
            }  
            
            $setEntryResultFinalArr['records'] = $mobile_id_c;
            
            $outputArr = array();
            $outputArr['Android'] = $setEntryResultFinalArr;

            print_r( json_encode($outputArr));
        }


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
            //$result = $parameters;
            return $response;
        }

        // function to generate unique id
        function gen_uuid() {

            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

                // 16 bits for "time_mid"
                mt_rand( 0, 0xffff ),

                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand( 0, 0x0fff ) | 0x4000,

                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand( 0, 0x3fff ) | 0x8000,

                // 48 bits for "node"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }

?>
