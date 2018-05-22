<?php
$popupMeta = array (
    'moduleMain' => 'SecurityGroup',
    'varName' => 'SecurityGroups',
    'orderBy' => 'securitygroups.name',
    'whereClauses' => array (
  'name' => 'securitygroups.name',
),
    'searchInputs' => array (
  0 => 'name',
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'NONINHERITABLE' => 
  array (
    'width' => '9%',
    'label' => 'LBL_NONINHERITABLE',
    'default' => true,
    'name' => 'noninheritable',
  ),
),
);
