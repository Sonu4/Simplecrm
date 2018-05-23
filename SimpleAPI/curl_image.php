
<?php
	
	ini_set('display_errors', 'on');
	
	if (isset($_POST['submit'])=='submit' && isset($_POST['name']) && isset($_POST['bookTitle']) && isset($_POST['bookAuther']) && isset($_FILES['image']['tmp_name']))  {

		$url = "http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/service/v4_1/rest.php";
	    $username = "admin";
	    $password = "admin";


	    $name=$_REQUEST['name'];
	    $bookTitle=$_REQUEST['bookTitle'];
	    $bookAuther=$_REQUEST['bookAuther'];
	    $publishingDate=@$_REQUEST['publishingDate'];

	    // checks the image size.
	    // if (getimagesize($_FILES['image']['tmp_name'])==false) {
	    // 	echo "Emage is not loadded";
	    // }else{

	    // $image=addslashes($_FILES['image']['tmp_name']);// add slashes to the string.
	    // $name=addslashes($_FILES['image']['name']);
	    // $image=file_get_contents($image); //This function is the preferred way to read the contents of a file into a string. Because it will use memory mapping techniques, if this is supported by the server, to enhance performance.

	    // $image = base64_encode($image);//Encodes data with MIME base64,http://php.net/manual/en/function.base64-encode.php

	    // }

	    



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


			     $path = $_FILES['image']['tmp_name']; 
			     $target_file = basename($_FILES['image']['name']);

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
			                   array("name" => "bookcover", "value" => "$target_file"),
			    
			         ),
			    );

			    $set_entry_result = call("set_entry", $set_entry_parameters, $url);
			    
			   // error_log("Entry point Executed");
			 //    $output=json_encode($set_entry_result);
				// $o=json_decode($output);

			        $book_id = $set_entry_result->id;
			        //echo $note_id;
			      
			         //create note attachment -----------------------------------------	   
			          $contents = file_get_contents ($path);  

			            $set_note_attachment_parameters = array(      
			              //session id        
			              "session" => $session_id,    
			                  //The attachment details       
			                   "bookcover" => array(        
			                     //The ID of the bookstore containing the attachment.      
			                     'id' => "$book_id", //The file name of the attachment.  

			                     'name'=> 'bookcover',

			                     'filename' => "$target_file", //The binary contents of the file.   

			                     'file' => base64_encode($contents), 
			                 ), );   

		      $set_note_attachment_result = call("set_note_attachment", $set_note_attachment_parameters, $url);	

		      echo json_encode($set_note_attachment_result);
			

		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD | SimpleCRM</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet"  href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body class="container">
<div class="page-header">
  <h1>SimpleCRM<small> Bookstore</small></h1>
</div>
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4">
	  	
	  <form method="post" action enctype="multipart/form-data">
		  <div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" name="name" id="name" placeholder="Name Of Bookstore">
		  </div>
		  <div class="form-group">
		    <label >Book Title</label>
		    <input type="text" class="form-control"  name="bookTitle" id="bookTitle" placeholder="Name of Book">
		  </div>
		  <div class="form-group">
		    <label >Book Auther</label>
		    <input type="text" class="form-control" name="bookAuther" id="bookAuther" placeholder="Name of Auther">
		  </div>
		 <div class="form-group">
		    <label >Publishing Date</label>
		    <input type="date" class="form-control" name="publishingDate" id="publishingDate" >
		  </div>
		<div class="form-group">
			<label>Upload image</label>
			<input type="file" name="image" id="image">
		</div>
		  <button type="submit" class="btn btn-default" id="submit" name="submit">Submit</button>
		<br />
		<br />
		<div class="alert alert-success" role="alert" id="alert">
		<!-- <?php  
				echo $o->id;
				echo $o->name;
		?> -->
			
		</div>
			
	</form>
		
	  </div>
	  <div class="col-md-4"></div>
	</div>
</body>
</html> 