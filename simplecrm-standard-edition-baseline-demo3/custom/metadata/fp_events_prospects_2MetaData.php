<?php
// created: 2018-06-21 19:09:20
$dictionary["fp_events_prospects_2"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fp_events_prospects_2' => 
    array (
      'lhs_module' => 'FP_events',
      'lhs_table' => 'fp_events',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fp_events_prospects_2_c',
      'join_key_lhs' => 'fp_events_prospects_2fp_events_ida',
      'join_key_rhs' => 'fp_events_prospects_2prospects_idb',
    ),
  ),
  'table' => 'fp_events_prospects_2_c',
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
      'name' => 'fp_events_prospects_2fp_events_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fp_events_prospects_2prospects_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fp_events_prospects_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fp_events_prospects_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fp_events_prospects_2fp_events_ida',
        1 => 'fp_events_prospects_2prospects_idb',
      ),
    ),
  ),
);