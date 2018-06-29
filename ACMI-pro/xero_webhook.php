<?php
	
	ini_set('display_errors', 'on');
	
	require __DIR__ . '/custom/vendor/autoload.php';
	use XeroPHP\Application\PrivateApplication;
	use XeroPHP\Remote\Request;
	use XeroPHP\Remote\URL;
    	$rawData = file_get_contents("php://input", true);
	    $filename = "log2.txt";
        $fh = fopen($filename, "a");
        fwrite($fh, print_r($rawData, true)); 
        fclose($fh);

				

	// // $GLOBALS['log']->fatal(print_r($rawData,true));
 //    $headers = getallheaders();

 //    //if (isset($headers['x-xero-signature'])) {
	// 	//$hash = base64_encode(hash_hmac('sha256', $rawData, '1RChRoEuCCeJ41lFSGdLXhhl2Zt5NVy1ohhzwMEk5VSUgaSIJ6KD+CixRtS2uF2taoLwJVPJ+1SP6H6cjiiGlA==', true)); 

	// 	$hash = base64_encode(hash_hmac('sha256', $rawData, '1RChRoEuCCeJ41lFSGdLXhhl2Zt5NVy1ohhzwMEk5VSUgaSIJ6KD+CixRtS2uF2taoLwJVPJ+1SP6H6cjiiGlA==', true)); 
		
	// 	 // $GLOBALS['log']->fatal($hash == $headers['x-xero-signature']);
	// 	 // $GLOBALS['log']->fatal($hash);
	// 	 // $GLOBALS['log']->fatal($headers['x-xero-signature']);

	// 	if ($hash == $headers['x-xero-signature']) {
	// 	 	// header("HTTP/1.1 200 OK");

	// 	 	http_response_code(200);
	// 	 	// $GLOBALS['log']->fatal('true re');
	// 	 	// return True;
	// 	 	// return json_encode(["statusCode"=> 200]);
	// 	} 
	// 	else{
	// 		// header("HTTP/1.1 401 OK");
	// 		http_response_code(401);
	// 		// return False;
	// 	}
   
   	include 'db.php';
    	

		$config = [
		    'oauth' => [
		        'callback'        => 'https://simplecrmperformance.com/icc_new/index.php?entryPoint=contactsToXeroDetailView&id=',
		        'consumer_key'    => '91XMJ5BF5JS6SKEJNNVCEQJS33TT9Q',
        		'consumer_secret' => 'HBKM8KF3AP6GXBE4EC81LGUVKH3IV0',           
		        'rsa_private_key'  => '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQDO9Pwe6JbAU521Y/NAvgyf3M0UUgIINAby5TFX0bjXH95jlaV3
ZHQvn/xrYHbzVvVbhvOW0a1kVd5otCnBfNJm7MjIPdSlhOz6acw7yXwowT47SItQ
frKWE8fzfvBw/lV91QIBQ6kalx6D/5Jgz9vDzdN+Zz3a/Wddj4E8jH0l1QIDAQAB
AoGBAKjV0a0BgKKMVHe7f6JMqQ3t2tx9/qxkjVqwwa1sKYhOtmW1mpSpPePwd8O9
oazpPycZFDXw/qyBJP10JTB1PUtDsS1KPFCcszg2JNcFPnYOZLM5LLKkqnILu7cR
JgljGToxYa2EfBl6Uf/+EHcnW1qixlAdNemNTb4zIwWnO+vtAkEA+Ft8HNT9Evh3
/FaV/Ls+QXP92pz+4VwwMt3KNul4qj4MeaABvLQaehCed/QpHS0z0ax+PqkN3nP5
0UtG4AlxMwJBANVTWuh0+osOOPEP+r3hEm2yVtYKaq3RZyMS+MwCEu5TUU1OYafE
ePDxe2d8trDf0sFpRQFXjVAF/AgYmrYcnNcCQAbFn9W9bQUmZ0cnKUHR7TmlqwdZ
/o0wkVPhvlDO/u5NcNOkLEfz9UDc0SVeL/zOrboK5QpaW7l0Ghy927niKAcCQEJG
oGLCHSjgpU43obYmW/xawOHE4LnZ6goaldOD/W+v0P2MkYh24QAydh2DwJqZHzhZ
xUeSdOPcyB2Xz1Eu+IcCQFNo0CSbjQI4koIJt3Nqq8CaD0IXv0JMp94E+VvsdFEs
mYUzUFYz8+XiATOfjQyY9AAi4OETb545Psd3jqAS0FY=
-----END RSA PRIVATE KEY-----',
		        'private_key_bits' => 1024,
		    ],
		    'curl' => [
		        CURLOPT_USERAGENT   => 'Testing',
		        // CURLOPT_SSL_VERIFYPEER => FALSE,
		        // CURLOPT_CAINFO => 'WWW.SIMPLECRMPERFORMANCE.COM.crt',
		    ],
		];

		
		$postData = json_decode($rawData);
		$xero = new PrivateApplication($config);
	    $filename = "log2.txt";
        $fh = fopen($filename, "a");
        fwrite($fh, print_r(error_get_last(), true)); 
        fclose($fh);	


        if ($postData->events[0]->eventCategory=='INVOICE') {

        		$invoice = $xero->loadByGUID('Accounting\\Invoice', $postData->events[0]->resourceId);
	    
			    // $filename = "log2.txt";
		     //    $fh = fopen($filename, "a");
		     //    fwrite($fh, print_r($contact->Addresses, true));	 
		     //    fclose($fh);						
				
			    $filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, print_r(error_get_last(), true)); 
		        fclose($fh);					

		        $filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, print_r($postData->events[0]->eventCategory));	 
		        fclose($fh);	
				
		        $update_query="UPDATE cscrm_invoices as cs INNER JOIN cscrm_invoices_cstm as cst on cst.id_c=cs.id
		        						SET
										cs.date_modified='".$invoice['UpdatedDateUTC']."',
										cs.sub_total='".$invoice['SubTotal']."',
										cs.amount='".$invoice['AmountDue']."'	
								 WHERE cst.xero_invoice_id_c = '{$postData->events[0]->resourceId}'";	
				
				$filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, $update_query);	 
		        fclose($fh);	

				


		    	mysqli_query ("set character_set_results='utf8'");		
		    	$connection  = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);

		    	mysqli_query($connection,$update_query);

		    	mysqli_close($connection);	
        }else{


        		$contact = $xero->loadByGUID('Accounting\\Contact', $postData->events[0]->resourceId);
	    
			    $filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, print_r($contact->Addresses, true));	 
		        fclose($fh);						
				
			    $filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, print_r(error_get_last(), true)); 
		        fclose($fh);					

		        $filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, print_r($postData->events[0]->eventCategory));	 
		        fclose($fh);	
				

				$update_q="UPDATE contacts INNER JOIN contacts_cstm ON contacts_cstm.id_c = contacts.id 
									SET 
										contacts_cstm.full_name_c='".$contact['Name']."',
										contacts.first_name = '".$contact['FirstName']."',
										contacts.last_name = '".$contact['LastName']."',
										contacts.phone_home='".$contact['Phones'][0]['PhoneNumber']."',
										contacts.phone_other='".$contact['Phones'][1]['PhoneNumber']."',
										contacts.phone_fax='".$contact['Phones'][2]['PhoneNumber']."',
										contacts.phone_mobile='".$contact['Phones'][3]['PhoneNumber']."',
										contacts.primary_address_street='".$contact['Addresses'][1]['AddressLine1']."',
										contacts.primary_address_city='".$contact['Addresses'][1]['City']."',
										contacts.primary_address_state='".$contact['Addresses'][1]['Region']."',
										contacts.primary_address_postalcode='".$contact['Addresses'][1]['PostalCode']."',
										contacts.primary_address_country='".$contact['Addresses'][1]['Country']."',
										contacts.alt_address_street='".$contact['Addresses'][0]['AddressLine1']."',
										contacts.alt_address_city='".$contact['Addresses'][0]['City']."',
										contacts.alt_address_state='".$contact['Addresses'][0]['Region']."',
										contacts.alt_address_postalcode='".$contact['Addresses'][0]['PostalCode']."',
										contacts.alt_address_country='".$contact['Addresses'][0]['Country']."'
								 WHERE contacts_cstm.xero_id_c = '{$postData->events[0]->resourceId}'";

								 // contacts.phone_fax='000000000',
										

				$filename = "log2.txt";
		        $fh = fopen($filename, "a");
		        fwrite($fh, $update_q);	 
		        fclose($fh);	

				


		    	mysqli_query ("set character_set_results='utf8'");		
		    	$connection  = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);

		    	mysqli_query($connection,$update_q);

		    	mysqli_close($connection);

        }
		

    	
  }


?>