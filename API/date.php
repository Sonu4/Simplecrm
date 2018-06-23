<?php

	$time = strtotime($_POST['dateFrom']);
	if ($time) {
	  $new_date = date('Y-m-d', $time);
	  echo $new_date;
	} else {
	   echo 'Invalid Date: ' . $_POST['dateFrom'];
	  // fix it.
	}


?>

