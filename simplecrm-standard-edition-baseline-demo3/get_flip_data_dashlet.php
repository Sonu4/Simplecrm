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


global $db, $sugar_config, $mod_strings, $app_list_strings;


$dashlet_id = $_POST['dashlet_id'];
$user_id = $_POST['user_id'];
$exp_arr = explode(",", $_POST['stuff']);
foreach ($exp_arr as $val) {
    $exp_arr1 = explode(":", $val);
    $data[$exp_arr1[0]] = $exp_arr1[1];
}

$bean = BeanFactory::getBean($data['module']);
$field_defs[$data['module']] = $bean->getFieldDefinitions();
$bean = $bean->retrieve($data['record']);

  $main_query = $db->query("SELECT * from dashlet_360_hide_show_fields where dashlet_id='" . $_POST['dashlet_id'] . "' and user_id='" . $user_id . "'");
    $get_data = $db->fetchByAssoc($main_query);

    $dis = unserialize(base64_decode($get_data['display_hide_columns']));
 

$customMetadate = 'custom/modules/'.$data['module'].'/metadata/dashletviewdefs.php';
foreach ($bean->fetched_row as $fkey => $fvalue) {
   
    

    if (!empty($field_defs[$data['module']][$fkey]['options'])) {
        if (count($app_list_strings[$field_defs[$data['module']][$fkey]['options']]) >= 1) {
            $dp_element = $app_list_strings[$field_defs[$data['module']][$fkey]['options']];
        } else {
            $dp_element = $GLOBALS['app_list_strings'][$field_defs[$data['module']][$fkey]['options']];
        }
    }
//If user did not set back flip side start 
 if(empty($dis['dis']))
{

	      if (!empty($field_defs[$data['module']][$fkey]['options'])) {
        if (count($app_list_strings[$field_defs[$data['module']][$fkey]['options']]) >= 1) {
            $dp_element = $app_list_strings[$field_defs[$data['module']][$fkey]['options']];
        } else {
            $dp_element = $GLOBALS['app_list_strings'][$field_defs[$data['module']][$fkey]['options']];
        }
    }

    //If user has made any changes in dashlet fields in dashlet then it will check file exist that time it will be showing all fields from the file start
    	if ( file_exists ( $customMetadate )){
    		require($customMetadate);
			

	        $columns = $dashletData[$data['module'].'Dashlet']['columns'];

	       
if (array_key_exists($fkey, $columns)) 
    {
    	 
	      
    $full_label = $field_defs[$data['module']][$fkey]['vname'];
   $get_label = translate($full_label, $data['module']);
    if(is_array($get_label)) $get_label = str_replace(":","",$full_label);

    if (!empty($get_label)) {

        if ($fvalue == '') {
            $fvalue='&nbsp';
        } else {

            if(count($dp_element)>0){

                $vall=htmlspecialchars_decode($dp_element[$fvalue]);

                if($vall==""){
                     $fvalue=$fvalue;
                }else{
                     $fvalue=$vall;
                }
            }else{

                if($fkey == 'assigned_user_id'){

                $fvalue=$bean->assigned_user_name;
                }elseif($fkey == 'created_by')
                {
                $fvalue=$bean->created_by_name; 
                }
                
                $fvalue=htmlspecialchars_decode($fvalue);
            }
            
        }
//echo "-----1--->".$bean->field_name_map[$fkey]['type'];

//$fvalue=($bean->field_name_map[$fkey]['type']=="currency")? "Rs. ".(number_format($fvalue,2)):($bean->field_name_map[$fkey]['type']=="datetime" || $bean->field_name_map[$fkey]['type']=="datetimecombo")?setCurrentTimeDate($fvalue):$fvalue;

       $view_array[$get_label]=checkType($bean->field_name_map[$fkey]['type'],$fvalue);
    }
}

    	}  //If user has made any changes in dashlet fields in dashlet then it will check file exist that time it will be showing all fields from the file end
    	else
    	{  //if file is not exist that time it will be showing all fields start
    		
    		   $columns = array('id', 'id_c',  'modified_user_id', 'deleted'); //not show columns

if (!in_array($fkey, $columns)) 
            {

            $full_label = $field_defs[$data['module']][$fkey]['vname'];
            $get_label = translate($full_label, $data['module']);
            if(is_array($get_label)) $get_label = str_replace(":","",$full_label);

            if (!empty($get_label)) {
            if ($fvalue == '') {
            $fvalue='&nbsp;';
            } else {

            if(count($dp_element)>0){

            $vall=htmlspecialchars_decode($dp_element[$fvalue]);

            if($vall==""){
                     $fvalue=$fvalue;
                }else{
                     $fvalue=$vall;
                }
            }else{

            if($fkey == 'assigned_user_id'){
            $fvalue=$bean->assigned_user_name;
            }elseif($fkey == 'created_by')
            {
            $fvalue=$bean->created_by_name; 
            }

            $fvalue=htmlspecialchars_decode($fvalue);
            }

            }
            //echo "-----2--->".$bean->field_name_map[$fkey]['type'];
//$fvalue=($bean->field_name_map[$fkey]['type']=="currency")? "Rs. ".(number_format($fvalue,2)):($bean->field_name_map[$fkey]['type']=="datetime" || $bean->field_name_map[$fkey]['type']=="datetimecombo")?setCurrentTimeDate($fvalue):$fvalue;
        
            $view_array[$get_label]=checkType($bean->field_name_map[$fkey]['type'],$fvalue);
            }
}
//if file is not exist that time it will be showing all fields end
    	}
       

		
}
unset($dp_element);
}

//If user change the back side flip fields order start
if(!empty($dis['dis']))
    {

       
        foreach($dis['dis'] as $dkey)
        {

 $field_defs[$data['module']][$dkey]['options'];
             if (!empty($field_defs[$data['module']][$dkey]['options'])) {
        if (count($app_list_strings[$field_defs[$data['module']][$dkey]['options']]) >= 1) {
            $dis_element = $app_list_strings[$field_defs[$data['module']][$dkey]['options']];
        } else {
            $dis_element = $GLOBALS['app_list_strings'][$field_defs[$data['module']][$dkey]['options']];
            

        }
    }

				


   if (array_key_exists($dkey, $bean->fetched_row) || array_key_exists($dkey, $bean) ) {
      $full_label = $field_defs[$data['module']][$dkey]['vname'];
        $get_label = translate($full_label, $data['module']);
        if(is_array($get_label)) $get_label = str_replace(":","",$full_label);
                   
         if (!empty($get_label)) {
          
    
            
            if (!empty($bean->fetched_row[$dkey])) {
               $get_value=$bean->fetched_row[$dkey];
                
            }else if(!empty($bean->$dkey)){
                $get_value=$bean->$dkey;
            }else
            {
                $get_value="&nbsp";
            }

                if (count($dis_element)>0) {
                    $nearray=htmlspecialchars_decode($dis_element[$get_value]);
                    if(empty($nearray))
                    {
                    $nearray= $get_value;
                    }
                } else {
                  if($dkey == 'assigned_user_id'){
					$get_value=$bean->assigned_user_name;
					}elseif($dkey == 'created_by')
					{
					$get_value=$bean->created_by_name;	
					}

                    $nearray=htmlspecialchars_decode($get_value);
                }
            //echo "-----3--->".$bean->field_name_map[$dkey]['type'];
//$nearray=($bean->field_name_map[$dkey]['type']=="currency")? "Rs. ".(number_format($nearray,2)):$nearray;
/*$nearray=($bean->field_name_map[$dkey]['type']=="currency")? "Rs. ".(number_format($nearray,2)):($bean->field_name_map[$dkey]['type']=="datetime" || $bean->field_name_map[$dkey]['type']=="datetimecombo")?setCurrentTimeDate($nearray):$nearray;*/

           $view_array[$get_label]=checkType($bean->field_name_map[$dkey]['type'],$nearray);
            unset($get_value);
            unset($dis_element);

        }
        
    }
    
}
//If user change the back side flip fields order end by Roshan Sarode
}

$j=0;
foreach($view_array as $vkey=>$vvalue)
{
        echo $cond = ($j%2 == 0)?'<div class="col-sm-12 row ">':'';
        echo '<div class="col-sm-6">
        <div class="flip-field">' . $vkey. '</div>';
        echo '<div class="flip-value">' . $vvalue . '</div>';  
        echo '</div>';
        echo   $cond = ($j%2 != 0)?'</div >':''; 
        $j++;               
}
                        

echo '
	<div class="col-sm-12 row_box">
	<div class="col-sm-12">
	<a class="pull-right" href="index.php?action=ajaxui#ajaxUILoc=index.php%3Faction%3D' . $data['action'] . '%26module%3D' . $data['module'] . '%26record%3D' . $data['record'] . '">More </a>
	</div>
	</div>';


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
