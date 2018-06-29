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

	$sql2 = "SELECT * FROM notes LEFT JOIN notes_cstm ON notes.id = notes_cstm.id_c WHERE notes_cstm.notes_type_c = 'direct' AND notes.created_by ='$assigned_user_id' AND notes_cstm.deleted_from_mobileapp_c = '0' AND notes.deleted = '0' AND notes.date_modified >= '$date_modified_sugar_format_sync' order by notes.date_modified DESC";		
				
				$res2 = array();
				$j=0;
				$results2 = mysql_query($sql2, $connection);
					while ($row2 = mysql_fetch_array($results2)) {

						$res2[$j]['id']  = $row2['id'];					    
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
