<?php
$module_name = 'scrm_Feedback';
$_object_name = 'scrm_feedback';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'form' => 
      array (
      ),
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
          0 => 
          array (
            'name' => 'feeback_service_rating_c',
            'label' => 'LBL_FEEBACK_SERVICE_RATING',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'feedback_resolution_time_c',
            'label' => 'LBL_FEEDBACK_RESOLUTION_TIME',
          ),
          1 => 
          array (
            'name' => 'feedback_date_entered_c',
            'label' => 'LBL_FEEDBACK_DATE_ENTERED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'feedback_explaination_time_c',
            'label' => 'LBL_FEEDBACK_EXPLAINATION_TIME',
          ),
          1 => 
          array (
            'name' => 'feedback_recommend_friend_c',
            'label' => 'LBL_FEEDBACK_RECOMMEND_FRIEND',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'feedback_recommendation_time_c',
            'label' => 'LBL_FEEDBACK_RECOMMENDATION_TIME',
          ),
          1 => 
          array (
            'name' => 'cases_scrm_feedback_1_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'feedback_resolution_result_c',
            'label' => 'LBL_FEEDBACK_RESOLUTION_RESULT',
          ),
          1 => 'assigned_user_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'feedback_on_website_c',
            'label' => 'LBL_FEEDBACK_ON_WEBSITE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'feedback_description_c',
            'label' => 'LBL_FEEDBACK_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'cases_scrm_feedback_1_name',
          ),
        ),
      ),
    ),
  ),
);
?>
