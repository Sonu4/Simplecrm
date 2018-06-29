	<?php

        /** 
          * API file to fetch updated/ created accounts.
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
          * Query to fetch updated/ created accounts from group.
          * Date        : Jun-28-2018
          * Author      : Shubham 
          * PHP version : 5.6
     */	
	//Based on assingned_user
	$sql2 = "SELECT ac.id AS id,
    ac.name AS name,
	ac.phone_office AS phone_office,
    ac.created_by AS created_by,
	ac.description AS description,
	ac.assigned_user_id AS assigned_user_id,
	u.user_name AS user_name,
    CONCAT(u.first_name,' ',u.last_name) AS assigned_user_name,
	ac.website  AS website ,
    ac.annual_revenue  AS annual_revenue,
    ac.account_type  AS account_type,
    ac.billing_address_street AS billing_address_street,
    ac.billing_address_city AS billing_address_city,
    ac.billing_address_state AS billing_address_state,
    ac.billing_address_postalcode AS billing_address_postalcode,
    ac.billing_address_country AS billing_address_country,
    ac.shipping_address_street AS shipping_address_street,
    ac.shipping_address_city AS shipping_address_city,
    ac.shipping_address_state AS shipping_address_state,
    ac.shipping_address_postalcode AS shipping_address_postalcode,
    ac.shipping_address_country AS shipping_address_country,
    acc.account_attachments_c AS accountAttachments,
    acc.account_documents_c AS accountDocumentLinks,
    acc.date_modified_mobile_c AS date_modified_mobile_c,
    acc.mobile_id_c AS mobile_id_c,
    acc.mobile_notification_status_c AS mobile_notification_status_c,
	ac.date_entered as date_entered,
	ac.date_modified as date_modified,
    seu.securitygroup_id  AS securitygroup_id,
    sg.name  AS securitygroup_name

	FROM accounts AS ac
	LEFT JOIN accounts_cstm AS acc ON ac.id = acc.id_c
	LEFT JOIN users AS u ON ac.assigned_user_id = u.id
    LEFT JOIN securitygroups_users AS seu ON ac.assigned_user_id=seu.user_id
    INNER JOIN securitygroups AS sg ON sg.id=seu.securitygroup_id

	WHERE seu.securitygroup_id in (SELECT securitygroup_id FROM securitygroups_users WHERE user_id='".$assigned_user_id."') AND acc.deleted_from_mobileapp_c = '0' AND ac.deleted = '0' AND ac.date_modified >=  '".$date_modified_sugar_format_sync."' order by ac.date_modified DESC";
	

				$res2 = array();
				$j=0;
				$results2 = mysql_query($sql2, $connection);
					while ($row2 = mysql_fetch_array($results2)) {

						$res2[$j]['id']  = $row2['id'];

					     //get email id
						$email_address_id = '';
						$email_address = '';
						$rec_id = $row2['id'];

						$get_email_id = "SELECT email_address_id FROM email_addr_bean_rel
						WHERE bean_module = 'Accounts' AND bean_id = '$rec_id' AND deleted = 0";
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

						$res2[$j]['name']                         = $row2['name'];
						$res2[$j]['assigned_user_id']             = $row2['assigned_user_id'];
						$res2[$j]['assigned_user_name']           = $row2['assigned_user_name'];
						$res2[$j]['description']                  = $row2['description'];
						$res2[$j]['date_entered']                 = $row2['date_entered'];
						$res2[$j]['date_modified']                = $row2['date_modified'];
						$res2[$j]['phone_office']                 = $row2['phone_office'];
						$res2[$j]['website']                      = $row2['website'];
						$res2[$j]['mobile_notification_status_c']                      = $row2['mobile_notification_status_c'];
						
						$res2[$j]['annual_revenue']               = $row2['annual_revenue'];
						$res2[$j]['account_type']                 = $row2['account_type'];
						$res2[$j]['billing_address_street']       = $row2['billing_address_street'];
						$res2[$j]['billing_address_city']         = $row2['billing_address_city'];
						$res2[$j]['billing_address_state']        = $row2['billing_address_state'];
						$res2[$j]['billing_address_postalcode']   = $row2['billing_address_postalcode'];
				        $res2[$j]['billing_address_country']      = $row2['billing_address_country'];
				        $res2[$j]['shipping_address_street']      = $row2['shipping_address_street'];
				        $res2[$j]['shipping_address_city']        = $row2['shipping_address_city'];
				        $res2[$j]['shipping_address_state']       = $row2['shipping_address_state'];
				        $res2[$j]['shipping_address_postalcode']  = $row2['shipping_address_postalcode'];
				        $res2[$j]['shipping_address_country']     = $row2['shipping_address_country'];
                        $res2[$j]['accountAttachments']           = $row2['accountAttachments'];
                        $res2[$j]['accountDocumentLinks']         = $row2['accountDocumentLinks'];

                        $res2[$j]['date_modified_mobile_c']       = $row2['date_modified_mobile_c'];

                        $res2[$j]['mobile_id_c']       			  = $row2['mobile_id_c'];
                        $res2[$j]['securitygroup_id']             = $row2['securitygroup_id'];
                        $res2[$j]['securitygroup_name']           = $row2['securitygroup_name'];

                        if(!empty($row2['created_by'])){
                        $created_by = $row2['created_by'];

                        $selectCreatedByQuery = "SELECT CONCAT_WS('', u.first_name, u.last_name) AS created_by FROM users AS u WHERE id = '$created_by' ";

                        $resultsCreatedBy = mysql_query($selectCreatedByQuery, $connection);
                        $rowCreatedBy = mysql_fetch_assoc($resultsCreatedBy);
                    
                    }


                    $res2[$j]['created_by']      	    = $rowCreatedBy['created_by'];
                    $res2[$j]['created_by_id']          = $row2['created_by'];
				      
						$j++;

					}

			mysql_close($connection);
		}

		$final_array = array();
		$final_array['accounts'] = $res2;

		if ($connected == 0) {
			$outputArrr = array();
			$outputArrr['Android'] = "failed to connect to db";
			 //echo ( json_encode($outputArrr));
			print_r( json_encode($outputArrr));

		} if($connected == 1) {
			$outputArr = array();
			$outputArr['Android'] = $final_array;
			 //echo ( json_encode($outputArr));
			print_r( json_encode($outputArr));
		}

?>
