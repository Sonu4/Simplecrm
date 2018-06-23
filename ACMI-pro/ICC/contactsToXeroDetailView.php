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
        'consumer_key'    => 'BUGIQTYKQSESCXXGRBZGH8G6FESVGW',
        'consumer_secret' => 'YAJ4TDFUC3KNLYIHJZWQEV8LKTQPSF',      
        'rsa_private_key'  => 'file://privatekey.pem',
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

function getAccess($xero, $config)
{
    $url = new URL($xero, URL::OAUTH_REQUEST_TOKEN);
    $request = new Request($xero, $url);
    //Here's where you'll see if your keys are valid.
    //You can catch a BadRequestException.
    try {
        $request->send();
    } catch (Exception $e) {
        print_r($e);exit();
        if ($request->getResponse()) {
            print_r($request->getResponse()->getOAuthResponse());
        }
    }
    $oauth_response = $request->getResponse()->getOAuthResponse();
    setOAuthSession(
        $oauth_response['oauth_token'],
        $oauth_response['oauth_token_secret']
    );

    printf(
        '<a href="%s">Click here to Authorize</a>',
        $xero->getAuthorizeURL($oauth_response['oauth_token'])
    );
    exit;
}

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
