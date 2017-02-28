<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once('includes/class-query.php');
	
	if ( !empty ( $_GET ) ) {
		if ( !empty ( $_GET['p'] ) ) {
			$post = $_GET['p'];
		}
		
		if ( !empty ( $_GET['cat'] ) ) {
			$cat = $_GET['cat'];
		}
	}
	
	if ( empty ( $post ) && empty ( $cat ) ) {
		$posts_array = $query->all_posts();
	} elseif ( !empty ( $post ) ) {
		$posts_array = $query->post($post);
	} elseif ( !empty ( $cat ) ) {
		echo 'cat';
	}
?>
<html>
	<head>
		<title></title>
	</head>
	
	<body>
		<?php foreach ( $posts_array as $post ) : ?>
			<div class="post">
				<h1><a href="?p=<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></a></h1>
				<p><?php echo $post->post_content; ?></p>
			</div>
		<?php endforeach; ?>
	</body>
</html>