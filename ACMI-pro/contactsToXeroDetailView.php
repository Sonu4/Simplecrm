<?php
// error_reporting(E_ALL);
ini_set('display_errors', 'on');

require __DIR__ . '/vendor/autoload.php';
use XeroPHP\Application\PrivateApplication;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;
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

        'callback'        => 'https://simplecrmperformance.com/icc_new/index.php?entryPoint=contactsToXeroDetailView&id='.$_REQUEST['id'],
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

$contactBean = BeanFactory::getBean ('Contacts', $_REQUEST['id']);

if ($_REQUEST['action'] == 'create') {
    $contact = new \XeroPHP\Models\Accounting\Contact($xero);

    action_contact($contact, $contactBean);
    
    $contactBean->xero_url_c = 'https://go.xero.com/Contacts/View/'.$contact->ContactID;
    $contactBean->xero_id_c = $contact->ContactID;
   // print_r($contact->ContactID);
   // exit;
    $contactBean->save();

}else{
    $contact = $xero->loadByGUID('Accounting\\Contact', $contactBean->xero_id_c);

    action_contact($contact, $contactBean);
}


 // print_r($contact);exit;

SugarApplication::redirect('index.php?module=Contacts&action=DetailView&record='.$_REQUEST['id']);
//The following two functions are just for a demo
//you should use a more robust mechanism of storing tokens than this!
function setOAuthSession($token, $secret, $expires = null)
{
    // expires sends back an int
    if ($expires !== null) {
        $expires = time() + intval($expires);
    }
    $_SESSION['oauth'] = [
        'token' => $token,
        'token_secret' => $secret,
        'expires' => $expires
    ];
}

function getOAuthSession()
{
    //If it doesn't exist or is expired, return null
    if (!isset($_SESSION['oauth'])
        || ($_SESSION['oauth']['expires'] !== null
        && $_SESSION['oauth']['expires'] <= time())
    ) {
        return null;
    }
    return $_SESSION['oauth'];
}

// function getAccess($xero, $config)
// {
//     $url = new URL($xero, URL::OAUTH_REQUEST_TOKEN);
//     $request = new Request($xero, $url);
//     //Here's where you'll see if your keys are valid.
//     //You can catch a BadRequestException.
//     try {
//         $request->send();
//     } catch (Exception $e) {
//         print_r($e);exit();
//         if ($request->getResponse()) {
//             print_r($request->getResponse()->getOAuthResponse());
//         }
//     }
//     $oauth_response = $request->getResponse()->getOAuthResponse();
//     setOAuthSession(484570c2-2d04-4ca4-94bb-25c729cf67d8,
//         $oauth_response['oauth_token'],
//         $oauth_response['oauth_token_secret']
//     );

//     printf(
//         '<a href="%s">Click here to Authorize</a>',
//         $xero->getAuthorizeURL($oauth_response['oauth_token'])
//     );
//     exit;
// }

function action_contact($contact, $contactBean)
{
    $address = new \XeroPHP\Models\Accounting\Address;
    $address->setAddressType('POBOX');
    $address->setAddressLine1($contactBean->primary_address_city.', '.$contactBean->primary_address_state.', '.$contactBean->primary_address_postalcode.', '.$contactBean->primary_address_country);
    $address->setCity($contactBean->primary_address_city);
    $address->setRegion($contactBean->primary_address_state);
    $address->setPostalCode($contactBean->primary_address_postalcode);
    $address->setCountry($contactBean->alt_address_country);

    $phones = new \XeroPHP\Models\Accounting\Phone;
    $phones->setPhoneType('DEFAULT');
    $phones->setPhoneNumber($contactBean->phone_home);

    $contact
        ->setName($contactBean->name)
        ->setFirstName($contactBean->first_name)
        ->setLastName($contactBean->last_name)
        ->setEmailAddress($contactBean->email1)
        ->addAddress($address)
        ->addPhone($phones);
    $contact->save();
}

?>
