<?php
// created: 2018-06-22 16:31:47
$dictionary["FP_events"]["fields"]["e_employee_fp_events"] = array (
  'name' => 'e_employee_fp_events',
  'type' => 'link',
  'relationship' => 'e_employee_fp_events',
  'source' => 'non-db',
  'module' => 'E_Employee',
  'bean_name' => false,
  'vname' => 'LBL_E_EMPLOYEE_FP_EVENTS_FROM_E_EMPLOYEE_TITLE',
  'id_name' => 'e_employee_fp_eventse_employee_ida',
);
$dictionary["FP_events"]["fields"]["e_employee_fp_events_name"] = array (
  'name' => 'e_employee_fp_events_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_E_EMPLOYEE_FP_EVENTS_FROM_E_EMPLOYEE_TITLE',
  'save' => true,
  'id_name' => 'e_employee_fp_eventse_employee_ida',
  'link' => 'e_employee_fp_events',
  'table' => 'e_employee',
  'module' => 'E_Employee',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["FP_events"]["fields"]["e_employee_fp_eventse_employee_ida"] = array (
  'name' => 'e_employee_fp_eventse_employee_ida',
  'type' => 'link',
  'relationship' => 'e_employee_fp_events',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_E_EMPLOYEE_FP_EVENTS_FROM_FP_EVENTS_TITLE',
);
