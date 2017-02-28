<?php
	//Media Uploader
	require_once('../load.php');
	require_once('admin-load.php');
	$logged = $j->checkLogin();
	$upload = $j->addMedia();
	
	//Check for media upload success
	$check = strpos($upload, 'http');
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-media', time());
?>
<html>
	<head>
		<style type="text/css">
			body {
				font-family: Arial, Calibri, Tahoma, Verdana;
				font-size: 12px;
			}
			
			p {
				font-size: 12px;
			}
			
			h3 {
				font-size: 18px;
				margin-bottom: 5px;
			}
			
			.tooltip {
				margin: 0;
				padding: 0;
				font-size: 11px;
				color: #aaa;
			}
			
			#image-upload-form {
				margin-top: 15px;
			}
			
			.error {
				padding: 7px 10px;
				background: lightPink;
				border: 1px solid red;
			}
			
			#upload-success img {
				padding: 3px;
				border: 1px solid #e4e4e4;
				background: #fff;
				float: left;
				margin-right: 20px;
				height: 80px;
				width: 80px;
			}
			
			.upload-url {
				font-weight: bold;
				text-align: center;
			}
		</style>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script src="<?php echo $ja->getAdminURL(); ?>/js/colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript" src="<?php echo $ja->getAdminURL(); ?>/js/media-uploader.js"></script>	
	</head>
		
	<body>
		<h3>Upload Image</h3>
		<?php if ( $check !== false ) : ?>
			<div id="upload-success">
				<img src="<?php echo $upload; ?>" alt="" />
				<p><b>Your image was uploaded successfully.</b> Now, copy the URL below, close this window, and paste the URL into the image input box.</p>
				<p class="upload-url"><?php echo $upload; ?></p>
			</div>
		<?php else: ?>
			<?php echo $upload; ?>
			<p class="tooltip">Max file size is 5MB.</p>
			<p class="tooltip">Accept file formats are jpg, jpeg, png, and gif</p>
			<form enctype="multipart/form-data" action="" method="post" id="image-upload-form">
				<input type="hidden" name="date" value="<?php echo time(); ?>" />
				<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
				<label for="imagefile">Choose a file to upload:</label> <input name="imagefile" type="file" /><br />
				<input type="submit" value="Upload File" />
			</form>
		<?php endif; ?>
		
	</body>
</html>