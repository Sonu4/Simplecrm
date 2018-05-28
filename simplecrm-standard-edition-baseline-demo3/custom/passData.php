<?php

 if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


ini_set("display_errors","On");
require_once('config.php');
require_once('data/SugarBean.php');  

// require_once('/include/SugarQuery/SugarQuery.php');

//ini_set("Error","On");

// $your_url = $GLOBALS['sugar_config']['site_url'];
//           echo $your_url;

 

global $db;

$id=$_POST['id'];

$bean = new SugarBean();
$sql ="select shubh_bookstore.id, shubh_bookstore.name, shubh_bookstore.bookstore, shubh_bookstore.bookauther, shubh_bookstore.date_entered,shubh_bookstore_cstm.publishing_date_c, shubh_bookstore_cstm.countrys_c, shubh_bookstore_cstm.states_c, shubh_bookstore_cstm.cities_c from shubh_bookstore inner join shubh_bookstore_cstm on shubh_bookstore.id = shubh_bookstore_cstm.id_c where shubh_bookstore.deleted =0 && shubh_bookstore.id ='$id'";

$result =$bean->db->query($sql, true);

while ($row=$db->fetchByAssoc($result)) {

	$final['result'][]=$row;
}

echo json_encode($final);
?>







