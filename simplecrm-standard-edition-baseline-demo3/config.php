<?php
// created: 2018-05-17 10:09:24
$sugar_config = array (
  'SAML_X509Cert' => '',
  'SAML_loginurl' => '',
  'addAjaxBannedModules' => 
  array (
    0 => 'Accounts',
    1 => 'SecurityGroups',
    2 => 'AOR_Reports',
    3 => 'Opportunities',
    4 => 'scrm_Partners',
    5 => 'scrm_Partner_Contacts',
    6 => 'Meetings',
    7 => 'Meetings',
    8 => 'Leads',
    9 => 'Leads',
  ),
  'admin_access_control' => false,
  'admin_export_only' => false,
  'aod' => 
  array (
    'enable_aod' => false,
  ),
  'aop' => 
  array (
    'distribution_method' => 'singleUser',
    'case_closure_email_template_id' => '4605faa3-873f-213b-783f-56b49770196b',
    'joomla_account_creation_email_template_id' => '4837e629-66b6-171c-038b-56b4972455c4',
    'case_creation_email_template_id' => '4ad96d2e-7082-df92-7f36-56b497f1eb96',
    'contact_email_template_id' => '4de57bde-919e-abae-1260-56b497e4a370',
    'user_email_template_id' => '5066603f-7916-5381-b2fb-56b497f3ab64',
    'enable_aop' => false,
    'joomla_url' => '',
    'enable_portal' => false,
    'distribution_user_id' => '62bb199f-9581-c19c-aba9-55df0b1ae760',
    'distribution_options' => 
    array (
      0 => 'role',
      1 => '',
      2 => 'de53c69f-a395-8092-5b3a-55df0b409dec',
    ),
    'support_from_address' => '',
    'support_from_name' => '',
    'case_status_changes' => 'null',
  ),
  'aos' => 
  array (
    'version' => '5.3.3',
    'contracts' => 
    array (
      'renewalReminderPeriod' => '14',
    ),
    'lineItems' => 
    array (
      'totalTax' => false,
      'enableGroups' => true,
    ),
    'invoices' => 
    array (
      'initialNumber' => '1',
    ),
    'quotes' => 
    array (
      'initialNumber' => '1',
    ),
  ),
  'asterisk_call_subject_inbound_abbr' => 'IBC: ',
  'asterisk_call_subject_max_length' => '50',
  'asterisk_call_subject_outbound_abbr' => 'OBC: ',
  'asterisk_context' => 'from-internal',
  'asterisk_dialin_ext_match' => 'Local\\/(?:.*?)(\\d\\d\\d?\\d?\\d?)@',
  'asterisk_dialout_channel' => 'SIP/###',
  'asterisk_expr' => '^(sip\\/[1-9][0-9][0-9]?[0-9]?-|Local)',
  'asterisk_host' => '127.0.0.1',
  'asterisk_listener_poll_rate' => '5000',
  'asterisk_log_file' => 'asteriskLog.txt',
  'asterisk_port' => '5038',
  'asterisk_secret' => 'dialog',
  'asterisk_soappass' => 'simplecrm2015',
  'asterisk_soapuser' => 'admin',
  'asterisk_user' => 'dialog',
  'authenticationClass' => '',
  'cache_dir' => 'cache/',
  'calculate_response_time' => true,
  'calendar' => 
  array (
    'default_view' => 'week',
    'show_calls_by_default' => true,
    'show_tasks_by_default' => true,
    'show_completed_by_default' => true,
    'editview_width' => 990,
    'editview_height' => 485,
    'day_timestep' => 15,
    'week_timestep' => 30,
    'items_draggable' => true,
    'items_resizable' => true,
    'enable_repeat' => true,
    'max_repeat_count' => 1000,
  ),
  'chartEngine' => 'Jit',
  'common_ml_dir' => '',
  'create_default_user' => false,
  'cron' => 
  array (
    'max_cron_jobs' => 10,
    'max_cron_runtime' => 30,
    'min_cron_interval' => 30,
    'allowed_cron_users' => 
    array (
      0 => 'apache',
      1 => 'root',
    ),
  ),
  'currency' => '',
  'dashlet_auto_refresh_min' => '30',
  'dashlet_display_row_options' => 
  array (
    0 => '1',
    1 => '3',
    2 => '5',
    3 => '10',
  ),
  'date_formats' => 
  array (
    'Y-m-d' => '2010-12-23',
    'm-d-Y' => '12-23-2010',
    'd-m-Y' => '23-12-2010',
    'Y/m/d' => '2010/12/23',
    'm/d/Y' => '12/23/2010',
    'd/m/Y' => '23/12/2010',
    'Y.m.d' => '2010.12.23',
    'd.m.Y' => '23.12.2010',
    'm.d.Y' => '12.23.2010',
  ),
  'datef' => 'm/d/Y',
  'dbconfig' => 
  array (
    'db_host_name' => 'localhost',
    'db_host_instance' => 'SQLEXPRESS',
    'db_user_name' => 'root',
    'db_password' => 'root',
    'db_name' => 'simpleshubhdb',
    'db_type' => 'mysql',
    'db_port' => '',
    'db_manager' => 'MysqliManager',
    'use_encryption' => true,
    'filesystem_encryption_only' => true,
  ),
  'dbconfigoption' => 
  array (
    'persistent' => true,
    'autofree' => false,
    'debug' => 0,
    'ssl' => false,
    'collation' => 'utf8_general_ci',
  ),
  'default_action' => 'index',
  'default_charset' => 'UTF-8',
  'default_currencies' => 
  array (
    'AUD' => 
    array (
      'name' => 'Australian Dollars',
      'iso4217' => 'AUD',
      'symbol' => '$',
    ),
    'BRL' => 
    array (
      'name' => 'Brazilian Reais',
      'iso4217' => 'BRL',
      'symbol' => 'R$',
    ),
    'GBP' => 
    array (
      'name' => 'British Pounds',
      'iso4217' => 'GBP',
      'symbol' => '£',
    ),
    'CAD' => 
    array (
      'name' => 'Canadian Dollars',
      'iso4217' => 'CAD',
      'symbol' => '$',
    ),
    'CNY' => 
    array (
      'name' => 'Chinese Yuan',
      'iso4217' => 'CNY',
      'symbol' => '￥',
    ),
    'EUR' => 
    array (
      'name' => 'Euro',
      'iso4217' => 'EUR',
      'symbol' => '€',
    ),
    'HKD' => 
    array (
      'name' => 'Hong Kong Dollars',
      'iso4217' => 'HKD',
      'symbol' => '$',
    ),
    'INR' => 
    array (
      'name' => 'Indian Rupees',
      'iso4217' => 'INR',
      'symbol' => '₨',
    ),
    'KRW' => 
    array (
      'name' => 'Korean Won',
      'iso4217' => 'KRW',
      'symbol' => '₩',
    ),
    'YEN' => 
    array (
      'name' => 'Japanese Yen',
      'iso4217' => 'JPY',
      'symbol' => '¥',
    ),
    'MXM' => 
    array (
      'name' => 'Mexican Pesos',
      'iso4217' => 'MXM',
      'symbol' => '$',
    ),
    'SGD' => 
    array (
      'name' => 'Singaporean Dollars',
      'iso4217' => 'SGD',
      'symbol' => '$',
    ),
    'CHF' => 
    array (
      'name' => 'Swiss Franc',
      'iso4217' => 'CHF',
      'symbol' => 'SFr.',
    ),
    'THB' => 
    array (
      'name' => 'Thai Baht',
      'iso4217' => 'THB',
      'symbol' => '฿',
    ),
    'USD' => 
    array (
      'name' => 'US Dollars',
      'iso4217' => 'USD',
      'symbol' => '$',
    ),
    'MXN' => 
    array (
      'name' => 'Mexican Pesos',
      'iso4217' => 'MXN',
      'symbol' => '$',
    ),
  ),
  'default_currency_iso4217' => 'LKR',
  'default_currency_name' => 'Sri Lanka Rupee ',
  'default_currency_significant_digits' => 2,
  'default_currency_symbol' => 'Rs ',
  'default_date_format' => 'd-m-Y',
  'default_decimal_seperator' => '.',
  'default_email_charset' => 'UTF-8',
  'default_email_client' => 'sugar',
  'default_email_editor' => 'html',
  'default_export_charset' => 'UTF-8',
  'default_language' => 'en_us',
  'default_locale_name_format' => 's f l',
  'default_max_tabs' => 7,
  'default_module' => 'Home',
  'default_module_favicon' => false,
  'default_navigation_paradigm' => 'gm',
  'default_number_grouping_seperator' => ',',
  'default_password' => '',
  'default_permissions' => 
  array (
    'dir_mode' => 1528,
    'file_mode' => 493,
    'user' => '',
    'group' => '',
  ),
  'default_subpanel_links' => false,
  'default_subpanel_tabs' => true,
  'default_swap_last_viewed' => false,
  'default_swap_shortcuts' => false,
  'default_theme' => 'SuiteR',
  'default_time_format' => 'h:ia',
  'default_user_is_admin' => false,
  'default_user_name' => '',
  'demoData' => 'yes',
  'developerMode' => false,
  'disable_convert_lead' => false,
  'disable_export' => false,
  'disable_persistent_connections' => false,
  'disabled_languages' => 'es_es,ru_ru',
  'disabled_themes' => 'Suite7',
  'display_email_template_variable_chooser' => false,
  'display_inbound_email_buttons' => false,
  'dump_slow_queries' => false,
  'email_address_separator' => ',',
  'email_default_client' => 'sugar',
  'email_default_delete_attachments' => true,
  'email_default_editor' => 'html',
  'email_xss' => 'YToxMzp7czo2OiJhcHBsZXQiO3M6NjoiYXBwbGV0IjtzOjQ6ImJhc2UiO3M6NDoiYmFzZSI7czo1OiJlbWJlZCI7czo1OiJlbWJlZCI7czo0OiJmb3JtIjtzOjQ6ImZvcm0iO3M6NToiZnJhbWUiO3M6NToiZnJhbWUiO3M6ODoiZnJhbWVzZXQiO3M6ODoiZnJhbWVzZXQiO3M6NjoiaWZyYW1lIjtzOjY6ImlmcmFtZSI7czo2OiJpbXBvcnQiO3M6ODoiXD9pbXBvcnQiO3M6NToibGF5ZXIiO3M6NToibGF5ZXIiO3M6NDoibGluayI7czo0OiJsaW5rIjtzOjY6Im9iamVjdCI7czo2OiJvYmplY3QiO3M6MzoieG1wIjtzOjM6InhtcCI7czo2OiJzY3JpcHQiO3M6Njoic2NyaXB0Ijt9',
  'enable_action_menu' => true,
  'enable_line_editing_detail' => false,
  'enable_line_editing_list' => false,
  'export_delimiter' => ',',
  'export_excel_compatible' => false,
  'facebook_app_id' => '',
  'facebook_page_access_token' => '',
  'facebook_page_id' => '',
  'facebook_page_name' => '',
  'facebook_secret_id' => '',
  'hide_subpanels' => true,
  'history_max_viewed' => 50,
  'host_name' => 'simplecrmdemo.com',
  'http_referer' => 
  array (
    'list' => 
    array (
      0 => '161.202.21.12',
    ),
  ),
  'import_max_execution_time' => 3600,
  'import_max_records_per_file' => 100,
  'import_max_records_total_limit' => '',
  'installer_locked' => true,
  'jobs' => 
  array (
    'min_retry_interval' => 30,
    'max_retries' => 5,
    'timeout' => 86400,
  ),
  'js_custom_version' => 1,
  'js_lang_version' => 6,
  'languages' => 
  array (
    'en_us' => 'English (US)',
  ),
  'large_scale_test' => false,
  'lead_conv_activity_opt' => 'donothing',
  'list_max_entries_per_page' => 20,
  'list_max_entries_per_subpanel' => '5',
  'lock_default_user_name' => false,
  'lock_homepage' => false,
  'lock_subpanels' => true,
  'log_dir' => '.',
  'log_file' => 'suitecrm.log',
  'log_memory_usage' => false,
  'logger' => 
  array (
    'level' => 'fatal',
    'file' => 
    array (
      'ext' => '.log',
      'name' => 'sugarcrm',
      'dateFormat' => '%c',
      'maxSize' => '10MB',
      'maxLogs' => 10,
      'suffix' => '',
    ),
  ),
  'max_dashlets_homepage' => '15',
  'name_formats' => 
  array (
    's f l' => 's f l',
    'f l' => 'f l',
    's l' => 's l',
    'l, s f' => 'l, s f',
    'l, f' => 'l, f',
    's l, f' => 's l, f',
    'l s f' => 'l s f',
    'l f s' => 'l f s',
  ),
  'outfitters_licenses' => 
  array (
    'process-manager-40' => '29d9891eae540d17a1b70a666677bf39',
  ),
  'passwordsetting' => 
  array (
    'SystemGeneratedPasswordON' => '0',
    'generatepasswordtmpl' => 'a45ba120-ff7d-18ff-be21-56b4977c9586',
    'lostpasswordtmpl' => 'a68d12bb-54c9-3508-274b-56b4977883df',
    'forgotpasswordON' => true,
    'linkexpiration' => true,
    'linkexpirationtime' => 24,
    'linkexpirationtype' => 60,
    'systexpiration' => 1,
    'systexpirationtime' => 7,
    'systexpirationtype' => '0',
    'systexpirationlogin' => '',
    'minpwdlength' => 6,
    'oneupper' => false,
    'onelower' => false,
    'onenumber' => false,
  ),
  'portal_view' => 'single_user',
  'require_accounts' => false,
  'resource_management' => 
  array (
    'special_query_limit' => 50000,
    'special_query_modules' => 
    array (
      0 => 'Reports',
      1 => 'Export',
      2 => 'Import',
      3 => 'Administration',
      4 => 'Sync',
    ),
    'default_limit' => 20000,
  ),
  'rss_cache_time' => '10800',
  'save_query' => 'all',
  'search_wildcard_char' => '%',
  'search_wildcard_infront' => false,
  'securitysuite_additive' => true,
  'securitysuite_filter_user_list' => false,
  'securitysuite_inbound_email' => false,
  'securitysuite_inherit_assigned' => true,
  'securitysuite_inherit_creator' => true,
  'securitysuite_inherit_parent' => false,
  'securitysuite_popup_select' => false,
  'securitysuite_strict_rights' => false,
  'securitysuite_user_popup' => true,
  'securitysuite_user_role_precedence' => true,
  'securitysuite_version' => '6.5.17',
  'session_dir' => '',
  'showDetailData' => true,
  'showThemePicker' => true,
  'site_url' => 'http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/',
  'slow_query_time_msec' => '100',
  'stack_trace_errors' => false,
  'sugar_version' => '6.5.24',
  'sugarbeet' => false,
  'suitecrm_version' => '7.8.0',
  'theme_settings' => 
  array (
    'SuiteR' => 
    array (
      'display_sidebar' => true,
      'navbar' => '0D2340',
      'navbar_hover' => 'E9E9E9',
      'navbar_font' => 'F7F7F7',
      'navbar_link_hover' => 'F7F5F2',
      'dropdown_menu' => 'FFFFFF',
      'dropdown_menu_link' => '434242',
      'dropdown_menu_link_hover' => '434242',
      'action_menu_background' => 'FFFFFF',
      'action_menu_background_hover' => 'DEDEDE',
      'button' => 'FFFFFF',
      'button_hover' => 'FFFFFF',
      'button_link' => '000000',
      'button_link_hover' => '000000',
      'page_header' => '2767A8',
      'page_link' => '2767A8',
      'dashlet' => 'FFFFFF',
      'icon' => 'FFFFFF',
      'suggestion_popup_from' => 'FFFFFF',
      'suggestion_popup_to' => '2767A8',
    ),
    'Suite7' => 
    array (
      'menu' => '262525',
      'menuto' => '262525',
      'menufrom' => '333333',
      'menubrd' => '2767A8',
      'modlink' => 'CCCCCC',
      'modlinkhover' => 'CCCCCC',
      'modlisthover' => '565656',
      'cssmenu' => '333333',
      'cssmenulink' => 'CCCCCC',
      'button' => 'FFFFFF',
      'button_hover' => 'FFFFFF',
      'button_link' => '262525',
      'button_link_hover' => 'FFFFFF',
      'pageheader' => '2767A8',
      'page_link' => '2767A8',
      'dashlet' => '777777',
    ),
  ),
  'time_formats' => 
  array (
    'H:i' => '23:00',
    'h:ia' => '11:00pm',
    'h:iA' => '11:00PM',
    'h:i a' => '11:00 pm',
    'h:i A' => '11:00 PM',
    'H.i' => '23.00',
    'h.ia' => '11.00pm',
    'h.iA' => '11.00PM',
    'h.i a' => '11.00 pm',
    'h.i A' => '11.00 PM',
  ),
  'timef' => 'H:i',
  'tmp_dir' => 'cache/xml/',
  'tracker_max_display_length' => 15,
  'translation_string_prefix' => false,
  'twitter_app_consumer_key' => '',
  'twitter_app_consumer_secret' => '',
  'twitter_app_oauth_access_token' => '',
  'twitter_app_oauth_access_token_secret' => '',
  'twitter_page_handle' => '',
  'twitter_page_id' => '',
  'twitter_page_name' => '',
  'unique_key' => '9ed5a205345cd0c84ef4557327888a4y',
  'upload_badext' => 
  array (
    0 => 'php',
    1 => 'php3',
    2 => 'php4',
    3 => 'php5',
    4 => 'pl',
    5 => 'cgi',
    6 => 'py',
    7 => 'asp',
    8 => 'cfm',
    9 => 'js',
    10 => 'vbs',
    11 => 'html',
    12 => 'htm',
    13 => 'phtml',
  ),
  'upload_dir' => 'upload/',
  'upload_maxsize' => 30000000,
  'use_common_ml_dir' => false,
  'use_real_names' => true,
  'vcal_time' => '2',
  'verify_client_ip' => false,
  'allow_pop_inbound' => true,
  'external_cache' => 
  array (
    'redis' => 
    array (
      'host' => '127.0.0.1',
      'port' => '6379',
    ),
  ),
  'external_cache_disabled_redis' => false,
  'facebook_keywords_lead' => '',
  'facebook_keywords_case' => '',
);