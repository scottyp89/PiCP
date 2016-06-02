<!DOCTYPE html>
<?php	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('/', $path);
	$first_part = $components[1];
	$second_part = $components[2]
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/includes/css/style.css">
    <link rel="stylesheet" href="/includes/font-awesome/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="/includes/js/extendform.js"></script>
    <script src="/includes/js/validate.js"></script>
	<link rel="apple-touch-icon" sizes="57x57" href="/includes/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/includes/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/includes/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/includes/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/includes/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/includes/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/includes/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/includes/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/includes/img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/includes/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/includes/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/includes/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/includes/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="/includes/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/includes/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><img src="/includes/img/pi.png" style="max-height:20px;"></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Pi Control Panel</a>
			</div>
			<div class="navbar-collapse collapse navbar-right">
				<ul class="nav navbar-nav">
					<li <?php if ($first_part==""){ echo 'class="active"';} ?>><a href="/">Home</a></li>
					<li <?php if ($first_part=="sysadmin") { echo 'class="dropdown active"';} else { echo 'class="dropdown"'; } ?>>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">System Administration <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li <?php if ($second_part=="config") { echo 'class="active"'; } ?>><a href="/sysadmin/config">Config</a></li>
							<li <?php if ($second_part=="mysql") { echo 'class="active"'; } ?>><a href="/sysadmin/mysql">MySQL</a></li>
							<li class="divider"></li>
							<li <?php if ($second_part=="phpmyadmin.php") { echo 'class="active"'; } ?>><a href="/phpmyadmin" target="_blank">PHPMyAdmin</a></li>
						</ul>
					</li>
					<li <?php if ($first_part=="sites") { echo 'class="dropdown active"'; } else { echo 'class="dropdown"'; } ?> >
						<a href="sites" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sites <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li <?php if ($second_part=="new") { echo 'class="active"'; } ?>><a href="/sites/new">New site</a></li>
							<li <?php if ($second_part=="current") { echo 'class="active"'; } ?>><a href="/sites/current">Current</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container body-content">
