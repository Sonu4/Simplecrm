<?php
// created: 2018-05-17 11:28:06
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => NULL,
  ),
  'bookstore' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BOOKSTORE',
    'width' => '10%',
    'default' => true,
    'link' => true,
  ),
  'bookauther' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BOOKAUTHER',
    'width' => '10%',
    'default' => true,
  ),
  'bookcover' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '10%',
    'vname' => 'LBL_BOOKCOVER',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'assigned_user_id',
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'shubh_Bookstore',
    'width' => '5%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'shubh_Bookstore',
    'width' => '4%',
    'default' => true,
  ),
);