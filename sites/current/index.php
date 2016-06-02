<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<?php $sql = 'SELECT Name, Domain, Path, WordPress FROM ' . $database . '.sites';
$result = $conn->query($sql); ?>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><strong>Existing sites</strong></h4>
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
                                <a href="#" class="btn disabled">Installed</a>
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
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>