<?php
if(!defined('sugarEntry'))
define('sugarEntry', true);

include '../../config.php';
$mysql_hostname = $sugar_config['dbconfig']['db_host_name'];
$mysql_user     = $sugar_config['dbconfig']['db_user_name'];
$mysql_password = $sugar_config['dbconfig']['db_password'];
$mysql_database = $sugar_config['dbconfig']['db_name'];

$db_host_instance       = $sugar_config['dbconfig']['db_host_instance'];
$db_type                = $sugar_config['dbconfig']['db_type'];
$db_port                = $sugar_config['dbconfig']['db_port'];
$db_manager             = $sugar_config['dbconfig']['db_manager'];

$prefix = "";
$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

if( $connection ){
	echo "Connected successfully";
} else{
	echo "Can not connect";
}

mysql_close($connection);

echo "success";

?>
