<?php
 // created: 2018-06-21 19:09:20
$layout_defs["FP_events"]["subpanel_setup"]['fp_events_prospects_2'] = array (
  'order' => 100,
  'module' => 'Prospects',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENTS_PROSPECTS_2_FROM_PROSPECTS_TITLE',
  'get_subpanel_data' => 'fp_events_prospects_2',
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
