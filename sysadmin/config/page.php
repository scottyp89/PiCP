<?php
$sqlconfig = "/var/www/html/sysadmin/config/mysql.conf";
$sqldetails = file_get_contents("$sqlconfig");
parse_str("$sqldetails",$myArray);

	$existingusername = $myArray['Username'];
	$existingpassword = $myArray['Password'];
	$existingdatabase = $myArray['Database'];
	$existinghost = $myArray['Hostname'];

?>
<p>Use the form below to configure PiCP to connect to a MySQL server (by default this will be a database stored locally). All fields are required and case sensitive. It is preferred to enter the root credentials here as these details will be used to create new users and databases in MySQL.</p>
<div class="panel panel-default">
<div class="panel-heading">
<h4><strong>MySQL configuration</strong></h4>
</div>
<div class="panel-body">
<form class="form-horizontal" role="form" action="/sysadmin/config/savesettings.php" method="POST">
	<div class="form-group">
		<label class="control-label col-sm-2" for="username">MySQL UserName:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="username" name="username" required <?php if($existingusername === NULL ) { echo 'value="' .  $existingusername . '"'; } else { echo 'value="root"'; } ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="password">MySQL Password:</label>
		<div class="col-sm-10"> 
			<input type="password" class="form-control" id="password" name="password" required <?php if(isset($existingpassword)) { echo 'value="' .  $existingpassword . '"'; }?>>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="database">MySQL DB Name:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="database" name="database" required <?php if(isset($existingdatabase)) { echo 'value="' .  $existingdatabase . '"'; }?>>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="host">MySQL Host:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="host" name="host" required <?php if(isset($existinghost)) { echo 'value="' .  $existinghost . '"'; } else { echo 'value="localhost"'; } ?>>
		</div>
	</div>
	<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Save settings</button>
		</div>
	</div>
</form>
</div>
</div>