<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>

<?php $checkdb = "SHOW DATABASES LIKE '" . $database . "'"; ?>
<?php if($conn->query($checkdb) === NULL ) { ?>
    <h1>Setup</h1>
    <div class="alert alert-warning">
        <p><strong>Warning!</strong> It doesn't look like you have completed the setup yet, complete the form below and click <strong>Save settings</strong>.</p>
        <?php echo $conn->error; ?>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/page.php'; ?>
<?php } else { ?>
    <?php $sql = 'SELECT Name, Domain, Path, WordPress FROM ' . $database . '.sites';
    $result = $conn->query($sql); ?>

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><strong><a href="/sites/current/">Existing sites</a></strong></h4>
            </div>
        <div class="panel-body">

        <?php if ($result->num_rows > 0) {?>
            <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                            <tr>
                                    <th>Site name</th>
                                    <th>Path</th>
                                    <th>Domain</th>
                                    <th>WordPress</th>
                                    <th>Delete</th>
                            </tr>
                    </thead>
                    <tbody>
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><a href="/sites/www/<?php echo $row['Name']; ?>" target="_blank"><p class="text-capitalize"><?php echo $row['Name']; ?></p></a></td>
                                    <td><?php echo $row['Path']; ?></td>
                                    <td><?php echo $row['Domain']; ?></td>
                                    <td><?php if ($row['WordPress'] == 1) { ?>
                                            <a href="#" class="btn btn-primary disabled">Installed</a>
                                    <?php } else { ?>
                                            <a href="/sites/current/wordpress.php?site=<?php echo $row['Name']; ?>" class="btn btn-primary">Install</a>
                                    <?php } ?></td>
                                    <td><a href="/sites/delete/index.php?site=<?php echo $row['Name']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php } ?>
                    </tbody>
            </table>
            </div>
            <?php } else { ?>
                    <div class="alert alert-warning"><strong>Warning!</strong> No sites found</div>
            <?php } ?>
            <a href="/sites/new" class="btn btn-primary">New site</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><a href="sysadmin/mysql">Site MySQL Databases</a></strong>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <?php $databases = "show databases where `Database` not in ('mysql','information_schema','performance_schema','phpmyadmin','" . $database . "')"; ?>
                    <?php $result = mysqli_query($conn, $databases); ?>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <li class="list-group-item"><strong><?php echo $row['Database']; ?></strong></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><a href="sysadmin/mysql">MySQL Users</a></strong>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <?php $users = "SELECT User FROM mysql.user where user not in ('root','debian-sys-maint','phpmyadmin')"; ?>
                    <?php $result2 = mysqli_query($conn, $users); ?>
                    <?php while($row = mysqli_fetch_assoc($result2)) { ?>
                        <li class="list-group-item"><strong><?php echo $row['User']; ?></strong></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<?php $conn->close(); ?>
