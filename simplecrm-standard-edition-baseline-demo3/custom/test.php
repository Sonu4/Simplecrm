<?php 

ini_set("display_errors","On");
require_once('config.php');
require_once('data/SugarBean.php');  

// require_once('/include/SugarQuery/SugarQuery.php');



// $your_url = $GLOBALS['sugar_config']['site_url'];
//           echo $your_url;

global $db;


			$userName=$_POST['userName'];
			$moduleName=$_POST['moduleName'];
			$securityGroup=$_POST['securityGroup'];

  			$bean = new SugarBean();

  			$sql = "select id,user_name,role_id,action_id,access_override,name,category,acltype,aclaccess,securitygroup_id,security_group_name from info_all_access where user_name='$userName' and category='$moduleName' and security_group_name='$securityGroup'";


			$result =$bean->db->query($sql, true);
			
			while ($row=$db->fetchByAssoc($result)) {

				$final['result'][]=$row;
			}

			echo json_encode($final);

?>

