<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    ini_set('display_errors', 'on');
    $url = "http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/service/v4_1/rest.php";
    $username = "admin";
    $password = "admin";

    $name=$_REQUEST['name'];
    $bookTitle=$_REQUEST['bookTitle'];
    $bookAuther=$_REQUEST['bookAuther'];
    $publishingDate=@$_REQUEST['publishingDate'];
   

    //function to make cURL request
    function call($method, $parameters, $url)
    {
        ob_start();
        $curl_request = curl_init();

        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();

        return $response;
    }

    //login --------------------------------------------- 
    $login_parameters = array(
         "user_auth" => array(
              "user_name" => $username,
              "password" => md5($password),
              "version" => "1"
         ),
         "application_name" => "RestTest",
         "name_value_list" => array(),
    );

    $login_result = call("login", $login_parameters, $url);

    /*
    echo "<pre>";
    print_r($login_result);
    echo "</pre>";
    */

    //get session id
    $session_id = $login_result->id;

    //create account ------------------------------------- 
    $set_entry_parameters = array(
         //session id
         "session" => $session_id,

         //The name of the module from which to retrieve records.
         "module_name" => "shubh_Bookstore",

         //Record attributes
         "name_value_list" => array(
              //to update a record, you will nee to pass in a record id as commented below
              //array("name" => "id", "value" => "9b170af9-3080-e22b-fbc1-4fea74def88f"),
              array("name" => "name", "value" => "$name"),
               array("name" => "bookstore", "value" => "$bookTitle"),
                array("name" => "bookauther", "value" => "$bookAuther"),
                 array("name" => "publishing_date_c", "value" => "$publishingDate"),
                 

         ),
    );

    $set_entry_result = call("set_entry", $set_entry_parameters, $url);
    
    error_log("Entry point Executed");
    
    echo json_encode($set_entry_result);


?>