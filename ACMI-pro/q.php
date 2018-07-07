<?php
ini_set("display_errors","on");
require_once('include/MVC/View/views/view.list.php');
require_once('modules/Leads/LeadsListViewSmarty.php');

class LeadsViewList extends ViewList
{
	
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay(){
         parent::preDisplay();

          }
  	function display()
 	{
 		
 	global $db,$current_user;		
 	$user_id=$current_user->id;
 	$flag="NA";
 	$sql="SELECT u.id, u.user_name,ac.category,ac.aclaccess,ac.name as to_access,ar.name as rolename,acn.access_override   FROM users as u 
INNER JOIN acl_roles_users as au on au.user_id=u.id
INNER JOIN acl_roles as ar on ar.id=au.role_id
INNER JOIN acl_roles_actions as acn on acn.role_id=ar.id
INNER JOIN acl_actions as ac on ac.id=acn.action_id
WHERE u.id='1b3c0615-9e9e-3c40-3f55-5b3c73dc02a6' and ac.category='Leads' and ac.name='list'";
	$result = $db->query($sql);
	// while ( $row=$db->fetchByAssoc($result)) {
			
	// }
	$row=$db->fetchByAssoc($result);
	    if($row['aclaccess']=='90'){
	    	$flag="all";
	    }
	    if ($row['aclaccess']=='80') {
	    	$flag="group";
	    }
	    if ($row['aclaccess']=='75') {
	    	$flag="owner";
	    }
	    if ($row['aclaccess']=='0') {
	    	$flag="Not Set";
	    }
	    if ($row['aclaccess']=='-99') {
	    	$flag="None";
	    }

	   if ($flag=="all") {
	    	
	   } 
	   if ($flag=="group") {
	    	
	   }
	   if ($flag=="owner") {
	    	
	   }
	   if ($flag=="Not Set") {
	    	
	   }if ($flag=="None") {
	    	
	   }
	echo $js =<<<EOD
	<script>
	$(document).ready(function(){
   		//alert("{$user_id}");
   		$('#MassUpdate > table > tbody').empty();	
        $('#MassUpdate > table > tbody').append('<tr><td>{$flag}<td></tr>');        
             
    });
    </script>
EOD;
echo $js =<<<EOD
	 <html>
	 <head>
	 </head>
	 <style>
	 </style>
	 
	 </html>
EOD;
	parent::display();	
 	}

 	function owner(){
 		$sql_owner='SELECT id,first_name,last_name,title,status,account_name,phone_work,date_entered FROM leads WHERE assigned_user_id='$user_id' group by date_entered desc';
 		$result_o=$db->query($sql_owner);
 		while ($row_o=fetchByAssoc($result_o)) {
 			$o['id']=$row_o['id'];
 			$o['first_name']=$row_o['first_name'];
 			$o['last_name']=$row_o['last_name'];
 			$o['title']=$row_o['title'];
 			$o['account_name']=$row_o['account_name'];
 			$o['phone_work']=$row_o['phone_work'];
 			$o['date_entered']=$row_o['date_entered'];
 		}

 		print_r($o);
 	}

 	function group(){
 		$query_group='SELECT id,first_name,last_name,title,status,account_name,phone_work,date_entered FROM leads WHERE assigned_user_id in (select user_id from securitygroups_users where securitygroup_id =(select securitygroup_id from securitygroups_users where user_id='$user_id')) and deleted = '0' group by date_entered desc';
 		$result_g=$db->query($query_group);
 		while ($row_g=fetchByAssoc($result_g)) {
 			$o['id']=$row_g['id'];
 			$o['first_name']=$row_g['first_name'];
 			$o['last_name']=$row_g['last_name'];
 			$o['title']=$row_g['title'];
 			$o['account_name']=$row_g['account_name'];
 			$o['phone_work']=$row_g['phone_work'];
 			$o['date_entered']=$row_g['date_entered'];
 		}

 		print_r($o);
 	}

 	function all(){
 		$query_group='SELECT id,first_name,last_name,title,status,account_name,phone_work,date_entered FROM leads WHERE  deleted = '0'  group by date_entered desc';
 		$result_g=$db->query($query_group);
 		while ($row_g=fetchByAssoc($result_g)) {
 			$o['id']=$row_g['id'];
 			$o['first_name']=$row_g['first_name'];
 			$o['last_name']=$row_g['last_name'];
 			$o['title']=$row_g['title'];
 			$o['account_name']=$row_g['account_name'];
 			$o['phone_work']=$row_g['phone_work'];
 			$o['date_entered']=$row_g['date_entered'];
 		}

 		print_r($o);
 	}
}

?>
