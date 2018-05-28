<?php

	/**
	* 
	*/

	if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	class pngClass
	{	
		function pngMethod($bean, $event, $arguments){

				$image=$bean->bookcover;

				$extension=substr($image, -4);

				$png=".png";

				if (!($png==$extension)) {
				/*	SugarApplication::appendErrorMessage('only .png Files are allowed');

					$param=array(
						'module'=>'shubh_Bookstore',
						'action'=>'EditView',
						'return_module'=>'shubh_Bookstore',
						'return_action'=>'EditView'
						);


					SugarApplication::redirect('index.php?',http_build_query($param)); */
				}



		}


	}

?>