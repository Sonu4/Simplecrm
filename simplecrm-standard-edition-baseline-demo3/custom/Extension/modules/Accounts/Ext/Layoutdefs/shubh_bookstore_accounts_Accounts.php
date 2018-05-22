<?php
 // created: 2018-05-14 11:01:18
$layout_defs["Accounts"]["subpanel_setup"]['shubh_bookstore_accounts'] = array (
  'order' => 100,
  'module' => 'shubh_Bookstore',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_SHUBH_BOOKSTORE_TITLE',
  'get_subpanel_data' => 'shubh_bookstore_accounts',
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
