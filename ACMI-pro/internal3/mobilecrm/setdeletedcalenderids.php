<?php

        /** 
          * API file to save deleted calendar ids in the table deleted_calendar_ids.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        $json            = rawurldecode($_REQUEST["jsonParam"]); 
        $jsonData        = json_decode($json);
        
        $jsonData_data   = $jsonData->data;                
        $jsonData_data_count = count($jsonData_data);

        include 'db.php';
    	$prefix = "";
    	$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

        $final_array = array();

    	if(!$connection) {
            $connected = 0;
    	}

	    if( $connection ) {

            mysql_query ("set character_set_results='utf8'");
            $db_selected = mysql_select_db($mysql_database, $connection);
    	    $connected = 1;

            date_default_timezone_set("UTC");
            // $currentDateAndTime = date('Y-m-d H:i:s', time());
            $currentDateAndTime = date("Y-m-d H:i:s");
            $calendar = array();

            $k=0;
            for($k;$k<$jsonData_data_count;$k++) {

                $jsonData_data_array_each = $jsonData_data[$k];

                $assigned_user_id  = $jsonData_data_array_each->assigned_user_id;
                $entity            = $jsonData_data_array_each->entity;
                $calendar_id       = $jsonData_data_array_each->calendar_id;

                $sql1 = "INSERT INTO deleted_calendar_ids (id, assigned_user_id, entity, calendar_id, date_modified, date_entered)
                         VALUES ('', '$assigned_user_id', '$entity', '$calendar_id', '$currentDateAndTime', '$currentDateAndTime')";

                $results1 = mysql_query($sql1, $connection);

                $calendar[$k]['calendar_id'] = $calendar_id;
                $calendar[$k]['entity']      = $entity;
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
