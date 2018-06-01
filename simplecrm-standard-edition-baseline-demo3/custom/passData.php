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
$sql ="select shubh_bookstore.id, shubh_bookstore.name, shubh_bookstore.bookstore, shubh_bookstore.bookauther, shubh_bookstore.date_entered,shubh_bookstore_cstm.publishing_date_c, shubh_bookstore_cstm.countrys_c, shubh_bookstore_cstm.states_c, shubh_bookstore_cstm.cities_c,accounts.name as ac_name,users.user_name as user_name from shubh_bookstore inner join shubh_bookstore_cstm on shubh_bookstore.id = shubh_bookstore_cstm.id_c inner join accounts on accounts.id=(select shubh_bookstore_accountsaccounts_ida from shubh_bookstore_accounts_c where shubh_bookstore_accountsshubh_bookstore_idb='$id') inner join users on users.user_name =(select user_name from users where id=(select assigned_user_id from shubh_bookstore where id='$id')) where shubh_bookstore.deleted =0 && shubh_bookstore.id ='$id'";

$result =$bean->db->query($sql, true);

while ($row=$db->fetchByAssoc($result)) {

	$final['result'][]=$row;
}

echo json_encode($final);


// $history="select shubh_bookstore.id, shubh_bookstore.name, shubh_bookstore.bookstore, shubh_bookstore.bookauther, shubh_bookstore.date_entered,shubh_bookstore_cstm.publishing_date_c, shubh_bookstore_cstm.countrys_c, shubh_bookstore_cstm.states_c, shubh_bookstore_cstm.cities_c from shubh_bookstore inner join shubh_bookstore_cstm on shubh_bookstore.id = shubh_bookstore_cstm.id_c where shubh_bookstore.deleted =0 && shubh_bookstore.id ='$id'";


// $sql ="select shubh_bookstore.id, shubh_bookstore.name, shubh_bookstore.bookstore, shubh_bookstore.bookauther, shubh_bookstore.date_entered,shubh_bookstore_cstm.publishing_date_c, shubh_bookstore_cstm.countrys_c, shubh_bookstore_cstm.states_c, shubh_bookstore_cstm.cities_c,accounts.name as ac_name from shubh_bookstore inner join shubh_bookstore_cstm on shubh_bookstore.id = shubh_bookstore_cstm.id_c inner join accounts on accounts.id=(select shubh_bookstore_accountsaccounts_ida from shubh_bookstore_accounts_c where shubh_bookstore_accountsshubh_bookstore_idb='$id') where shubh_bookstore.deleted =0 && shubh_bookstore.id ='$id'";


// $sql ="select shubh_bookstore.id, shubh_bookstore.name, shubh_bookstore.bookstore, shubh_bookstore.bookauther, shubh_bookstore.date_entered,shubh_bookstore.assigned_user_id,shubh_bookstore_cstm.publishing_date_c, shubh_bookstore_cstm.countrys_c, shubh_bookstore_cstm.states_c, shubh_bookstore_cstm.cities_c,accounts.name as ac_name from shubh_bookstore inner join shubh_bookstore_cstm on shubh_bookstore.id = shubh_bookstore_cstm.id_c inner join accounts on accounts.id=(select shubh_bookstore_accountsaccounts_ida from shubh_bookstore_accounts_c where shubh_bookstore_accountsshubh_bookstore_idb='$id') where shubh_bookstore.deleted =0 && shubh_bookstore.id ='$id'";
?>







