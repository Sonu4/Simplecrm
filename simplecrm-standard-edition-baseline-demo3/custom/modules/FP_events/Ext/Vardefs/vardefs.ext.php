<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2018-06-23 09:45:36
$dictionary["FP_events"]["fields"]["fp_events_e_employee_1"] = array (
  'name' => 'fp_events_e_employee_1',
  'type' => 'link',
  'relationship' => 'fp_events_e_employee_1',
  'source' => 'non-db',
  'module' => 'E_Employee',
  'bean_name' => 'E_Employee',
  'vname' => 'LBL_FP_EVENTS_E_EMPLOYEE_1_FROM_E_EMPLOYEE_TITLE',
);


// created: 2018-06-21 19:09:20
$dictionary["FP_events"]["fields"]["fp_events_prospects_2"] = array (
  'name' => 'fp_events_prospects_2',
  'type' => 'link',
  'relationship' => 'fp_events_prospects_2',
  'source' => 'non-db',
  'module' => 'Prospects',
  'bean_name' => 'Prospect',
  'vname' => 'LBL_FP_EVENTS_PROSPECTS_2_FROM_PROSPECTS_TITLE',
);


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


// created: 2018-06-22 14:04:34
$dictionary["FP_events"]["fields"]["fp_events_accounts_1"] = array (
  'name' => 'fp_events_accounts_1',
  'type' => 'link',
  'relationship' => 'fp_events_accounts_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_FP_EVENTS_ACCOUNTS_1_FROM_ACCOUNTS_TITLE',
);

?>