<?php

    //if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
    class dialogClass
    {
        function dialogMethod($bean, $event, $arguments)
        {
         


         		ini_set("display_errors","On");
				require_once('config.php');
				// require_once('/include/SugarQuery/SugarQuery.php');

				
				// $your_url = $GLOBALS['sugar_config']['site_url'];
				//           echo $your_url;
				// $id='28d66f24-906b-2d9c-577a-5af921d07492';
				 
				// global $db;
				// $bean = BeanFactory::getBean("shubh_Bookstore",'$id');
				// $sql = "SELECT  `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `description`, `deleted`, `assigned_user_id`, `bookstore`, `bookauther`, `publishingdate`, `bookcover` FROM `shubh_bookstore` WHERE id='$id'";
				// $result= $db->query($sql);
				// $row=$db->fetchByAssoc($result);
				// $bean->description=$row['bookauther']."and".$row['bookstore'];

				// print_r($bean);   
				// echo $bean;

				echo "Hello";
        }
    }

?>