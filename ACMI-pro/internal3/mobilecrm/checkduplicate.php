<?php
 
        /** 
          * API file to find duplicate contact number/ mobile number.
          * Date        : Mar-17-2017
          * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
          * PHP version : 5.6
        */
        $all_values       = rawurldecode($_REQUEST["all_values"]);
        $assigned_user_id = rawurldecode($_REQUEST["assigned_user_id"]);

        include 'db.php';
        $prefix = "";
        $connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

        $paid = "yes";
        $duplicateArr = array();

	    if($connection){

            mysql_query ("set character_set_results='utf8'");
            $db_selected = mysql_select_db($mysql_database, $connection);
    	    $connected = 1;

            $mobileArr = explode(",",$all_values);
            $duplicateMobiles = "";
            $duplicateMobilesArr = array();

            for($l=0;$l<count($mobileArr);$l++) {

                $mobile = $mobileArr[$l];

                $sql = "SELECT id FROM contacts WHERE phone_mobile = '$mobile' AND assigned_user_id='$assigned_user_id' AND deleted=0";

                $res = array();
                $j=0;
                $results = mysql_query($sql, $connection);
                

                if ($results) {
                    $row            = mysql_fetch_array($results);
                    if (array_key_exists("id",$row)){
                        $duplicateMobiles .= $mobile.",";  
                        $duplicateMobilesArr [$l] = $mobile;
                    }
                }
            }

            mysql_close($connection);
        }


        $last_character     = substr($duplicateMobiles, -1); // returns last character
        if ($last_character == ',') {
            $duplicateMobiles = substr($duplicateMobiles, 0, -1); //remove last character
        }

        $final_array = array();
        $final_array['duplicates'] = $duplicateMobiles;
  
        $outputArr = array();
        $outputArr['android'] = $final_array;
        print_r(json_encode($outputArr));         

?>
