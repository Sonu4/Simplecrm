<?php

        $usersimplecrmId        = urldecode($_REQUEST["usersimplecrmId"]);    
       
	$mysql_hostname = "localhost";
	$mysql_user     = "RF_staging_db";
	$mysql_password = "RF_staging_db=321";
	$mysql_database = "RF_staging_db";
	$prefix = "";
	$connection  = mysql_connect($mysql_hostname, $mysql_user, $mysql_password);
	
	if(!$connection){
	 $da = 1;//not working, not calling this if condition
	}

	if( $connection ){

        mysql_query ("set character_set_results='utf8'"); 
        $db_selected = mysql_select_db($mysql_database, $connection);
        //mysql_select_db('rf_dev_crm');
	$da = 2;


$sql3 = "SELECT IFNULL(id,'') AS id, IFNULL(first_name,'') AS first_name, 
         IFNULL(last_name,'') AS last_name, IFNULL(user_name,'') AS user_name,
         is_admin AS is_admin 
         FROM users  
         WHERE deleted = 0 AND status = 'Active' ";

$res3 = array();
$l=0; $n = 0;
$results3 = mysql_query($sql3, $connection);
while ($row3 = mysql_fetch_array($results3)) {
$res3[$l]['id']             = $row3['id'];

$user_id =  $row3['id'];
$val = "";
if($user_id==$usersimplecrmId){
$sql4    = "SELECT IFNULL(team_id,'') AS team_id
         FROM team_memberships  
         WHERE deleted = 0 AND user_id = '$user_id'";

$results4 = mysql_query($sql4, $connection);
while ($row4 = mysql_fetch_array($results4)) {
$val = $val.','.$row4['team_id'];
}
$val =  trim($val,",");
}

$res3[$l]['team_ids']       = $val;
$res3[$l]['first_name']     = $row3['first_name'];
$res3[$l]['last_name']      = $row3['last_name'];
$res3[$l]['user_name']      = $row3['user_name'];
$res3[$l]['is_admin']       = $row3['is_admin'];

$l++;

}

}


mysql_close($connection);


$final_array = array();
$final_array['users'] = $res3;

        if ($da == 1) {   
            $outputArrr = array();
            $outputArrr['Android'] = "failed to connect to db";   
            //echo ( json_encode($outputArrr));
            print_r( json_encode($outputArrr));

        } if($da == 2) {
            $outputArr = array();
            $outputArr['Android'] = $final_array;   
            //echo ( json_encode($outputArr));
            print_r( json_encode($outputArr)); 
	  }

?>
