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

include('custom/include/language/en_us.lang.php');
session_start();
	global $db, $sugar_config;
	
 $user_id = $_POST['user_id'];
 $user_name = $_POST['user_name'];
$_POST['name']= urldecode($_POST['name']);
$_POST['phone_no']= urldecode($_POST['phone_no']);
$_POST['email_id']= urldecode($_POST['email_id']);

//echo "<pre>";
//print_r($POST);
//exit;
//$_POST['name'] = str_replace("&#039;", "\'", $_POST['name']);
 $create_table = $db->query("create table if not exists retail_customer_dashlet(id INT(11) NOT NULL,user_id VARCHAR(100) NOT NULL, retail_customer_id VARCHAR(100) NOT NULL, date_modified VARCHAR(100), created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (user_id))");

if (!empty($_POST['name']) || !empty($_POST['phone_no']) || !empty($_POST['email_id'])) {

	
		

    $max_id_query = $db->query("SELECT id from retail_customer_dashlet ORDER BY id DESC LIMIT 1");
    $get_max_id = $db->fetchByAssoc($max_id_query);
    $max_id = $get_max_id['id'] + 1;

    $date_modified = date("d-m-Y h:i:s");

    $condition = '';
    if (!empty(trim($_POST['name']))) {
        $condition .= " AND a.name  like '" . trim($_POST['name']) . "%'";
}
    if (!empty(trim($_POST['phone_no']))) {
        $condition .= " AND a.phone_office like '" . trim($_POST['phone_no']) . "%'";
}
    if (!empty(trim($_POST['email_id']))) {
     $condition2=", e.email_address as email_address";   
     $condition1="JOIN email_addr_bean_rel as eb on eb.bean_id=a.id JOIN email_addresses as e on e.id=eb.email_address_id ";   
     $condition=" AND e.email_address like '".$_POST['email_id']."%'";
    }
   
       $select_query ="SELECT a.id as id FROM accounts as a JOIN accounts_cstm as ac on a.id=ac.id_c ".$condition1." WHERE a.deleted=0 ".$condition." ORDER BY a.id";

        $get_query = $db->query($select_query);                             
        $data = $db->fetchByAssoc($get_query);
      
         $get_query->num_rows;
    $id = $data['id'];

    if ($get_query->num_rows > 0) {
        $content_full_query="INSERT INTO retail_customer_dashlet (id,user_id, retail_customer_id, date_modified) 
        VALUES ('" . $max_id . "','" . $user_id . "', '" . $data['id'] . "','" . $date_modified . "')ON DUPLICATE KEY UPDATE retail_customer_id='" . $data['id'] . "',date_modified='" . $date_modified . "'";

        $content_query = $db->query($content_full_query);
    } else {

        $delete_query = $db->query("delete from retail_customer_dashlet where user_id='" . $user_id . "'");
        $no_data = "No Data";
}
} else {

   
    $ready_query = $db->query("SELECT * from retail_customer_dashlet where user_id='" . $user_id . "'");
    $get_data = $db->fetchByAssoc($ready_query);

    if ($ready_query->num_rows == 0) {
        $no_data = "No Data";
        $id = '';
    }else{
        $id = $get_data['retail_customer_id'];
}
	
    }    

if (!empty($id)) {
	
	

$bean = BeanFactory::getBean('Accounts');

$field_defs['Accounts'] = $bean->getFieldDefinitions();
$bean = $bean->retrieve($id);


if (!empty($field_defs['Accounts']['industry']['options'])) {
  
    if (count($app_list_strings[$field_defs['Accounts']['industry']['options']]) >= 1) {
        $dp_element = $app_list_strings[$field_defs['Accounts']['industry']['options']];
        
       
    } else {
        $dp_element = $GLOBALS['app_list_strings'][$field_defs['Accounts']['industry']['options']];
         
			}
		}
                
			




$html = '<div class="header_pane">
<h3><strong>' . $bean->fetched_row['name'] . '</strong></h3></div>
<table style="width:100%"><tr><td align="center">                
                
              
                <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Name</div>
                    <div class="col-sm-6 field_values">: ' . $bean->fetched_row['name'] . '</div>  
                </div>   
                 <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Website</div>
                    <div class="col-sm-6 field_values">: ' . $bean->website . '</div>  
                </div>   
                 <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Email</div>
                    <div class="col-sm-6 field_values">: ' . $bean->email1 . '</div>  
                </div>   
                 
               
                <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Phone</div>
                    <div class="col-sm-6 field_values">: ' . $bean->phone_office . '</div>  
                </div>   
                <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Fax</div>
                    <div class="col-sm-6 field_values">: ' . $bean->phone_fax . '</div>  
                </div>  
                <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Industry</div>
                    <div class="col-sm-6 field_values">: ' . $dp_element[$bean->industry] . '</div>  
                </div>  
             <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Employees</div>
                    <div class="col-sm-6 field_values">: ' . $bean->employees . '</div>  
                </div>  
                <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 field_header">Address</div>
                    <div class="col-sm-6 field_values">: ' . $bean->billing_address_street . ", " . $bean->billing_address_city
        . " " . $bean->billing_address_state
        . " " . $bean->billing_address_postalcode
        . " " . $bean->billing_address_country
        . '</div>  
                </div>   
                <div class="col-sm-12 ptop5">
                    <div class="col-sm-6 text-right"></div>
                    <div class="col-sm-6 field_values">
                    <a href="index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DAccounts%26offset%3D8%26stamp%3D1494947476095985300%26return_module%3DAccounts%26action%3DDetailView%26record%3D' . $id . '" class="pull-right">Show More ...</a>
                    </div>
                </div></td></tr></table><br><br><br>';


if ($_SESSION[$user_name . "_PREFERENCES"]['Home']['pages'][1]['pageTitle'] == "Customer 360") {
    foreach ($_SESSION[$user_name . "_PREFERENCES"]['Home']['pages'][1]['columns'] as $col_id) {
        foreach ($col_id['dashlets'] as $get_id) {
            if ($get_id == 'retail_') {
		
            } else {
                $all_get_id[] = $get_id;
	}
}	
}
}

}

$result = array();
$result['html'] = $html;
$result['no_data'] = $no_data;
$result['all_get_id'] = $all_get_id;
echo json_encode($result);

 exit;


?>
