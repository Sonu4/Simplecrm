<?php
$module_name = 'scrm_Feedback';
$OBJECT_NAME = 'SCRM_FEEDBACK';
$listViewDefs [$module_name] = 
array (
  'FEEDBACK_DATE_ENTERED_C' => 
  array (
    'type' => 'varchar',
    'link' => true,
    'default' => true,
    'label' => 'LBL_FEEDBACK_DATE_ENTERED',
    'width' => '10%',
  ),
  'FEEDBACK_RECOMMEND_FRIEND_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_FEEDBACK_RECOMMEND_FRIEND',
    'width' => '10%',
  ),
  'CASES_SCRM_FEEDBACK_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CASES_SCRM_FEEDBACK_1_FROM_CASES_TITLE',
    'id' => 'CASES_SCRM_FEEDBACK_1CASES_IDA',
    'width' => '10%',
    'default' => true,
  ),
);
?>
