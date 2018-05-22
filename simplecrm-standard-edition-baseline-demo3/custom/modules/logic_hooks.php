<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_ui_footer'] = Array(); 
$hook_array['after_ui_footer'][] = Array(10, 'popup_onload', 'modules/SecurityGroups/AssignGroups.php','AssignGroups', 'popup_onload'); 
$hook_array['after_ui_frame'] = Array(); 
//$hook_array['after_ui_frame'][] = Array(20, 'mass_assign', 'modules/SecurityGroups/AssignGroups.php','AssignGroups', 'mass_assign'); 

// Hooks Created by Shubham

$hook_array['before_save'][] = Array(1, 'Determine png File', 'custom/modules/shubh_Bookstore/bHook/book_hook.php','pngClass', 'pngMethod'); 



$hook_array['after_ui_frame'][] = Array(1, 'Load Social JS', 'custom/include/social/hooks.php','hooks', 'load_js'); 
$hook_array['after_ui_frame'][] = Array(11, 'Adds asterisk related javascript to page to enable Click To Dial/Logging', 'custom/modules/Asterisk/include/AsteriskJS.php','AsteriskJS', 'echoJavaScript'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(30, 'popup_select', 'modules/SecurityGroups/AssignGroups.php','AssignGroups', 'popup_select'); 
$hook_array['after_save'][] = Array(1, 'AOD Index Changes', 'modules/AOD_Index/AOD_LogicHooks.php','AOD_LogicHooks', 'saveModuleChanges'); 
$hook_array['after_delete'] = Array(); 
$hook_array['after_delete'][] = Array(1, 'AOD Index changes', 'modules/AOD_Index/AOD_LogicHooks.php','AOD_LogicHooks', 'saveModuleDelete'); 
$hook_array['after_restore'] = Array(); 
$hook_array['after_restore'][] = Array(1, 'AOD Index changes', 'modules/AOD_Index/AOD_LogicHooks.php','AOD_LogicHooks', 'saveModuleRestore'); 



?>
