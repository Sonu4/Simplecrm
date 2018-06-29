<?php

        $username       = urldecode($_REQUEST["username"]);
        $password       = urldecode($_REQUEST["password"]);
        $url            = urldecode($_REQUEST["url"]);
        $module_name    = urldecode($_REQUEST["module_name"]);
        $api_url     = "$url/service/v4_1/rest.php";

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
    //print_r($loginResult); exit;

        if (isset($loginResult->name) && $loginResult->name == 'Invalid Login') {
            $outputArrr = array();
            $outputArrr['Android'] = $loginResult;
            //echo ( json_encode($outputArrr));
            print_r( json_encode($outputArrr));

        } else {

        	$jsonFirst       = rawurldecode($_REQUEST["jsonParam"]); 
            $json            = rawurldecode($_REQUEST["jsonParam"]); 
            $jsonData        = json_decode($json);            

            $jsonDataArray = json_decode(json_encode($jsonData),true);
            //print_r($jsonDataArray); exit;


            $final_data_array = array();

            foreach ($jsonDataArray['data'] as $datakey => $datavalue) {
            	$i = 0;            	
            	foreach ($datavalue as $innerkey => $innervalue) {
            	            		
            		$final_data_array[$datakey][$i] = array("name" => $innerkey,"value" => $innervalue);
            		$i++;
            	}

            } 

           //Here add logic for creating/updating records manualy by passing id

             /*$final_data_array =   array(
             array(
                //to update a record, you will nee to pass in a record id as commented below
                //array("name" => "id", "value" => "912e58c0-73e9-9cb6-c84e-4ff34d62620e"),
                array("name" => "id", "value" => "10658929-338d-6bb4-be65-59708af6e32d"),
              	array("name" => "deleted_from_mobileapp_c", "value" => "1"),
              	array("name" => "description", "value" => "fdshfsdjkfhdsj"),
             ),
             
         );*/

         //print_r($final_data_array); exit;

            $sessionID = $loginResult->id;
            $setEntryParameters = array(
                 //session id
                "session" => $sessionID,
                //The name of the module from which to retrieve records.
                "module_name" => $module_name,
                //Record attributes                
                "name_value_list" => $final_data_array,

            );

            //print_r($setEntryParameters); exit;

            $setEntryResult = call("set_entries", $setEntryParameters, $api_url);
            //$setEntryResult_id = $setEntryResult->id;

            $outputArr = array();
            $outputArr['Android'] = $setEntryResult;
            //echo ( json_encode($outputArr));
            print_r( json_encode($outputArr));

	  }


//function to make cURL request
function call($method, $parameters, $url)
{
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

?>
