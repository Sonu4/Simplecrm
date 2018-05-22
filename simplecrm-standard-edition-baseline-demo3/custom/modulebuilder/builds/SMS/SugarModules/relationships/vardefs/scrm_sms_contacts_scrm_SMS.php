<?php
// created: 2016-08-30 16:39:36
$dictionary["scrm_SMS"]["fields"]["scrm_sms_contacts"] = array (
  'name' => 'scrm_sms_contacts',
  'type' => 'link',
  'relationship' => 'scrm_sms_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_SCRM_SMS_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'scrm_sms_contactscontacts_ida',
);
$dictionary["scrm_SMS"]["fields"]["scrm_sms_contacts_name"] = array (
  'name' => 'scrm_sms_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SCRM_SMS_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'scrm_sms_contactscontacts_ida',
  'link' => 'scrm_sms_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["scrm_SMS"]["fields"]["scrm_sms_contactscontacts_ida"] = array (
  'name' => 'scrm_sms_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'scrm_sms_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SCRM_SMS_CONTACTS_FROM_SCRM_SMS_TITLE',
);
