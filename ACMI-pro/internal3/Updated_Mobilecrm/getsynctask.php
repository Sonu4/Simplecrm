<?php

        /** 
          * API file to fetch updated/ created tasks.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        $assigned_user_id                   = urldecode($_REQUEST["assigned_user_id"]);
        $date_modified_sugar_format_sync    = urldecode($_REQUEST["date_modified_sugar_format_sync"]);

        include 'db.php';
        $prefix = "";
        $connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

        if(!$connection){
        $connected = 1;
        }

if( $connection ){

mysql_query ("set character_set_results='utf8'");
$db_selected = mysql_select_db($mysql_database, $connection);
$connected = 2;
        /** 
          * $sql2       : Query to fetch updated / created Tasks from group.
          * Date        : Jun-29-2018
          * Author      : Shubham 
          * PHP version : 5.6
          */
//Based on assingned_user
$sql2 = "SELECT   ta.id AS id, 
         ta.name AS name,
         ta.created_by AS created_by,
         ta.status AS status,
         ta.parent_type AS parent_type,
         ta.parent_id AS parent_id,
         ta.date_start AS date_start,
         ta.date_due AS date_due,
         ta.priority AS priority,
         ta.description AS description,
         ta.contact_id AS contact_id,
         ta.assigned_user_id AS assigned_user_id,
         ta.date_entered as date_entered,
         ta.date_modified as date_modified, 
         tac.date_modified_mobile_c AS date_modified_mobile_c,
         tac.mobile_id_c AS mobile_id_c,
         tac.calender_id_c AS calender_id_c,
         tac.task_notification_status_c AS task_notification_status_c,
         tac.reminder_c AS reminder_c,  tac.record_source_c AS record_source_c,
         tac.mobile_offline_unique_id_c AS mobile_offline_unique_id,
         u.user_name AS user_name, 
         CONCAT(u.first_name,' ',u.last_name ) AS assigned_user_full_name,
         seu.securitygroup_id  AS securitygroup_id,
         sg.name  AS securitygroup_name
FROM tasks AS ta
LEFT JOIN tasks_cstm AS tac ON tac.id_c=ta.id 
LEFT JOIN users AS u ON ta.assigned_user_id = u.id
LEFT JOIN securitygroups_users AS seu ON ta.assigned_user_id=seu.user_id
INNER JOIN securitygroups AS sg ON sg.id=seu.securitygroup_id
WHERE seu.securitygroup_id in (SELECT securitygroup_id FROM securitygroups_users WHERE user_id='".$assigned_user_id."') AND tac.deleted_from_mobileapp_c = '0'  AND ta.deleted = '0' AND ta.date_modified >=  '".$date_modified_sugar_format_sync."' order by ta.date_modified DESC";

        $res2 = array();
        $j=0;
        $results2 = mysql_query($sql2, $connection);
        while ($row2 = mysql_fetch_array($results2)) {

        $res2[$j]['id']                           = $row2['id'];
        $res2[$j]['name']                         = $row2['name'];
        $res2[$j]['date_entered']                 = $row2['date_entered'];
        $res2[$j]['date_modified']                = $row2['date_modified'];
        $res2[$j]['status']                       = $row2['status'];
        $res2[$j]['parent_type']                  = $row2['parent_type'];
        $res2[$j]['parent_id']                    = $row2['parent_id'];
        $res2[$j]['calender_id_c']                = $row2['calender_id_c'];
        $res2[$j]['date_modified_mobile_c']       = $row2['date_modified_mobile_c'];
        $res2[$j]['mobile_id_c']                  = $row2['mobile_id_c'];

        $res2[$j]['task_notification_status_c']   = $row2['task_notification_status_c'];
        $res2[$j]['reminder_c']                   = $row2['reminder_c'];
        $res2[$j]['mobile_offline_unique_id']     = $row2['mobile_offline_unique_id'];
        $res2[$j]['record_source_c']              = $row2['record_source_c'];

        //Get parent_name 
        $parent_name = "";
        $parent_id   = $row2['parent_id'];
        $parent_type = $row2['parent_type'];
        $table_name  = strtolower($parent_type);

        if ($table_name != '') {

            if ($table_name == 'leads' || $table_name == 'contacts') {
                $sql3 = "SELECT IFNULL( tn.first_name, '' ) AS first_name, 
                              IFNULL( tn.last_name, '' ) AS last_name
                              FROM $table_name AS tn
                              WHERE tn.id = '$parent_id' AND tn.deleted = 0";
            }

            else {
                $sql3 = "SELECT IFNULL( tn.name, '' ) AS name
                              FROM $table_name AS tn
                              WHERE tn.id = '$parent_id' AND tn.deleted = 0";
            }

            $get_parent = mysql_query($sql3, $connection);
            $numResults = mysql_num_rows($get_parent);
            if ($numResults > 0) {
            $values = mysql_fetch_assoc($get_parent);
            $name  = $values['name'];
            $fName = $values['first_name'];
            $lName = $values['last_name'];
            }
            mysql_free_result($get_parent);

        }
        if ($name == '') {
            $name =$fName." ".$lName;
        }
        $parent_name = $name;
        $res2[$j]['parent_name']                  = $parent_name;

        $res2[$j]['date_start']                   = $row2['date_start'];
        $res2[$j]['date_due']                     = $row2['date_due'];
        $res2[$j]['priority']                     = $row2['priority'];
        $res2[$j]['description']                  = $row2['description'];
        $res2[$j]['contact_id']                   = $row2['contact_id'];
        $res2[$j]['assigned_user_id']             = $row2['assigned_user_id'];
        $res2[$j]['assigned_user_name']           = $row2['assigned_user_full_name'];
        $res2[$j]['securitygroup_id']             = $row2['securitygroup_id'];
        $res2[$j]['securitygroup_name']           = $row2['securitygroup_name'];

        if(!empty($row2['created_by'])){
                        $created_by = $row2['created_by'];

                        $selectCreatedByQuery = "SELECT CONCAT_WS('', u.first_name, u.last_name) AS created_by FROM users AS u WHERE id = '$created_by' ";

                        $resultsCreatedBy = mysql_query($selectCreatedByQuery, $connection);
                        $rowCreatedBy = mysql_fetch_assoc($resultsCreatedBy);
                    
                    }


                    $res2[$j]['created_by']      = $rowCreatedBy['created_by'];

        $j++;

        }

mysql_close($connection);

}

        $final_array = array();
        $final_array['tasks'] = $res2;

        if ($connected == 1) {
            $outputArrr = array();
            $outputArrr['Android'] = "failed to connect to db";
            print_r( json_encode($outputArrr));

        } if($connected == 2) {
            $outputArr = array();
            $outputArr['Android'] = $final_array;
            print_r( json_encode($outputArr));
        }

?>
