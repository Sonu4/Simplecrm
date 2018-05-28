<?php
// created: 2018-05-14 11:01:18
$dictionary["shubh_bookstore_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'shubh_bookstore_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'shubh_Bookstore',
      'rhs_table' => 'shubh_bookstore',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'shubh_bookstore_accounts_c',
      'join_key_lhs' => 'shubh_bookstore_accountsaccounts_ida',
      'join_key_rhs' => 'shubh_bookstore_accountsshubh_bookstore_idb',
    ),
  ),
  'table' => 'shubh_bookstore_accounts_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'shubh_bookstore_accountsaccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'shubh_bookstore_accountsshubh_bookstore_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'shubh_bookstore_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'shubh_bookstore_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'shubh_bookstore_accountsaccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'shubh_bookstore_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'shubh_bookstore_accountsshubh_bookstore_idb',
      ),
    ),
  ),
);