<?php

/**
 * API file to fetch mobile app version.
 * Date        : Jun-14-2018
 * Author      : Shubham Kothe
 * PHP version : 5.6
 */
$usersimplecrmId = urldecode($_REQUEST["usersimplecrmId"]);

if (!defined('sugarEntry') || !sugarEntry)
    die('Permission denied.');

global $db;

$sql1 = "SELECT version FROM mobileapp_version limit 1";


$j = 0;
$results1 = $db->query($sql1);
$row1 = $db->fetchByAssoc($results1);
$res['version'] = $row1['version'];


$final_array = array();
$final_array['result'] = $res;

$outputArr = array();
$outputArr['Android'] = $final_array;

print_r(json_encode($outputArr));
?>

