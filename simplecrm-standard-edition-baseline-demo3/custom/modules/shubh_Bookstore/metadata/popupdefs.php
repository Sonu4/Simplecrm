<?php
$popupMeta = array (
    'moduleMain' => 'shubh_Bookstore',
    'varName' => 'shubh_Bookstore',
    'orderBy' => 'shubh_bookstore.name',
    'whereClauses' => array (
  'name' => 'shubh_bookstore.name',
  'bookstore' => 'shubh_bookstore.bookstore',
  'bookauther' => 'shubh_bookstore.bookauther',
  'date_entered' => 'shubh_bookstore.date_entered',
  'bookcover' => 'shubh_bookstore.bookcover',
  'assigned_user_id' => 'shubh_bookstore.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'bookstore',
  5 => 'bookauther',
  6 => 'date_entered',
  7 => 'bookcover',
  8 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'bookstore' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKSTORE',
    'width' => '10%',
    'name' => 'bookstore',
  ),
  'bookauther' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKAUTHER',
    'width' => '10%',
    'name' => 'bookauther',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
  'bookcover' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_BOOKCOVER',
    'name' => 'bookcover',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'BOOKSTORE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKSTORE',
    'width' => '10%',
    'default' => true,
    'name' => 'bookstore',
  ),
  'BOOKAUTHER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKAUTHER',
    'width' => '10%',
    'default' => true,
    'name' => 'bookauther',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'PUBLISHING_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_PUBLISHING_DATE',
    'width' => '10%',
    'name' => 'publishing_date_c',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'BOOKCOVER' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_BOOKCOVER',
    'default' => true,
    'name' => 'bookcover',
  ),
),
);
