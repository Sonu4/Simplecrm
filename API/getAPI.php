<?php

	require_once('config.php');

$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://raw.githubusercontent.com/chitranshu/worlddb/master/countries-flat.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$result=json_decode($response);

foreach ($result as $index) {
	//echo 'Country='.$index->country.'<br />State='.$index->state.'<br />City='.$index->city.'<br /><br />';
	$sql="INSERT INTO `glob`(`country`, `state`, `city`) VALUES ('$index->country','$index->state','$index->city')";
	$result=mysqli_query($con,$sql);
	if($result>0){
		echo "success".'<br />';
	}
}



// $sql="INSERT INTO `glob`(`country`, `state`, `city`) VALUES ('xx','xx','xx')";
// $result=mysqli_query($con,$sql);
// if($result>0){
// 	echo "success";
// }
	

?>