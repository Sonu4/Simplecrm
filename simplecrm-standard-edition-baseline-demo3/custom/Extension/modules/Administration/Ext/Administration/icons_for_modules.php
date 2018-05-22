<?php

    $admin_option_defs = array();
    $admin_option_defs['Administration']['custom_icons_for_modules'] = array(
        //Icon name. Available icons are located in ./themes/default/images
        'Administration',
        
        //Link name label 
        'LBL_ICON_PICKER_LINK_NAME',
        
        //Link description label
        'LBL_ICON_PICKER_LINK_DESCRIPTION',
        
        //Link URL
        './index.php?module=Administration&action=list_view_all_modules',
    );

    $admin_group_header[] = array(
        //Section header label
        'LBL_ICON_PICKER_SECTION_HEADER',
        
        //$other_text parameter for get_form_header()
        '',
        
        //$show_help parameter for get_form_header()
        false,
        
        //Section links
        $admin_option_defs, 
        
        //Section description label
        'LBL_ICON_PICKER_SECTION_DESCRIPTION'
    );
    ?>
