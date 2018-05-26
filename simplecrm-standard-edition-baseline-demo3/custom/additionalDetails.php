<?php

function additionalDetailsshubh_Bookstore($fields) {
    static $mod_strings;
    if(empty($mod_strings)) {
        global $current_language;
        $mod_strings = return_module_language($current_language, 'shubh_Bookstore');
    }

    $overlib_string = '';

    if(!empty($fields['NAME']))
        $overlib_string .= '<b>'. $mod_strings['LBL_NAME'] . '</b> ' . $fields['NAME'] .' <br>';

    if(!empty($fields['BOOKSTORE']))
        $overlib_string .= '<b>'. $mod_strings['LBL_BOOKSTORE'] . '</b> ' . $fields['BOOKSTORE'] .' <br>';

     if(!empty($fields['BOOKAUTHER']))
        $overlib_string .= '<b>'. $mod_strings['LBL_BOOKAUTHER'] . '</b> ' . $fields['BOOKAUTHER'] .' <br>';

     
    
                             
    //Add whatever info you want to show up to $overlib_string

    $editLink = "index.php?action=EditView&module={MODULENAME}&record={$fields['ID']}";
    $viewLink = "index.php?action=DetailView&module={MODULENAME}&record={$fields['ID']}";

       

    return array(
        'fieldToAddTo' => 'NAME','BOOKSTORE','BOOKAUTHER','PUBLISHING_DATE','COUNTRYS','STATES','CITIES', 
        'string' => $overlib_string,
        'editLink' => $editLink,
        'viewLink' => $viewLink  
    );
}   

