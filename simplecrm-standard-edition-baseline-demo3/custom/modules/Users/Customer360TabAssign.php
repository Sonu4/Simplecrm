<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

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
class Customer360TabAssign {

    function assignCustomer360Tab($bean, $event, $arguments) {
        global $db, $app_list_strings, $current_user;
        $user_id = $current_user->id;
        if ($user_id == '1') {
            return false; //If admin then no need to add customer 360 tab .
        }
        $fetch_user_pref = "SELECT contents FROM `user_preferences` WHERE `category` LIKE 'Home' AND `assigned_user_id` = '" . $user_id . "'";
        $result = $db->query($fetch_user_pref);
        $user_data = $db->fetchByAssoc($result);

        /* Check if user has customer 360 tab */
        $b = unserialize(base64_decode($user_data['contents']));
        $check = $b['pages'][1]['pageTitle'];
        if ($check == 'Customer 360') {
            return false; //If true, then no need to assign tab
        } else {
            //If false, then need to assign tab customer 360 of admin user to logged in user.
            $fetch_admin_pref = "SELECT contents FROM `user_preferences` WHERE `category` LIKE 'Home' AND `assigned_user_id` = '1'";
            $result_admin = $db->query($fetch_admin_pref);
            $admin_data = $db->fetchByAssoc($result_admin);
            $a = unserialize(base64_decode($admin_data['contents']));
            if(count($a)>=2 && $a['pages'][1]['pageTitle'] == 'Customer 360'){ // To check admin has customer 360 tab
            $aa = array();
            $aa[1] = $a['pages'][1];
            array_splice($b['pages'], 1, 0, $aa);
            $dashlets = array();
            foreach ($a['pages'][1]['columns'] as $k => $v) {
                foreach ($v['dashlets'] as $j) {
                    $dashlets[] = $j;
                }
            }
            foreach ($dashlets as $jj) {
                $b['dashlets'][$jj] = $a['dashlets'][$jj];
            }
            $updated_userpref = base64_encode(serialize($b)); // Updated user preference
            $update_user_pref = "UPDATE `user_preferences` SET `contents`='" . $updated_userpref . "' WHERE `category` LIKE 'Home' AND `assigned_user_id` = '" . $user_id . "'";
            $updated_result = $db->query($update_user_pref);
            return true;
            }  else {
                return false;
            }
        }
    }

}
