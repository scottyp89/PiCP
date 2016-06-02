<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><strong>New site</strong></h4>
        </div>
    <div class="panel-body">
        <form data-toggle="validator" role="form" action="/includes/create.php" method="post" id="newsite">
            <div class="form-group has-feedback">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" pattern="^[_A-z0-9]{1,}$" id="name" placeholder="Yoursite" required data-minlength="3" name="name" tabindex="1">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="domain" class="control-label">Domain</label>
                <input type="text" Pattern="[A-z0-9]+\.[.a-z]{2,}$" class="form-control" id="domain" placeholder="Yoursite.com" data-minlength="4" required name="domain" tabindex="2">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" tabindex="3" id="submit">Create site</button>
                <a href="/sites/new/" class="btn btn-primary" tabindex="4">Back</a>
            </div>
        </form>
    </div>
</div>    
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>