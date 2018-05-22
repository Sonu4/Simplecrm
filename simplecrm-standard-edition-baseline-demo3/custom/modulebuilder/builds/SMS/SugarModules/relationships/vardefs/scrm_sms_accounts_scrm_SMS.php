<?php
// created: 2016-08-30 16:39:36
$dictionary["scrm_SMS"]["fields"]["scrm_sms_accounts"] = array (
  'name' => 'scrm_sms_accounts',
  'type' => 'link',
  'relationship' => 'scrm_sms_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_SCRM_SMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'scrm_sms_accountsaccounts_ida',
);
$dictionary["scrm_SMS"]["fields"]["scrm_sms_accounts_name"] = array (
  'name' => 'scrm_sms_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SCRM_SMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'scrm_sms_accountsaccounts_ida',
  'link' => 'scrm_sms_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["scrm_SMS"]["fields"]["scrm_sms_accountsaccounts_ida"] = array (
  'name' => 'scrm_sms_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'scrm_sms_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SCRM_SMS_ACCOUNTS_FROM_SCRM_SMS_TITLE',
);
