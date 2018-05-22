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
//Controller class to make twitter api call and data handling of api response
class ContactsController extends SugarController {

    function action_Popup() {
        if (!empty($_REQUEST['html']) && $_REQUEST['html'] == 'mail_merge') {
            $this->view = 'mailmergepopup';
        } else {
            $this->view = 'popup';
        }
    }

    function action_ValidPortalUsername() {
        $this->view = 'validportalusername';
    }

    function action_RetrieveEmail() {
        $this->view = 'retrieveemail';
    }

    function action_ContactAddressPopup() {
        $this->view = 'contactaddresspopup';
    }

    function action_CloseContactAddressPopup() {
        $this->view = 'closecontactaddresspopup';
    }

    /*
      Get tweets based on twitter handle
      Author     : Nitheesh.R <nitheesh@simplecrm.com.sg>
      Date       : April-10-2017
      php version : 5.6
     */
    public function action_get_tweets() {

        global $sugar_config;

        $twitter_app_oauth_access_token = $sugar_config['twitter_app_oauth_access_token'];
        $twitter_app_oauth_access_token_secret = $sugar_config['twitter_app_oauth_access_token_secret'];
        $twitter_app_consumer_key = $sugar_config['twitter_app_consumer_key'];
        $twitter_app_consumer_secret = $sugar_config['twitter_app_consumer_secret'];

        $twitter_handle = $_REQUEST['twitter_handle'];

        // Twitter connection through api and data fetching in json format
        require_once('custom/include/twitter/twitter_api_php_master/TwitterAPIExchange.php');

        /** Set access tokens here - see: https://dev.twitter.com/apps/ * */
        $settings = array(
            'oauth_access_token' => $twitter_app_oauth_access_token,
            'oauth_access_token_secret' => $twitter_app_oauth_access_token_secret,
            'consumer_key' => $twitter_app_consumer_key,
            'consumer_secret' => $twitter_app_consumer_secret
        );

        //Fetch user details - start
        $url1 = "https://api.twitter.com/1.1/users/show.json";
        $requestMethod1 = "GET";
        $getfield1 = "?screen_name=$twitter_handle";
        $twitter1 = new TwitterAPIExchange($settings);
        $string1 = json_decode($twitter1->setGetfield($getfield1)
                        ->buildOauth($url1, $requestMethod1)
                        ->performRequest(), $assoc = TRUE);

        $twitter_id = $string1['id'];
        $twitter_display_name = $string1['name'];
        $twitter_profile_image_url = $string1['profile_image_url'];
        $twitter_profile_image_url_https = $string1['profile_image_url_https'];
        //Fetch user details - end
        // get user tweets
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
        $requestMethod = "GET";
        $count = 5;
        $getfield = "?screen_name=$twitter_handle&count=$count";

        $twitter = new TwitterAPIExchange($settings);
        $string = json_decode($twitter->setGetfield($getfield)
                        ->buildOauth($url, $requestMethod)
                        ->performRequest(), $assoc = TRUE);
        if ($string["errors"][0]["message"] != "") {
            echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";
            exit();
        }

        $array_count = 0;

        foreach ($string as $items) {

            $time_and_date_of_tweet = $items['created_at']; // Published_date   
            $time_and_date_of_tweet_split = split(" ", $time_and_date_of_tweet);
            $time_and_date_of_tweet_split['0'];
            $time_and_date_of_tweet_split['1'];
            $time_and_date_of_tweet_split['2'];
            $time_and_date_of_tweet_split['3'];
            $time_and_date_of_tweet_split['5'];
            $time = $time_and_date_of_tweet_split['3'];
            $time_corrected = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : UTC + 5:30

            $time_and_date_of_tweet_correct = $time_and_date_of_tweet_split['2'] . "-" . $time_and_date_of_tweet_split['1'] . "-" . $time_and_date_of_tweet_split['5'] . " " . $time_corrected;

            $Published_date = $time_and_date_of_tweet_correct;
            $tweet = $items['text']; // message
            $message = $tweet;
            $tweet_id = $items['id'];
            $tweeted_by = $items['user']['name'];
            $tweeted_by_id = $items['user']['id'];
            $tweeted_by_screen_name = $items['user']['screen_name'];
            $tweeted_by_location = $items['user']['location'];
            $tweeted_by_description = $items['user']['description'];
            $retweet_count = $items['retweet_count'];  // retweets_count
            $actual_retweet_count = $retweet_count;
            $favorite_count = $items['favorite_count']; // favourites_count
            $actual_favorite_count = $favorite_count;
            $retweeted_status = $items['retweeted_status'];

            $arr_length = count($retweeted_status);

            // retweet some other tweet
            if ($arr_length != 0) {

                $retweeted_status_id = $items['retweeted_status']['id'];
                $retweeted_status_user_name = $items['retweeted_status']['user']['name'];
                $retweeted_status_user_screen_name = $items['retweeted_status']['user']['screen_name'];
                $retweeted_status_user_profile_image_url = $items['retweeted_status']['user']['profile_image_url'];
                $retweeted_status_retweet_count = $items['retweeted_status']['retweet_count'];
                $retweeted_status_favorite_count = $items['retweeted_status']['favorite_count'];

                $status_id = $retweeted_status_id;
                $page_or_user_dispaly_name = $retweeted_status_user_name;
                $page_or_user_screen_name = $retweeted_status_user_screen_name;
                $image_url = $retweeted_status_user_profile_image_url;
                $actual_retweet_count = $retweeted_status_retweet_count;
                $actual_favorite_count = $retweeted_status_favorite_count;
            }

            if ($arr_length == 0) {

                $is_quote_status = $items['is_quote_status'];

                // tweet newly with some other tweet(quoted tweet).
                if ($is_quote_status == 1) {

                    $quoted_status_id = $items['quoted_status']['id'];
                    $quoted_status_retweet_count = $items['quoted_status']['retweet_count'];
                    $quoted_status_favorite_count = $items['quoted_status']['favorite_count'];
                    $quoted_status_user_name = $items['quoted_status']['user']['name'];
                    $quoted_status_user_screen_name = $items['quoted_status']['user']['screen_name'];
                    $quoted_status_user_profile_image_url = $items['quoted_status']['user']['profile_image_url'];

                    $status_id = $quoted_status_id;
                    $page_or_user_dispaly_name = $quoted_status_user_name;
                    $page_or_user_screen_name = $quoted_status_user_screen_name;
                    $image_url = $quoted_status_user_profile_image_url;
                    $actual_retweet_count = $quoted_status_retweet_count;
                    $actual_favorite_count = $quoted_status_favorite_count;
                }

                if ($is_quote_status != 1) {

                    $tweeted_user_name = $items['user']['name'];
                    $tweeted_by_screen_name = $items['user']['screen_name'];
                    $tweeted_by_profile_image_url = $items['user']['profile_image_url'];
                    $tweet = $items['text']; // $data_content
                    $tweet_id = $items['id']; // $status_id
                    $tweet_retweet_count = $items['retweet_count'];
                    $tweet_favorite_count = $items['favorite_count'];

                    $status_id = $tweet_id;
                    $page_or_user_dispaly_name = $tweeted_user_name;
                    $page_or_user_screen_name = $tweeted_by_screen_name;
                    $image_url = $tweeted_by_profile_image_url;
                    $actual_retweet_count = $tweet_retweet_count;
                    $actual_favorite_count = $tweet_favorite_count;
                }
            }

            $array_count++;

            $message = preg_replace("/(\r?\n){2,}/", "\n\n", $message);
            $message = preg_replace("/[\r\n]{2,}/", "\n\n", $message);
            $message = preg_replace("/[\r\n]+/", "\n", $message);
            $message = wordwrap($message, 60, ' <br/>', true);
            $message = nl2br($message);
            $message = preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/', "\n", $message));
            $message = preg_replace("/\r|\n/", "", $message);
            $message = str_replace(array("\r", "\n"), '', $message);
            //for removing bad data
            $message = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

            $hids = "hids_" . $array_count;
            $trs = "trs_" . $array_count;
            $msg = "msg_" . $array_count;
            $tds = "tds_" . $array_count;
            $sels = "sels_" . $array_count;

            $hid_data = $message . "abcd0123dcba" . $status_id . "abcd0123dcba" . $Published_date . "abcd0123dcba" . $page_or_user_dispaly_name . "abcd0123dcba" . $page_or_user_screen_name . "abcd0123dcba" . $image_url;

            $tbody .= '<tr id="' . $trs . '" class="listViewEntries mm_normal mm_clickable"><td class="narrowWidthType table_padding_margin">' . $Published_date . '</td><td class="narrowWidthType table_padding_margin table_message_padding"><span id="' . $msg . '" ><span><a title="' . $page_or_user_dispaly_name . '" target="_blank" href="https://twitter.com/' . $page_or_user_screen_name . '"><img width="20" height="20" src="' . $image_url . '"></a></span>&nbsp;&nbsp;<span><a class="feedText" style="text-decoration:none;color:inherit" data-trigger="hover" data-placement="top" rel="popover" data-content="' . $data_content . '" target="_blank" href="https://twitter.com/string/status/' . $status_id . '">' . $message . '</a></span></span></td><td><center> ' . $actual_retweet_count . '</center></td><td><center>' . $actual_favorite_count . '</center></td><td id="' . $tds . '" class="narrowWidthType table_padding_margin"><div class="actions"><select class="actions_dd" id="' . $sels . '" style="color:green; margin-left:10px;"><option id="nothing" name="nothing" value=""></option><option id="actions_add_lead" name="actions_add_lead" style=" margin-top:5px;margin-bottom:5px;font-size:14px;" value="Add Lead">Add Lead</option><option value="Add Contact" id="actions_add_contact" name="actions_add_contact" style=" margin-top:5px;margin-bottom:5px;font-size:14px;" >Add Contact</option><option  id="actions_add_opportunities" name="actions_add_opportunities" value="Add Opportunity" style=" margin-top:5px;margin-bottom:5px;font-size:14px;" >Add Opportunity</option><option id="actions_add_case" name="actions_add_case" value="Add Case" style=" margin-top:5px;margin-bottom:5px;font-size:14px;" >Add Case</option></select></div></td><td></td></tr><tr><input type="hidden" value="' . $hid_data . '" id="' . $hids . '"></tr>';
        }

        $data = array();
        $data['result_count'] = $array_count;
        $data['twitter_data'] = $tbody;
        $data['got_twitter_data'] = "yes";
        $data['twitter_display_name'] = $twitter_display_name;
        $data['twitter_profile_image_url'] = $twitter_profile_image_url;
        echo json_encode($data);
    }

    /*
      Create Contacts
      Author     : Nitheesh.R <nitheesh@simplecrm.com.sg>
      Date       : April-10-2017
      php version : 5.6
     */
    public function action_create_records() {

        global $sugar_config;
        global $db;

        $module           = $_REQUEST['module'];
        $action           = $_REQUEST['action'];
        $to_pdf           = $_REQUEST['to_pdf'];
        $first_name       = $_REQUEST['first_name'];
        $last_name        = $_REQUEST['last_name'];
        $twitter_handle_c = $_REQUEST['twitter_handle_c'];
        $lead_source      = $_REQUEST['lead_source'];
        $description      = $_REQUEST['description'];
        $status_id        = $_REQUEST['status_id'];
        $account_id       = $_REQUEST['account_id'];

        $contact = new Contact();

        $contact->first_name = $first_name;
        $contact->last_name = $last_name;
        $contact->lead_source = $lead_source;
        $contact->description = $description;
        $contact->tweet_id_c = $status_id;
        $contact->twitter_handle_c = $twitter_handle_c;
        $contact->account_id = $account_id;

        $query1 = "SELECT id_c FROM contacts_cstm, contacts WHERE id = id_c AND deleted = 0 AND  twitter_handle_c  = '$twitter_handle_c' AND lead_source = '$lead_source'";

        $value1 = $db->query($query1);
        $check1 = $get_values_row1 = $db->fetchByAssoc($value1);

        if (!$check1) {
            $contact->save();
            $created = "y";
        }
        if ($check1) {
            $created = "n";
        }

        $sql = "SELECT id_c FROM contacts_cstm, contacts WHERE id = id_c AND deleted = 0 AND  twitter_handle_c  = '$twitter_handle_c' AND lead_source = '$lead_source'";
        $result = $db->query($sql);

        if ($row6 = $db->fetchByAssoc($result)) {
            $id_c = $row6['id_c'];
        }
        $data2 = array();
        $data2['id_c'] = $id_c;
        $data2['created'] = $created;

        echo json_encode($data2);
    }

}
