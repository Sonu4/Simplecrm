<?php

/** 
* Connect to database.
* Date    : April-20-2017
* Author  : Nitheesh.R <nitheesh@simplecrm.com.sg> 
*/

if(!defined('sugarEntry'))
define('sugarEntry', true);
// ini_set('display_errors', 'On');
//global $sugar_config;
include '../config.php';
include '../config_override.php';

require_once '../custom/include/encryption/EnvCrypt.php';
require_once '../custom/blowfish/Blowfish.php';

$mysql_hostname     = $sugar_config['dbconfig']['db_host_name'];
$mysql_user         = $sugar_config['dbconfig']['db_user_name'];
$mysql_database     = $sugar_config['dbconfig']['db_name'];
$mysql_password     = $sugar_config['dbconfig']['db_password'];

$db_host_instance       = $sugar_config['dbconfig']['db_host_instance'];
$db_type                = $sugar_config['dbconfig']['db_type'];
$db_port                = $sugar_config['dbconfig']['db_port'];
$db_manager             = $sugar_config['dbconfig']['db_manager'];

$key = Blowfish::getKey();
$mysql_password = EnvCrypt::decrypt($mysql_password,$key); 

?>
