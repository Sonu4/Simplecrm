<?php

if (!defined('sugarEntry'))
    define('sugarEntry', true);
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

require_once('include/entryPoint.php');
require_once('config.php');
include('include/language/en_us.lang.php');
include('custom/include/language/en_us.lang.php');

global $db, $sugar_config, $mod_strings, $app_strings, $app_list_strings;


$exp_arr = explode(",", $_POST['stuff']);
foreach ($exp_arr as $val) {
    $exp_arr1 = explode(":", $val);
    $data[$exp_arr1[0]] = $exp_arr1[1];
}

$bean = BeanFactory::getBean($data['module']);
$field_defs[$data['module']] = $bean->getFieldDefinitions();
$bean = $bean->retrieve($data['record']);
$not_show = array('id', 'id_c', 'created_by', 'assigned_user_id', 'modified_user_id', 'deleted');

$flip_side['scrm_Card_Tracking_Module'] = array('emboss_name_c','application_id_c','batch_id_c','delivery_method_c','category_c');
$flip_side['scrm_Debit_Card_Application'] = array('name_on_card_c','customer_category_c','collection_branch_c','fee_template_c','cif_c');
$flip_side['Opportunities'] = array('name','sales_stage','products_c','date_closed','next_step');
$flip_side['AOS_Products'] = array('name','type','cost','description');
$flip_side['Offer_Offers'] = array('name','categories_c','description');
$flip_side['Cases'] = array('name','case_number','type1_c','sub_type_c','type','priority','source_c');
$flip_side['Calls'] = array('name','date_start','direction','description');
$flip_side['Meetings'] = array('name','date_start','direction','description');
$flip_side['Tasks'] = array('name','date_start','direction','description');
$flip_side['Notes'] = array('name','date_start','direction','description');

  $i=0;
foreach ($bean->fetched_row as $fkey => $fvalue) {

        if (!empty($field_defs[$data['module']][$fkey]['options'])) {
            if (count($app_list_strings[$field_defs[$data['module']][$fkey]['options']]) >= 1) {
                $dp_element = $app_list_strings[$field_defs[$data['module']][$fkey]['options']];
            } else {
                $dp_element = $GLOBALS['app_list_strings'][$field_defs[$data['module']][$fkey]['options']];
            }
        }

        
    if(in_array($field_defs[$data['module']][$fkey]['name'],$flip_side[$data['module']])) {
       
        $full_label = $field_defs[$data['module']][$fkey]['vname'];
        
        $get_label = translate($full_label, $data['module']);
        if(is_array($get_label)) $get_label = str_replace(":","",$full_label);
        
        if (!empty($get_label)) {
          $cond = ($i%2 == 0)?'<div class="row col-sm-12">':'';
            echo $cond;
            echo '<div class="col-sm-6 row_box">
                    <div class="flip-field">' . $get_label . '</div>';
            if ($fvalue == '') {
                echo '<div class="flip-value">&nbsp;</div>';
            } else {
                if(!empty($dp_element)){
                     
                    echo '<div class="flip-value">' . htmlspecialchars_decode($dp_element[$fvalue]) . '</div>';
                     if($dp_element[$fvalue]=="")
                     {   
                    echo ($field_defs[$data['module']][$fkey]['type'] == 'currency')?"Rs. ".(number_format($fvalue)):$fvalue;
                     }
                }else{
                    echo '<div class="flip-value">' . htmlspecialchars_decode($fvalue). '</div>';
                }
                
            }
            
            echo '</div>';
             $cond2 = ($i%2 != 0)?'</div>':'';
             echo $cond2;
            $i++;
        }
    }
    unset($dp_element);
}
echo '
	<div class="col-sm-12 row_box">
	
	<a onclick="$(\'#customer_360_popup\').modal(\'hide\');" class="pull-right" href="index.php?action=ajaxui#ajaxUILoc=index.php%3Faction%3DDetailView%26module%3D' . $data['module'] . '%26record%3D' . $data['record'] . '">More </a>
	</div>
	';

function setCurrentTimeDate($dbDate){
    $localDate = date("d-m-Y h:ia",  strtotime($dbDate ."+330 minutes"));
    
    return $localDate;
}

function checkType($type,$value){
    switch ($type){
        case 'currency':
             $result = number_format($value,2);   
            break;
        case 'datetime':
            $result = setCurrentTimeDate($value);   
            break;
        case 'datetimecombo':
            $result = setCurrentTimeDate($value);   
            break;
        default :
            $result = $value;
            break;
    }
    return $result;
    
}
?>
