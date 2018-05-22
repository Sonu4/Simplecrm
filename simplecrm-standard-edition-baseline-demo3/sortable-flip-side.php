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

global $db, $sugar_config;

$user_id = $_POST['user_id'];
$dashlet_id = $_POST['dashlet_id'];
$data['dis'] = array_filter($_POST['dis']);
$data['hid'] = array_filter($_POST['hid']);

$fulldata = base64_encode(serialize($data));

$querycheck = 'SELECT 1 FROM dashlet_360_hide_show_fields';
$query_result = $db->query($querycheck);
if ($query_result === FALSE) {
    $create_table = $db->query("create table dashlet_360_hide_show_fields(id VARCHAR(100) NOT NULL,user_id VARCHAR(100) NOT NULL,dashlet_id VARCHAR(100) NOT NULL, display_hide_columns LONGTEXT NOT NULL,  date_modified LONGTEXT, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (id))");
}


$sel_query= $db->query("select * from dashlet_360_hide_show_fields where user_id='".$user_id."' and dashlet_id='".$dashlet_id."'");
$date_modified = date("d-m-Y h:i:s");
$rec=$db->fetchByAssoc($sel_query);

if($sel_query->num_rows=="0")
{
	echo $in_query="INSERT INTO dashlet_360_hide_show_fields (id,user_id, dashlet_id, display_hide_columns, date_modified) VALUES (UUID(),'" . $user_id . "', '" . $dashlet_id . "','" . $fulldata . "','" . $date_modified . "')";
$content_query = $db->query($in_query);
}else if($sel_query->num_rows=="1"){
	echo $up_query="UPDATE dashlet_360_hide_show_fields set display_hide_columns='" . $fulldata . "',date_modified='" . $date_modified . "' where id='".$rec['id']."'";
$content_query = $db->query($up_query);
}

	

