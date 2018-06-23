<?php
$GLOBALS['app_list_strings']['type_list']=array (
  'Hot' => 'Hot',
  'Warm' => 'Warm',
  'Cold' => 'Cold',
);
$app_strings['LBL_GROUPTAB3_1440738985'] = 'Sales';

$app_strings['LBL_GROUPTAB4_1440738985'] = 'Marketing';
$GLOBALS['app_list_strings']['source_list']=array (
  '' => '',
  'Facebook' => 'Facebook',
  'Twitter' => 'Twitter',
  'Portal' => 'Portal',
  'Call' => 'Call',
  'Inbound_Email' => 'Inbound Email',
);
$GLOBALS['app_list_strings']['approval_status_dom']=array (
  '' => '',
  'Not Approved' => 'Not Approved',
  'Pending_Approval' => 'Pending Approval',
  'Approved' => 'Approved',
);




#$GLOBALS['app_list_strings']['teams_list']=array (
#  '' => '',
#  'Support_Group' => 'Support Group',
#  'Sales_Group' => 'Sales Group',
#);
$new_teams_array=array(
   ''=>'',
);
$db = DBManagerFactory::getInstance(); 
$result=$db->query("select id, name from securitygroups where deleted='0'");
while($row=$db->fetchRow($result)){$new_teams_array[$row['id']] = $row['name'];}
$GLOBALS['app_list_strings']['teams_list']=$new_teams_array; 




$GLOBALS['app_list_strings']['escalation_level_list']=array (
  '' => '',
  'Level1' => 'Level 1',
  'Level2' => 'Level 2',
  'Level3' => 'Level 3',
);
$GLOBALS['app_list_strings']['escalation_minutes_level1_list']=array (
  '' => '',
  5 => '5',
  10 => '10',
  15 => '15',
  30 => '30',
  45 => '45',
  60 => '60',
);
$GLOBALS['app_list_strings']['escalation_minutes_level2_c_list']=array (
  '' => '',
  10 => '10',
  15 => '15',
  30 => '30',
  45 => '45',
  60 => '60',
);

/*
$GLOBALS['app_list_strings']['email_template_1_list']=array (
  '' => '',
  'Update_Custome' => 'Update Customer on the Issue',
  'Quote_Price' => 'Quote Price Negotiation',
  'Quote_Approved' => 'Quote Approved',
  'Quote_Not_Approved' => 'Quote Not Approved',
  'New_Quote' => 'New Quote for Approval',
  'Welcome_To_SimpleWorks' => 'Welcome To SimpleWorks',
  'Deadline_missed' => 'Deadline missed',
  'Case_Closure' => 'Case Closure',
  'Joomla_Account' => 'Joomla Account Creation',
  'Case_Creation' => 'Case Creation',
  'Contact_Case' => 'Contact Case Update',
  'User_Case_Update' => 'User Case Update',
  'System_password' => 'System-generated password email',
  'Forgot_Password_email' => 'Forgot Password email',
  'Event_Invite_Template' => 'Event Invite Template',
);
*/

$new_email_templates_array=array(
   ''=>'',
);
$db = DBManagerFactory::getInstance(); 
$result=$db->query("select id, name from email_templates where deleted='0'");
while($row=$db->fetchRow($result)){$new_email_templates_array[$row['id']] = $row['name'];}
$GLOBALS['app_list_strings']['email_template_1_list']=$new_email_templates_array; 




$GLOBALS['app_list_strings']['country_list']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['state_list']=array (
  '' => '',
  'Maharashta' => 'Maharashtra',
);
$GLOBALS['app_list_strings']['city_c_list']=array (
  '' => '',
  'Mumbai' => 'Mumbai',
);
$GLOBALS['app_list_strings']['quarter_list']=array (
  '' => '',
  1 => 'Q1',
  2 => 'Q2',
  3 => 'Q3',
  4 => 'Q4',
);

$GLOBALS['app_list_strings']['role1_0']=array (
  '' => '',
  'Marketing Manager' => 'Marketing Manager',
  'Support Rep' => 'Support Rep',
  'Support Manager' => 'Support Manager',
  'Sales Manager' => 'Sales Manager',
  'Sales Rep' => 'Sales Rep',
);

$GLOBALS['app_list_strings']['lead_simplecrm_status_list']=array (
  '' => '',
  'In_Review' => 'In Review',
  'Qualified' => 'Qualified',
  'Not_Qualified' => 'Not Qualified',
);
$GLOBALS['app_list_strings']['lead_partner_status_list']=array (
  '' => '',
  'In_Review' => 'In Review',
  'Accepted' => 'Accepted',
  'Rejected' => 'Rejected',
);
$GLOBALS['app_list_strings']['status_list']=array (
  '' => '',
  'New' => 'New',
  'Open' => 'Open - Close in 1 Month',
  'Open3' => 'Open - Close in 3 Month',
  'Open6' => 'Open - Close in 6 Month',
  'Converted' => 'Converted to Customer',
  'Dead' => 'Dead',
);
$GLOBALS['app_list_strings']['case_type_dom']=array (
  'Minor_Defect' => 'Service Request',
  'Defect' => 'Claim',
  'Change_Request' => 'Complaint',
  'Product_Enhancement_Request' => 'General Feedback',
  'Pre_Sales_Related' => 'Pre Sales Related',
  'Other' => 'Other',
);

$GLOBALS['app_list_strings']['type_0']=array (
  'HL' => 'Home Loan',
  'CL' => 'Car Loan',
  'SL' => 'Student Loan',
);

$GLOBALS['app_list_strings']['loan_type_list']=array (
  '' => '',
  'HL' => 'Home Loan',
  'CL' => 'Car Loan',
  'SL' => 'Student Loan',
);

$GLOBALS['app_list_strings']['category_list']=array (
  'Hot' => 'Hot',
  'Warm' => 'Warm',
);
$GLOBALS['app_list_strings']['region_list']=array (
  '' => '',
  'Asia' => 'Asia',
  'Europe' => 'Europe',
  'Africa' => 'Africa',
);
$GLOBALS['app_list_strings']['country_0']=array (
  '' => '',
  'Asia_China' => 'China',
  'Asia_India' => 'India',
  'Asia_Iraq' => 'Iraq',
  'Asia_SaudiArabia' => 'Saudi Arabia',
  'Asia_Turkey' => 'Turkey',
  'Europe_Ukraine' => 'Ukraine',
  'Europe_Italy' => 'Italy',
  'Europe_Spain' => 'Spain',
  'Europe_England' => 'England',
  'Africa_SouthAfrica' => 'South Africa',
);

$GLOBALS['app_list_strings']['lead_source_dom']=array (
  '' => '',
  'Cold Call' => 'Cold Call',
  'Existing Customer' => 'Existing Customer',
  'Self Generated' => 'Self Generated',
  'Employee' => 'Employee',
  'Partner' => 'Partner',
  'Public Relations' => 'Public Relations',
  'Direct Mail' => 'Direct Mail',
  'Conference' => 'Conference',
  'Trade Show' => 'Trade Show',
  'Web Site' => 'Web Site',
  'Word of mouth' => 'Word of mouth',
  'Email' => 'Email',
  'Campaign' => 'Campaign',
  'Facebook' => 'Facebook',
  'Twitter' => 'Twitter',
  'Other' => 'Other',
  'test' => 'test',
);
$GLOBALS['app_list_strings']['sales_stage_list1']=array (
  '' => '',
  'Prospecting' => 'Prospecting',
  'Qualification' => 'Qualification',
  'Need_Analysis' => 'Need Analysis',
  'Proposal_Price_Quote' => 'Proposal/Price Quote',
  'Negotiation_Review' => 'Negotiation/Review',
  'Closed Won' => 'Closed Won',
  'Closed Lost' => 'Closed Lost',
);
$GLOBALS['app_list_strings']['case_status_dom']=array (
  'Open_New' => 'New',
  'Open_Assigned' => 'Assigned',
  'Open_Pending Input' => 'Pending Input',
  'Closed_Closed' => 'Closed',
  'Closed_Rejected' => 'Rejected',
  'Closed_Duplicate' => 'Duplicate',
);
$GLOBALS['app_list_strings']['lead_source_dom']['Linkedin']='Linkedin';
$GLOBALS['app_list_strings']['approval_levels_list']=array (
  '' => '',
  'Level1' => 'Level1',
  'Level2' => 'Level2',
  'Level3' => 'Level3',
);
$GLOBALS['app_list_strings']['discount1_list']=array (
  '' => '',
  5 => '5%',
  10 => '10%',
  15 => '15%',
  20 => '20%',
  25 => '25%',
  30 => '30%',
);
$GLOBALS['app_list_strings']['industry_dom']=array (
  '' => '',
  'Apparel' => 'Apparel',
  'Banking' => 'Banking',
  'Biotechnology' => 'Biotechnology',
  'Chemicals' => 'Chemicals',
  'Communications' => 'Communications',
  'Construction' => 'Construction',
  'Consulting' => 'Consulting',
  'Education' => 'Education',
  'Electronics' => 'Electronics',
  'Energy' => 'Energy',
  'Engineering' => 'Engineering',
  'Entertainment' => 'Entertainment',
  'Environmental' => 'Environmental',
  'Finance' => 'Finance',
  'Government' => 'Government',
  'Healthcare' => 'Healthcare',
  'Hospitality' => 'Hospitality',
  'Insurance' => 'Insurance',
  'Machinery' => 'Machinery',
  'Manufacturing' => 'Manufacturing',
  'Media' => 'Media',
  'Not For Profit' => 'Not For Profit',
  'Recreation' => 'Recreation',
  'Retail' => 'Retail',
  'Shipping' => 'Shipping',
  'Technology' => 'Technology',
  'Telecommunications' => 'Telecommunications',
  'Transportation' => 'Transportation',
  'Utilities' => 'Utilities',
  'Other' => 'Other',
);
$app_list_strings['moduleList']['simpl_Cloud_Agent']='Jodocloud';
$app_list_strings['moduleListSingular']['simpl_Cloud_Agent']='Jodocloud';
$GLOBALS['app_list_strings']['parent_type_display']=array (
  'Accounts' => 'Account',
  'Contacts' => 'Contact',
  'Tasks' => 'Task',
  'Opportunities' => 'Opportunity',
  'Bugs' => 'Bug',
  'Cases' => 'Case',
  'Leads' => 'Lead',
  'Project' => 'Project',
  'ProjectTask' => 'Project Task',
  'Prospects' => 'Target',
  'scrm_Partner_Contacts' => 'Partner Contacts',
);
$app_list_strings['moduleList']['Accounts']='Clients';
$app_list_strings['moduleListSingular']['Accounts']='Client';
$app_list_strings['record_type_display']['Accounts']='Client';
$app_list_strings['parent_type_display']['Accounts']='Client';
$app_list_strings['record_type_display_notes']['Accounts']='Client';
$GLOBALS['app_list_strings']['type_of_entity_list']=array (
  '' => '',
  'Public_Company' => 'Public Company',
  'Private_Company' => 'Private Company',
  'Association' => 'Association',
  'Guarantee_Ltd' => 'Guarantee Ltd',
  'Society' => 'Society',
  'Branch' => 'Branch',
  'Partnership' => 'Partnership',
  'Trust' => 'Trust',
  'Soletrader' => 'Soletrader',
  'Individual' => 'Individual',
  'NGO' => 'NGO',
  'Other' => 'Other',
);
$GLOBALS['app_list_strings']['status_0']=array (
  '' => '',
  'Active' => 'Active',
  'Inactive' => 'Inactive',
  'Suspended' => 'Suspended',
);
$GLOBALS['app_list_strings']['client_type_list']=array (
  '' => '',
  'Current' => 'Current',
  'Past' => 'Past',
  'Prospective' => 'Prospective',
);
$GLOBALS['app_list_strings']['salutation_dom']=array (
  '' => '',
  'Mr.' => 'Mr.',
  'Ms.' => 'Ms.',
  'Mrs.' => 'Mrs.',
  'Dr.' => 'Dr.',
  'Rev.' => 'Rev.',
  'Prof.' => 'Prof.',
);
$GLOBALS['app_list_strings']['case_priority_dom']=array (
  'P1' => 'Urgent',
  'P2' => 'Normal',
  'P3' => 'Deferred',
);
$GLOBALS['app_list_strings']['services_list']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['service_types_list']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['service_sub_types_list']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['current_status_list']=array (
  '' => '',
  'Started' => 'Started',
  'Allocated' => 'Allocated',
  'Ongoing' => 'Ongoing',
  'Suspended' => 'Suspended',
  'Completed' => 'Completed',
  'Withdrawn' => 'Withdrawn',
  'Incomplete' => 'Incomplete',
);
$app_list_strings['moduleList']['Cases']='Cases';
$app_list_strings['moduleListSingular']['Cases']='Case';
$app_list_strings['record_type_display']['Cases']='Case';
$app_list_strings['parent_type_display']['Cases']='Case';
$app_list_strings['record_type_display_notes']['Cases']='Case';
$GLOBALS['app_list_strings']['contact_through_list']=array (
  '' => '',
  'Website' => 'Website',
  'Businesssetup' => 'Business Setup',
  'Consultant' => 'Consultant',
  'Other_Clients' => 'Other Clients',
  'Ad_Campaign' => 'Ad Campaign',
  'Walk_In' => 'Walk In',
  'Reference' => 'Reference',
  'Other' => 'Other',
);
$GLOBALS['app_list_strings']['reason_for_cessation_list']=array (
  '' => '',
  'Dispute' => 'Dispute',
  'Non_Payment' => 'Non Payment',
  'Work_Quality' => 'Work Quality',
  'Other' => 'Other',
);
$app_list_strings['moduleList']['Leads']='Prospective Clients';
$app_list_strings['moduleListSingular']['Leads']='Prospective Client';
$app_list_strings['record_type_display']['Leads']='Prospective Client';
$app_list_strings['parent_type_display']['Leads']='Prospective Client';
$app_list_strings['record_type_display_notes']['Leads']='Prospective Client';
$GLOBALS['app_list_strings']['division_list']=array (
  '' => '',
  'ACMI1' => 'A.C.M.Ifhaam And Company',
  'ACMI2' => 'ACMI Accounting Solutions (Pvt) Ltd',
  'ACMI3' => 'ACMI Outsourced Accountants (Pvt) Ltd',
  'ACMI4' => 'ACMI Tax Team',
  'ACMI5' => 'ACMI Management Consulting (Pvt) Ltd',
  'ACMI6' => 'ACMI Law Associates',
  'ACMI7' => 'ACMI HR Solutions (Pvt) Ltd',
  'ACMI8' => 'ACMI COMSEC (Pvt) Ltd',
  'ACMI9' => 'ACMI Investor Services (Pvt) Ltd',
  'ACMI10' => 'ACMI Group (Pvt) Ltd',
);


$app_list_strings['moduleList']['Opportunities']='Opportunities';
$app_list_strings['moduleListSingular']['Opportunities']='Opportunity';
$app_list_strings['record_type_display']['Opportunities']='Opportunity';
$app_list_strings['parent_type_display']['Opportunities']='Opportunity';
$app_list_strings['record_type_display_notes']['Opportunities']='Opportunity';
$app_list_strings['moduleList']['AOS_Product_Categories']='Service Types';
$app_list_strings['moduleList']['AOS_Products']='Service Subtypes';
$app_list_strings['moduleListSingular']['AOS_Product_Categories']='Service Type';
$app_list_strings['moduleListSingular']['AOS_Products']='Service Subtype';
$GLOBALS['app_list_strings']['communication_method_list']=array (
  '' => '',
  'Ordinary_Post' => 'Ordinary Post',
  'Registered_Post' => 'Registered Post',
  'Courier' => 'Courier',
  'Collection_by_Client' => 'Collection by Client',
  'Email' => 'Email',
  'Delivery' => 'Delivery',
);

