<?php
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
$sql ="select shubh_bookstore.id, shubh_bookstore.name, shubh_bookstore.bookstore, shubh_bookstore.bookauther, shubh_bookstore_cstm.publishing_date_c, shubh_bookstore_cstm.countrys_c, shubh_bookstore_cstm.states_c, shubh_bookstore_cstm.cities_c from shubh_bookstore inner join shubh_bookstore_cstm on shubh_bookstore.id = shubh_bookstore_cstm.id_c where shubh_bookstore.deleted =0 && shubh_bookstore.id ='$id'";

$result =$bean->db->query($sql, true);
$row=$db->fetchByAssoc($result);

$final['result']=$row;
echo json_encode($final);


?>




<!-- SELECT shubh_bookstore.id,shubh_bookstore.name,shubh_bookstore.bookstore,shubh_bookstore.bookauther,shubh_bookstore_cstm.publishing_date_c,shubh_bookstore_cstm.countrys_c,shubh_bookstore_cstm.states_c,shubh_bookstore_cstm.cities_c FROM shubh_bookstore INNER JOIN shubh_bookstore_cstm ON shubh_bookstore.id=shubh_bookstore_cstm.id_c WHERE shubh_bookstore.deleted=0 -->


<!-- 
$sqlT="SELECT  `publishing_date_c`, `countrys_c`, `states_c`, `cities_c` FROM `shubh_bookstore_cstm` WHERE id_c='$id'";
$resultT =$bean->db->query($sqlT,true); 
$rowT=$db->fetchByAssoc($resultT);

$final=array();
$final['id']=$row['id'];     // Merging Two array into one i.e in final array
$final['name']=$row['name'];
$final['bookstore']=$row['bookstore'];
$final['bookauther']=$row['bookauther'];
$final['publishing_date_c']=$rowT['publishing_date_c'];
$final['countrys_c']=$rowT['countrys_c'];
$parts = explode("_",$rowT['states_c']);
$final['states_c']= $parts['1'];
$parts = explode("_", $rowT['cities_c']);
$final['cities_c']=$parts[2]; -->


