<?php
	include('includes/class-theme-methods.php');

	function do_main_nav() {
		global $dtm;
		
		$class = "main_nav";
		
		$items_array = array ( 
									array('text' => 'Home', 'url' => '/web-temp'),
									array('text' => 'About', 'url' => 'about.php')
								);
		
		return $dtm->navigation($items_array, $class);
	}
	
	function do_html_title($page_title) {
		$title = $page_title . ' | John Morris Demo Theme';
		
		return $title;
	}
?>