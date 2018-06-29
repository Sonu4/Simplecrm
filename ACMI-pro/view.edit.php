<?php 
//if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	require_once('include/MVC/View/views/view.edit.php');

class ContactsViewEdit extends ViewEdit {

 	function ContactsViewEdit(){
 		parent::ViewEdit();
 	}
 	function display()
 	{
	
 		parent::display();

 		echo $js=<<<EOD 
 		<script>
 		$(document).ready(function(){
 			alert("Hi");
 		});
 		</script>
EOD;
 	}

 }
 ?>