<?php
ini_set("display_errors","On");
require_once('config.php');
// require_once('/include/SugarQuery/SugarQuery.php');

//ini_set("Error","On");

// $your_url = $GLOBALS['sugar_config']['site_url'];
//           echo $your_url;

 
require_once('data/SugarBean.php');    
global $db;
$bean = new SugarBean();
$sql = "SELECT `id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `description`, `deleted`, `assigned_user_id`, `bookstore`, `bookauther`, `publishingdate`, `bookcover` FROM `shubh_bookstore` WHERE id='28d66f24-906b-2d9c-577a-5af921d07492'";
$result =$bean->db->query($sql, true);                
print_r($result);

?>



s
