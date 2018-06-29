<?php

    /** 
    * Configuration File for Mobile CRM changes plugin, set default values for mobile fields.
    * Date        : Mar-17-2017
    * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
    * PHP version : 5.6
    */
    include 'db.php';
    $prefix = "";
    $connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

    $modules =  array('0' =>'accounts','1' =>'leads','2' =>'contacts','3' =>'opportunities','4' =>'calls','5'=>'meetings','6'=>'tasks','7'=>'notes' );
    $cstmSuffix = '_cstm';

    if(!$connection){
        die("Unable to connect mysql");            
    }

    if( $connection ){

        mysql_query ("set character_set_results='utf8'");
        $db_selected = mysql_select_db($mysql_database, $connection);
        $dateTime = date('Y-m-d H:i:s');

        $sql1200 = "UPDATE users_cstm SET record_source_c = 'crm' WHERE record_source_c IS NULL";
        mysql_query($sql1200, $connection);
        $sql1201 = "UPDATE users_cstm SET record_source_c = 'crm' WHERE record_source_c =''";
        mysql_query($sql1201, $connection);

        foreach($modules as $key => $val){

            $customTable = $val.$cstmSuffix;
                             
            $sql = "SELECT date_modified,id,date_modified_mobile_c FROM $val, $customTable WHERE id= id_c AND date_modified_mobile_c IS NULL AND deleted = 0";

            $results = mysql_query($sql, $connection);                       

            $k = 0;
            $arr = array();
            while ($row = mysql_fetch_array($results)) {

                $arr[$k]['date_modified'] = $row['date_modified'];
                $arr[$k]['id'] = $row['id'];
                $date_modified = $row['date_modified'];
                $id = $row['id'];
                $sql2 = "update $customTable set date_modified_mobile_c = '$date_modified' WHERE id_c = '$id'";
                //check and update  date_modified_mobile_c with date_modified in main table

                mysql_query($sql2, $connection);


                $sql3 = "UPDATE $customTable SET date_modified_mobile_c = '$dateTime' WHERE date_modified_mobile_c IS NULL";  
                //update null values in date_modified_mobile_c in custom table
                mysql_query($sql3, $connection);                              

                $k++;
            }

            /** Update record source and record updated place in custom tables */
            
            $sql4 = "UPDATE $customTable SET record_source_c = 'crm' WHERE record_source_c IS NULL";
            //update null values in record_source_c in custom table
            mysql_query($sql4, $connection);


            $sql5 = "UPDATE $customTable SET record_source_c = 'crm' WHERE record_source_c =''";
            //update empty values in record_source_c in custom table
            mysql_query($sql5, $connection);


            $sql6 = "UPDATE $customTable SET record_updated_place_c = 'crm' WHERE record_updated_place_c IS NULL";
            //update null values in record_updated_place_c in custom table
            mysql_query($sql6, $connection);


            $sql7 = "UPDATE $customTable SET record_updated_place_c = 'crm' WHERE record_updated_place_c =''";
            //update empty values in record_updated_place_c in custom table
            mysql_query($sql7, $connection);
        

            if ( $val=='accounts' || $val=='contacts' || $val=='opportunities' || $val=='leads' ) {

                $sql8 = "UPDATE $customTable SET mobile_id_c = '0' WHERE mobile_id_c IS NULL";
                mysql_query($sql8, $connection);

                $sql9 = "UPDATE $customTable SET mobile_id_c = '0' WHERE mobile_id_c = ''";
                mysql_query($sql9, $connection);

                $sql10 = "UPDATE $customTable SET mobile_notification_status_c = '1' WHERE mobile_notification_status_c IS NULL";
                mysql_query($sql10, $connection);

                $sql11 = "UPDATE $customTable SET mobile_notification_status_c = '1' WHERE mobile_notification_status_c = ''";
                mysql_query($sql11, $connection);
            }

            if ($val=='calls' || $val=='meetings' || $val=='tasks') {

                $sql12 = "UPDATE $customTable SET mobile_id_c = '0' WHERE mobile_id_c IS NULL";
                mysql_query($sql12, $connection);

                $sql13 = "UPDATE $customTable SET mobile_id_c = '0' WHERE mobile_id_c = ''";
                mysql_query($sql13, $connection);

                $sql14 = "UPDATE $customTable SET calender_id_c = '0' WHERE calender_id_c IS NULL";
                mysql_query($sql14, $connection);

                $sql15 = "UPDATE $customTable SET calender_id_c = '0' WHERE calender_id_c = ''";
                mysql_query($sql15, $connection);

            }

            if ($val=='meetings') {

                $sql16 = "UPDATE $customTable SET duration_c = '0' WHERE duration_c IS NULL";
                mysql_query($sql16, $connection);

                $sql17 = "UPDATE $customTable SET duration_c = '0' WHERE duration_c = ''";
                mysql_query($sql17, $connection);
            }        

            if ($val=='tasks') {

                $sql16 = "UPDATE $customTable SET task_notification_status_c = '0' WHERE task_notification_status_c IS NULL";
                mysql_query($sql16, $connection);

                $sql17 = "UPDATE $customTable SET task_notification_status_c = '0' WHERE task_notification_status_c = ''";
                mysql_query($sql17, $connection);

                $sql18 = "UPDATE $customTable SET reminder_c = '60' WHERE reminder_c IS NULL";
                mysql_query($sql18, $connection);

                $sql19 = "UPDATE $customTable SET reminder_c = '60' WHERE reminder_c = ''";
                mysql_query($sql19, $connection);

            }  
            
            if ($val=='notes') {

                $sql16 = "UPDATE $customTable SET mobile_id_c = '0' WHERE mobile_id_c IS NULL";
                mysql_query($sql16, $connection);

                $sql17 = "UPDATE $customTable SET mobile_id_c = '0' WHERE mobile_id_c = ''";
                mysql_query($sql17, $connection);

                $sql22 = "UPDATE $customTable SET notes_type_c = 'direct' WHERE notes_type_c IS NULL";
                mysql_query($sql22, $connection);

                $sql23 = "UPDATE $customTable SET notes_type_c = 'direct' WHERE notes_type_c = ''";
                mysql_query($sql23, $connection);

            } 

            if ($val=='leads') {

                $sql20 = "UPDATE $customTable SET lead_customer_type_c = 'Individual' WHERE lead_customer_type_c IS NULL";
                mysql_query($sql20, $connection);

                $sql21 = "UPDATE $customTable SET lead_customer_type_c = 'Individual' WHERE lead_customer_type_c = ''";
                mysql_query($sql21, $connection);
            } 


            if ( $val=='contacts' || $val=='leads' ) {

                $sql8 = "UPDATE $customTable SET latitude_c = '0.00000000' WHERE latitude_c IS NULL";
                mysql_query($sql8, $connection);

                $sql9 = "UPDATE $customTable SET latitude_c = '0.00000000' WHERE latitude_c = ''";
                mysql_query($sql9, $connection);

                $sql10 = "UPDATE $customTable SET longitude_c = '0.00000000' WHERE longitude_c IS NULL";
                mysql_query($sql10, $connection);

                $sql11 = "UPDATE $customTable SET longitude_c = '0.00000000' WHERE longitude_c = ''";
                mysql_query($sql11, $connection);
            }

        }

        echo "success";
        mysql_close($connection);
        exit;
      
    }

?>
