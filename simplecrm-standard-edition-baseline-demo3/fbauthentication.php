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

		/************************************************************************************
		  * Facebook authentication file, stores facebook page access token in config file.
		  * Date    : Mar-07-2017
		  * Author  : Nitheesh <nitheesh@simplecrm.com.sg>
		  * Facebook api version : 2.8
		  * PHP version : 5.6 
		************************************************************************************/
		session_start();

		include 'config.php';
		include 'config_override.php';

		$page_access_token  = "";

		// get parameters from sugar_config file
		$app_id             = $sugar_config['facebook_app_id'];
		$app_secret         = $sugar_config['facebook_secret_id'];
		$page_name          = $sugar_config['facebook_page_name'];
		$page_id            = $sugar_config['facebook_page_id'];
		$site_url           = $sugar_config['site_url'];
		$last_character     = substr($site_url, -1); // returns last character
		if ($last_character == '/') {
			$site_url = substr($site_url, 0, -1); //remove last character same as substr_replace($string, "", -1)
		}

		// required scope
		$required_scope = 'public_profile,user_managed_groups,user_posts,ads_management,ads_read,email,manage_pages,publish_actions,publish_pages,read_insights,read_page_mailboxes,rsvp_event';

		$redirect_url = $site_url.'/fbauthentication.php';

		require_once "custom/include/facebook/autoload.php";

		use Facebook\FacebookSession;
		use Facebook\FacebookRequest;
		use Facebook\GraphUser;
		use Facebook\FacebookRedirectLoginHelper;

		FacebookSession::setDefaultApplication($app_id , $app_secret);
		$helper = new FacebookRedirectLoginHelper($redirect_url);

		try {
		  $session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
		    die(" Error : " . $ex->getMessage());
		} catch(\Exception $ex) {
		    die(" Error : " . $ex->getMessage());
		}

		if (!$session){
			$login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );
			header("location:$login_url");
		}

		else{

			// Get a list of pages that this user admins; requires "manage_pages" permission
			$request = new FacebookRequest($session, 'GET', '/me/accounts?fields=name,access_token,perms');
			$pageList = $request->execute()
			  ->getGraphObject()
			  ->asArray();

			$pageList_data = $pageList['data'];

			if (count($pageList_data) > 0) {

				for ($v=0; $v < count($pageList_data); $v++) { 

					$each_page       = $pageList_data[$v];
					$pageID          = $each_page->id;

					if ($pageID == $page_id) {
						$page_access_token = $each_page->access_token;
						break;
					}
				}

			}

		}

		if(!defined('sugarEntry')) define('sugarEntry', true);
		require_once('include/entryPoint.php');
		require_once('config.php');
		global $sugar_config;
	    require_once 'modules/Configurator/Configurator.php';

		if (!empty($page_access_token)) {
		
			$configurator = new Configurator();
			$configurator->loadConfig(); // it will load existing configuration in config variable of object
			$configurator->config['facebook_page_access_token']  = $page_access_token;
			$configurator->saveConfig(); // save changes
						
			echo "Connected successfully and saved Access Token data.";
		}
		if (empty($page_access_token)) {
			echo "Something went wrong, please try later.";
		}
?>