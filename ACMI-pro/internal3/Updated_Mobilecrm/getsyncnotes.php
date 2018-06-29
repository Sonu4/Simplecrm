	<?php

        /** 
          * API file to fetch updated/ created notes.
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
          * $sql2       : Query to fetch updated / created Notes from group.
          * Date        : Jun-29-2018
          * Author      : Shubham 
          * PHP version : 5.6
        */
	$sql2 = "SELECT ta.assigned_user_id,
  	   ta.id,
  	   ta.date_entered,
  	   ta.date_modified,
  	   ta.modified_user_id,
  	   ta.created_by,
  	   ta.name,
  	   ta.file_mime_type,
  	   ta.filename,
  	   ta.parent_type,
  	   ta.parent_id,
  	   ta.contact_id,
  	   ta.portal_flag,
  	   ta.embed_flag,
  	   ta.description,
  	   ta.deleted,
  	   ta.team_id,
	   u.user_name AS user_name,
       CONCAT(u.first_name , ' ',u.last_name) AS assigned_user_name,
	   seu.securitygroup_id  AS securitygroup_id,
       sg.name  AS securitygroup_name,
       tac.mobile_id_c AS mobile_id_c,
       tac.date_modified_mobile_c as date_modified
FROM notes AS ta
LEFT JOIN notes_cstm AS tac ON tac.id_c=ta.id 
LEFT JOIN users AS u ON ta.assigned_user_id = u.id
LEFT JOIN securitygroups_users AS seu ON ta.assigned_user_id=seu.user_id
INNER JOIN securitygroups AS sg ON sg.id=seu.securitygroup_id
WHERE seu.securitygroup_id in (SELECT securitygroup_id FROM securitygroups_users WHERE user_id='".$assigned_user_id."') AND tac.deleted_from_mobileapp_c = '0' AND tac.notes_type_c = 'direct' AND ta.deleted = '0' AND ta.date_modified >=  '".$date_modified_sugar_format_sync."' order by ta.date_modified DESC";		
				
				$res2 = array();
				$j=0;
				$results2 = mysql_query($sql2,$connection);
				
					while ($row2 = mysql_fetch_array($results2)) {

						$res2[$j]['id']                           = $row2['id'];					    
						$res2[$j]['name']                         = $row2['name'];
						$res2[$j]['assigned_user_id']             = $row2['assigned_user_id'];
						$res2[$j]['assigned_user_name']           = $row2['assigned_user_name'];
						$res2[$j]['description']                  = $row2['description'];
						$res2[$j]['date_entered']                 = $row2['date_entered'];
						$res2[$j]['date_modified']                = $row2['date_modified'];
						$res2[$j]['parent_type']                  = $row2['parent_type'];
						$res2[$j]['parent_id']                    = $row2['parent_id'];
						$res2[$j]['contact_id']                   = $row2['contact_id'];
						$res2[$j]['record_source_c']              = $row2['record_source_c'];
						$res2[$j]['mobile_offline_unique_id_c']   = $row2['mobile_offline_unique_id_c'];
                        $res2[$j]['date_modified_mobile_c']       = $row2['date_modified_mobile_c'];
                        $res2[$j]['mobile_id_c']       			  = $row2['mobile_id_c'];
                        $res2[$j]['notes_type_c']                 = $row2['notes_type_c'];
                        $res2[$j]['user_name']                    = $row2['user_name'];
                        $res2[$j]['assigned_user_name']           = $row2['assigned_user_name'];
                        $res2[$j]['mobile_id_c']                  = $row2['mobile_id_c'];
                        $res2[$j]['date_modified']                = $row2['date_modified'];


                        if(!empty($row2['created_by'])){
                        $created_by = $row2['created_by'];

                        $selectCreatedByQuery = "SELECT CONCAT_WS('', u.first_name, u.last_name) AS created_by FROM users AS u WHERE id = '$created_by' ";

                        $resultsCreatedBy = mysql_query($selectCreatedByQuery, $connection);
                        $rowCreatedBy = mysql_fetch_assoc($resultsCreatedBy);
                    
                    }

                    $res2[$j]['created_by']      	    = $rowCreatedBy['created_by'];
                    $res2[$j]['created_by_id']          = $row2['created_by'];
				    $res2[$j]['securitygroup_id']       = $row2['securitygroup_id'];
                    $res2[$j]['securitygroup_name']     = $row2['securitygroup_name'];  
						$j++;

					}

			mysql_close($connection);
		}

		$final_array = array();
		$final_array['notes'] = $res2;

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
