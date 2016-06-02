<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<?php

$username = $_POST['username'];
$password = $_POST['password'];
$database = $_POST['database'];
$hostname = $_POST['host'];

?>

<p>Saving your settings...</p>
<div class="progress">
        <div class="progress-bar active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
</div>

<?php

    $myfile = fopen("/var/www/html/sysadmin/config/mysql.conf", "w") or die("Unable to open file!");
    chmod($myfile, 0775);
    $txt = "Username=$username&Password=$password&Database=$database&Hostname=$hostname";
    fwrite($myfile, $txt);
    fclose($myfile); 

    $myfile = fopen("/var/www/html/sysadmin/config/mysql.conf", "w") or die("Unable to open file!");
    ?> <script> $(document).ready(function() { 
        $(".progress-bar").css("width", "25%"); 
        $(".progress-bar").attr("aria-valuenow", "25%"); 
    }) </script>
    <?php chmod($myfile, 0775); ?>
    <script> $(document).ready(function() { 
        $(".progress-bar").css("width", "50%"); 
        $(".progress-bar").attr("aria-valuenow", "50%"); 
    }) </script>
    <script> $(document).ready(function() { 
        $(".progress-bar").css("width", "75%"); 
        $(".progress-bar").attr("aria-valuenow", "75%"); 
    }) </script> 
    <?php $txt = "Username=$username&Password=$password&Database=$database&Hostname=$hostname";
    fwrite($myfile, $txt); ?> 
    <script> $(document).ready(function() { 
        $(".progress-bar").css("width", "100%"); 
        $(".progress-bar").attr("aria-valuenow", "100%"); 
    }) </script> 

    <?php $conn = new mysqli($host, $username, $password); ?>
    <?php $createdb = 'CREATE DATABASE IF NOT EXISTS ' . $database; ?>
    <?php if ($conn->query($createdb) !== TRUE ) {
        echo "Error creating database: " . $conn->error; 
    } ?>
    <?php $createtable = 'CREATE TABLE IF NOT EXISTS `' . $database . '`.`sites` (
        id INT NOT NULL AUTO_INCREMENT,
        Name VARCHAR(100) NOT NULL,
        Path VARCHAR(100) NOT NULL,
        Domain VARCHAR(100) NOT NULL,
        Wordpress TINYINT NOT NULL,
        Date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY ( id )
    )'; ?>
    <?php $creatingtable = $conn->query($createtable); ?>
    <?php $conn->close(); ?>

    <?php fclose($myfile); ?>
	<div class="alert alert-success"><strong>Success!</strong> Saved database configuration.</div>

<a href="/" class="btn btn-primary">Back</a>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
