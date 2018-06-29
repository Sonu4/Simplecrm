<?php

	    /** 
	      * Login file, use to authenticate mobile application user with CRM.
	      * Date        : Mar-17-2017
	      * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
	      * PHP version : 5.6
	    */
        class UserLogin {

            public function checkLicense($license_key) {

                $valid_license    = "no";

				if (!empty($license_key)) {

					// check validity of the license key
					$valid_license    = "yes";
					$url = "http://licensing.simplecrmondemand.com/mobilecrm/checklicense.php?origin=scrm&license_key=$license_key";
					$ch  = curl_init();

					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_URL, $url); 
					curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
					curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
			
					$response = curl_exec($ch);

					$valid_license = $response;

					curl_close($ch);
				}

                return $valid_license;
            }

            public function doLogin($username,$password,$api_url,$license_key) {

                $outputArr = array();

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

				$login_result = $this->call("login", $login_parameters, $api_url);
				
				$license_data = $this->checkLicense($license_key);

				// if count($login_result) > 0 add license details.
				$login_result->license_key      = $license_key;
				$login_result->valid_license    = $license_data;

				if (empty($license_key)) {
					$login_result->license_key      = "nil";
					$login_result->valid_license    = "no";
				}

                $outputArr['Android'] = $login_result;   
                return $outputArr;
            }

			// function to make cURL request
			public function call($method, $parameters, $url) {
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

        }

		$username   = urldecode($_REQUEST["username"]);
		$password   = urldecode($_REQUEST["password"]);
		$site_url   = urldecode($_REQUEST["url"]);

		$api_url    = "$site_url/service/v4_1/rest.php";

		if(!defined('sugarEntry'))
		define('sugarEntry', true);
		//global $sugar_config;
		include '../config.php';
		include '../config_override.php';

		$license_key      =  $sugar_config['mobile_license_key'];
		
        $myObject         = new UserLogin();
        $request_response = $myObject->doLogin($username,$password,$api_url,$license_key);

        print_r(json_encode($request_response));
?>
