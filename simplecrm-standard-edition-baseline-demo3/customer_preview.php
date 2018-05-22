<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
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
require_once('include/language/en_us.lang.php');
require_once('custom/include/language/en_us.lang.php');
global $db, $sugar_config;
$id= $_POST['id'];
$module_name = 'scrm_Retail_Customer';
$bean = BeanFactory::getBean($module_name);
$field_defs[$module_name] = $bean->getFieldDefinitions();
$bean=$bean->retrieve($id);



/*For opportunities*/
$opportunities_count = "SELECT (count(id)) as count from scrm_retail_customer_opportunities_1_c where scrm_retail_customer_opportunities_1scrm_retail_customer_ida='".$id."' and deleted=0";
$result_opp_count = $db->query($opportunities_count);
$row_opp_count = $db->fetchByAssoc($result_opp_count);
$opp_count = $row_opp_count['count'];
/*For opportunities end*/
/*For services*/
$services_count = "SELECT count(*) as count from scrm_retail_customer_cases_1_c as sc join cases as c on sc.scrm_retail_customer_cases_1cases_idb = c.id where sc.scrm_retail_customer_cases_1scrm_retail_customer_ida='".$id."' and sc.deleted=0";
$result_ser_count = $db->query($services_count);
$row_ser_count = $db->fetchByAssoc($result_ser_count);
$ser_count = $row_ser_count['count'];
/*For services end*/
/*For Products*/
$products_count = "SELECT (count(id)) as count from scrm_retail_customer_aos_products_1_c where scrm_retail_customer_aos_products_1scrm_retail_customer_ida='".$id."' and deleted=0";
$result_pro_count = $db->query($products_count);
$row_pro_count = $db->fetchByAssoc($result_pro_count);
$pro_count = $row_pro_count['count'];
/*For Products end*/

//echo "<pre>";
//print_r($bean);
//exit;
if(file_exists('upload/'.$id.'_profile_pic_c'))
{
$imgpath="index.php?entryPoint=download&amp;id=".$id."_profile_pic_c&amp;type=scrm_Retail_Customer";
}else
{
$imgpath="custom/themes/default/images/custom_default.png";
}
$html = '<div class="header_pane">
                    '.$bean->full_name.'
                </div>
                <div class="image_pane">
                    <img class="img-circle" src="'.$imgpath.'" />
                </div>
                <div class="rating_container row ptop5">';
                $html .= getStars((int)$bean->customer_grade_c);
                $html.='</div>
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Account No.</div>
                    <div class="col-sm-6 field_values">'.$bean->account_no_c.'</div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Nic No.</div>
                    <div class="col-sm-6 field_values">'.$bean->pan_c.'</div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Reference No.</div>
                    <div class="col-sm-6 field_values">'.$bean->reference_no_c.'</div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Affluent Products</div>
                    <div class="col-sm-6 field_values">'.$GLOBALS['app_list_strings']['affluent_products_list'][$bean->affluent_products_c].'</div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Preferred Channel</div>
                    <div class="col-sm-6 field_values">'.$bean->preferred_channel_c.'</div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">DOB</div>
                    <div class="col-sm-6 field_values">'.$bean->dob_c.'</div>  
                </div>              
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">KYC Completed</div>
                    <div class="col-sm-6 field_values"><input type="checkbox" checked="true" disabled /></div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Product Holdings</div>
                    <div class="col-sm-6 field_values"><a href="#">'.$pro_count.'</a></div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Opportunities</div>
                    <div class="col-sm-6 field_values"><a href="#">'.$opp_count.'</a></div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Services</div>
                    <div class="col-sm-6 field_values"><a href="#">'.$ser_count.'</a></div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 field_header">Address</div>
                    <div class="col-sm-6 field_values">'.$bean->primary_address_street
                        ." ".$bean->primary_address_city
                        ." ".$bean->primary_address_state
                        ." ".$bean->primary_address_country
                        ." ".$bean->primary_address_postalcode
                        .'</div>  
                </div>   
                <div class="row ptop5">
                    <div class="col-sm-6 text-right"><a href="index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3Dscrm_Retail_Customer%26offset%3D8%26stamp%3D1494947476095985300%26return_module%3Dscrm_Retail_Customer%26action%3DDetailView%26record%3D'.$id.'">Show More ...</a></div>
                    <div class="col-sm-6 field_values"></div>
                </div><br><br><br>';


echo $html; exit;


function getStars($num){
    switch ($num) {
        case 1:
            $str .='<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>';
            break;
        case 2:
            $str .='<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>';
            break;
        case 3:
            $str .='<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>';
            break;
        case 4:
            $str .='<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star"></i>';
            break;
        case 5:
            $str .='<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>'
                 . '<i class="fa fa-star rating_active"></i>';
            break;
        case 0:
            $str .='<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>';
            break;

        default:
            $str .='<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>'
                 . '<i class="fa fa-star"></i>';
            break;
    }
                       
   return $str;              
}
?>
