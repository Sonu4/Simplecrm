<?php
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

/*
 * Author: Noresha Ankani
 * Date Created: 18/03/2016
 * Purpose: Case Escalation
 * 
 */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/entryPoint.php');
include_once('include/SugarPHPMailer.php');
include_once('include/utils/db_utils.php');
include('custom/include/language/en_us.lang.php');
include('include/language/en_us.lang.php');

//including custom scheduler
array_push($job_strings, 'Case_Escalation');


function Case_Escalation(){
	
global $db,$body,$body_main,$app_list_strings;
$escalationid="";
date_default_timezone_set('UTC');

global $sugar_config;
$schedulerLogFile = '/usr/share/nginx/html/customerdemo/demo/custom/modules/Schedulers/scheduler_log.txt';  
$schedulerHandle = fopen($schedulerLogFile, 'a');
$timestamp = date('Y-M-d H:m:s', strtotime('now'));
 
if(!empty($GLOBALS['app_list_strings']['teams_list']))
        {
			global $db;
			//print_r($GLOBALS['app_list_strings']['teams_list']);
			foreach($GLOBALS['app_list_strings']['teams_list'] as $key => $val)
            {
				$teams=$key;
				//fetching each escalation matrix for each team
				$query_level_minutes="SELECT escalation_minutes_level1_c,escalation_minutes_level2_c,escalation_minutes_level3_c,id,email_template_1_c,email_template_2_c,email_template_3_c FROM scrm_escalation_matrix INNER JOIN scrm_escalation_matrix_cstm ON scrm_escalation_matrix.id=scrm_escalation_matrix_cstm.id_c WHERE teams_c='$teams' AND deleted='0'";
				$result_level_minutes=$db->query($query_level_minutes);
				$row_level_minutes=$db->fetchByAssoc($result_level_minutes);
				$escalationminutes_level1=$row_level_minutes['escalation_minutes_level1_c'];
				$escalationminutes_level2=$row_level_minutes['escalation_minutes_level2_c'];
				$escalationminutes_level3=$row_level_minutes['escalation_minutes_level3_c'];
				$email_template_1=$row_level_minutes['email_template_1_c'];
				$email_template_2=$row_level_minutes['email_template_2_c'];
				$email_template_3=$row_level_minutes['email_template_3_c'];
				$escalationid=$row_level_minutes['id'];
				//fetching case details from cases
				$today=gmdate('Y-m-d');
				$query_dateentered="select cases.date_entered,cases.id,cases.assigned_user_id,cases.name,cases_cstm.escalation_level_1_checkbox_c,cases_cstm.escalation_level_2_checkbox_c,cases_cstm.escalation_level_3_checkbox_c from cases inner join cases_cstm on cases.id=cases_cstm.id_c inner join securitygroups_records on securitygroups_records.record_id=cases.id where cases.deleted='0' and cases.state='Open' and securitygroups_records.securitygroup_id='$teams' and securitygroups_records.deleted='0' and date(cases.date_entered)='$today'";
				$result_dateentered=$db->query($query_dateentered);
				while($row_dateentered=$db->fetchByAssoc($result_dateentered)){
						$case_id=$row_dateentered['id'];
						$datecreated=$row_dateentered['date_entered'];
						$case_assigned_user = $row_dateentered['assigned_user_id'];
						$case_subject = $row_dateentered['name'];
						$escalationminutes_level1_checkbox=$row_dateentered['escalation_level_1_checkbox_c'];
						$escalationminutes_level2_checkbox=$row_dateentered['escalation_level_2_checkbox_c'];
						$escalationminutes_level3_checkbox=$row_dateentered['escalation_level_3_checkbox_c'];
						$today_date= date('Y-m-d H:i:s');
						$seconds = strtotime($today_date) - strtotime($datecreated);
						$days    = floor($seconds / 86400);
						$totalminutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
						
						if((($totalminutes >= ($escalationminutes_level1-1)) && ($totalminutes <= ($escalationminutes_level1+1))) && ($escalationminutes_level1_checkbox == 1)){
							
							$status = "CRON Run Successful!-$totalminutes ";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);

							//fetching user details - supervisor,manage
							$fetch_reports_to_query = "select * from users where id ='$case_assigned_user' and deleted='0'";
							$fetch_reports_to_result=$db->query($fetch_reports_to_query);
							$fetch_reports_to_row = $db->fetchByAssoc($fetch_reports_to_result);
							$reports_to_supervisor = $fetch_reports_to_row['reports_to_id'];
							$assignedusername_old = $fetch_reports_to_row['first_name'].' '.$fetch_reports_to_row['last_name'];

							$status = "Level 1 - Reports to user - $reports_to_supervisor";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);
								
							$update_case_assigned_user = "update cases set assigned_user_id='$reports_to_supervisor' where state='Open' and deleted='0' and id='$case_id'";
							$update_case_assigned_user_result = $db->query($update_case_assigned_user);
	
							//fetch user details
							$select_assigned_user = "SELECT * from users where id='$reports_to_supervisor' and deleted='0'";
							$select_assigned_result = $db->query($select_assigned_user);
							$select_assigned_row  = $db->fetchByAssoc($select_assigned_result);
							$assignedusername = $select_assigned_row['first_name'].' '.$select_assigned_row['last_name'];
							
							//getting assigned user email
							$select_query = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$reports_to_supervisor' and eabr.deleted='0'";
							$select_result = $db->query($select_query);
							$select_row = $db->fetchByAssoc($select_result);
							$assignedemail= $select_row['email'];
							$status = "Level 1- Assigned user emails and name :$assignedusername-$assignedemail !";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);														
							//fetching email template
							$emailtemplate_query="SELECT body_html,subject FROM email_templates WHERE id='$email_template_1'";
							$emailtemplate_result=$db->query($emailtemplate_query);
							$emailtemplate_row=$db->fetchByAssoc($emailtemplate_result);
							$body=$emailtemplate_row['body_html'];
							$subject=$emailtemplate_row['subject'];
							$needle = '$acase_';
							$matches = array_filter(str_word_count($body,1,'_$'),
										function($item) use ($needle) {
											//echo $item;
											return (levenshtein($item,$needle,1,1,0) == 0);
										}
									   );
							 foreach ($matches as $values) {
								$correctvariables=$values;
								$queryvariables=str_replace('$acase_',"",$correctvariables);
								$query_casevariables="SELECT $queryvariables FROM cases inner join cases_cstm on cases.id=cases_cstm.id_c where id='$case_id'";
								$result_casevariables=$db->query($query_casevariables);
								$row_casevariables=$db->fetchByAssoc($result_casevariables);
								$result_case=$row_casevariables[$queryvariables];
								//~ $body= str_replace('$acase_priority',$GLOBALS['app_list_strings']['case_priority_dom'][$row_casevariables['priority']],$body);
								$body= str_replace(array($correctvariables),array($result_case),$body);
								$body= str_replace('$sugarurl',$sugar_config['site_url'],$body);
								$body= str_replace('$new_assigned_user_name',$assignedusername,$body);
								$body= str_replace('$old_assigned_user_name',$assignedusername_old,$body);
								$subject= str_replace(array($correctvariables),array($result_case),$subject);
							}
								//for sending email
								$sending_mail = mailInit($assignedemail, $assignedusername, $subject, $body);
								$status = "Email Status - $sending_mail";
								$logMessage = "\n\nScheduler Result at $timestamp :- $status";
								fwrite($schedulerHandle, $logMessage);
								if(!empty($update_case_assigned_user_result)){
										$recid=create_guid();
										$query = "INSERT INTO scrm_escalation_audit(id,name,date_entered,date_modified,modified_user_id,deleted) VALUES('$recid','$case_subject','$today_date','$today_date','$reports_to_supervisor',0)";
										$result= $db->query($query);
										$query_cstm="INSERT INTO scrm_escalation_audit_cstm (id_c,level_c) VALUES ('$recid','Level1')";
										$result_cstm=$db->query($query_cstm);
										$idrelation=create_guid();
										$query_relation="INSERT INTO scrm_escalation_matrix_scrm_escalation_audit_1_c(id,date_modified,scrm_escala593_matrix_ida,scrm_escald34en_audit_idb) VALUES ('$idrelation','$today_date','$escalationid','$recid')";
										$result_relation=$db->query($query_relation);
									}
									
									$update_escalation_matrix_level1 = $db->query("update cases_cstm set escalation_level_1_checkbox_c=0  where id_c='$case_id'");
					
						}
						if((($totalminutes >= ($escalationminutes_level2-1)) && ($totalminutes <= ($escalationminutes_level2+1))) && ($escalationminutes_level2_checkbox == 1)){
							$status = "CRON Run Successful!- $totalminutes";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);

							//fetching user details - supervisor,manager
							$fetch_reports_to_query = "select * from users where id ='$case_assigned_user' and deleted='0'";
							$fetch_reports_to_result=$db->query($fetch_reports_to_query);
							$fetch_reports_to_row = $db->fetchByAssoc($fetch_reports_to_result);
							$reports_to_supervisor = $fetch_reports_to_row['reports_to_id'];
							$assignedusername_old = $fetch_reports_to_row['first_name'].' '.$fetch_reports_to_row['last_name'];
							
							$status = "Level 2 - Reports to user - $reports_to_supervisor";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);
							
							$update_case_assigned_user = "update cases set assigned_user_id='$reports_to_supervisor' where state='Open' and deleted='0' and id='$case_id'";
							$update_case_assigned_user_result = $db->query($update_case_assigned_user);
							
							//fetch user details
							$select_assigned_user = "SELECT * from users where id='$reports_to_supervisor' and deleted='0'";
							$select_assigned_result = $db->query($select_assigned_user);
							$select_assigned_row  = $db->fetchByAssoc($select_assigned_result);
							$assignedusername = $select_assigned_row['first_name'].' '.$select_assigned_row['last_name'];
							
							//getting assigned user email
							$select_query = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$reports_to_supervisor' and eabr.deleted='0'";
							$select_result = $db->query($select_query);
							$select_row = $db->fetchByAssoc($select_result);
							$assignedemail= $select_row['email'];
							$status = "Level 2- Assigned user emails and name :$assignedusername-$assignedemail !";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);														
							//fetching email template
							$emailtemplate_query="SELECT body_html,subject FROM email_templates WHERE id='$email_template_2'";
							$emailtemplate_result=$db->query($emailtemplate_query);
							$emailtemplate_row=$db->fetchByAssoc($emailtemplate_result);
							$body=$emailtemplate_row['body_html'];
							$subject=$emailtemplate_row['subject'];
							$needle = '$acase_';
							$matches = array_filter(str_word_count($body,1,'_$'),
										function($item) use ($needle) {
											//echo $item;
											return (levenshtein($item,$needle,1,1,0) == 0);
										}
									   );
							 foreach ($matches as $values) {
								$correctvariables=$values;
								$queryvariables=str_replace('$acase_',"",$correctvariables);
								$query_casevariables="SELECT $queryvariables FROM cases inner join cases_cstm on cases.id=cases_cstm.id_c where id='$case_id'";
								$result_casevariables=$db->query($query_casevariables);
								$row_casevariables=$db->fetchByAssoc($result_casevariables);
								$result_case=$row_casevariables[$queryvariables];
								//~ $body= str_replace('$acase_priority',$GLOBALS['app_list_strings']['case_priority_dom'][$row_casevariables['priority']],$body);
								$body= str_replace(array($correctvariables),array($result_case),$body);
								$body= str_replace('$sugarurl',$sugar_config['site_url'],$body);
								//~ $body= str_replace('Open_New',$GLOBALS['app_list_strings']['case_status_dom'][$row_casevariables['status']],$body);
								$body= str_replace('$new_assigned_user_name',$assignedusername,$body);
								$body= str_replace('$old_assigned_user_name',$assignedusername_old,$body);
								$subject= str_replace(array($correctvariables),array($result_case),$subject);
							}
								//for sending email
								$sending_mail = mailInit($assignedemail, $assignedusername, $subject, $body);
								$status = "Email Status - $sending_mail";
								$logMessage = "\n\nScheduler Result at $timestamp :- $status";
								fwrite($schedulerHandle, $logMessage);
								
							if(!empty($update_case_assigned_user_result)){
										$recid=create_guid();
										$query = "INSERT INTO scrm_escalation_audit(id,name,date_entered,date_modified,modified_user_id,deleted) VALUES('$recid','$case_subject','$today_date','$today_date','$reports_to_supervisor',0)";
										$result= $db->query($query);
										$query_cstm="INSERT INTO scrm_escalation_audit_cstm (id_c,level_c) VALUES ('$recid','Level2')";
										$result_cstm=$db->query($query_cstm);
										$idrelation=create_guid();
										$query_relation="INSERT INTO scrm_escalation_matrix_scrm_escalation_audit_1_c(id,date_modified,scrm_escala593_matrix_ida,scrm_escald34en_audit_idb) VALUES ('$idrelation','$today_date','$escalationid','$recid')";
										$result_relation=$db->query($query_relation);
									}
									$update_escalation_matrix_level2 = $db->query("update cases_cstm set escalation_level_2_checkbox_c=0  where id_c='$case_id'");
						}
						if((($totalminutes >= ($escalationminutes_level3-1)) && ($totalminutes <= ($escalationminutes_level3+1))) && ($escalationminutes_level3_checkbox == 1)){
							$status = "CRON Run Successful! - $totalminutes";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);
							//fetch user details
							$select_assigned_user = "SELECT * from users where id='$case_assigned_user and deleted='0'";
							$select_assigned_result = $db->query($select_assigned_user);
							$select_assigned_row  = $db->fetchByAssoc($select_assigned_result);
							$assignedusername = $select_assigned_row['first_name'].' '.$select_assigned_row['last_name'];
							
							//getting assigned user email
							$select_query = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$case_assigned_user' and eabr.deleted='0'";
							$select_result = $db->query($select_query);
							$select_row = $db->fetchByAssoc($select_result);
							$assignedemail= $select_row['email'];
							$status = "Level 3- Assigned user emails and name :$assignedusername-$assignedemail !";
							$logMessage = "\n\nScheduler Result at $timestamp :- $status";
							fwrite($schedulerHandle, $logMessage);														
							//fetching email template
							$emailtemplate_query="SELECT body_html,subject FROM email_templates WHERE id='$email_template_3'";
							$emailtemplate_result=$db->query($emailtemplate_query);
							$emailtemplate_row=$db->fetchByAssoc($emailtemplate_result);
							$body=$emailtemplate_row['body_html'];
							$subject=$emailtemplate_row['subject'];
							$needle = '$acase_';
							$matches = array_filter(str_word_count($body,1,'_$'),
										function($item) use ($needle) {
											//echo $item;
											return (levenshtein($item,$needle,1,1,0) == 0);
										}
									   );
							 foreach ($matches as $values) {
								$correctvariables=$values;
								$queryvariables=str_replace('$acase_',"",$correctvariables);
								$query_casevariables="SELECT $queryvariables FROM cases inner join cases_cstm on cases.id=cases_cstm.id_c where id='$case_id'";
								$result_casevariables=$db->query($query_casevariables);
								$row_casevariables=$db->fetchByAssoc($result_casevariables);
								$result_case=$row_casevariables[$queryvariables];
								$body= str_replace(array($correctvariables),array($result_case),$body);
								//~ $body= str_replace('Open_New',$GLOBALS['app_list_strings']['case_status_dom'][$row_casevariables['status']],$body);
							}
								//for sending email
								$sending_mail = mailInit($assignedemail, $assignedusername, $subject, $body);
								$status = "Email Status - $sending_mail";
								$logMessage = "\n\nScheduler Result at $timestamp :- $status";
								fwrite($schedulerHandle, $logMessage);
									if($sending_mail == 'SUCCESS'){
										$recid=create_guid();
										$query = "INSERT INTO scrm_escalation_audit(id,name,date_entered,date_modified,modified_user_id,deleted) VALUES('$recid','$case_subject','$today_date','$today_date','$case_assigned_user',0)";
										$result= $db->query($query);
										$query_cstm="INSERT INTO scrm_escalation_audit_cstm (id_c,level_c) VALUES ('$recid','Level3')";
										$result_cstm=$db->query($query_cstm);
										$idrelation=create_guid();
										$query_relation="INSERT INTO scrm_escalation_matrix_scrm_escalation_audit_1_c(id,date_modified,scrm_escala593_matrix_ida,scrm_escald34en_audit_idb) VALUES ('$idrelation','$today_date','$escalationid','$recid')";
										$result_relation=$db->query($query_relation);
									}
									$update_escalation_matrix_level3 = $db->query("update cases_cstm set escalation_level_3_checkbox_c=0  where id_c='$case_id'");
						}
					}
							
			}
		}
return "SUCCESS";
}
function mailInit($to, $toName, $subject, $body) {
    //~ // include Email class
    include_once('modules/Administration/Administration.php');
    include_once('include/SugarPHPMailer.php');
    include_once('include/utils/db_utils.php'); // for from_html function
    
    $emailObj = new Email(); 
	$defaults = $emailObj->getSystemDefaultEmail(); 
		
	$mail = new SugarPHPMailer(); 
	$mail->setMailerForSystem(); 
	$mail->From = $defaults['email']; 
	$mail->FromName = $defaults['name']; 
    $mail->ClearAllRecipients();
    $mail->ClearReplyTos();
    // Add recipient
    $mail->AddAddress($to,$toName);
    // Add subject
	$mail->Subject = $subject;
    // Add mail content
	$mail->isHTML(true); // set to true if content has html tags
	$mail->Body = from_html($body);
   
    //Send mail, log if there is error
	if ($mail->Send()) {
        return 'SUCCESS';
	} else {
     $GLOBALS['log']->fatal("ERROR: Mail sending failed!");
        return 'FAIL';
    }
} 

?>
