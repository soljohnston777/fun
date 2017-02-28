<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Members Area</title>
		<!--Stylesheets-->
		<link type="text/css" rel="stylesheet" href="<?php echo $ja->getAdminStylesheet($theme); ?>" media="screen" />
		<link type="text/css" rel="stylesheet" href="<?php echo $ja->getAdminURL(); ?>/js/colorbox/colorbox.css" media="screen" />
				
		<!--JavaScript-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script src="<?php echo $ja->getAdminURL(); ?>/js/colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript" src="<?php echo $ja->getAdminURL(); ?>/js/media-uploader.js"></script>
	</head>

	<body>
		<div id="header">
			<div class="header-content">
				<img src="<?php echo $ja->getAdminThemeDirectory($theme); ?>/images/logo.png" alt="Joombo" />
				<p><a target="_blank" href="<?php echo JURL; ?>">Joombo - Comparison site management made easy!</a></p>
			</div>
			<div class="header-user"><?php global $current_user; ?><p>Logged in as: <?php echo $current_user['user_name']; ?></p></div>
		</div>
		
		<div id="navigation">
			<?php echo $jaNav->adminNav(); ?>
		</div>