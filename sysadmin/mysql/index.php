<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Site MySQL Databases</strong>
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
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>MySQL Users</strong>
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
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>