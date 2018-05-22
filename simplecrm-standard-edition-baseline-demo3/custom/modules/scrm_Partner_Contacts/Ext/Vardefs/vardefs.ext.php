<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2017-09-14 13:35:04
$dictionary['scrm_Partner_Contacts']['fields']['portal_password_c']['inline_edit']='';
$dictionary['scrm_Partner_Contacts']['fields']['portal_password_c']['labelValue']='Portal Password';

 

 // created: 2017-09-14 13:35:04
$dictionary['scrm_Partner_Contacts']['fields']['portal_active_c']['inline_edit']='';
$dictionary['scrm_Partner_Contacts']['fields']['portal_active_c']['labelValue']='Portal Active';

 

 // created: 2017-09-14 13:35:04
$dictionary['scrm_Partner_Contacts']['fields']['portal_username_c']['inline_edit']='';
$dictionary['scrm_Partner_Contacts']['fields']['portal_username_c']['labelValue']='Portal Username';

 

// created: 2016-06-08 11:02:55
$dictionary["scrm_Partner_Contacts"]["fields"]["scrm_partners_scrm_partner_contacts_1"] = array (
  'name' => 'scrm_partners_scrm_partner_contacts_1',
  'type' => 'link',
  'relationship' => 'scrm_partners_scrm_partner_contacts_1',
  'source' => 'non-db',
  'module' => 'scrm_Partners',
  'bean_name' => 'scrm_Partners',
  'vname' => 'LBL_SCRM_PARTNERS_SCRM_PARTNER_CONTACTS_1_FROM_SCRM_PARTNERS_TITLE',
  'id_name' => 'scrm_partners_scrm_partner_contacts_1scrm_partners_ida',
);
$dictionary["scrm_Partner_Contacts"]["fields"]["scrm_partners_scrm_partner_contacts_1_name"] = array (
  'name' => 'scrm_partners_scrm_partner_contacts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SCRM_PARTNERS_SCRM_PARTNER_CONTACTS_1_FROM_SCRM_PARTNERS_TITLE',
  'save' => true,
  'id_name' => 'scrm_partners_scrm_partner_contacts_1scrm_partners_ida',
  'link' => 'scrm_partners_scrm_partner_contacts_1',
  'table' => 'scrm_partners',
  'module' => 'scrm_Partners',
  'rname' => 'name',
);
$dictionary["scrm_Partner_Contacts"]["fields"]["scrm_partners_scrm_partner_contacts_1scrm_partners_ida"] = array (
  'name' => 'scrm_partners_scrm_partner_contacts_1scrm_partners_ida',
  'type' => 'link',
  'relationship' => 'scrm_partners_scrm_partner_contacts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SCRM_PARTNERS_SCRM_PARTNER_CONTACTS_1_FROM_SCRM_PARTNER_CONTACTS_TITLE',
);


// created: 2017-09-14 13:26:02
$dictionary["scrm_Partner_Contacts"]["fields"]["scrm_partner_contacts_leads"] = array (
  'name' => 'scrm_partner_contacts_leads',
  'type' => 'link',
  'relationship' => 'scrm_partner_contacts_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'side' => 'right',
  'vname' => 'LBL_SCRM_PARTNER_CONTACTS_LEADS_FROM_LEADS_TITLE',
);

?>