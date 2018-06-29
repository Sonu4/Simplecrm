<?php
// echo "Hello";exit;

// error_reporting(E_ALL);
ini_set('display_errors', 'on');
if (!defined('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');


//require __DIR__ . '/custom/vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';
use XeroPHP\Application\PrivateApplication;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

date_default_timezone_set("Asia/Kolkata");
// Start a session for the oauth session storage
// session_start();
//These are the minimum settings - for more options, refer to examples/config.php
// echo file_get_contents('/opt/rh/httpd24/root/var/www/html/icc_new/WWW.SIMPLECRMPERFORMANCE.COM.crt');exit();
// openssl_pkey_get_private('/opt/rh/httpd24/root/var/www/html/icc_new/exim.pem');exit();
$config = [
    'oauth' => [
        // 'callback'        => 'https://simplecrmperformance.com/icc_new/index.php?entryPoint=contactsToXeroDetailView&id='.$_REQUEST['id'],
        // 'consumer_key'    => 'ZVQMAVIHGEPK12TJQSMY4EFUH010VI',
        // 'consumer_secret' => 'TJ8NMRZGYK5DMR1LJKOKSSYMRTDSEU',
        // 'callback'        => 'https://simplecrmperformance.com/icc_new/index.php?entryPoint=contactsToXeroDetailView&id='.$_REQUEST['id'],
        // 'consumer_key'    => 'MR5R5YX9S92KGS0VDGRIRSEXI3TCY2',
        // 'consumer_secret' => 'TJ0MBL1XKCKPRC8XSY4Y7SKL3JMF6H',      
        // 'rsa_private_key'  => 'file://privatekey.pem',
        // 'private_key_bits' => 1024,

        'callback'        => 'https://simplecrmperformance.com/icc_new/index.php?entryPoint=invoice&id='.$_REQUEST['id'],
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

$xero = new PrivateApplication($config); 
//$guid='484570c2-2d04-4ca4-94bb-25c729cf67d8';
//$invoice=$xero->loadByGUID('Accounting\\Invoice', $guid);


    $invoiceBean = BeanFactory::getBean ('cscrm_invoices', $_REQUEST['id']);
    // echo "<pre>";
    // print_r($invoiceBean);exit;
    // echo "</pre>";
    if ($_REQUEST['action'] == 'create') {

    $invoice = new \XeroPHP\Models\Accounting\Invoice($xero);
    $contactBean=BeanFactory::getBean('Contacts',$invoiceBean->cscrm_invo4c18ontacts_ida);
	$result=action_invoice($xero, $invoiceBean,$contactBean);
	// echo($result);exit;
	$invoiceBean->xero_invoice_url_c = 'https://go.xero.com/AccountsReceivable/Edit.aspx?id='.$result;
    $invoiceBean->xero_invoice_id_c = $result;
    $invoiceBean->save();
   // print_r($invoiceBean->save());exit;
   }else{

   		 $contact = $xero->loadByGUID('Accounting\\Invoice', $invoiceBean->xero_invoice_id_c);
   		 action_invoice($xero, $invoiceBean,$contactBean);
   }

SugarApplication::redirect('index.php?module=cscrm_invoices&action=DetailView&record='.$_REQUEST['id']);

function action_invoice($invoice, $invoiceBean,$contactBean)
{		
	//echo $invoiceBean->invoicedate;
	//echo date('Y-m-d', strtotime($invoiceBean->invoicedate));
	//exit;

	
	try{
			 $invo_ice = new \XeroPHP\Models\Accounting\Invoice;
		     $ct = new \XeroPHP\Models\Accounting\Contact;
		     $ct->setContactID($contactBean->xero_id_c);
		     $invo_ice->setType('ACCREC');
		     $invo_ice->setContact($ct);
		     //$invoice->setDate(\DateTime::createFromFormat('Y-m-d', $invoiceBean->invoicedate));
			 $invo_ice->setDueDate(\DateTime::createFromFormat('Y-m-d',date('Y-m-d', strtotime($invoiceBean->invoicedate))));
		     $lineItem = new \XeroPHP\Models\Accounting\Invoice\LineItem;
		     $lineItem->setDescription($invoiceBean->description);
		     $lineItem->setUnitAmount($invoiceBean->amount);  
// print_r($invo_ice);exit;
		     $invo_ice->addLineItem($lineItem);
		     $invoice->save($invo_ice);
       //       echo "<pre>";
		     // print_r($invo_ice);exit;
       //       echo "</pre>";
		     return $invo_ice->InvoiceID;
		     
	}catch( Exception $e ){
			 $GLOBALS['log']->fatal('[Xero-createContact]-' . $e->getMessage());
             echo $e->getMessage();
	}

      
}

?>
