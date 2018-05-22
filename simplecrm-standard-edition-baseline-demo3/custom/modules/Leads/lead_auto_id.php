<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

class Lead_Id
{

    function lead_id_fun($bean, $event, $arguments)
    {
		global $db;
		
		 if(empty($bean->fetched_row)) {
			
			global $db;
			$query = "SELECT lead_id1_c FROM  leads_cstm ORDER BY  lead_id1_c DESC limit 0,1";
			$result =$db->query($query);
			$row= $db->fetchByAssoc($result);
			$row_new_id = $row['lead_id1_c'];			
			if(empty($row_new_id))
			{
				//$id = $bean->lead_id_c;
				//$bean->lead_id_c = 'Lead-'.date(Y).'000001';                                 
                $bean->lead_id1_c  = 'L-'.'000001'; 
			}
			else{
				$bean->lead_id1_c  = ++$row_new_id;
			}
		}



    }
}
?>
