    <?php

        /** 
          * API file to fetch updated/ created opportunities.
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
            $connected = 0;
        }

        if( $connection ){
        mysql_query ("set character_set_results='utf8'");
        $db_selected = mysql_select_db($mysql_database, $connection);
        $connected = 1;
         /** 
          * $sql2       : Query to fetch updated / created Opportunities from group.
          * Date        : Jun-28-2018
          * Author      : Shubham 
          * PHP version : 5.6
        */
        //Based on assingned_user
        $sql2 = "SELECT  op.id AS id, 
        op.name AS name,
        op.amount AS amount, 
        op.description AS description,
        op.created_by AS created_by,
        op.assigned_user_id AS assigned_user_id,
        u.user_name AS user_name,
        CONCAT(u.first_name , ' ',u.last_name) AS assigned_user_name,
        op.sales_stage AS sales_stage,
        op.date_closed AS date_closed,
        op.opportunity_type AS opportunity_type,
        op.next_step AS next_step,
        op.amount AS amount,
        op.currency_id AS currency_id,
        opc.opportunity_attachments_c AS opportunityAttachments,
        opc.opportunity_documents_c AS opportunityDocumentLinks,
        opc.date_modified_mobile_c AS date_modified_mobile_c,
        opc.mobile_id_c AS mobile_id_c,
        opc.mobile_notification_status_c AS mobile_notification_status_c,
        op.date_entered as date_entered,
        op.date_modified as date_modified,
        seu.securitygroup_id  AS securitygroup_id,
        sg.name  AS securitygroup_name

        FROM opportunities AS op
        LEFT JOIN opportunities_cstm AS opc ON op.id = opc.id_c
        LEFT JOIN users AS u ON op.assigned_user_id = u.id
        LEFT JOIN securitygroups_users AS seu ON op.assigned_user_id=seu.user_id
        INNER JOIN securitygroups AS sg ON sg.id=seu.securitygroup_id

    WHERE seu.securitygroup_id in (SELECT securitygroup_id FROM securitygroups_users WHERE user_id='".$assigned_user_id."') AND opc.deleted_from_mobileapp_c = '0' AND op.deleted = '0' AND op.date_modified >=  '$date_modified_sugar_format_sync' order by op.date_modified DESC";

            $currency_name ="";
            $res2 = array();
            $j=0;
            $results2 = mysql_query($sql2, $connection);
            while ($row2 = mysql_fetch_array($results2)) {

                $res2[$j]['id']                           = $row2['id'];
                $res2[$j]['name']                         = $row2['name'];
                $res2[$j]['amount']                       = $row2['amount'];
                $res2[$j]['assigned_user_id']             = $row2['assigned_user_id'];
                $res2[$j]['assigned_user_name']           = $row2['assigned_user_name'];
                $res2[$j]['description']                  = $row2['description'];
                $res2[$j]['date_entered']                 = $row2['date_entered'];
                $res2[$j]['date_modified']                = $row2['date_modified'];
                $res2[$j]['sales_stage']                  = $row2['sales_stage'];
                $res2[$j]['date_closed']                  = $row2['date_closed'];
                $res2[$j]['opportunity_type']             = $row2['opportunity_type'];
                $res2[$j]['next_step']                    = $row2['next_step'];
                $res2[$j]['amount']                       = $row2['amount'];

                //get account id, name
                $account_id = '';
                $account_name = '';
                $rec_id = $row2['id'];

                $get_acc_id = "SELECT account_id FROM accounts_opportunities WHERE opportunity_id = '$rec_id' AND deleted = 0";
                $get_acc_id_res = mysql_query($get_acc_id, $connection);

                if($get_acc_id_res_row = mysql_fetch_array($get_acc_id_res)){
                    $account_id = $get_acc_id_res_row['account_id'];
                }

                $get_name = "SELECT name FROM accounts WHERE id = '$account_id' AND deleted = 0";
                $get_name_res = mysql_query($get_name, $connection);
                if($get_name_res_row = mysql_fetch_array($get_name_res)){
                    $account_name = $get_name_res_row['name'];
                }

                $res2[$j]['account_id']                   = $account_id;
                $res2[$j]['account_name']                 = $account_name;

                /*                
                $res2[$j]['account_id']                   = $row2['account_id'];
                $res2[$j]['account_name']                 = $row2['account_name'];
                */

                $res2[$j]['opportunityAttachments']       = $row2['opportunityAttachments'];
                $res2[$j]['opportunityDocumentLinks']     = $row2['opportunityDocumentLinks'];
                $res2[$j]['date_modified_mobile_c']       = $row2['date_modified_mobile_c'];
                $res2[$j]['mobile_id_c']                  = $row2['mobile_id_c'];
                $res2[$j]['mobile_notification_status_c']                  = $row2['mobile_notification_status_c'];
                $res2[$j]['securitygroup_id']             = $row2['securitygroup_id'];
                $res2[$j]['securitygroup_name']           = $row2['securitygroup_name'];
                
                if ($row2['currency_id'] == '-99') {
                   $currency_name = "US Dollar : $";
                }if ($row2['currency_id'] == 'a96df56d-bb30-a59f-47ea-56e7ff5d9c31') {
                   $currency_name = "Rupee : ₹";
                }if ($row2['currency_id'] == 'e0f20181-2612-661f-c6a9-578346cd8986') {
                   $currency_name = "Singapore : $";
                }if ($row2['currency_id'] == 'adff6731-10fe-9f5b-f3aa-597203577037') {
                   $currency_name = "Pound : £";
                }if ($row2['currency_id'] == 'a7190825-1f9c-820a-55b2-5972022b8971') {
                   $currency_name = "Euro : €";
                }
                
                $res2[$j]['currency_name']   = $currency_name;

                if(!empty($row2['created_by'])){
                        $created_by = $row2['created_by'];

                        $selectCreatedByQuery = "SELECT CONCAT_WS('', u.first_name, u.last_name) AS created_by FROM users AS u WHERE id = '$created_by' ";

                        $resultsCreatedBy = mysql_query($selectCreatedByQuery, $connection);
                        $rowCreatedBy = mysql_fetch_assoc($resultsCreatedBy);
                    
                    }

                    $res2[$j]['created_by']             = $rowCreatedBy['created_by'];
                    $res2[$j]['created_by_id']          = $row2['created_by'];

                $j++;

            }
    }

            mysql_close($connection);

            $final_array = array();
            $final_array['opportunities'] = $res2;

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
