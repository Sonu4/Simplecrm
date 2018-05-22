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
global $db, $sugar_config;


$keyword=$_POST['keyword'];




if(trim($_POST['id'])=="name")
{
	$condition=" AND a.name like '".$_POST['name']."%'";

	$list_item[0]="name";

}else if(trim($_POST['id'])=="phone_no")
{
	$condition=" AND a.phone_office like '".$_POST['phone_no']."%'";
	$list_item[0]="phone_office";

}else if(trim($_POST['id'])=="email_id")
{
        $condition2=", e.email_address as email_address";
        $condition1="JOIN email_addr_bean_rel as eb on eb.bean_id=a.id JOIN email_addresses as e on e.id=eb.email_address_id ";
	$condition=" AND e.email_address like '".$_POST['email_id']."%'";

	$list_item[0]="email_address";

}


if(!empty($_POST["keyword"])) {


        $query ="SELECT a.id as id1, a.name as name, a.phone_office as phone_office ".$condition2." FROM accounts as a JOIN accounts_cstm as ac on a.id=ac.id_c ".$condition1." WHERE a.deleted=0 ".$condition." ORDER BY a.id";
	
$get_query = $db->query($query);



?>
<ul id="suggest-list">
<?php

while($data = $db->fetchByAssoc($get_query)) {

  
/*$data_key1=preg_replace("/[^a-zA-Z0-9]+/", "\'", html_entity_decode($data[$list_item[0]], ENT_QUOTES));
$data_key2=preg_replace("/[^a-zA-Z0-9]+/", "\'", html_entity_decode($data[$list_item[1]], ENT_QUOTES));*/

$data_key1=$data[$list_item[0]];


?>

<li onClick="selectDataSuggest('<?php echo $data_key1; ?>','<?php echo $_POST['id']; ?>','<?php echo $data['id1'];?>')"><?php echo $data[$list_item[0]]; ?></li>
<?php } ?>
</ul>
<?php  } ?>
