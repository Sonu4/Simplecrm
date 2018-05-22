<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_resolution_time_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_resolution_time_c']['labelValue']='Was your issue resolved the first time you reported it?';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_description_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_description_c']['labelValue']='Remarks/Comments';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_recommend_friend_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_recommend_friend_c']['labelValue']='Overall service rating';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feeback_service_rating_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feeback_service_rating_c']['labelValue']='How would you rate your overall satisfaction with SimpleCRM Support?';

 

// created: 2017-09-14 13:42:12
$dictionary["scrm_Feedback"]["fields"]["cases_scrm_feedback_1"] = array (
  'name' => 'cases_scrm_feedback_1',
  'type' => 'link',
  'relationship' => 'cases_scrm_feedback_1',
  'source' => 'non-db',
  'module' => 'Cases',
  'bean_name' => 'Case',
  'vname' => 'LBL_CASES_SCRM_FEEDBACK_1_FROM_CASES_TITLE',
  'id_name' => 'cases_scrm_feedback_1cases_ida',
);
$dictionary["scrm_Feedback"]["fields"]["cases_scrm_feedback_1_name"] = array (
  'name' => 'cases_scrm_feedback_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CASES_SCRM_FEEDBACK_1_FROM_CASES_TITLE',
  'save' => true,
  'id_name' => 'cases_scrm_feedback_1cases_ida',
  'link' => 'cases_scrm_feedback_1',
  'table' => 'cases',
  'module' => 'Cases',
  'rname' => 'name',
);
$dictionary["scrm_Feedback"]["fields"]["cases_scrm_feedback_1cases_ida"] = array (
  'name' => 'cases_scrm_feedback_1cases_ida',
  'type' => 'link',
  'relationship' => 'cases_scrm_feedback_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CASES_SCRM_FEEDBACK_1_FROM_SCRM_FEEDBACK_TITLE',
);


 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_date_entered_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_date_entered_c']['labelValue']='Date Entered';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_on_website_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_on_website_c']['labelValue']='Will you allow us to use these remarks as testimonial on our website and in print?';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_resolution_result_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_resolution_result_c']['labelValue']='Were you able to understand the tech support engineer clearly?';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_explaination_time_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_explaination_time_c']['labelValue']='Was the engineer able to clearly articulate the troubleshooting steps on the call?';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feedback_recommendation_time_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feedback_recommendation_time_c']['labelValue']='Will you recommend our service to your contacts?';

 

 // created: 2017-09-14 13:40:07
$dictionary['scrm_Feedback']['fields']['feeback_case_id_c']['inline_edit']='';
$dictionary['scrm_Feedback']['fields']['feeback_case_id_c']['labelValue']='feeback case id';

 
?>