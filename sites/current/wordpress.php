<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<?php $site = $_GET['site']; 
$row = 'SELECT * FROM ' . $database . '.sites WHERE NAME = "' . $site . '"';
$result = $conn->query($row);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {?>
        <div class="alert alert-danger"><p><strong>Warning: </strong>This will remove all content for the site <strong><?php echo $site; ?></strong> (all files in <?php echo $row['Path']; ?>)</p></div>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>New WordPress site</strong></h4>
                </div>
            <div class="panel-body">
                <form data-toggle="validator" role="form" action="/sites/current/install_wordpress.php?site=<?php echo $site; ?>" method="post" id="newsite">
                    <div class="form-group has-feedback">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" pattern="^[_A-z0-9]{1,}$" id="name" placeholder="Yoursite" required data-minlength="3" name="name" tabindex="1" value="<?php echo $row['Name']; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="domain" class="control-label">Domain</label>
                        <input type="text" Pattern="[A-z0-9]+\.[.a-z]{2,}$" class="form-control" id="domain" placeholder="Yoursite.com" data-minlength="4" required name="domain" tabindex="2" value="<?php echo $row['Domain']; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="database" class="control-label">Database</label>
                        <input type="text" Pattern="^[_A-z0-9]{1,}$" class="form-control" id="database" placeholder="SomeDB" data-minlength="2" name="database" tabindex="3" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="hostname" class="control-label">Hostname</label>
                        <input type="text" Pattern="^[_A-z0-9]{1,}$" class="form-control" id="hostname" placeholder="localhost" value="localhost" data-minlength="2" name="hostname" tabindex="4" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username" class="control-label">DB Username</label>
                        <input type="text" Pattern="^[_A-z0-9]{1,}$" class="form-control" id="username" placeholder="MySQLUsername" data-minlength="4" name="username" tabindex="5" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password" class="control-label">DB Password</label>
                        <input type="password" Pattern="^[_A-z0-9]{1,}$" class="form-control" id="password" data-minlength="4" name="password" tabindex="6" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <input type="checkbox" value="1" checked id="wordpress" name="wordpress" hidden>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" tabindex="7" id="submit">Create site</button>
                        <a href="/sites/new/" class="btn btn-primary" tabindex="8">Back</a>
                    </div>
                </form>
            </div>
        </div>    
    <?php }
}
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>