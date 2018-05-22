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

class FieldBackground {

    public function getfieldlist($module_name, $no = "NULL") {
        global $db, $sugar_config, $mod_strings;
        $bean = BeanFactory::getBean($module_name);
        $field_defs[$module_name] = $bean->getFieldDefinitions();

        $customMetadata = 'custom/modules/' . $module_name . '/metadata/listviewdefs.php';

        if (file_exists($customMetadata)) {
            require($customMetadata);
            $columns = $listViewDefs[$module_name];
        } else {
            require ('modules/' . $module_name . '/metadata/listviewdefs.php');
            $columns = $listViewDefs[$module_name];
        }





        foreach ($columns as $fk => $fn) {

            include('modules/' . $module_name . '/language/en_us.lang.php');

            $get_lable = $mod_strings[$fn['label']];
            if (empty($get_lable)) {

                include('custom/modules/' . $module_name . '/language/en_us.lang.php');
                $get_lable = $mod_strings[$fn['label']];
            }
            //~ }
            if (!empty($get_lable)) {
                echo "<option value=" . strtolower($fk) . ">" . str_replace(":", "", $get_lable) . "</option>";
            }
        }
    }

    public function outerwrapper($field, $posted_array) {
        $wrapper_no = $posted_array['numItems'];
        $module_name = $posted_array['module'];
   //     $inner_div = $posted_array['inner_div'];

        global $db, $mod_strings, $sugar_config, $app_list_strings;
        
        $bean = BeanFactory::getBean($module_name);
        $field_defs[$module_name] = $bean->getFieldDefinitions();


        foreach ($condition_array as $key => $cn) {
            $full_condition .= "<option value='" . $key . "'>" . $cn . "</option>";
        }

        
         $customMetadata = 'custom/modules/' . $module_name . '/metadata/listviewdefs.php';

        if (file_exists($customMetadata)) {
            require($customMetadata);
            $columns = $listViewDefs[$module_name];
        } else {
            require ('modules/' . $module_name . '/metadata/listviewdefs.php');
            $columns = $listViewDefs[$module_name];
        }
          include('modules/' . $module_name . '/language/en_us.lang.php');

            $get_lable = $mod_strings[$columns[strtoupper($field)]['label']];
            if (empty($get_lable)) {

                include('custom/modules/' . $module_name . '/language/en_us.lang.php');
                $get_lable = $mod_strings[$columns[strtoupper($field)]['label']];
            }
            $get_lable=str_replace(":","",$get_lable);
        if (!empty($field_defs[$module_name][$field]['options'])) {
            if (count($app_list_strings[$field_defs[$module_name][$field]['options']]) >= 1) {
                $dp_element = array_filter($app_list_strings[$field_defs[$module_name][$field]['options']]);
            } else {
                $dp_element = array_filter($GLOBALS['app_list_strings'][$field_defs[$module_name][$field]['options']]);
            }
//            echo "<pre>";
//            print_r($dp_element);
           
            
            echo '<div class="panel panel-default custom-panel" id="field_box_' . $module_name . '_' . $field . '"><div class="panel-body"><div class="col-sm-5"><strong >Module:</strong>&nbsp;<span>' . $app_list_strings['moduleList'][$module_name] . '</span></div><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $get_lable . '</span><input type="hidden" id="field_box_' . $module_name . '_' . $field . 'field_name" value=' . $field . '></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr>';
        $inner_div=0;
            echo '<table class="inputbox"><tr><th>Field Value</th><th>Background Color</th><th>Text Color</th></tr>';
        foreach ($dp_element as $drp_key=>$drp_opt) {
            
            echo '

            <tr>
            <td><input name="' . $module_name . '[' . $field . '][field_name][]" class="field_name" value="'.$drp_opt.'" id="field_name_' . $module_name . '_' . $field . '_' . $inner_div . '" readonly>&nbsp;&nbsp;<input name="' . $module_name . '[' . $field . '][field_name_value][]" class="field_name_value" value="'.$drp_key.'" id="field_name_value' . $module_name . '_' . $field . '_' . $inner_div . '" type="hidden"></td>
            <td><div id="cp2"  class="background_cp input-group colorpicker-component"> <input type="text" name="' . $module_name . '[' . $field . '][background_color][]" value="#7e7bdc" class="background_color" id="background_color_' . $module_name . '_' . $field . '_' . $inner_div . '"/> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
            <td><div id="cp3"  class="text_cp input-group colorpicker-component"><input type="text" name="' . $module_name . '[' . $field . '][text_color][]" value="#ffffff" class="text_color" id="text_color' . $module_name . '_' . $field . '_' . $inner_div . '"/> <input id="unique_id_' . $module_name . '_' . $field . '" class="unique_id" type="hidden" value="' . $module_name . '_' . $field . '"> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
                    </tr>';
            $inner_div++;
            }
            echo '</table></div></div>';
        } else {
            echo '<div class="panel panel-default custom-panel" id="field_box_' . $module_name . '_' . $field . '"><div class="panel-body"><div class="col-sm-5"><strong >Module:</strong>&nbsp;<span >' . $module_name . '</span></div><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $get_lable . '</span><input type="hidden" id="field_box_' . $module_name . '_' . $field . 'field_name" value=' . $field . '></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr>
 <table class="inputbox"><tr><th>Background Color</th><th>Text Color</th></tr>                    
<td><div id="cp2"  class="background_cp input-group colorpicker-component"> <input type="text" name="' . $module_name . '[' . $field . '][background_color][]" class="background_color" value="#7e7bdc" id="background_color_' . $module_name . '_' . $field . '_' . $inner_div . '"/> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
            <td><div id="cp3"  class="text_cp input-group colorpicker-component"><input type="text" name="' . $module_name . '[' . $field . '][text_color][]" value="#ffffff" class="text_color" id="text_color' . $module_name . '_' . $field . '_' . $inner_div . '"/> <input id="unique_id_' . $module_name . '_' . $field . '" class="unique_id" type="hidden" value="' . $module_name . '_' . $field . '"> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
                    </tr>
                    </table>
                    </div></div>';
        }
    }

}
?>
   
