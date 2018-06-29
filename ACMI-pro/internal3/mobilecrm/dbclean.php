<?php
    //include '../db_home.php';
    include 'db.php';
	$prefix = "";
	$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

	if($connection){
        mysql_query ("set character_set_results='utf8'"); 
        $db_selected = mysql_select_db($mysql_database, $connection);

        mysql_close($connection);
	}

        // return to parent file
        // return;
        // return true;

?>
