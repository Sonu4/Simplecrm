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
require_once('include/language/en_us.lang.php');
require_once('custom/include/language/en_us.lang.php');

global $db, $sugar_config, $app_list_strings;


$id = $_POST['id'];
$module_name = 'scrm_Retail_Customer';
$bean = BeanFactory::getBean($module_name);
$field_defs[$module_name] = $bean->getFieldDefinitions();
$bean = $bean->retrieve($id);



/* For opportunities */
$opportunities_count = "SELECT o.id,o.name,o.amount from scrm_retail_customer_opportunities_1_c as so join opportunities as o on o.id = so.scrm_retail_customer_opportunities_1opportunities_idb where so.scrm_retail_customer_opportunities_1scrm_retail_customer_ida='" . $id . "' and so.deleted=0 ORDER BY o.date_entered DESC LIMIT 4";
$result_opp_count = $db->query($opportunities_count);

$oppor_count = "SELECT o.name,o.amount from scrm_retail_customer_opportunities_1_c as so join opportunities as o on o.id = so.scrm_retail_customer_opportunities_1opportunities_idb where so.scrm_retail_customer_opportunities_1scrm_retail_customer_ida='" . $id . "' and so.deleted=0";
$res_opp_count = $db->query($oppor_count);
$opp_count = $res_opp_count->num_rows;
/* For opportunities end */


/* For services */
$services_rows = "SELECT cc.sub_type_c, c.id,c.case_number, c.name,c.date_entered,c.status from scrm_retail_customer_cases_1_c as sc join cases as c   on sc.scrm_retail_customer_cases_1cases_idb = c.id join cases_cstm as cc on sc.scrm_retail_customer_cases_1cases_idb = cc.id_c where sc.scrm_retail_customer_cases_1scrm_retail_customer_ida='" . $id . "' and sc.deleted=0 ORDER BY c.date_entered DESC LIMIT 4";
$result_ser_count = $db->query($services_rows);

$services_count = "SELECT c.name from scrm_retail_customer_cases_1_c as sc join cases as c on sc.scrm_retail_customer_cases_1cases_idb = c.id where sc.scrm_retail_customer_cases_1scrm_retail_customer_ida='" . $id . "' and sc.deleted=0 ";
$res_ser_count = $db->query($services_count);
$ser_count = $res_ser_count->num_rows;

//$ser_count = $row_ser_count['count'];
/* For services end */

/* For Products */
$product_count = "SELECT p.* from scrm_retail_customer_aos_products_1_c as sc join aos_products as p on sc.scrm_retail_customer_aos_products_1aos_products_idb = p.id where sc.scrm_retail_customer_aos_products_1scrm_retail_customer_ida='" . $id . "' and sc.deleted=0 ORDER BY p.date_entered";
$result_product_count = $db->query($product_count);
$pro_count = $result_product_count->num_rows;

$product_rows = "SELECT p.* from scrm_retail_customer_aos_products_1_c as sc join aos_products as p on sc.scrm_retail_customer_aos_products_1aos_products_idb = p.id where sc.scrm_retail_customer_aos_products_1scrm_retail_customer_ida='" . $id . "' and sc.deleted=0 ORDER BY p.date_entered DESC LIMIT 4";
$result_product_rows = $db->query($product_rows);

/* For Products end */

/* For Interactions */
$interactions_count = "SELECT id,name,date_entered,date_start,'Calls' as type FROM `calls` WHERE `parent_id` = '" . $id . "' AND deleted = 0 "
        . " UNION SELECT id,name,date_entered,date_start,'Tasks' as type FROM `tasks` WHERE `parent_id` = '" . $id . "' AND deleted = 0 "
        . " UNION SELECT id,name,date_entered,date_start,'Meetings' as type FROM `meetings` WHERE `parent_id` = '" . $id . "' AND deleted = 0 "
        . " UNION SELECT id,name,date_entered,'' as date_start,'Notes' as type FROM `notes` WHERE `parent_id` = '" . $id . "' AND deleted = 0 ORDER BY date_start";
$result_interactions_count = $db->query($interactions_count);
$inter_count = $result_interactions_count->num_rows;

$interactions_rows = "SELECT id,name,date_entered,date_start,'Calls' as type FROM `calls` WHERE `parent_id` = '" . $id . "' AND deleted = 0 "
        . " UNION SELECT id,name,date_entered,date_start,'Tasks' as type FROM `tasks` WHERE `parent_id` = '" . $id . "' AND deleted = 0 "
        . " UNION SELECT id,name,date_entered,date_start,'Meetings' as type FROM `meetings` WHERE `parent_id` = '" . $id . "' AND deleted = 0 "
        . " UNION SELECT id,name,date_entered,'' as date_start,'Notes' as type FROM `notes` WHERE `parent_id` = '" . $id . "' AND deleted = 0 ORDER BY date_start DESC LIMIT 4";
$result_interactions_rows = $db->query($interactions_rows);

/* For Interactions end */

/* For offers */
$offers_count = "SELECT oo.* from scrm_retail_customer_offer_offers_1_c as sc join offer_offers as oo on sc.scrm_retail_customer_offer_offers_1offer_offers_idb = oo.id where sc.scrm_retail_customer_offer_offers_1scrm_retail_customer_ida='" . $id . "' and sc.deleted=0 ORDER BY oo.date_entered DESC";
$result_offers_count = $db->query($offers_count);
$off_count = $result_offers_count->num_rows;

$offers_rows = "SELECT oo.* from scrm_retail_customer_offer_offers_1_c as sc join offer_offers as oo on sc.scrm_retail_customer_offer_offers_1offer_offers_idb = oo.id where sc.scrm_retail_customer_offer_offers_1scrm_retail_customer_ida='" . $id . "' and sc.deleted=0 ORDER BY oo.date_entered DESC LIMIT 4";
$result_offers_rows = $db->query($offers_rows);

/* For offers end */

/* for Card tracking start */
$card_count = "SELECT c . * , c_cstm . * FROM scrm_card_tracking_module AS c JOIN scrm_card_tracking_module_cstm AS c_cstm ON c.id = c_cstm.id_c JOIN scrm_retail_customer_scrm_card_tracking_module_1_c AS c_ret ON c.id = c_ret.scrm_retai0a70_module_idb WHERE scrm_retai36eaustomer_ida = '" . $id . "' AND c.deleted =0 ORDER BY c.date_entered DESC";
$result_card_count = $db->query($card_count);
$cd_count = $result_card_count->num_rows;


$card_tracking = "SELECT c . * , c_cstm . * FROM scrm_card_tracking_module AS c JOIN scrm_card_tracking_module_cstm AS c_cstm ON c.id = c_cstm.id_c JOIN scrm_retail_customer_scrm_card_tracking_module_1_c AS c_ret ON c.id = c_ret.scrm_retai0a70_module_idb WHERE scrm_retai36eaustomer_ida = '" . $id . "' AND c.deleted =0 ORDER BY c.date_entered DESC LIMIT 4";
$result_cardtracking_rows = $db->query($card_tracking);
/* for Card tracking end */


/* for debit card start */
$debitcard_count = "SELECT c . * , c_cstm . * FROM scrm_debit_card_application AS c JOIN scrm_debit_card_application_cstm AS c_cstm ON c.id = c_cstm.id_c JOIN scrm_retail_customer_scrm_debit_card_application_1_c AS c_ret ON c.id = c_ret.scrm_retai29c7ication_idb WHERE scrm_retai558eustomer_ida = '" . $id . "' AND c.deleted =0 ORDER BY c.date_entered DESC";
$result_debitcard_count = $db->query($debitcard_count);
$debit_count = $result_debitcard_count->num_rows;


$debitcard_query = "SELECT c . * , c_cstm . * FROM scrm_debit_card_application AS c JOIN scrm_debit_card_application_cstm AS c_cstm ON c.id = c_cstm.id_c JOIN scrm_retail_customer_scrm_debit_card_application_1_c AS c_ret ON c.id = c_ret.scrm_retai29c7ication_idb WHERE scrm_retai558eustomer_ida = '" . $id . "' AND c.deleted =0 ORDER BY c.date_entered DESC LIMIT 4";
$result_debicard_result = $db->query($debitcard_query);
/* for debit card end */

if(file_exists('upload/'.$id.'_profile_pic_c'))
{
$imgpath="index.php?entryPoint=download&amp;id=".$id."_profile_pic_c&amp;type=scrm_Retail_Customer";
}else
{
$imgpath="custom/themes/default/images/custom_default.png";
}
$html = '  <div class="popup-card-row">
					<input id="customer-360-id" type="hidden" value="'.$id.'" />
                    <div class="card-360 class-lg-4" id="flip-card-1">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-users pink" aria-hidden="true" ></i> ' . textWrap($bean->full_name,50) . '
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),1,0);">  
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block">
                                <div class="image_pane image_popup">
                                
                                    <img class="img-circle" src="'.$imgpath.'" />
                                </div>
                                <div class="rating_container row">
                                <input type="hidden" id="u_id" value="'.$id.'" />
                                <input type="hidden" id="u_uname" value="'.$bean->full_name.'" />
                                ';
                                
$html .= getStars((int) $bean->customer_grade_c);
$html .='</div>
                                <div>
                                    <ul class="popup-new">
                                        <li>Mobile:<span class="cstr-info">' . $bean->phone_work . '</span></li>
                                        <li>Email:<span class="cstr-info">' . $bean->email1 . '</span></li>
                                        <li>NIC No:<span class="cstr-info">' . $bean->pan_c . '</span></li>
                                        <li>DOB:<span class="cstr-info">' . $bean->dob_c . '</span></li>
                                        <li>Address:<span class="cstr-info">' . textWrap($bean->primary_address_street
                                                                            . " " . $bean->primary_address_city
                                                                            . " " . $bean->primary_address_state
                                                                            . " " . $bean->primary_address_country
                                                                            . " " . $bean->primary_address_postalcode
        ,70) . '</span></li>
                                    </ul>
                                </div>
                            </div>

                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-users pink" aria-hidden="true"></i> ' . $bean->full_name . '
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,0);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-0">
                                <div class="col-sm-6 row_box">
                                    <div class="flip-field">Account No.</div>
                                    <div class="flip-value">' . $bean->account_no_c . '</div>
                                </div>
                                <div class="col-sm-6 row_box">
                                    <div class="flip-field">Reference No.</div>
                                    <div class="flip-value">' . $bean->reference_no_c . '</div>
                                </div>
                                <div class="col-sm-6 row_box">
                                    <div class="flip-field">Affluent Products</div>
                                    <div class="flip-value">' . $GLOBALS['app_list_strings']['affluent_products_list'][$bean->affluent_products_c]. '</div>  
                                </div>   
                                <div class="col-sm-6 row_box">
                                    <div class="flip-field">Preferred Channel</div>
                                    <div class="flip-value">' . $bean->preferred_channel_c . '</div>  
                                </div>  
                                <div class="col-sm-6 row_box">
                                    <div class="flip-field">KYC Completed</div>
                                    <div class="flip-value"><input type="checkbox" checked="true" disabled /></div>  
                                </div>  
                            </div>
                        </span>
                    </div>
                    <div class="card-360 class-lg-4" id="flip-card-2">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-cogs yellow" aria-hidden="true"></i> Services (' . $ser_count . ')
                                </span>';
                    if($ser_count > 4){            
                    $html.='<span class="flip-icon">
                                    <i class="fa fa-angle-double-left dis_pagi" title="previous" id="p_2" onclick="getPagination(2,0)"></i>
                                    <i class="fa fa-angle-double-right" title="next" id="n_2" onclick="getPagination(2,1)"></i>
                                </span>';
                     }           
                     $html.='<span class="clearfix"></span>    
                            </div>

                            <div class="card-block">								
                                <input type="hidden" name="paginate_2" id="paginate_2" value="0" />
                                <input type="hidden" name="total_2" id="total_2" value="' . $ser_count . '" />
                                <ul class="services-list" id="paginate-content-2">';
if ($result_ser_count->num_rows > 0) {

    while ($row_ser_count = $db->fetchByAssoc($result_ser_count)) {
        $html .='<li>
                                                <span class="left-bar ' . getCasesStatusColor($GLOBALS['app_list_strings']['case_status_dom'][$row_ser_count['status']]) . '">
                                                    &nbsp;<br>&nbsp;
                                                </span>
                                                <span class="right-bar-content">
                                                    <span class="services-subject"><a href="javascript:void(0);"  onclick="flipCard($(this),1,2);" data-stuff="module:Cases,record:' . $row_ser_count['id'] . '">'. textWrap($GLOBALS['app_list_strings']['sub_type_c_list'][$row_ser_count['sub_type_c']],35) . '</a></span><br>
                                                    <span class="services-status">' . $GLOBALS['app_list_strings']['case_status_dom'][$row_ser_count['status']] . '</span> | <span class="services-date">' . date('d/m/Y', strtotime($row_ser_count['date_entered'])) . '</span>
                                                </span>
                                                <span class="clearfix"></span>
                                            </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}

$html.='</ul>
                               
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-cogs yellow" aria-hidden="true"></i> Services (' . $ser_count . ')
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,2);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-2">
                               
                            </div>
                            
                        </span>
                    </div>
                    
                    <div class="card-360 class-lg-4" id="flip-card-3">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-phone" aria-hidden="true"></i> Interactions 
                                </span>';
                         if($inter_count > 4){       
                       $html.='<span class="flip-icon">
                                    <i class="fa fa-angle-double-left dis_pagi" id="p_3" title="previous" onclick="getPagination(3,0)"></i>
                                    <i class="fa fa-angle-double-right" id="n_3" title="next" onclick="getPagination(3,1)"></i>
                                </span>';
                              }  
                                $html.='<span class="clearfix"></span>    
                            </div>

                            <div class="card-block">
                                <div class="card-block">                                
                                <input type="hidden" name="paginate_3" id="paginate_3" value="0" />
                                <input type="hidden" name="total_3" id="total_3" value="' . $inter_count . '" />
                                    <ul class="services-list" id="paginate-content-3">';
if ($result_interactions_rows->num_rows > 0) {
    while ($row_interaction = $db->fetchByAssoc($result_interactions_rows)) {
        $html.='<li>
                                            <span class="left-interactions">
                                                ' . date('jS', strtotime($row_interaction['date_start'])) . '<br>' . date('M', strtotime($row_interaction['date_start'])) . '
                                            </span>
                                            <span class="right-bar-content">
                                                <span class="services-subject"><a href="javascript:void(0);"  onclick="flipCard($(this),1,3);" data-stuff="module:' . $row_interaction['type'] . ',record:' . $row_interaction['id'] . '" >' . textWrap($row_interaction['name'],35) . '</a></span><br>
                                                <span class="services-status">' . $row_interaction['type'] . '</span>
                                            </span>
                                            <span class="clearfix"></span>
                                        </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}
$html.='</ul>
                                   
                                </div>
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-phone" aria-hidden="true"></i> Interactions
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,3);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-3">

                            </div>
                           
                        </span>
                    </div>
                    <div class="card-360 class-lg-4" id="flip-card-4">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-credit-card" aria-hidden="true"></i> Card Tracking
                                </span>';
                                if($cd_count > 4){
									$html.='<span class="flip-icon">
										<i class="fa fa-angle-double-left dis_pagi" id="p_4"  title="previous" onclick="getPagination(4,0)"></i>
										<i class="fa fa-angle-double-right" id="n_4" title="next" onclick="getPagination(4,1)"></i>
									</span>';
								}
                                $html.='<span class="clearfix"></span>    
                            </div>

                            <div class="card-block">
                            <input type="hidden" name="paginate_4" id="paginate_4" value="0" />
                            <input type="hidden" name="total_4" id="total_4" value="' . $cd_count . '" />
                                <ul class="services-list" id="paginate-content-4">
                                ';
if ($result_cardtracking_rows->num_rows > 0) {
    while ($row_cardtracking = $db->fetchByAssoc($result_cardtracking_rows)) {
        $html .='<li>
                                                <span class="left-bar">
                                                    &nbsp;<br>&nbsp;
                                                </span>
                                                <span class="right-bar-content">
                                                    <span class="services-subject"><a href="javascript:void(0);"  onclick="flipCard($(this),1,7);" data-stuff="module:scrm_Card_Tracking_Module,record:' . $row_cardtracking['id'] . '">' . textWrap($GLOBALS['app_list_strings']['product_list'][$row_cardtracking['product_c']],35) . '</a></span><br>
                                                    <span class="services-status">' . textWrap($GLOBALS['app_list_strings']['status_3'][$row_cardtracking['status_c']],30). '</span> | <span class="services-date">' . date('d/m/Y', strtotime($row_cardtracking['date_entered'])) . '</span>
                                                </span>
                                                <span class="clearfix"></span>
                                            </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}
$html.='</ul>
                               
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-credit-card" aria-hidden="true"></i> Card Tracking
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,7);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-7">
                               
                            </div>
                            
                        </span>
                    </div>
                </div>
                <div class="popup-card-row">
                    <div class="card-360 class-lg-4" id="flip-card-5">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-shopping-cart black" aria-hidden="true"></i> Product Holding
                                </span>';
                                if($pro_count > 4){
                                $html.='<span class="flip-icon">
                                    <i class="fa fa-angle-double-left dis_pagi" id="p_5" title="previous" onclick="getPagination(5,0)"></i>
                                    <i class="fa fa-angle-double-right" id="n_5" title="next" onclick="getPagination(5,1)"></i>
                                </span>';
							}
                                $html.='<span class="clearfix"></span>    
                            </div>

                             <div class="card-block">
                                <div class="card-block">
                                <input type="hidden" name="paginate_5" id="paginate_5" value="0" />
                                <input type="hidden" name="total_5" id="total_5" value="' . $pro_count . '" />
                                    <ul class="services-list" id="paginate-content-5">
                                ';
if ($result_product_rows->num_rows > 0) {
    while ($row_products = $db->fetchByAssoc($result_product_rows)) {
        $html .='<li>
                                            <span class="left-bar">
                                              
                                            </span>
                                            <span class="right-bar-content">
                                                <span class="services-subject"><a href="javascript:void(0);"  onclick="flipCard($(this),1,4);" data-stuff="module:AOS_Products,record:' . $row_products['id'] . '" >' . textWrap($row_products['name'],35) . '</a></span><br>
                                                <span class="services-date">Amount: ' . $sugar_config['default_currency_symbol'] . ". " . number_format($row_products['cost']) . '</span>
                                            </span>
                                            <span class="clearfix"></span>
                                        </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}

$html.='</ul>
                                  
                                </div>
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-shopping-cart black" aria-hidden="true"></i> Product Holding
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,4);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-4">

                            </div>
                        </span>
                    </div>
                    


                    
                    <div class="card-360 class-lg-4" id="flip-card-6">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-usd green" aria-hidden="true"></i> Opportunities (' . $opp_count . ')
                                </span>';
                                if($opp_count > 4){
                                $html.='<span class="flip-icon">
                                    <i class="fa fa-angle-double-left dis_pagi" id="p_6" title="previous" onclick="getPagination(6,0)"></i>
                                    <i class="fa fa-angle-double-right" id="n_6" title="next" onclick="getPagination(6,1)"></i>
                                </span>';
							}
                                $html.='<span class="clearfix"></span>    
                            </div>

                             <div class="card-block">
                              <input type="hidden" name="paginate_6" id="paginate_6" value="0" />
                              <input type="hidden" name="total_6" id="total_6" value="' . $opp_count . '" />
                                <ul class="services-list" id="paginate-content-6">
                               ';
if ($result_opp_count->num_rows > 0) {
    while ($row_opportunities = $db->fetchByAssoc($result_opp_count)) {
        $html .='<li>
                                        <span class="left-bar label-danger">
                                            &nbsp;<br>&nbsp;
                                        </span>
                                        <span class="right-bar-content">
                                            <span class="services-subject"><a href="javascript:void(0)" onclick="flipCard($(this),1,5);" data-stuff="module:Opportunities,record:' . $row_opportunities['id'] . '">' . textWrap($row_opportunities['name'],35) . '</a></span><br>
                                            <span class="services-status">Amount: ' . $sugar_config['default_currency_symbol'] . ". " . number_format($row_opportunities['amount']) . '</span>
                                        </span>
                                        <span class="clearfix"></span>
                                    </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}
$html .='</ul>
                                
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-usd green" aria-hidden="true"></i> Opportunities (' . $opp_count . ')
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,5);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-5">
                            
                            </div>
                        </span>
                    </div>
                    <div class="card-360 class-lg-4" id="flip-card-7">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-gift orange" aria-hidden="true"></i> Offers
                                </span>';
                                if($off_count > 4){
                               $html.='<span class="flip-icon">
                                    <i class="fa fa-angle-double-left dis_pagi" id="p_7" title="previous" onclick="getPagination(7,0)"></i>
                                    <i class="fa fa-angle-double-right" id="n_7" title="next" onclick="getPagination(7,1)"></i>
                                </span>';
							}
                           $html.='<span class="clearfix"></span>    
                            </div>

                            <div class="card-block">
                                <div class="card-block">                                
                                <input type="hidden" name="paginate_7" id="paginate_7" value="0" />
                                <input type="hidden" name="total_7" id="total_7" value="' . $off_count . '" />
                                    <ul class="services-list" id="paginate-content-7">';
if ($result_offers_rows->num_rows > 0) {
    while ($row_offers_rows = $db->fetchByAssoc($result_offers_rows)) {
        $html .='<li>
                                            <span class="left-bar">
                                               
                                            </span>
                                            <span class="right-bar-content">
                                                <span class="services-subject"><a href="javascript:void(0)" onclick="flipCard($(this),1,6);" data-stuff="module:Offer_Offers,record:' . $row_offers_rows['id'] . '">' . textWrap($row_offers_rows['name'],35) . '</a></span><br>
                                                <span class="services-status">' . textWrap($row_offers_rows['description'],35) . '</span>
                                            </span>
                                            <span class="clearfix"></span>
                                        </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}
$html .='</ul>
                                   
                                </div>
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-gift orange" aria-hidden="true"></i> Offers
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,6);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-6">

                            </div>
                            
                        </span>
                    </div>
                    <div class="card-360 class-lg-4" id="flip-card-8">
                        <span class="front">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debit Card Applications
                                </span>';
                                if($debit_count > 4){
                                $html.='<span class="flip-icon">
                                    <i class="fa fa-angle-double-left dis_pagi" id="p_8" title="previous" onclick="getPagination(8,0)"></i>
                                    <i class="fa fa-angle-double-right" id="n_8" title="next" onclick="getPagination(8,1)"></i>
                                </span>';
							}
                                $html.='<span class="clearfix"></span>    
                            </div>

                             <div class="card-block">                             
                                <input type="hidden" name="paginate_8" id="paginate_8" value="0" />
                                <input type="hidden" name="total_8" id="total_8" value="' . $debit_count . '" />
                                <ul class="services-list" id="paginate-content-8">';
if ($result_debicard_result->num_rows) {
    while ($row_debit = $db->fetchByAssoc($result_debicard_result)) {
        $html .='<li>
                                        <span class="left-bar label-danger">
                                            &nbsp;<br>&nbsp;
                                        </span>
                                        <span class="right-bar-content">
                                            <span class="services-subject"><a href="javascript:void(0)" onclick="flipCard($(this),1,8);" data-stuff="module:scrm_Debit_Card_Application,record:' . $row_debit['id'] . '">' .textWrap($GLOBALS['app_list_strings']['card_product_list'][$row_debit['card_product_c']],35) . '</a></span><br>
                                            <span class="services-status">' .textWrap($GLOBALS['app_list_strings']['account_template_list'][$row_debit['account_template_c']],35) . '</span>
                                        </span>
                                        <span class="clearfix"></span>
                                    </li>';
    }
} else {
    $html .='<li class="text-left">No Data<br><br></li>';
}
$html .='</ul>
                                
                            </div>
                            
                        </span>
                        <span class="back">  
                            <div class="card-header">
                                <span class="title-icon"> 
                                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debit Card Applications
                                </span>
                                <span class="flip-icon" onclick="flipCard($(this),0,8);">  
                                    <i class="fa fa-arrows-h" aria-hidden="true"></i>
                                </span>
                                <span class="clearfix"></span>    
                            </div>

                            <div class="card-block" id="flip-content-8">
                            
                            </div>
                        </span>
                    </div>
                </div>';

echo $html;


exit;

function getCasesStatusColor($x) {
    switch ($x) {
        case 'Closed':
            return 'label-success';
            break;
        case 'Assigned':
            return 'label-danger';
            break;
        case 'New':
            return 'label-primary';
            break;
        case 'Rejected':
            return 'label-danger';
            break;
        case 'Pending Input':
            return 'label-warning';
            break;
        case 'Duplicate':
            return 'label-default';
            break;
        default:
            return 'label-default';
            break;
    }
}

function textWrap($str,$y) {
    if (strlen($str) > $y) {
        return substr($str, 0, $y) . "...";
    } else {
        return $str;
    }
}


function getStars($num) {
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
