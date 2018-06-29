=== Mobile CRM changes plugin ===
Contributors: Nitheesh.R

== Description ==

This plugin is used for the integration between mobile application and CRM.
Plugin contains CRM level changes for the proper working of mobile application 
which includes field level and code level changes.

== Installation ==

  * Go to the admin panel of the CRM.
  * Upload the plugin file through module loader.
  * Do quick repair and rebuild 

    The following files/ folders will move to CRM after installing the plugin 
   
	1. custom/Extension/modules
	2. mobilecrm
	3. custom/modules
	4. _uploadCallLogs.php
	5. _uploadEmails.php
	6. _uploadSMS.php

	    Please make sure proper permissions to the newly added files and folders 
	    Recommended file permission is 775.


== Configuration ==

	After the installation, we need to do the plugin configuration.
	We can do the configuration by running configuration.php file which is located in mobilecrm folder.

	Run the below url in the browser to configure the plugin : 
	<CRM_SITE_URL>/mobilecrm/configuration.php

		For example, if CRM_SITE_URL is https://crm.example.com
		Run the configuration file like this : https://crm.example.com/mobilecrm/configuration.php in browser.

== Testing ==

	We can test the plugin by running test.php file which is located in mobilecrm folder.

	Run the below url in the browser to test the plugin : 
	<CRM_SITE_URL>/mobilecrm/test.php

	For example, if CRM_SITE_URL is https://crm.example.com
	Run the test file like this : https://crm.example.com/mobilecrm/test.php in browser.