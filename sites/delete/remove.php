<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<?php $site = $_GET['site']; ?>
<?php exec("/var/www/html/includes/bash/remove.sh $site"); ?>
<?php $sql = 'DELETE FROM ' . $database . '.sites WHERE sites.Name = "' . $site . '"';
$row = 'SELECT * FROM ' . $database . '.sites WHERE NAME = "' . $site . '"';
$result = $conn->query($row);
unlink("/var/www/html/conf/$site.conf");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row['Wordpress'] == 1) {
            $user = $row['Wordpress_UN'];
            $removeuser = 'DROP USER "' . $user . '"@"localhost"';
            if ($conn->query($removeuser) === TRUE) {
            } else { ?>
                <div class="alert alert-danger"><p><strong>Error: </strong>It looks like something went wrong, check the error below.</p><p><?php echo $conn->error; ?></p></div>
            <?php }
            $db = $row['Wordpress_DB'];
            $removedb = 'DROP DATABASE ' . $db;
            if ($conn->query($removedb) === TRUE) {
            } else { ?>
                <div class="alert alert-danger"><p><strong>Error: </strong>It looks like something went wrong, check the error below.</p><p><?php echo $conn->error; ?></p></div>
            <?php }
        }
    }
}

if ($conn->query($sql) === TRUE) {
    ?> <div class="alert alert-success"><strong><?php echo $site; ?></strong> has now been removed.</div>
    <div class="btn-group">
        <a href="/" class="btn btn-primary" role="button">Home</a>
    </div>
<?php } else { ?>
    <div class="alert alert-danger"><p><strong>Error: </strong>It looks like something went wrong, check the error below.</p><p><?php echo $conn->error; ?></p></div>
    <div class="btn-group">
        <a class="btn btn-primary" href="/" role="button">Home</a>
    </div>
<?php } ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>