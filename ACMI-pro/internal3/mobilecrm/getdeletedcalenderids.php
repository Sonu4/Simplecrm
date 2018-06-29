<?php


        /** 
          * API file to fetch deleted calendar ids from the table deleted_calendar_ids.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        $assigned_user_id                   = urldecode($_REQUEST["assigned_user_id"]);

        include 'db.php';
    	$prefix = "";
    	$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

        $final_array = array();

    	if(!$connection){
            $connected = 0;
    	}

	    if( $connection ){

            mysql_query ("set character_set_results='utf8'");
            $db_selected = mysql_select_db($mysql_database, $connection);
    	    $connected = 1;

            $sql1 = "SELECT IFNULL( assigned_user_id, '' ) AS assigned_user_id, 
                            IFNULL( entity, '' ) AS entity,
                            IFNULL( calendar_id, '' ) AS calendar_id
                            FROM deleted_calendar_ids WHERE assigned_user_id = '$assigned_user_id'";

            $calendar = array();
            $j=0;
            $results1 = mysql_query($sql1, $connection);
            while ($row1 = mysql_fetch_array($results1)) {

                $calendar[$j]['calendar_id']                  = $row1['calendar_id'];
                $calendar[$j]['entity']                       = $row1['entity'];
                $calendar[$j]['assigned_user_id']             = $row1['assigned_user_id'];

                $j++;
            }
            mysql_close($connection);
	    }
        
        $final_array['calendar']    = $calendar;

        if ($connected == 0) {
            $outputArrr = array();
            $outputArrr['Android'] = "failed to connect to db";
            print_r( json_encode($outputArrr));

        } if($connected == 1) {
            $outputArr = array();
            $outputArr['Android'] = $final_array;
            print_r( json_encode($outputArr));
	    }
?>
