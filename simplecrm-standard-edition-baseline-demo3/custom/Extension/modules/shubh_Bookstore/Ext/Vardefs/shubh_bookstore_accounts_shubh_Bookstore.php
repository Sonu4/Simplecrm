<?php
// created: 2018-05-14 11:01:18
$dictionary["shubh_Bookstore"]["fields"]["shubh_bookstore_accounts"] = array (
  'name' => 'shubh_bookstore_accounts',
  'type' => 'link',
  'relationship' => 'shubh_bookstore_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'shubh_bookstore_accountsaccounts_ida',
);
$dictionary["shubh_Bookstore"]["fields"]["shubh_bookstore_accounts_name"] = array (
  'name' => 'shubh_bookstore_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'shubh_bookstore_accountsaccounts_ida',
  'link' => 'shubh_bookstore_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["shubh_Bookstore"]["fields"]["shubh_bookstore_accountsaccounts_ida"] = array (
  'name' => 'shubh_bookstore_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'shubh_bookstore_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_SHUBH_BOOKSTORE_TITLE',
);
