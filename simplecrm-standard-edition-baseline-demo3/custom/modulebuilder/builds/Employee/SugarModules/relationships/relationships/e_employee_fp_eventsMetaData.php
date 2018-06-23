<?php
// created: 2018-06-22 16:31:47
$dictionary["e_employee_fp_events"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'e_employee_fp_events' => 
    array (
      'lhs_module' => 'E_Employee',
      'lhs_table' => 'e_employee',
      'lhs_key' => 'id',
      'rhs_module' => 'FP_events',
      'rhs_table' => 'fp_events',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'e_employee_fp_events_c',
      'join_key_lhs' => 'e_employee_fp_eventse_employee_ida',
      'join_key_rhs' => 'e_employee_fp_eventsfp_events_idb',
    ),
  ),
  'table' => 'e_employee_fp_events_c',
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
      'name' => 'e_employee_fp_eventse_employee_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'e_employee_fp_eventsfp_events_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'e_employee_fp_eventsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'e_employee_fp_events_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'e_employee_fp_eventse_employee_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'e_employee_fp_events_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'e_employee_fp_eventsfp_events_idb',
      ),
    ),
  ),
);