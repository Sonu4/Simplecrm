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


 if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('SF_Sales_Forecast', 'edit', true)){
    $module_menu[]=array('index.php?module=SF_Sales_Forecast&action=EditView&return_module=SF_Sales_Forecast&return_action=DetailView', $mod_strings['LNK_NEW_RECORD'], 'Add', 'SF_Sales_Forecast');
}
if(ACLController::checkAccess('SF_Sales_Forecast', 'list', true)){
    $module_menu[]=array('index.php?module=SF_Sales_Forecast&action=index&return_module=SF_Sales_Forecast&return_action=DetailView', $mod_strings['LNK_LIST'],'View', 'SF_Sales_Forecast');
}
if(ACLController::checkAccess('SF_Sales_Forecast', 'import', true)){
    $module_menu[]=array('index.php?module=Import&action=Step1&import_module=SF_Sales_Forecast&return_module=SF_Sales_Forecast&return_action=index', $app_strings['LBL_IMPORT'], 'Import', 'SF_Sales_Forecast');
}
