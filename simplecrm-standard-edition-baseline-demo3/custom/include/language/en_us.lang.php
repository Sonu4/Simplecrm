<?php
$GLOBALS['app_list_strings']['type_list']=array (
  'Hot' => 'Hot',
  'Warm' => 'Warm',
  'Cold' => 'Cold',
);
$app_strings['LBL_GROUPTAB3_1440738985'] = 'Sales';

$app_strings['LBL_GROUPTAB4_1440738985'] = 'Marketing';
$app_list_strings['moduleList']['Leads']='Leads';
$app_list_strings['moduleListSingular']['Leads']='Lead';
$app_list_strings['record_type_display']['Leads']='Lead';
$app_list_strings['parent_type_display']['Leads']='Lead';
$app_list_strings['record_type_display_notes']['Leads']='Lead';
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
$app_list_strings['moduleList']['Reminders']='Reminders';
$app_list_strings['moduleList']['Reminders_Invitees']='Reminders Invitees';
$app_list_strings['moduleList']['scrm_Escalation_Matrix']='Escalation Matrix';
$app_list_strings['moduleList']['scrm_Escalation_Audit']='Escalation Audit';
$app_list_strings['moduleList']['scrm_Partner_Contacts']='Partner Contacts';
$app_list_strings['moduleList']['scrm_Partners']='Partners';




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
$app_list_strings['moduleList']['Accounts']='Accounts';
$app_list_strings['moduleListSingular']['Accounts']='Account';
$app_list_strings['record_type_display']['Accounts']='Account';
$app_list_strings['parent_type_display']['Accounts']='Account';
$app_list_strings['record_type_display_notes']['Accounts']='Account';
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

$GLOBALS['app_list_strings']['account_type_dom']=array (
  '' => '',
  'Analyst' => 'Analyst',
  'Competitor' => 'Competitor',
  'Customer' => 'Customer',
  'Integrator' => 'Integrator',
  'Investor' => 'Investor',
  'Partner' => 'Partner',
  'Press' => 'Press',
  'Prospect' => 'Prospect',
  'Reseller' => 'Reseller',
  'Other' => 'Other',
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
  'Other' => 'Other',
);
$app_strings['LBL_GROUPTAB5_1526531964'] = 'Basic';
$GLOBALS['app_list_strings']['Elastic_boost_options']=array (
  '' => '',
  0 => 'Disabled',
  1 => 'Low Boost',
  2 => 'Medium Boost',
  3 => 'High Boost',
  'Maharashtra' => 'Maharashtra',
  'GOA' => 'GOA',
  'UP' => 'UP',
  'MP' => 'MP',
);
$GLOBALS['app_list_strings']['city_list']=array (
  '' => '',
  'Nagpur' => 'Nagpur',
  'Bhandara' => 'Bhandara',
  'Katol' => 'Katol',
  'Bramhapuri' => 'Bramhapuri',
  'Kolkata' => 'Kolkata',
);
$GLOBALS['app_list_strings']['states_list']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['country_1']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['countrys_list']=array (
  '' => '',
  'India' => 'India',
);
$GLOBALS['app_list_strings']['countrys_0']=array (
  '' => '',
  'india' => 'India',
  'pakistan' => 'Pakistan',
  'Bangladesh' => 'Bangladesh',
  'Nepal' => 'Nepal',
  'Bhutan' => 'Bhutan',
  'Afganistan' => 'Afganistan',
  'Myanmar' => 'Myanmar',
  'China' => 'China',
  'Japan' => 'Japan',
  'South_koria' => 'South-koria',
  'North_koria' => 'North-koria',
);

$GLOBALS['app_list_strings']['states_1']=array (
  '' => '',
  'Maharashtra' => 'Maharashtra',
  'Andrapradesh' => 'Andrapradesh',
  'Chattisgadh' => 'Chattisgadh',
  'Himachal' => 'Himachal',
  'Gujrat' => 'Gujrat',
  'Bangal' => 'Bangal',
);
$GLOBALS['app_list_strings']['states_0']=array (
  '' => '',
  'Maharashtra' => 'India>Maharashtra',
);
$GLOBALS['app_list_strings']['cities_c_list']=array (
  '' => '',
  'Nagpur' => 'Nagpur',
  'Chandrapur' => 'Chandrapur',
);
$GLOBALS['app_list_strings']['cities_c_0']=array (
  '' => '',
  'I_Dont_know' => 'I_Dont_know',
  'Hello' => 'Hello',
);
$GLOBALS['app_list_strings']['countrys_1']=array (
  '' => '',
  'India' => 'India',
  'Pakistan' => 'Pakistan',
);
$GLOBALS['app_list_strings']['countries_dom']=array (
  '' => '',
  'ABU DHABI' => 'ABU DHABI',
  'ADEN' => 'ADEN',
  'AFGHANISTAN' => 'AFGHANISTAN',
  'ALBANIA' => 'ALBANIA',
  'ALGERIA' => 'ALGERIA',
  'AMERICAN SAMOA' => 'AMERICAN SAMOA',
  'ANDORRA' => 'ANDORRA',
  'ANGOLA' => 'ANGOLA',
  'ANTARCTICA' => 'ANTARCTICA',
  'ANTIGUA' => 'ANTIGUA',
  'ARGENTINA' => 'ARGENTINA',
  'ARMENIA' => 'ARMENIA',
  'ARUBA' => 'ARUBA',
  'AUSTRALIA' => 'AUSTRALIA',
  'AUSTRIA' => 'AUSTRIA',
  'AZERBAIJAN' => 'AZERBAIJAN',
  'BAHAMAS' => 'BAHAMAS',
  'BAHRAIN' => 'BAHRAIN',
  'BANGLADESH' => 'BANGLADESH',
  'BARBADOS' => 'BARBADOS',
  'BELARUS' => 'BELARUS',
  'BELGIUM' => 'BELGIUM',
  'BELIZE' => 'BELIZE',
  'BENIN' => 'BENIN',
  'BERMUDA' => 'BERMUDA',
  'BHUTAN' => 'BHUTAN',
  'BOLIVIA' => 'BOLIVIA',
  'BOSNIA' => 'BOSNIA',
  'BOTSWANA' => 'BOTSWANA',
  'BOUVET ISLAND' => 'BOUVET ISLAND',
  'BRAZIL' => 'BRAZIL',
  'BRITISH ANTARCTICA TERRITORY' => 'BRITISH ANTARCTICA TERRITORY',
  'BRITISH INDIAN OCEAN TERRITORY' => 'BRITISH INDIAN OCEAN TERRITORY',
  'BRITISH VIRGIN ISLANDS' => 'BRITISH VIRGIN ISLANDS',
  'BRITISH WEST INDIES' => 'BRITISH WEST INDIES',
  'BRUNEI' => 'BRUNEI',
  'BULGARIA' => 'BULGARIA',
  'BURKINA FASO' => 'BURKINA FASO',
  'BURUNDI' => 'BURUNDI',
  'CAMBODIA' => 'CAMBODIA',
  'CAMEROON' => 'CAMEROON',
  'CANADA' => 'CANADA',
  'CANAL ZONE' => 'CANAL ZONE',
  'CANARY ISLAND' => 'CANARY ISLAND',
  'CAPE VERDI ISLANDS' => 'CAPE VERDI ISLANDS',
  'CAYMAN ISLANDS' => 'CAYMAN ISLANDS',
  'CEVLON' => 'CEVLON',
  'CHAD' => 'CHAD',
  'CHANNEL ISLAND UK' => 'CHANNEL ISLAND UK',
  'CHILE' => 'CHILE',
  'CHINA' => 'CHINA',
  'CHRISTMAS ISLAND' => 'CHRISTMAS ISLAND',
  'COCOS (KEELING) ISLAND' => 'COCOS (KEELING) ISLAND',
  'COLOMBIA' => 'COLOMBIA',
  'COMORO ISLANDS' => 'COMORO ISLANDS',
  'CONGO' => 'CONGO',
  'CONGO KINSHASA' => 'CONGO KINSHASA',
  'COOK ISLANDS' => 'COOK ISLANDS',
  'COSTA RICA' => 'COSTA RICA',
  'CROATIA' => 'CROATIA',
  'CUBA' => 'CUBA',
  'CURACAO' => 'CURACAO',
  'CYPRUS' => 'CYPRUS',
  'CZECH REPUBLIC' => 'CZECH REPUBLIC',
  'DAHOMEY' => 'DAHOMEY',
  'DENMARK' => 'DENMARK',
  'DJIBOUTI' => 'DJIBOUTI',
  'DOMINICA' => 'DOMINICA',
  'DOMINICAN REPUBLIC' => 'DOMINICAN REPUBLIC',
  'DUBAI' => 'DUBAI',
  'ECUADOR' => 'ECUADOR',
  'EGYPT' => 'EGYPT',
  'EL SALVADOR' => 'EL SALVADOR',
  'EQUATORIAL GUINEA' => 'EQUATORIAL GUINEA',
  'ESTONIA' => 'ESTONIA',
  'ETHIOPIA' => 'ETHIOPIA',
  'FAEROE ISLANDS' => 'FAEROE ISLANDS',
  'FALKLAND ISLANDS' => 'FALKLAND ISLANDS',
  'FIJI' => 'FIJI',
  'FINLAND' => 'FINLAND',
  'FRANCE' => 'FRANCE',
  'FRENCH GUIANA' => 'FRENCH GUIANA',
  'FRENCH POLYNESIA' => 'FRENCH POLYNESIA',
  'GABON' => 'GABON',
  'GAMBIA' => 'GAMBIA',
  'GEORGIA' => 'GEORGIA',
  'GERMANY' => 'GERMANY',
  'GHANA' => 'GHANA',
  'GIBRALTAR' => 'GIBRALTAR',
  'GREECE' => 'GREECE',
  'GREENLAND' => 'GREENLAND',
  'GUADELOUPE' => 'GUADELOUPE',
  'GUAM' => 'GUAM',
  'GUATEMALA' => 'GUATEMALA',
  'GUINEA' => 'GUINEA',
  'GUYANA' => 'GUYANA',
  'HAITI' => 'HAITI',
  'HONDURAS' => 'HONDURAS',
  'HONG KONG' => 'HONG KONG',
  'HUNGARY' => 'HUNGARY',
  'ICELAND' => 'ICELAND',
  'IFNI' => 'IFNI',
  'INDIA' => 'INDIA',
  'INDONESIA' => 'INDONESIA',
  'IRAN' => 'IRAN',
  'IRAQ' => 'IRAQ',
  'IRELAND' => 'IRELAND',
  'ISRAEL' => 'ISRAEL',
  'ITALY' => 'ITALY',
  'IVORY COAST' => 'IVORY COAST',
  'JAMAICA' => 'JAMAICA',
  'JAPAN' => 'JAPAN',
  'JORDAN' => 'JORDAN',
  'KAZAKHSTAN' => 'KAZAKHSTAN',
  'KENYA' => 'KENYA',
  'KOREA' => 'KOREA',
  'KOREA, SOUTH' => 'KOREA, SOUTH',
  'KUWAIT' => 'KUWAIT',
  'KYRGYZSTAN' => 'KYRGYZSTAN',
  'LAOS' => 'LAOS',
  'LATVIA' => 'LATVIA',
  'LEBANON' => 'LEBANON',
  'LEEWARD ISLANDS' => 'LEEWARD ISLANDS',
  'LESOTHO' => 'LESOTHO',
  'LIBYA' => 'LIBYA',
  'LIECHTENSTEIN' => 'LIECHTENSTEIN',
  'LITHUANIA' => 'LITHUANIA',
  'LUXEMBOURG' => 'LUXEMBOURG',
  'MACAO' => 'MACAO',
  'MACEDONIA' => 'MACEDONIA',
  'MADAGASCAR' => 'MADAGASCAR',
  'MALAWI' => 'MALAWI',
  'MALAYSIA' => 'MALAYSIA',
  'MALDIVES' => 'MALDIVES',
  'MALI' => 'MALI',
  'MALTA' => 'MALTA',
  'MARTINIQUE' => 'MARTINIQUE',
  'MAURITANIA' => 'MAURITANIA',
  'MAURITIUS' => 'MAURITIUS',
  'MELANESIA' => 'MELANESIA',
  'MEXICO' => 'MEXICO',
  'MOLDOVIA' => 'MOLDOVIA',
  'MONACO' => 'MONACO',
  'MONGOLIA' => 'MONGOLIA',
  'MOROCCO' => 'MOROCCO',
  'MOZAMBIQUE' => 'MOZAMBIQUE',
  'MYANAMAR' => 'MYANAMAR',
  'NAMIBIA' => 'NAMIBIA',
  'NEPAL' => 'NEPAL',
  'NETHERLANDS' => 'NETHERLANDS',
  'NETHERLANDS ANTILLES' => 'NETHERLANDS ANTILLES',
  'NETHERLANDS ANTILLES NEUTRAL ZONE' => 'NETHERLANDS ANTILLES NEUTRAL ZONE',
  'NEW CALADONIA' => 'NEW CALADONIA',
  'NEW HEBRIDES' => 'NEW HEBRIDES',
  'NEW ZEALAND' => 'NEW ZEALAND',
  'NICARAGUA' => 'NICARAGUA',
  'NIGER' => 'NIGER',
  'NIGERIA' => 'NIGERIA',
  'NORFOLK ISLAND' => 'NORFOLK ISLAND',
  'NORWAY' => 'NORWAY',
  'OMAN' => 'OMAN',
  'OTHER' => 'OTHER',
  'PACIFIC ISLAND' => 'PACIFIC ISLAND',
  'PAKISTAN' => 'PAKISTAN',
  'PANAMA' => 'PANAMA',
  'PAPUA NEW GUINEA' => 'PAPUA NEW GUINEA',
  'PARAGUAY' => 'PARAGUAY',
  'PERU' => 'PERU',
  'PHILIPPINES' => 'PHILIPPINES',
  'POLAND' => 'POLAND',
  'PORTUGAL' => 'PORTUGAL',
  'PORTUGUESE TIMOR' => 'EAST TIMOR',
  'PUERTO RICO' => 'PUERTO RICO',
  'QATAR' => 'QATAR',
  'REPUBLIC OF BELARUS' => 'REPUBLIC OF BELARUS',
  'REPUBLIC OF SOUTH AFRICA' => 'REPUBLIC OF SOUTH AFRICA',
  'REUNION' => 'REUNION',
  'ROMANIA' => 'ROMANIA',
  'RUSSIA' => 'RUSSIA',
  'RWANDA' => 'RWANDA',
  'RYUKYU ISLANDS' => 'RYUKYU ISLANDS',
  'SABAH' => 'SABAH',
  'SAN MARINO' => 'SAN MARINO',
  'SAUDI ARABIA' => 'SAUDI ARABIA',
  'SENEGAL' => 'SENEGAL',
  'SERBIA' => 'SERBIA',
  'SEYCHELLES' => 'SEYCHELLES',
  'SIERRA LEONE' => 'SIERRA LEONE',
  'SINGAPORE' => 'SINGAPORE',
  'SLOVAKIA' => 'SLOVAKIA',
  'SLOVENIA' => 'SLOVENIA',
  'SOMALILIAND' => 'SOMALILIAND',
  'SOUTH AFRICA' => 'SOUTH AFRICA',
  'SOUTH YEMEN' => 'SOUTH YEMEN',
  'SPAIN' => 'SPAIN',
  'SPANISH SAHARA' => 'SPANISH SAHARA',
  'SRI LANKA' => 'SRI LANKA',
  'ST. KITTS AND NEVIS' => 'ST. KITTS AND NEVIS',
  'ST. LUCIA' => 'ST. LUCIA',
  'SUDAN' => 'SUDAN',
  'SURINAM' => 'SURINAM',
  'SW AFRICA' => 'SW AFRICA',
  'SWAZILAND' => 'SWAZILAND',
  'SWEDEN' => 'SWEDEN',
  'SWITZERLAND' => 'SWITZERLAND',
  'SYRIA' => 'SYRIA',
  'TAIWAN' => 'TAIWAN',
  'TAJIKISTAN' => 'TAJIKISTAN',
  'TANZANIA' => 'TANZANIA',
  'THAILAND' => 'THAILAND',
  'TONGA' => 'TONGA',
  'TRINIDAD' => 'TRINIDAD',
  'TUNISIA' => 'TUNISIA',
  'TURKEY' => 'TURKEY',
  'UGANDA' => 'UGANDA',
  'UKRAINE' => 'UKRAINE',
  'UNITED ARAB EMIRATES' => 'UNITED ARAB EMIRATES',
  'UNITED KINGDOM' => 'UNITED KINGDOM',
  'UPPER VOLTA' => 'UPPER VOLTA',
  'URUGUAY' => 'URUGUAY',
  'US PACIFIC ISLAND' => 'US PACIFIC ISLAND',
  'US VIRGIN ISLANDS' => 'US VIRGIN ISLANDS',
  'USA' => 'USA',
  'UZBEKISTAN' => 'UZBEKISTAN',
  'VANUATU' => 'VANUATU',
  'VATICAN CITY' => 'VATICAN CITY',
  'VENEZUELA' => 'VENEZUELA',
  'VIETNAM' => 'VIETNAM',
  'WAKE ISLAND' => 'WAKE ISLAND',
  'WEST INDIES' => 'WEST INDIES',
  'WESTERN SAHARA' => 'WESTERN SAHARA',
  'YEMEN' => 'YEMEN',
  'ZAIRE' => 'ZAIRE',
  'ZAMBIA' => 'ZAMBIA',
  'ZIMBABWE' => 'ZIMBABWE',
);
$GLOBALS['app_list_strings']['state_list']=array (
  'PAKISTAN_KARACHI' => 'KARACHI',
  'INDIA_GOA' => 'GOA',
  'INDIA_MAHARASHTRA' => 'MAHARASHTRA',
  'PAKISTAN_LAHORE' => 'LAHORE',
  'INDIA_KARNATAKA' => 'KARNATAKA',
  'INDIA_TAMILNADU' => 'TAMILNADU',
  'INDIA_GUJRAT' => 'GUJRAT',
  'INDIA_ASSAM' => 'ASSAM',
  'INDIA_DELHI' => 'DELHI',
  'INDIA_RAJASTAN' => 'RAJASTAN',
  'INDIA_KERALA' => 'KERALA',
);

$GLOBALS['app_list_strings']['cities_list']=array (
  '' => '',
  'INDIA_MAHARASHTRA_NAGPUR' => 'NAGPUR',
  'INDIA_MAHARASHTRA_KATOL' => 'KATOL',
  'INDIA_GOA_GOA' => 'GOA',
  'INDIA_MAHARASHTRA_BHANDARA' => 'BHANDARA',
  'INDIA_MAHARASHTRA_GONDIA' => 'GONDIA',
);


$new_country_cstm_array=array(
   ''=>'',
);
$db = DBManagerFactory::getInstance(); 
$result=$db->query("select country_key,country_name from country_cstm");
while($row=$db->fetchRow($result)){$new_country_cstm_array[$row['country_key']] = $row['country_name'];}
$GLOBALS['app_list_strings']['country_cstm_list']=$new_country_cstm_array; 


$new_state_cstm_array=array(
   ''=>'',
);
$db = DBManagerFactory::getInstance(); 
$result=$db->query("select state_key,state_name from country_cstm");
while($row=$db->fetchRow($result)){$new_state_cstm_array[$row['state_key']] = $row['state_name'];}
$GLOBALS['app_list_strings']['state_cstm_list']=$new_state_cstm_array; 