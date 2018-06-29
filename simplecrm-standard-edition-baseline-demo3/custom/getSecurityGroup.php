<?php 
if (!defined('sugarEntry'))
    define('sugarEntry', true);
ini_set("display_errors", "on");

		include_once('modules/SecurityGroups/SecurityGroup.php');

		$user_id=$_REQUEST['id'];

		/*Jun-26-Tue
		* This Function Is Responsible for Getting The Name & id Of Security Group.
		* 
		*/
		$security=new SecurityGroup();
		$result =$security->getUserSecurityGroups($user_id);
		
		echo "User Id : ".$user_id;
		echo "<pre>";
		$keys=array_keys($result);
		print_r($keys);
		print_r($result['b0f611a5-83e4-c76a-50f4-5b0e658f90fd']);
		
		/*
		* Get All the Secutity Group And There Id.
		*/
		echo "------------Secutity Group---------------------\n";
		$all_security_group=$security->getAllSecurityGroups();
		print_r(array_keys($all_security_group));
		print_r($all_security_group);
		
		/*
		* This Function Returns the Membership Count Of each User;
		*/
		$get_membership_count=$security->getMembershipCount($user_id);
		print_r($get_membership_count);

		$get_group_access=$security->groupHasAccess('Contacts',$user_id);
		print_r($get_group_access);

		// $get_group_users=$security->getGroupUsersJoin($user_id);
		// print_r($get_group_users);


 ?>