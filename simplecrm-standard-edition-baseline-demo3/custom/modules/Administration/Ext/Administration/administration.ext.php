<?php 
 //WARNING: The contents of this file are auto-generated

 
/**
 * Asterisk SugarCRM Integration 
 * (c) KINAMU Business Solutions AG 2009
 * 
 * Parts of this code are (c) 2006. RustyBrick, Inc.  http://www.rustybrick.com/
 * Parts of this code are (c) 2008 vertico software GmbH  
 * Parts of this code are (c) 2009 abcona e. K. Angelo Malaguarnera E-Mail admin@abcona.de
 * http://www.sugarforge.org/projects/yaai/
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact KINAMU Business Solutions AG at office@kinamu.com
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 */

$admin_option_defs=array();
$admin_option_defs['Administration']['asterisk_configurator']= array($image_path . 'Calls','LBL_MANAGE_ASTERISK','LBL_ASTERISK','./index.php?module=Configurator&action=asterisk_configurator');
$admin_group_header[]=array('LBL_ASTERISK_TITLE','',false,$admin_option_defs, 'LBL_ASTERISK_DESC');




/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

    $admin_option_defs = array();
    $admin_option_defs['Administration']['listview_field_background'] = array(
        //Icon name. Available icons are located in ./themes/default/images
        'Administration',
        
        //Link name label 
        'LBL_LISTVIEW_FIELD_BACKGROUND_LINK_NAME',
        
        //Link description label
        'LBL_LISTVIEW_FIELD_BACKGROUND_LINK_DESCRIPTION',
        
        //Link URL
        './index.php?module=lb_set_field_background&action=field_background',
    );

    $admin_group_header[] = array(
        //Section header label
        'LBL_LISTVIEW_FIELD_BACKGROUND_SECTION_HEADER',
        
        //$other_text parameter for get_form_header()
        '',
        
        //$show_help parameter for get_form_header()
        false,
        
        //Section links
        $admin_option_defs, 
        
        //Section description label
        'LBL_LISTVIEW_FIELD_BACKGROUND_SECTION_DESCRIPTION'
    );
    

 
    /**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

        /************************************************************
        Facebook configuration file
        Author     : Nitheesh.R <nitheesh@simplecrm.com.sg>
        Date       : Feb-12-2017
        PHP version : 5.6
        ************************************************************/

        require_once('config.php');
        // initialize a temp array that will hold the options we want to create
        $links = array();
        global $sugar_config;
        // add button1 to $links
        $links['Administration']['config_facebook_settings'] = array(
         
            // pick an image from /themes/Sugar5/images
            // and drop the file extension
            'face3',
         
            // title of the link 
            'Click to Configure Facebook',
         
            // description for the link
            'Here you can configure settings for Facebook.',
         
            // where to send the user when the link is clicked
            './index.php?module=Administration&action=configureFacebookSettings',
         
        );
         

        // add our new admin section to the main admin_group_header array
        $admin_group_header []= array(
         
            // The title for the group of links
            '<b>Facebook Configuration</b>', 
         
            // leave empty, it's used for something in /include/utils/layout_utils.php 
            // in the get_module_title() function
            '', 
         
            // set to false, it's used for something in /include/utils/layout_utils.php 
            // in the get_module_title() function
            false, 
         
            // the array of links that you created above
            // to be placed in this section
            $links, 
         
            // a description for what this section is about
            'Configure Facebook Settings'
         
        );



 
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */


        /************************************************************
        Twitter configuration file
        Author     : Nitheesh.R <nitheesh@simplecrm.com.sg>
        Date       : Feb-12-2017
        PHP version : 5.6
        ************************************************************/

        require_once('config.php');
        // initialize a temp array that will hold the options we want to create
        $links = array();
        global $sugar_config;
        // add button1 to $links
        $links['Administration']['config_twitter_settings'] = array(
         
            // pick an image from /themes/Sugar5/images
            // and drop the file extension
            'twit3',
         
            // title of the link 
            'Click to Configure Twitter',
         
            // description for the link
            'Here you can configure settings for Twitter.',
         
            // where to send the user when the link is clicked
            './index.php?module=Administration&action=configureTwitterSettings',
         
        );
         

        // add our new admin section to the main admin_group_header array
        $admin_group_header []= array(
         
            // The title for the group of links
            '<b>Configure Twitter Settings</b>', 
         
            // leave empty, it's used for something in /include/utils/layout_utils.php 
            // in the get_module_title() function
            '', 
         
            // set to false, it's used for something in /include/utils/layout_utils.php 
            // in the get_module_title() function
            false, 
         
            // the array of links that you created above
            // to be placed in this section
            $links, 
         
            // a description for what this section is about
            'Configure Twitter Settings'
         
        );





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