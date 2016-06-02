<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/sysadmin/config/mysqlconnection.php'; ?>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><strong>New site</strong></h4>
        </div>
    <div class="panel-body">
        <p>Would you like to install a CMS?</p>
        <div class="btn-group">
            <a class="btn btn-lg" href="/sites/new/wordpress.php">
                <i class="fa fa-wordpress" style="font-size:5em;" aria-hidden="true"></i>                
            </a>
            <p class="text-center">WordPress</p>
        </div>
        <div class="btn-group">
            <a class="btn btn-lg" href="/sites/new/site.php">
                <i class="fa fa-code" style="font-size:5em;" aria-hidden="true"></i>
            </a>
            <p class="text-center">No CMS</p>
        </div>
    </div>
</div>    
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
<?php $conn->close(); ?>