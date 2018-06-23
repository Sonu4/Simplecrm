<?php
 // created: 2018-06-23 09:45:36
$layout_defs["FP_events"]["subpanel_setup"]['fp_events_e_employee_1'] = array (
  'order' => 100,
  'module' => 'E_Employee',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENTS_E_EMPLOYEE_1_FROM_E_EMPLOYEE_TITLE',
  'get_subpanel_data' => 'fp_events_e_employee_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
