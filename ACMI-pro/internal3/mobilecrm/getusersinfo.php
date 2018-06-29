<?php

                /** 
                  * API file to fetch users information from crm.
                  * Date        : Mar-17-2017
                  * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
                  * PHP version : 5.6
                */
                $usersimplecrmId        = urldecode($_REQUEST["usersimplecrmId"]);    
                   
                include 'db.php';
                $prefix = "";
            	$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);
            	
            	if(!$connection){
            	 $connected = 0;
            	}

                if($connection){
                    mysql_query ("set character_set_results='utf8'"); 
                    $db_selected = mysql_select_db($mysql_database, $connection);
                    //mysql_select_db('rf_dev_crm');
                    $connected = 1;

                    $sql3 = "SELECT IFNULL(id,'') AS id, IFNULL(first_name,'') AS first_name, 
                    IFNULL(last_name,'') AS last_name, IFNULL(user_name,'') AS user_name,
                    is_admin AS is_admin 
                    FROM users  
                    WHERE deleted = 0 AND status = 'Active' AND id = '$usersimplecrmId' ";

                            $res3 = array();
                            $l=0; $n = 0;
                            $results3 = mysql_query($sql3, $connection);
                            while ($row3 = mysql_fetch_array($results3)) {
                            $res3[$l]['id']             = $row3['id'];
                            $res3[$l]['first_name']     = $row3['first_name'];
                            $res3[$l]['last_name']      = $row3['last_name'];
                            $res3[$l]['user_name']      = $row3['user_name'];
                            $res3[$l]['is_admin']       = $row3['is_admin'];

                            $l++;

                            }

                    mysql_close($connection);
                }

                $final_array = array();
                $final_array['users'] = $res3;

                if ($connected == 0) {   
                    $outputArrr = array();
                    $outputArrr['Android'] = "failed to connect to db";   
                    print_r(json_encode($outputArrr));

                } if($connected == 1) {
                    $outputArr = array();
                    $outputArr['Android'] = $final_array;   
                    print_r(json_encode($outputArr)); 
        	  }

?>
