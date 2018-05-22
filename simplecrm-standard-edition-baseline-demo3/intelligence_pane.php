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
require_once ('modules/AOR_Reports/AOR_Report.php');
include('custom/include/language/en_us.lang.php');
global $db, $sugar_config;
$response = array();
$id= $_POST['id'];
if($id == ''){
echo $response['graphs'] = '';
echo $response['tables'] = '';
exit;
}
$module= $_POST['module'];
$user_id= $_POST['user_id'];
$report_bean = new AOR_Report();
$report_bean->retrieve($id);

echo $response['graphs'] = $report_bean->build_report_chart(null, AOR_Report::CHART_TYPE_RGRAPH);
echo $response['tables'] = $report_bean->buildMultiGroupReport(0,true);

$create_table = $db->query("CREATE TABLE IF NOT EXISTS scrm_intelligence_pane (id VARCHAR(100) NOT NULL,um_id VARCHAR(255) NOT NULL,report_id VARCHAR(100) NOT NULL, date_modified DATETIME, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (um_id))");

$date_modified = date("Y-m-d H:i:s");
$um_id = $module.":".$user_id;
$content_query = $db->query("INSERT INTO scrm_intelligence_pane (id,um_id, report_id, date_modified) VALUES (UUID(),'" . $um_id . "', '" . $id . "','" . $date_modified . "')ON DUPLICATE KEY UPDATE report_id='" . $id . "',date_modified='" . $date_modified . "'");

exit;
