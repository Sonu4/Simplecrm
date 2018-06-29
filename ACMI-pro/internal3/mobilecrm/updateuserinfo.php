<?php


        /** 
          * API file to update user preference data in crm.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        $user_id             = urldecode($_REQUEST["user_id"]);
        $currency_id         = urldecode($_REQUEST["currency_id"]);

		$updated_status = "no";

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

		    $sql1 = "SELECT id, contents FROM user_preferences 
		             WHERE assigned_user_id = '$user_id' AND category = 'global' AND deleted='0'";

	        $result1 = mysql_query($sql1, $connection);
			if($row = mysql_fetch_assoc($result1)) {
			      $id       = $row['id'];
			      $contents = $row['contents'];
			}

			try {
				if (!empty($contents)) {
					$serialized_data = base64_decode($contents);
					$result = unserialize($serialized_data);

					$result['currency'] = $currency_id;

					$result = serialize($result);
					$result = base64_encode($result);
				}

			} catch (Exception $ex) {
				//echo 'Caught exception: ', $ex->getMessage(), "\n";
			}

		    $sql2 = "UPDATE user_preferences SET contents = '$result' 
		             WHERE assigned_user_id = '$user_id' AND category = 'global' AND deleted='0'";

			if (!empty($result)) {
				$result2 = mysql_query($sql2, $connection);

				if(mysql_affected_rows() >= 0){ 
					$updated_status = "yes";
				}
				if(mysql_affected_rows() == 0){ 
					$updated_status = "no";
				}
			}
	 
			mysql_close($connection);
		}

        $final_array = array();
        $final_array['updated_status'] = $updated_status;

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
