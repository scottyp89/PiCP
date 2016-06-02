<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php';
	$site = $_POST['name'];
	$domain = $_POST['domain'];
	$wordpress = "0";
    $sql = 'INSERT INTO ' . $database . '.sites (Name, Domain, Path, Date_created) VALUES ("' . $site . '", "' . $domain . '", "/var/www/html/sites/www/' . $site . '", CURRENT_TIMESTAMP )';
    if ($conn->query($sql) === TRUE) {
        ?> <div class="alert alert-success"><strong><?php echo $site; ?></strong> had been added successfully!</div>
        <div class="btn-group">
            <a class="btn btn-primary" href="/">Home</a>
        </div>
        <div class="btn-group">
            <a class="btn btn-primary" style="text-transform:capitalize;" href="/sites/www/<?php echo $site; ?>" target="_blank"><?php echo $site; ?></a>
        </div>
    <?php } else {
        if (strpos($conn->error, 'Duplicate') !== false) {
            ?> <div class="alert alert-warning"><p><strong>Warning: </strong>It looks there is already a site with these details, please check the error below and check again</p>
            <p><strong>Error: </strong><?php echo $conn->error; ?></p></div>
            <a class="btn btn-primary" href="/sites/new">New site</a>
        <?php }
    }
	//echo '<p>Creating the directory for ' . $site . '</p>';
	mkdir("/var/www/html/sites/www/$site",0750);
	//echo '<p>Generating an apache config file</p>';
	$myfile = fopen("/var/www/html/conf/$site.conf", "w") or die("Unable to open file!");
	chmod($myfile, 0750);
	$txt = "Alias /$domain /var/www/html/sites/www/$site\n\n<VirtualHost *:80>\n\tDocumentRoot /var/www/html/sites/www/$site\n\tServerName www.$domain\n</VirtualHost>";
	fwrite($myfile, $txt);
	fclose($myfile);
    $symlink_full = '/var/www/html/sites/www/' . $site;
    $symlink_short = '/var/www/html/' . $site;
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

