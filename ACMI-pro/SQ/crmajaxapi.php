<?php
if (!define('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
global $db, $sugar_config;
$url = 'https://kkel.simplecrmondemand.com/service/v4_1/rest.php';
$username = 'admin';
$password ='kkel!@321';
$apiModule = array(
    'Lead',
);
$apiAction = array(
    'Create',
    'Update',
    'Fetch'
);

   $GLOBALS['log']->fatal("The CRM ajax post from KKEL : " . print_r($_POST, true));

 // print_r($_SERVER);

if (in_array($_POST['HTTP_REQUESTEDMODULE'], $apiModule) && in_array($_POST['HTTP_REQUESTEDMETHOD'], $apiAction)) {
    // if ($_SERVER['HTTP_AUTHORIZEDAPPLICATION'] == "kK3L$32!" && in_array($_SERVER['HTTP_REQUESTEDMODULE'], $apiModule) && in_array($_SERVER['HTTP_REQUESTEDMETHOD'], $apiAction)) {
    
    $module = $_POST['HTTP_REQUESTEDMODULE'];
     $action = $_POST['HTTP_REQUESTEDMETHOD'];
    
    // $fp      = fopen('php://input', 'r');
    // $rawData = json_decode(stream_get_contents($fp));
    // $GLOBALS['log']->fatal("The CRM entry point parameter for Leads creation from KKEL : " . print_r($rawData, true));

    $session_id = generateSession($username, $password, $url);
    
    if ($module == "Lead" && $action == 'Create') {
          
        $last_name        = $_POST['name'];
        $phone_mobile     = $_POST['contactnumber'];
        $email1           = $_POST['email'];
        $lead_source      = $_POST['lead_source'];
        $city             = $_POST['city'];
        $message          = $_POST['message'];
        $centre           = $_POST['centre'];
        $enquiry_type   =   $_POST['type'];
        $school   =   $_POST['school'];
        $country    =   $_POST['country_code'];
        $department =   $_POST['department'];
        $admission_type    =   $_POST['admission_type'];
        $primary_address_city   =   $_POST['primary_address_city'];
        $primary_address_state  =   $_POST['primary_address_state'];
        $primary_address_country    =   $_POST['primary_address_country'];
        $source =   $_POST['source'];
        $campaign   =   $_POST['campaign'];
        $initial_source   =   $_POST['initial_source'];
        
        // $last_name        = $rawData->name;
        // $phone_mobile     = $rawData->contactnumber;
        // $email1           = $rawData->email;
        // $lead_source      = $rawData->lead_source;
        // $city             = $rawData->city;
        // $message          = $rawData->message;
        // $centre           = $rawData->centre;
        // $enquiry_type   =   $rawData->type;
        // $school   =   $rawData->school;
        // $country    =   $rawData->country_code;
        // $department	=	$rawData->department;
        // $admission_type    =   $rawData->admission_type;
        // $primary_address_city	=	$rawData->primary_address_city;
        // $primary_address_state	=	$rawData->primary_address_state;
        // $primary_address_country	=	$rawData->primary_address_country;
        // $source	=	$rawData->source;
        // $campaign	=	$rawData->campaign;
        // $initial_source	=	$rawData->initial_source;
        
        
        //Check Mobile number 
        if(!empty($phone_mobile)){
			$mobile_qry="SELECT id FROM leads WHERE phone_mobile = '$phone_mobile' AND deleted =0";
			$mobile_result =$db->query($mobile_qry);
			$lead_count = $mobile_result->num_rows;
			if($lead_count>0){
				$msg = array(
					'Success' => false,
					'Message' => 'Oops! the lead is alredy present in CRM'
				);
							echo json_encode($msg);
				exit;
				}
			}
		
		        //Check Empty record 	
         if(empty($phone_mobile) && empty($last_name)){
			
				$msg = array(
					'Success' => false,
					'Message' => 'Oops! the lead details are empty'
				);
							echo json_encode($msg);
				exit;
			}

        $phone_code = $GLOBALS['app_list_strings']['scrm_leads_country_code_list'][$country]; 

        
        $campaign_id_qry="SELECT id FROM campaigns WHERE name = '$campaign' AND deleted =0";
		$campaign_result =$db->query($campaign_id_qry);
		$campaign_row= $db->fetchByAssoc($campaign_result);
		$campaign_id = $campaign_row['id'];
		
        if($lead_source=="billabonghighschool.com"){
          $product_interested="BHIS";
          $status="Qualified";
        }elseif($lead_source=="kangarookids.in"){
			 $product_interested="KKEL";
             $status="New";
         }elseif($lead_source=="kkel.com"){
           if(($admission_type=='KK CLUB')||($admission_type=='DAYCARE')||($admission_type=='KITDR')){
                $product_interested="KKEL";
                $status="New";
            }elseif(($admission_type=='BILLABONG')||($admission_type=='HIGH SCHOOL')){
               $product_interested="BHIS";
               $status="Qualified";
            }else{
				$product_interested="KKEL";
				 $status="New";
            }
          }

		///To make all the leads which are directly coming form webside as Qualified 
        if(empty($source)){
			$status="Qualified";
			}else{
				 $status="New";
				}  
          
        //Start of Changes on 10th April 2018 for source and sub source 
        //Source indicate the leads which are directly coming form website 
        if(empty($source)){
			$newsource="Digital Organic";
			
			 if($lead_source=="billabonghighschool.com"){
				$subsource="Digital Organic_BHIS Website";
				}elseif($lead_source=="kangarookids.in"){
				$subsource="Digital Organic_KK Website";
				}elseif($lead_source=="kkel.com"){
				$subsource="Digital Organic_KKEL Website";
				}
		}elseif($source=='Facebook'){
				$newsource="Digital Paid";
				$subsource="Digital Paid_Facebook Adverts";
		}elseif($source=='Adwords'){
                $newsource="Digital Paid";
                $subsource="Digital Paid_Google Adwords";
        }elseif($source=='smsblast'){
				$newsource="Digital Paid";
				$subsource="Digital Paid_Sms Blast";
		}  
        //END of Changes on 10th April 2018 for source and sub source 
        //SMS BLAST sub source name we have added on 9th July2018

        if($primary_address_country!="India"){
		   $primary_address_street=$primary_address_city;
		   }
		   
		$assigned_agent_id = "243e717c-d641-dcb2-6ea9-5a054dda0509";
		if($product_interested=="BHIS"){
			$assigned_agent_id = "cb617f7a-29e1-ecdd-5878-59fc5b4e3c55";
			}else{
				$CC1_Number1 = 0; 
				$CC2_Number2 = 0;
				$qry1="SELECT id FROM leads WHERE assigned_user_id = '243e717c-d641-dcb2-6ea9-5a054dda0509' AND deleted=0";
				$getNumber1 = $db->query($qry1);
				$CC1_Number1 = $getNumber1->num_rows;
				$qry2="SELECT id FROM leads WHERE assigned_user_id = 'c5b28e0e-bf69-654f-7630-5a054d29cf6e' AND deleted=0";
				$getNumber2 = $db->query($qry2);
			    $CC2_Number2 = $getNumber2->num_rows;
				if ($CC1_Number1 > $CC2_Number2) {
					$assigned_agent_id = "c5b28e0e-bf69-654f-7630-5a054d29cf6e"; // CC2
					}
				if ($CC2_Number2 > $CC1_Number1) {
					$assigned_agent_id = "243e717c-d641-dcb2-6ea9-5a054dda0509"; // CC1
					}
			}
		
		if(($enquiry_type=='Admissions') || ($enquiry_type=='Parent')){
			//$assigned_agent_id = "1";  //CRM Administarator
			$assigned_agent_id = "c5b28e0e-bf69-654f-7630-5a054d29cf6e";  //CRM Administarator
			}
			
		$zone=$GLOBALS['app_list_strings']['scrm_leads_Zone_State_list'][$primary_address_state];
		
		if(($primary_address_country != 'India')&&(!empty($primary_address_country))){
			
			if($product_interested=="BHIS"){
				$zone='BHIS I';
			}elseif($product_interested=="KKEL"){
				$zone='KK I';
				}
			}

        if(!(empty($last_name))){
			
            $name_array = explode(" ", $last_name);
            $first_name = $name_array[0];
            $last_name   = $name_array[1];
            if(empty($last_name)){
                $last_name = $first_name;
                $first_name = '';
            }
          
        }
         $name_value_list = array(
                array('name' => 'first_name','value' => $first_name),
                array('name' => 'last_name','value' => $last_name),
                array('name' => 'email1','value' => $email1),
                array('name' => 'phone_mobile','value' => $phone_mobile),
                //~ array('name' => 'source_c','value' => $source),
                array('name' => 'initial_source_c','value' => $initial_source),
                array('name' => 'source_c','value' => $newsource),
                array('name' => 'sub_source_c','value' => $subsource),
                array('name' => 'lead_source','value' => $lead_source),
                array('name' => 'city_c','value' => $city),
                array('name' => 'centre_c','value' => $centre),
                array('name' => 'enquiry_type_c','value' => $enquiry_type),
                array('name' => 'status','value' => $status),
				array('name' => 'product_interested_c','value' => $product_interested),
				array('name' => 'country_c','value' => $country),
				array('name' => 'phone_code_c','value' => $phone_code),
                array('name' => 'primary_address_street','value' => $primary_address_street),
                array('name' => 'primary_address_city','value' => $primary_address_city),
                array('name' => 'primary_address_state','value' => $primary_address_state),
                array('name' => 'primary_address_country','value' => $primary_address_country),
                array('name' => 'school_c','value' => $school),
                array('name' => 'zone_c','value' => $zone),
                array('name' => 'admission_type_c','value' => $admission_type),
                array('name' => 'description','value' => $message),
                array('name' => 'department','value' => $department),
                array('name' => 'campaign_id','value' => $campaign_id),
                array('name' => 'assigned_user_id','value' => $assigned_agent_id),
              
         );
         
         $id = createrecord($session_id, 'Leads', $name_value_list, $url);
            
            $msg = array(
                'Success' => true,
                'Message' => 'Lead Created Successfully',
                'Lead id' => $id
            );
}
    
} else {
    $msg = array(
        'Success' => false,
        'Message' => 'Oops! Something went wrong'
    );
}
 echo json_encode($msg);
exit;


//function to make cURL request
function call($method, $parameters, $url) {
    
    ob_start();
    $curl_request = curl_init();
    
    curl_setopt($curl_request, CURLOPT_URL, $url);
    curl_setopt($curl_request, CURLOPT_POST, 1);
    curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($curl_request, CURLOPT_HEADER, 1);
    curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_request, CURLOPT_SSL_VERIFYHOST, false);
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
    
    $result   = explode("\r\n\r\n", $result, 2);
    $response = json_decode($result[1]);
    ob_end_flush();
    
    return $response;
}


function createrecord($session_id, $module, $create_entry_parameters, $url) {
    
    $set_entry_parameters = array(
        //session id
        "session" => $session_id,
        
        "module_name" => $module,
        
        //Record attributes
        "name_value_list" => $create_entry_parameters
    );
    
    $set_entry_result = call("set_entry", $set_entry_parameters, $url);
    
    
    $record_id = $set_entry_result->id;
    return $record_id;
    
}


function generateSession($username, $password, $url) {
    
    $login_parameters = array(
        "user_auth" => array(
            "user_name" => $username,
            "password" => md5($password),
            "version" => "1"
        ),
        "application_name" => "Rest",
        "name_value_list" => array()
    );
    
    $login_result = call("login", $login_parameters, $url);
    
    //get session id
    $session_id = $login_result->id;
    return $session_id;
}
?>
