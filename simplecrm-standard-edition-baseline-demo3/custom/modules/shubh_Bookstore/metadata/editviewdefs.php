<?php
$module_name = 'shubh_Bookstore';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'bookstore',
            'label' => 'LBL_BOOKSTORE',
          ),
          1 => 
          array (
            'name' => 'bookauther',
            'label' => 'LBL_BOOKAUTHER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'publishing_date_c',
            'label' => 'LBL_PUBLISHING_DATE',
          ),
          1 => 
          array (
            'name' => 'shubh_bookstore_accounts_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'bookcover',
            'studio' => 'visible',
            'label' => 'LBL_BOOKCOVER',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'country_c',
            'studio' => 'visible',
            'label' => 'LBL_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'states_c',
            'studio' => 'visible',
            'label' => 'LBL_STATES',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cities_c',
            'studio' => 'visible',
            'label' => 'LBL_CITIES',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
