<?php

//ini_set("display_errors","on");
require_once('include/MVC/View/views/view.list.php');
require_once('modules/Leads/LeadsListViewSmarty.php');

class LeadsViewList extends ViewList {

    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay() {
        parent::preDisplay();
    }
    /*
     * This page return the data of perticular user based on the role and security group it supports.
     * date      :4-jul-2018
     * Created By:Shubham 
     */
    function display() {

        global $db, $current_user;
        $user_id = $current_user->id;
        $flag = "NA";
        $sql = "SELECT u.id, u.user_name,ac.category,ac.aclaccess,ac.name as to_access,ar.name as rolename,acn.access_override   FROM users as u 
		INNER JOIN acl_roles_users as au on au.user_id=u.id
		INNER JOIN acl_roles as ar on ar.id=au.role_id
		INNER JOIN acl_roles_actions as acn on acn.role_id=ar.id
		INNER JOIN acl_actions as ac on ac.id=acn.action_id
		WHERE u.id='" . $user_id . "' and ac.category='Leads' and ac.name='list'";
        $result = $db->query($sql);



        $row = $db->fetchByAssoc($result);
        if ($row['access_override'] == '90') {
            $flag = "all";
        } else if ($row['access_override'] == '80') {
            $flag = "group";
        } else if ($row['access_override'] == '75') {
            $flag = "owner";
        } else if ($row['access_override'] == '0') {
            $flag = "Not Set";
        } else if ($row['access_override'] == '-99') {
            $flag = "None";
        }


        switch ($flag) {
            case 'all':
                $query_group = "SELECT id,first_name,last_name,title,status,account_name,phone_work,date_entered FROM leads WHERE  deleted = '0'  group by date_entered desc";
                $this->query_main($query_group);
                break;
            case 'group':
                $query_group = "SELECT id,first_name,last_name,title,status,account_name,phone_work,date_entered FROM leads WHERE assigned_user_id in (select user_id from securitygroups_users where securitygroup_id =(select securitygroup_id from securitygroups_users where user_id='" . $user_id . "')) and deleted = '0' group by date_entered desc";
                $this->query_main($query_group);
                break;
            case 'owner':
                $query_group = "SELECT id,first_name,last_name,title,status,account_name,phone_work,date_entered FROM leads WHERE assigned_user_id='" . $user_id . "' and deleted='0' group by date_entered desc";
                $this->query_main($query_group);
                break;
            case 'Not Set':
                echo "Your role is not set";
                break;
            case 'None':
                echo "You dont have access to module";
                break;
            default:
                echo "No Response";
                break;
        }



        echo $js = <<<EOD
	<script>
	$(document).ready(function(){
   		//alert("{$user_id}");
   		$('#MassUpdate > table > tbody').empty();	
        
             
    });
    </script>
EOD;
        echo $js = <<<EOD
	 <html>
	 <head>
	 </head>
	 <style>
	 </style>
	 
	 </html>
EOD;
        parent::display();
    }

    function query_main($query_group) {
        echo "Hello";
        global $db;
        $result_g = $db->query($query_group);
        $i = 0;
        while ($row_g = $db->fetchByAssoc($result_g)) {
            $o[$i]['id'] = $row_g['id'];
            $o[$i]['first_name'] = $row_g['first_name'];
            $o[$i]['last_name'] = $row_g['last_name'];
            $o[$i]['title'] = $row_g['title'];
            $o[$i]['account_name'] = $row_g['account_name'];
            $o[$i]['phone_work'] = $row_g['phone_work'];
            $o[$i]['date_entered'] = $row_g['date_entered'];
            $i++;
        }
        //echo $flag;
        echo "<pre>";
        print_r($o);
    }

}

?>

