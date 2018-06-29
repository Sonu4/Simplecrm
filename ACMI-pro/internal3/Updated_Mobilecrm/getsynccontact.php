    <?php

   
    /** 
      * API file to fetch updated/ created contacts.
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
          * $sql2       : Query to fetch updated / created Contact from group.
          * Date        : Jun-28-2018
          * Author      : Shubham 
          * PHP version : 5.6
        */   
    //Based on assingned_user
    $sql2 = "SELECT co.id  AS id,
    co.first_name  AS first_name, 
    co.last_name  AS last_name,
    co.created_by  AS created_by,
    co.description  AS description,
    co.assigned_user_id  AS assigned_user_id,
    u.user_name  AS user_name, CONCAT(u.first_name,' ',
    u.last_name) AS assigned_user_name, co.title  AS title,
    co.phone_work  AS phone_work ,co.phone_mobile  AS phone_mobile,
    co.primary_address_street  AS primary_address_street,
    co.primary_address_city  AS primary_address_city,
    co.primary_address_state  AS primary_address_state,
    co.primary_address_postalcode  AS primary_address_postalcode,
    co.primary_address_country  AS primary_address_country,
    co.alt_address_street  AS alt_address_street,
    co.alt_address_city  AS alt_address_city,
    co.alt_address_state  AS alt_address_state,
    co.alt_address_postalcode  AS alt_address_postalcode,
    co.alt_address_country  AS alt_address_country,

    coc.date_modified_mobile_c as date_modified_mobile_c,
    coc.mobile_id_c  AS mobile_id_c,

    co.date_entered as date_entered,
    co.date_modified as date_modified,
    coc.latitude_c  AS latitude,
    coc.longitude_c  AS longitude,
    coc.contact_profile_picture_c  AS contactProfilePicture,
    coc.contact_attachments_c  AS contactAttachments,
    coc.contact_documents_c  AS contactDocumentLinks,
    coc.contact_audio_links_c  AS contactAudioRecordLinks,
    coc.mobile_notification_status_c  AS mobile_notification_status_c,
    seu.securitygroup_id  AS securitygroup_id,
    sg.name  AS securitygroup_name,
    seu.user_id  AS securitygroup_user_id,
    u.user_name  AS security_group_user_name
    
    FROM contacts AS co
    LEFT JOIN contacts_cstm AS coc ON co.id = coc.id_c
    LEFT JOIN users AS u ON co.assigned_user_id = u.id
    LEFT JOIN securitygroups_users AS seu ON co.assigned_user_id=seu.user_id
    INNER JOIN securitygroups AS sg ON sg.id=seu.securitygroup_id

    WHERE seu.securitygroup_id in (SELECT securitygroup_id FROM securitygroups_users WHERE user_id='".$assigned_user_id."') AND coc.deleted_from_mobileapp_c = '0' AND co.deleted = '0' AND co.date_modified >='".$date_modified_sugar_format_sync."' order by co.date_modified DESC";

    $res2 = array();
    $j=0;
    $results2 = mysql_query($sql2, $connection);
    while ($row2 = mysql_fetch_array($results2)) {

        $res2[$j]['id']                           = $row2['id'];

         //get email id
        $email_address_id = '';
        $email_address = '';
        $rec_id = $row2['id'];

        $get_email_id = "SELECT email_address_id FROM email_addr_bean_rel
        WHERE bean_module = 'Contacts' AND bean_id = '$rec_id' AND deleted = 0";
        $get_email_id_res = mysql_query($get_email_id, $connection);

        if($get_email_id_res_row = mysql_fetch_array($get_email_id_res)){
            $email_address_id = $get_email_id_res_row['email_address_id'];
        }

        $get_email = "SELECT email_address FROM email_addresses WHERE id = '$email_address_id' AND deleted = 0";
        $get_email_res = mysql_query($get_email, $connection);
        if($get_email_res_row = mysql_fetch_array($get_email_res)){
            $email_address = $get_email_res_row['email_address'];
        }
        $res2[$j]['email_address']                = $email_address;

        $res2[$j]['first_name']                   = $row2['first_name'];
        $res2[$j]['last_name']                    = $row2['last_name'];
        $res2[$j]['assigned_user_id']             = $row2['assigned_user_id'];
        $res2[$j]['assigned_user_name']           = $row2['assigned_user_name'];
        $res2[$j]['description']                  = $row2['description'];
        $res2[$j]['date_entered']                 = $row2['date_entered'];
        $res2[$j]['date_modified']                = $row2['date_modified'];
        $res2[$j]['title']                        = $row2['title'];
        $res2[$j]['phone_work']                   = $row2['phone_work'];
        $res2[$j]['phone_mobile']                 = $row2['phone_mobile'];
        $res2[$j]['primary_address_street']       = $row2['primary_address_street'];
        $res2[$j]['primary_address_city']         = $row2['primary_address_city'];
        $res2[$j]['primary_address_state']        = $row2['primary_address_state'];
        $res2[$j]['primary_address_postalcode']   = $row2['primary_address_postalcode'];
        $res2[$j]['primary_address_country']      = $row2['primary_address_country'];
        $res2[$j]['alt_address_street']           = $row2['alt_address_street'];
        $res2[$j]['alt_address_city']             = $row2['alt_address_city'];
        $res2[$j]['alt_address_state']            = $row2['alt_address_state'];
        $res2[$j]['alt_address_postalcode']       = $row2['alt_address_postalcode'];
        $res2[$j]['alt_address_country']          = $row2['alt_address_country'];

        //get account id, name
        $account_id = '';
        $account_name = '';
        $rec_id = $row2['id'];

        $get_acc_id = "SELECT account_id FROM accounts_contacts WHERE contact_id = '$rec_id' AND deleted = 0";
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

        $res2[$j]['latitude']                     = $row2['latitude'];
        $res2[$j]['longitude']                    = $row2['longitude'];
        $res2[$j]['contactProfilePicture']        = $row2['contactProfilePicture'];
        $res2[$j]['contactAttachments']           = $row2['contactAttachments'];
        $res2[$j]['contactDocumentLinks']         = $row2['contactDocumentLinks'];
        $res2[$j]['contactAudioRecordLinks']      = $row2['contactAudioRecordLinks'];
        $res2[$j]['mobile_id_c']                  = $row2['mobile_id_c'];
        $res2[$j]['date_modified_mobile_c']       = $row2['date_modified_mobile_c'];
        $res2[$j]['mobile_notification_status_c'] = $row2['mobile_notification_status_c'];
        $res2[$j]['securitygroup_id']             = $row2['securitygroup_id'];
        $res2[$j]['securitygroup_name']           = $row2['securitygroup_name'];

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

    mysql_close($connection);
}



$final_array = array();
$final_array['contacts'] = $res2;

if ($connected == 0) {
    $outputArrr = array();
    $outputArrr['Android'] = "failed to connect to db";
    //echo ( json_encode($outputArrr));
    print_r(json_encode($outputArrr));

} if($connected == 1) {
    $outputArr = array();
    $outputArr['Android'] = $final_array;
    //echo ( json_encode($outputArr));
    print_r(json_encode($outputArr));
}

?>
