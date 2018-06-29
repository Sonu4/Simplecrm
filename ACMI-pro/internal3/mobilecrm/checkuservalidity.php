<?php

        /** 
          * API file to check user status/ validity in crm.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        $assigned_user_id    = urldecode($_REQUEST["assigned_user_id"]);
        $assigned_user_name  = urldecode($_REQUEST["assigned_user_name"]);

        include 'db.php';
        $prefix = "";
        $connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

        $valid_user = "yes";

        if(!$connection){
            $connected = 0;
        }

	    if($connection){

            mysql_query ("set character_set_results='utf8'");
            $db_selected = mysql_select_db($mysql_database, $connection);
    	    $connected = 1;

            $sql = "SELECT status FROM users WHERE user_name = '$assigned_user_name' AND id = '$assigned_user_id'";

            $res = array();
            $j=0;
            $results = mysql_query($sql, $connection);
            
            if ($results) {
                $row     = mysql_fetch_array($results);
                $user_status = $row['status'];
            }

            if ($user_status == 'Active') {
                $valid_user = "yes";
            }

            if ($user_status == 'Inactive') {
                $valid_user = "no";
            }

            mysql_close($connection);
        }

        $final_array = array();
        $final_array['user_validity'] = $valid_user;
  
        $outputArr = array();
        $outputArr['Android'] = $final_array;
        print_r(json_encode($outputArr));
?>
