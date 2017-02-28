<?php
	//Require classes and functions
	require_once('load.php');
	require_once('j_includes/functions.php');
	
	//Set our theme and get our theme path
	$theme = 'dark';
	$theme_path = get_theme_path($theme);
	
	//Load our theme's functions file if it exists
	if ( file_exists ( $theme_path . 'functions.php' ) ) {
		include( $theme_path . 'functions.php' );
	}
	
	//Find out what type of page we're on
	$p = $_GET['p'];
	$c = $_GET['c'];
	$s = $_GET['s'];

	//Include theme file for page type
	if ( !empty ( $p ) ) {
		include( $theme_path . 'single.php' );
	} elseif ( !empty ( $c ) ) {
		include( $theme_path . 'category.php' );
	} elseif ( !empty ( $s ) ) {
		include( $theme_path . 'search.php' );
	} else {
		include($theme_path . 'index.php' );
	}
?>