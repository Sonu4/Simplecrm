<?php
$module_name = 'shubh_Bookstore';
$listViewDefs [$module_name] = 
array (
  'BOOKSTORE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKSTORE',
    'width' => '10%',
    'default' => true,
  ),
  'BOOKAUTHER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKAUTHER',
    'width' => '10%',
    'default' => true,
  ),
  'PUBLISHINGDATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PUBLISHINGDATE',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'BOOKCOVER' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_BOOKCOVER',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
);
?>
