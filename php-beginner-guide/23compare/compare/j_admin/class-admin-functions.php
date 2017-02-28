<?php
//Our admin class

if ( !class_exists('JoombaAdmin') ) {
	class JoombaAdmin {
	
		function getAdminURL() {
			$url = JURL . 'j_admin';
			
			return $url;
		}
	
		function getAdminHeader($theme) {
			include( ABSPATH . 'j_admin/themes/' . $theme . '/header.php' );
		}
		
		function getAdminFooter($theme) {
			include( ABSPATH . 'j_admin/themes/' . $theme . '/footer.php' );
		}
		
		function getAdminThemeDirectory($theme) {
			$url = $this->getAdminURL() . '/themes/' . $theme;
			
			return $url;
		}
		
		function getAdminStylesheet($theme) {
			$url = $this->getAdminThemeDirectory($theme) . '/style.css';
			
			return $url;
		}
	}
}

$ja = new JoombaAdmin;
?>