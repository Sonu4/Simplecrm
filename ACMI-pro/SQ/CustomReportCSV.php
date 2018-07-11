<?php
//ini_set('display_errors','On');
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('include/database/DBManager.php');
require_once('config.php');
global $db,$cnt1,$Content,$Content1;
$select_report=$_REQUEST['report_select'];
		//var_dump($_REQUEST['record']);
		global $logedin_user_id;

		$user_name=$_REQUEST['user'];
		$date_start =$_REQUEST['from'];
		$from=str_replace('-','/',$date_start);
		$date_start=date("Y-m-d",strtotime($from));
		$date_start.=" 00:00:00";


		$date_end =$_REQUEST['to'];
		$to=str_replace('-','/',$date_end);
		$date_end=date("Y-m-d",strtotime($to));
		$date_end.=" 23:59:59";

	

		
	function Name()
	{
		$date_start =$_REQUEST['from'];
		$from=str_replace('-','/',$date_start);
		$date_start=date("Y-m-d",strtotime($from));
		$date_start.=" 00:00:00";
		
		$date_end =$_REQUEST['to'];
		$to=str_replace('-','/',$date_end);
		$date_end=date("Y-m-d",strtotime($to));
		$date_end.=" 23:59:59";
		 //~ print_r($_REQUEST['name']);
		global $db;
		
		if(!empty($_REQUEST['name']))
		{
			$name =$_REQUEST['name'];
			$name=(explode(",",$name));
		}
		else
		{
			$logedin_user_id=$_REQUEST['id'];
			$query1 = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$logedin_user_id' AND deleted=0";
			$result=$db->query($query1); 
			while($getteams1=$db->fetchByAssoc($result))
			{
				$team_id = $getteams1['securitygroup_id'];
				//$sql="SELECT name FROM securitygroups where id='$team_id' ";
				$sql="SELECT name FROM securitygroups where deleted=0 ";
				$result1=$db->query($sql);
				$row=$db->fetchByAssoc($result1);	
				$thing=$row["name"];
				$values.=$row["name"].",";
			}
			$values = substr($values, 0, strlen($values)-1); 
			$name=(explode(",",$values));
		}
		
			
		
		$name=$_REQUEST['name'];		
		$sub_id = array();	
		$logedin_user_id=$_REQUEST['id'];
		//echo $logedin_user_id;
		$sql="SELECT is_admin FROM users where id='$logedin_user_id' ";
		$result1=$db->query($sql);
		$row=$db->fetchByAssoc($result1);	
		$admin=$row["is_admin"];
		//~ $query12 ="SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0 and status='Active'"; 
		$query12 ="SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0"; 
		$result=$db->query($query12, true); 
		while($getuserids=$db->fetchByAssoc($result))
		{
			$sub_id[] = $getuserids['id'];
		}
		if($logedin_user_id =='8ddc4e2b-b7d6-2fc8-95e8-558b90353953')
		{
			$sub_id[] ='38db8f0c-82e6-98c4-af06-5997e0ccc431';
		}
		
	$user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='".$logedin_user_id."' and before_value_string='Active' and date_created between '$date_start' and '$date_end' order by date_created desc limit 0,1";
		
		$user_audit_result = $db->query($user_audit_query);
		while($user_audit_row = $db->fetchByAssoc($user_audit_result)){
			$sub_id[] = $user_audit_row['parent_id'];
		}
		

		
		$count=0;
		count($sub_id);
		//~ echo 'sub id:<br>';
		//print_r($sub_id);exit;
		while(count($sub_id)>$count)
		{
			$flag = true;
			$query11 ="SELECT id FROM  users WHERE reports_to_id='".$sub_id[$count]."' and deleted=0 and status='Active'"; 
			$result=$db->query($query11, true); 
			while($getuser=$db->fetchByAssoc($result))
			{
				$flag = false;
				$sub_id[] = $getuser['id'];
			}
			//Added by Shakeer to get users list who become inactive during that peroid. 10Sep2015
			if($flag){
				$user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='".$sub_id[$count]."' and before_value_string='Active' and date_created between '$date_start' and '$date_end' order by date_created desc limit 0,1";
				
				$user_audit_result = $db->query($user_audit_query);
				while($user_audit_row = $db->fetchByAssoc($user_audit_result)){
					$sub_id[] = $user_audit_row['parent_id'];
				}
			}
			//Ended
			$count++;
		}

		$uid=array();		 
		$sub_id[] = $logedin_user_id;
		//print_r($sub_id);exit; 
		$i=0;
		for($k=0; $k< count($name); $k++)
		{
		//print_r($name);
		$name[$k]=str_replace("_"," ",$name[$k]);
		$query8 ="SELECT id FROM  securitygroups WHERE name ='$name[$k]' and deleted=0"; 
		$result=$db->query($query8, true); 
		$query=$db->fetchByAssoc($result); 
		$team_id = $query['id'];
		//~ $get_teamusers = "SELECT user_id FROM team_memberships WHERE team_id  ='$team_id' AND deleted=0";
		 $get_teamusers = "SELECT user_id FROM securitygroups_users WHERE securitygroup_id  ='$team_id' AND deleted=0";
		$get_teamusers_res=$db->query($get_teamusers); 
		while($getteams_user=$db->fetchByAssoc($get_teamusers_res))
		{
			$user_list[] = $getteams_user['user_id'];
			
		}
		

		//echo '<pre>';
		//print_r($user_list);exit;
		$from=$_REQUEST['from'];
		$from=str_replace('-','/',$from);
		$from=date("Y-m-d H:i:s",strtotime($from));
		//$select_report=$_REQUEST['report_select'];
		
		$flag=false;
		
		if($admin == 0){					
		$user_id=array();
		//print_r($sub_id);exit;
		for ($j=0;$j<count($sub_id); $j++)
		{ 

		$date_start =$_REQUEST['from'];
		$from=str_replace('-','/',$date_start);
		$date_start=date("Y-m-d",strtotime($from));
		$date_start.=" 00:00:00";


		$date_end =$_REQUEST['to'];
		$to=str_replace('-','/',$date_end);
		$date_end=date("Y-m-d",strtotime($to));
		$date_end.=" 23:59:59";
		
		
		$query ="SELECT * FROM  users WHERE deleted=0 AND id='$sub_id[$j]'"; 
		//echo "<br>";
	 	$result=$db->query($query, true); 
		$getuser=$db->fetchByAssoc($result);
		
		
        	$user_id = $getuser['id'];
        	//echo "<br>";
        	$user_fname = $getuser['first_name'];
        	$user_lname = $getuser['last_name'];
        	$user_name[]=$user_fname." ".$user_lname;
        	$user_id_arr[]=$getuser['id'];
        	$user_status[] = $getuser['status'];
        	//echo "<br>";
		//~ $getLeads = "SELECT count(id) as count FROM leads WHERE date_entered between '$date_start' and '$date_end' AND deleted=0 and assigned_user_id='$user_id' and team_id='$team_id'"; 
		$getLeads = "SELECT count(l.id) as count FROM leads l LEFT JOIN securitygroups_records sg ON l.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Leads' AND l.date_entered between '$date_start' and '$date_end' AND l.deleted=0 and l.assigned_user_id='$user_id' and sg.deleted=0";
		//~ exit;
		
		$getLeads_result=$db->query($getLeads); 
		$getLeads_row=$db->fetchByAssoc($getLeads_result);
		

		$total_leads[] = $getLeads_row['count']; 
		
		/* fetching sales Target User wise by Anurag Tiwari
		 * Start
		 */ 
		$getSalesTarget ="SELECT sales_target,opportunities_won FROM sf_sales_forecast st JOIN users_sf_sales_forecast_1_c u ON st.id= u.users_sf_sales_forecast_1sf_sales_forecast_idb WHERE u.users_sf_sales_forecast_1users_ida ='$user_id' AND st.deleted=0";
		
		$getSalesTarget_result=$db->query($getSalesTarget);
		$getSalesTarget_row=$db->fetchByAssoc($getSalesTarget_result);
		
		//Calculation of day between current year april-01 to current date
		$date =date("Y");
		$date = $date.",04,01";
		$date2 = new DateTime("now");
		$date2->format('Y-m-d');
		$date1 = new DateTime();
		$date1->setDate($date,04,01);
		$date1->format('Y-m-d');
		$interval = $date1->diff($date2);
		$day_diff =$interval->days;
		
		//sales target amount
		$salesTarget= intval($getSalesTarget_row['sales_target']);
		$salesTarget= intval(($salesTarget/365) *$day_diff);
		$salesTarget=$salesTarget/100000;
		$salesTarget=round($salesTarget, 2);
		$salesTargets[]=$salesTarget."L";
		$salesTarget1[]=$salesTarget;
		
		//opportunities_won amount To date
		$opportunities_won= intval($getSalesTarget_row['opportunities_won']);
		$opportunities_won= intval(($opportunities_won/365) *$day_diff);
		$opportunities_won=$opportunities_won/100000;
		$opportunities_won=round($opportunities_won, 2);
		$opportunities_wons[]=$opportunities_won."L";
		$opportunities_won1[]=$opportunities_won;
		
		/*End*/
		
		$getOpp_total ="SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_entered between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and sg.deleted=0 and su.deleted=0 and su.deleted=0";
		$getOpp_total_res=$db->query($getOpp_total); 
		$getOpp_total_res_row=$db->fetchByAssoc($getOpp_total_res);
		$id = $getOpp_total_res_row['id'];
		$amount =$getOpp_total_res_row['amount'];

		$total_oppt[]=$id;				
		$amount=$amount/100000;
		$amount=round($amount, 2);
		$amount=$amount."L";
		$total_amount[]=$amount;
		
		$getClosedWon =  "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' AND o.sales_stage ='Closed Won' and sg.deleted=0 and su.deleted=0";
		$getClosedWon_res=$db->query($getClosedWon); 
		$getClosedWon_res_row=$db->fetchByAssoc($getClosedWon_res);
		$total_own_oppt[] = $getClosedWon_res_row['id'];
		$oppt_own_amounts =$getClosedWon_res_row['amount']; 
		$oppt_own_amounts=$oppt_own_amounts/100000;
		$oppt_own_amounts=round($oppt_own_amounts, 2);
		$oppt_own_amount[]=$oppt_own_amounts."L"; 
		
                
		$getOppLost = "SELECT count(o.id) as id, sum(o.amount_usdollar) as sum FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and sg.deleted=0 and su.deleted=0";
		$getOppLost_res=$db->query($getOppLost); 
		$getOppLost_res_row=$db->fetchByAssoc($getOppLost_res);
		$oppt_lost_amounts =$getOppLost_res_row['sum'];
		$total_lost_oppt[]=$getOppLost_res_row['id'];
		$oppt_lost_amounts=$oppt_lost_amounts/100000;
		$oppt_lost_amounts=round($oppt_lost_amounts, 2);
		$oppt_lost_amount[]=$oppt_lost_amounts."L";
		
		
		$getCalls = "SELECT count(c.id) as count FROM calls c LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_start between '$date_start' and '$date_end' AND c.assigned_user_id='$user_id' and c.deleted=0 AND c.status='Held' and sg.deleted=0";
		$getCalls_res=$db->query($getCalls); 
		$getCalls_res_row=$db->fetchByAssoc($getCalls_res);
		$calls_count_id[]= $getCalls_res_row['count'];
		
		//Meetings Count 
		$getMeetings = "SELECT count(m.id) as count FROM meetings m LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_start between '$date_start' and '$date_end' AND m.assigned_user_id='$user_id' and m.deleted=0 AND m.status='Held' and sg.deleted=0";
		
		$getMeetings_res=$db->query($getMeetings); 
		$getMeetings_res_row=$db->fetchByAssoc($getMeetings_res);
		if(($user_id =='1a026b69-3745-4525-45c1-4edf2c2d9532') && ($team_id =='3306cb16-11f0-2c20-865b-4edf58cce893')) {
			$meetings_count_id[] = $getMeetings_res_row['count'] +1;
		}	
		
		else {	
		  $meetings_count_id[] = $getMeetings_res_row['count'];
	    }
		
		
		$getArchitect_contanct_values="SELECT count(ac.id) as count4 FROM 
		`arch_architects_contacts` ac LEFT JOIN securitygroups_records sg ON ac.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = ac.assigned_user_id WHERE su.securitygroup_id =  '$team_id' and su.primary_group=1
AND su.user_id = ac.assigned_user_id and sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND ac.date_entered between '$date_start' AND '$date_end'  
		AND ac.assigned_user_id='$user_id'  AND ac.deleted=0 and sg.deleted=0 and su.deleted=0";
		$getArchitect_res=$db->query($getArchitect_contanct_values); 
		$getArchitect_res_row=$db->fetchByAssoc($getArchitect_res);		
		$Architect_count_id[] = $getArchitect_res_row['count4'];
		$count_calls=0;
		$count_Meetings=0;
		
		/* count calls */
		   $getcalls_count="SELECT count(c.id) as countcalls FROM calls c  LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND c.date_entered between '$date_start' and '$date_end'  AND c.parent_type ='Arch_Architects_Contacts'  AND c.assigned_user_id='$user_id' AND  c.status='Held' AND c.deleted=0 and sg.deleted=0 ";
			$getcalls_count_res=$db->query($getcalls_count); 
			$getcalls_count_res_row=$db->fetchByAssoc($getcalls_count_res);		
			$calls_count_values_id = $getcalls_count_res_row['countcalls'];
			$count_calls+=$calls_count_values_id;
			/* end */
			/* count meetings */
		 $getmeetings_count="SELECT count(m.id) as countmeetings FROM meetings m  LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND m.date_entered between '$date_start' and '$date_end'  AND  m.parent_type ='Arch_Architects_Contacts' AND m.assigned_user_id='$user_id' AND  m.status='Held' AND m.deleted=0 and sg.deleted=0";
			$getmeetings_count_res=$db->query($getmeetings_count); 
			$getmeetings_count_res_row=$db->fetchByAssoc($getmeetings_count_res);		
			$calls_count_id_values = $getmeetings_count_res_row['countmeetings'];
			$count_Meetings +=$calls_count_id_values;
		$architect_calls_count_id[]=$count_calls;
		$architect_meetings_count_id[]=$count_Meetings;
		
		$total_architect_ct=$total_architect_ct+$Architect_count_id[$i];
		$total_architectmeetings_ct= $total_architectmeetings_ct+$architect_meetings_count_id[$i];
		$total_architectcalss_ct = $total_architectcalss_ct+$architect_calls_count_id[$i];
		
		$total_leads_count=$total_leads_count+$total_leads[$i];
		$total_opp_count=$total_opp_count+$total_oppt[$i];
		$total_opp_amount=$total_opp_amount+$total_amount[$i];
		$total_opp_own_count=$total_opp_own_count+$total_own_oppt[$i];
		$total_opp_own_amount=$total_opp_own_amount+$oppt_own_amount[$i];
		$total_opp_lost_count=$total_opp_lost_count+$total_lost_oppt[$i];
		$total_opp_lost_amount=$total_opp_lost_amount+$oppt_lost_amount[$i];
		
		//sales Target
		$total_salesTarget=$total_salesTarget+$salesTarget1[$i];
		$total_opportunities_won=$total_opportunities_won+$opportunities_won1[$i];
		
		$total_calls_count=$total_calls_count+$calls_count_id[$i];
		$total_meetings_count=$total_meetings_count+$meetings_count_id[$i];
		
		$team_name[]=str_replace("_"," ",$name[$k]);
		$team_id_array[]=$team_id;
		//echo $name[$k];
		$i++;
		}
		}
		else
		{
		

		$date_start =$_REQUEST['from'];
		$from=str_replace('-','/',$date_start);
		$date_start=date("Y-m-d",strtotime($from));
		$date_start.=" 00:00:00";


		$date_end =$_REQUEST['to'];
		$to=str_replace('-','/',$date_end);
		$date_end=date("Y-m-d",strtotime($to));
		$date_end.=" 23:59:59";
		
		$user_id=array();
		$get_users_list=array();
		//print_r($user_list);
		//exit;
		for($l=0;$l<count($user_list);$l++)
		{
		$flag = false;
		//~ $query ="SELECT * FROM  users WHERE deleted=0 AND status='Active' AND id='$user_list[$l]'"; 
		$query ="SELECT * FROM  users WHERE deleted=0 AND id='$user_list[$l]'";
	 	$result=$db->query($query, true); 
	 	while($user = $db->fetchByAssoc($result)){
			$flag = true;
			$get_users_list[] = $user;
		}
/*		//Added by Shakeer on 10Sep2015
		if(flag){
			$user_audit_query = "SELECT parent_id as user_id FROM  users_audit WHERE before_value_string='Active' AND parent_id='$user_list[$l]' AND date_created BETWEEN '$date_start' And '$date_end' order by date_created desc limit 0,1";
			$user_audit_result = $db->query($user_audit_query);
			while($user_audit_row = $db->fetchByAssoc($user_audit_result)){
				$user_id1 = $user_audit_row['user_id'];
					$query ="SELECT * FROM  users WHERE deleted=0 AND id='$user_id1'"; 
					$result=$db->query($query, true); 
					while($user = $db->fetchByAssoc($result)){
						$get_users_list[] = $user;
					}
			}
		}
		* 
		*/ 
		}
		
		
		for($l=0;$l<count($get_users_list);$l++)
		//~ while($getuser=$get_users_list[])
		{
			$getuser = $get_users_list[$l];
        	$user_id = $getuser['id'];
        	$user_fname = $getuser['first_name'];
        	$user_lname = $getuser['last_name'];
        	$user_name[]=$user_fname." ".$user_lname;
        	$user_id_arr[]=$getuser['id'];
        	$user_status[] = $getuser['status'];
        	
		$getLeads = "SELECT count(l.id) as count FROM leads l LEFT JOIN securitygroups_records sg ON l.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Leads' AND l.date_entered between '$date_start' and '$date_end' AND l.deleted=0 and l.assigned_user_id='$user_id' and sg.deleted=0";

		$getLeads_result=$db->query($getLeads); 
		$getLeads_row=$db->fetchByAssoc($getLeads_result);
		

		$total_leads[] = $getLeads_row['count']; 
		
		/* fetching sales Target User wise by Anurag Tiwari
		 * Start
		 */ 
		$getSalesTarget ="SELECT sales_target,opportunities_won FROM sf_sales_forecast st JOIN users_sf_sales_forecast_1_c u ON st.id= u.users_sf_sales_forecast_1sf_sales_forecast_idb WHERE u.users_sf_sales_forecast_1users_ida ='$user_id' AND st.deleted=0";
		
		$getSalesTarget_result=$db->query($getSalesTarget);
		$getSalesTarget_row=$db->fetchByAssoc($getSalesTarget_result);
		
		//Calculation of day between current year april-01 to current date
		$date =date("Y");
		$date = $date.",04,01";
		$date2 = new DateTime("now");
		$date2->format('Y-m-d');
		$date1 = new DateTime();
		$date1->setDate($date,04,01);
		$date1->format('Y-m-d');
		$interval = $date1->diff($date2);
		$day_diff =$interval->days;
		
		//sales target amount
		$salesTarget= intval($getSalesTarget_row['sales_target']);
		#start
		#calculation till to date amount from sales target amount
		#formula : ((salestarget_amount / 365) * difference between currentdate & starting of finincial year)
		$opportunities_won= intval(($salesTarget/ 365) * $day_diff);
		#End 
		$salesTarget=$salesTarget/100000;
		$salesTarget=round($salesTarget, 2);
		$salesTargets[]=$salesTarget."L";
		$salesTarget1[]=$salesTarget;
		
		//opportunities_won amount To date
		$opportunities_won=$opportunities_won/100000;
		$opportunities_won=round($opportunities_won, 2);
		$opportunities_wons[]=$opportunities_won."L";
		$opportunities_won1[]=$opportunities_won;
		
		/*End*/
		
		$getOpp_total ="SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_entered between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and sg.deleted=0 and su.deleted=0 and su.deleted=0";

		$getOpp_total_res=$db->query($getOpp_total); 
		$getOpp_total_res_row=$db->fetchByAssoc($getOpp_total_res);
		$id = $getOpp_total_res_row['id'];
		$amount =$getOpp_total_res_row['amount'];

		$total_oppt[]=$id;				
		$amount=$amount/100000;
		$amount=round($amount, 2);
		$amount=$amount."L";
		$total_amount[]=$amount;
                
		$getClosedWon =  "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' AND o.sales_stage ='Closed Won' and sg.deleted=0 and su.deleted=0";
		//$GLOBALS['log']->fatal($getClosedWon,"Closed Won Opportunities");
		$getClosedWon_res=$db->query($getClosedWon); 
		$getClosedWon_res_row=$db->fetchByAssoc($getClosedWon_res);
		$total_own_oppt[] = $getClosedWon_res_row['id'];
		$oppt_own_amounts =$getClosedWon_res_row['amount']; 
		$oppt_own_amounts=$oppt_own_amounts/100000;
		$oppt_own_amounts=round($oppt_own_amounts, 2);
		$oppt_own_amount[]=$oppt_own_amounts."L"; 
		
		$getOppLost = "SELECT count(o.id) as id, sum(o.amount_usdollar) as sum FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and sg.deleted=0 and su.deleted=0";
		$getOppLost_res=$db->query($getOppLost); 
		$getOppLost_res_row=$db->fetchByAssoc($getOppLost_res);
		$oppt_lost_amounts =$getOppLost_res_row['sum'];
		$total_lost_oppt[]=$getOppLost_res_row['id'];
		$oppt_lost_amounts=$oppt_lost_amounts/100000;
		$oppt_lost_amounts=round($oppt_lost_amounts, 2);
		$oppt_lost_amount[]=$oppt_lost_amounts."L";
		
		
		 $getCalls = "SELECT count(c.id) as count FROM calls c LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_start between '$date_start' and '$date_end' AND c.assigned_user_id='$user_id' and c.deleted=0 AND c.status='Held' and sg.deleted=0";
		$getCalls_res=$db->query($getCalls); 
		$getCalls_res_row=$db->fetchByAssoc($getCalls_res);
		$calls_count_id[]= $getCalls_res_row['count'];
		
		//Meetings Count 
		$getMeetings = "SELECT count(m.id) as count FROM meetings m LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_start between
		 '$date_start' and '$date_end' AND m.assigned_user_id='$user_id' and m.deleted=0 AND 
		 m.status='Held' and sg.deleted=0";
		$getMeetings_res=$db->query($getMeetings); 
		$getMeetings_res_row=$db->fetchByAssoc($getMeetings_res);		
		
		if(($user_id =='1a026b69-3745-4525-45c1-4edf2c2d9532') && ($team_id =='3306cb16-11f0-2c20-865b-4edf58cce893')) {
			$meetings_count_id[] = $getMeetings_res_row['count'] +1;
		}	
		
		else {	
		  $meetings_count_id[] = $getMeetings_res_row['count'];
	    }
		$getArchitect_contanct_values="
SELECT count(ac.id) as count4 FROM 
        `arch_architects_contacts` ac LEFT JOIN securitygroups_records sg ON ac.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = ac.assigned_user_id WHERE su.securitygroup_id =  '$team_id' and su.primary_group=1
AND su.user_id = ac.assigned_user_id and sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND ac.date_entered between '$date_start' AND '$date_end'  
        AND ac.assigned_user_id='$user_id'  AND ac.deleted=0 and sg.deleted=0 and su.deleted=0";
		$getArchitect_res=$db->query($getArchitect_contanct_values); 
		$getArchitect_res_row=$db->fetchByAssoc($getArchitect_res);		
		$Architect_count_id[] = $getArchitect_res_row['count4'];
		$count_calls=0;
		$count_Meetings=0;
		
		
		/* count calls */
		   //~ $getcalls_count="SELECT count(c.id) as countcalls FROM calls c  LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_entered between '$date_start' and '$date_end'  AND c.parent_type ='Arch_Architects_Contacts'  AND c.team_id='$team_id' AND c.assigned_user_id='$user_id' AND  c.status='Held' AND c.deleted=0 and sg.deleted=0";
			$getcalls_count="SELECT count(c.id) as countcalls FROM calls c  LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND c.date_entered between '$date_start' and '$date_end'  AND c.parent_type ='Arch_Architects_Contacts'  AND c.assigned_user_id='$user_id' AND  c.status='Held' AND c.deleted=0 and sg.deleted=0";
			$getcalls_count_res=$db->query($getcalls_count); 
			$getcalls_count_res_row=$db->fetchByAssoc($getcalls_count_res);		
			$calls_count_values_id = $getcalls_count_res_row['countcalls'];
			$count_calls+=$calls_count_values_id;
			/* end */
			/* count meetings */
		 $getmeetings_count="SELECT count(m.id) as countmeetings FROM meetings m  LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_entered between '$date_start' and '$date_end'  AND  m.parent_type ='Arch_Architects_Contacts' AND m.assigned_user_id='$user_id' AND  m.status='Held' AND m.deleted=0 and sg.deleted=0";
			$getmeetings_count_res=$db->query($getmeetings_count); 
			$getmeetings_count_res_row=$db->fetchByAssoc($getmeetings_count_res);		
			$calls_count_id_values = $getmeetings_count_res_row['countmeetings'];
			$count_Meetings +=$calls_count_id_values;
			
		$architect_calls_count_id[]=$count_calls;
		$architect_meetings_count_id[]=$count_Meetings;
		
		
		$total_architect_ct=$total_architect_ct+$Architect_count_id[$i];
		$total_architectmeetings_ct= $total_architectmeetings_ct+$architect_meetings_count_id[$i];
		$total_architectcalss_ct = $total_architectcalss_ct+$architect_calls_count_id[$i];
		
		$total_leads_count=$total_leads_count+$total_leads[$i];
		$total_opp_count=$total_opp_count+$total_oppt[$i];
		$total_opp_amount=$total_opp_amount+$total_amount[$i];
		$total_opp_own_count=$total_opp_own_count+$total_own_oppt[$i];
		$total_opp_own_amount=$total_opp_own_amount+$oppt_own_amount[$i];
		$total_opp_lost_count=$total_opp_lost_count+$total_lost_oppt[$i];
		$total_opp_lost_amount=$total_opp_lost_amount+$oppt_lost_amount[$i];
		
		//sales Target
		$total_salesTarget=$total_salesTarget+$salesTarget1[$i];
		$total_opportunities_won=$total_opportunities_won+$opportunities_won1[$i];
		
		$total_calls_count=$total_calls_count+$calls_count_id[$i];
		$total_meetings_count=$total_meetings_count+$meetings_count_id[$i];
		
		$team_name[]=str_replace("_"," ",$name[$k]);
		$team_id_array[]=$team_id;
		//echo $name[$k];
		$i++;
		
		}
		//~ }
		
		
		} 
		unset($user_list);
		}
		$total_leads[]=$total_leads_count;
		//print_r($total_leads_count); exit;
		$total_oppt[]=$total_opp_count;
		$total_amount[]=$total_opp_amount;
		$total_own_oppt[]=$total_opp_own_count;
		$oppt_own_amount[]=$total_opp_own_amount;
		$total_lost_oppt[]=$total_opp_lost_count;
		$oppt_lost_amount[]=$total_opp_lost_amount;
		$calls_count_id[]=$total_calls_count;
		
		//sales Target
		$total_sales=$salesTargets;
		$total_salesTarget=$total_salesTarget;
		$opp_won_todate=$opportunities_wons;
		$opp_won_todate_total=$total_opportunities_won;
		
		$meetings_count_id[]=$total_meetings_count;
		
		$Architect_count_id[]=$total_architect_ct;
		$architect_meetings_count_id[]=$total_architectmeetings_ct;
		$architect_calls_count_id[]=$total_architectcalss_ct;
		//$user_status[] = $user_status;
		$user_name[]=count($user_name);
		$team_name[]="Total";
		$content=array($user_name,$total_leads,$total_oppt,$total_amount,$total_own_oppt,
		$oppt_own_amount,$total_lost_oppt,$oppt_lost_amount,$calls_count_id,$meetings_count_id,$user_id_arr,$team_name,
		$team_id_array,$Architect_count_id,$architect_meetings_count_id,$architect_calls_count_id,$total_sales,$total_salesTarget,$opp_won_todate,$opp_won_todate_total,$user_status);
		//~ echo "<pre>";
		//~ print_r($content); exit;
//                print_r(implode(',',$test));
		return $content;
		
	}
		

		


?>
