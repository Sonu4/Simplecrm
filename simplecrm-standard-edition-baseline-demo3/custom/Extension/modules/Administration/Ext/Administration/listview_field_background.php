<?php
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
    ?>
