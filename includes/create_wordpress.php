<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php';
	$site = $_POST['name'];
	$domain = $_POST['domain'];
	$wordpress = 1;
	$db = $_POST['database'];
	$host = $_POST['hostname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $sql = 'INSERT INTO ' . $database . '.sites (Name, Domain, Wordpress, Path, Date_created, Wordpress_DB, Wordpress_UN, Wordpress_PW) VALUES ("' . $site . '", "' . $domain . '", "' . $wordpress . '", "/var/www/html/sites/www/' . $site . '", CURRENT_TIMESTAMP, "' . $db . '", "' . $username . '", "' . $password . '")';
    $createdb = 'CREATE DATABASE IF NOT EXISTS ' . $db;
    $createuser = 'CREATE USER "' . $username . '"@"localhost" IDENTIFIED BY "' . $password . '"';
    $userperms = 'GRANT ALL ON ' . $db . '.* TO "' . $username . '"@"localhost"'; 
    if ($conn->query($sql) === TRUE) {
        if ($conn->query($createdb) === TRUE) {
            if ($conn->query($createuser) === TRUE) {
                if ($conn->query($userperms) === TRUE) { ?>
                    <!--<div class="alert alert-success">MySQL user <strong><?php echo $username; ?></strong> has been given full permissions over the database <strong><?php echo $db; ?></strong>.</div>-->
                <?php } else { ?>
                    <div class="alert alert-warning">
                        <p><strong>Warning: </strong>Please check the error below</p>
                        <p><strong>Error: </strong><?php echo $conn->error; ?></p>
                    </div>
                <?php } ?>
                <!--<div class="alert alert-success">MySQL user <strong><?php echo $username; ?></strong> has been created.</div>-->
            <?php } else { ?>
                <div class="alert alert-warning">
                    <p><strong>Warning: </strong>Please check the error below</p>
                    <p><strong>Error: </strong><?php echo $conn->error; ?></p>
                </div>
            <?php } ?>
        <!--<div class="alert alert-success">Database <strong><?php echo $db; ?></strong> has been created.</div>-->
        <?php } else { ?>
            <div class="alert alert-warning">
                <p><strong>Warning: </strong>Please check the error below</p>
                <p><strong>Error: </strong><?php echo $conn->error; ?></p>
            </div>
        <?php }
        ?> <div class="alert alert-success">The site <strong><?php echo $site; ?></strong> has been added successfully! It will connect to the MySQL database <strong><?php echo $db; ?></strong> with the username <strong><?php echo $username; ?></strong> and password <strong><?php echo $password; ?></strong>.</div>
        <div class="btn-group">
            <a class="btn btn-primary" href="/">Home</a>
        </div>
        <div class="btn-group">
            <a class="btn btn-primary" style="text-transform:capitalize;" href="/sites/www/<?php echo $site; ?>" target="_blank"><?php echo $site; ?></a>
        </div>
    <?php } else {
        if (strpos($conn->error, 'Duplicate') !== false) {
            ?> <div class="alert alert-warning">
                <p><strong>Warning: </strong>It looks there is already a site with these details, please check the error below and check again</p>
                <p><strong>Error: </strong><?php echo $conn->error; ?></p>
            </div>
            <a class="btn btn-primary" href="/sites/new">New site</a>
        <?php } ?>
        <div class="alert alert-warning"><p><strong>Warning: </strong>Please check the error below</p>
        <p><strong>Error: </strong><?php echo $conn->error; ?></p></div>
    <?php }
	//echo '<p>Creating the directory for ' . $site . '</p>';
	mkdir("/var/www/html/sites/www/$site",0750);
	//echo '<p>Generating an apache config file</p>';
	$myfile = fopen("/var/www/html/conf/$site.conf", "w") or die("Unable to open file!");
	chmod($myfile, 0750);
	$txt = "Alias /$domain /var/www/html/sites/www/$site\n\n<VirtualHost *:80>\n\tDocumentRoot /var/www/html/sites/www/$site\n\tServerName www.$domain\n</VirtualHost>";
	fwrite($myfile, $txt);
	fclose($myfile);
    shell_exec("sudo /var/www/html/includes/bash/wordpress.sh $site $db $username $password");
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

