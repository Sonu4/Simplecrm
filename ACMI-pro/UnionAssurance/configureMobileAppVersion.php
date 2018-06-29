<?php 
	if (isset($_POST['appversion'])) {

		global $db;
		global $current_user,$site_url;
 		$current_user_id = $current_user->id;
		$appversion=$_POST['appversion'];

		if ($appversion=='') {
				$show='<h3>Add some value</h3>';

		}else{

			$update="UPDATE mobileapp_version SET version='$appversion',modified_by='$current_user_id',modified_date=current_timestamp()";

			$result=$db->query($update);
			if ($result > 0) {
				$show='<h3>App Version updated</h3>';
			}else{
				$show='<h3>Failed to update</h3>';

			}

		}
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mobile App Version</title>
</head>
<body align="center">
<h1 style="margin-top:250px;">Insert Mobile App Version Here</h1>
<h3><?php echo $show; ?></h3>
<form method="post" action="index.php?module=Administration&action=configureMobileAppVersionSettings">
	<div class="form-group">
		<input type="text" name="appversion" id="appversion" name="appversion" placeholder="Mobile App Version">
	</div>
	<div style="margin-bottom:250px;">

		<button type="submit" id="btnAppversion" class="btn btn-info" name="btnAppversion">Update</button>
		<!-- <a href="index.php?module=Administration&action=index" style="text-decoration:none !important;">
			<input type="submit"  value="Cancel" class="btn btn-info" style="height:34px;width:70px;"></a> -->
	</div>
	
</form>
</body>
</html>