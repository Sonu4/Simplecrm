<?php

        $assigned_user_id    = urldecode($_REQUEST["assigned_user_id"]);
        $assigned_user_name  = urldecode($_REQUEST["assigned_user_name"]);

        include 'db.php';
        include('dbclean.php');
        $prefix = "";
        $connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

        $paid = "yes";

	    if($connection){

            mysql_query ("set character_set_results='utf8'");
            $db_selected = mysql_select_db($mysql_database, $connection);
    	    $connected = 1;

                $sql = "SELECT sync_paid_customer_c FROM users_cstm WHERE id_c = '$assigned_user_id'";

                $res = array();
                $j=0;
                $results = mysql_query($sql, $connection);
                
                if ($results) {
                    $row     = mysql_fetch_array($results);
                    $paid_status = $row['sync_paid_customer_c'];
                }

                if ($paid_status == '1') {
                    $paid = "yes";
                }

                if ($paid_status == '0') {
                    $paid = "no";
                }

            mysql_close($connection);
        }

            $final_array = array();
            $final_array['payment_status'] = $paid;
      
            $outputArr = array();
            $outputArr['android'] = $final_array;
            print_r(json_encode($outputArr));         

?>
