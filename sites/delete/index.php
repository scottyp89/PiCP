<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<?php $site = $_GET['site']; 
$row = 'SELECT * FROM ' . $database . '.sites WHERE NAME = "' . $site . '"';
$result = $conn->query($row);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $db = $row['Wordpress_DB'];
        $user = $row['Wordpress_UN']; ?>
        <div class="alert alert-danger"><p><strong>Warning: </strong>Are you sure you want to remove the site <strong><?php echo $site; ?></strong>? 
        <?php if($row['Wordpress'] == 1) { ?>
            This will also remove the MySQL database <strong><?php echo $db; ?></strong> and the MySQL user <strong><?php echo $user; ?></strong>.
        <?php } ?></p></div>
        <div class="btn-group">
            <a class="btn btn-danger" href="remove.php?site=<?php echo $site; ?>" role="button">Delete</a>
        </div>
        <div class="btn-group">
            <a class="btn btn-primary" href="/" role="button">Home</a>
        </div>
    <?php }
}
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>