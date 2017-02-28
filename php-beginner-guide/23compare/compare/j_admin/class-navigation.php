<?php
//Our navigation class

if ( !class_exists('JoombaAdminNav') ) {
	class JoombaAdminNav {
	
		function adminNav() {			
			//Build our navigation list
			//Dashboard
			$navigation .= '<ul class="admin-nav" id="admin-nav-dashboard">';
				$navigation .= '<li class="admin-nav-item nav-item-header"><a href="' . JURL . 'j_admin">Dashboard</a></li>';
			$navigation .= '</ul>';
			
			//Products menu
			$navigation .= '<ul class="admin-nav" id="admin-nav-products">';
				$navigation .= '<li class="admin-nav-item nav-item-header"><a href="' . JURL . 'j_admin/products.php">Products</a></li>';
				$navigation .= '<li class="admin-nav-item"><a href="' . JURL . 'j_admin/add-product.php">Add New</a></li>';
				$navigation .= '<li class="admin-nav-item"><a href="' . JURL . 'j_admin/categories.php">Categories</a></li>';
			$navigation .= '</ul>';
			
			//Merchants menu
			$navigation .= '<ul class="admin-nav" id="admin-nav-merchants">';
				$navigation .= '<li class="admin-nav-item nav-item-header"><a href="' . JURL . 'j_admin/merchants.php">Merchants</a></li>';
				$navigation .= '<li class="admin-nav-item"><a href="' . JURL . 'j_admin/add-merchant.php">Add New</a></li>';
				$navigation .= '<li class="admin-nav-item"><a href="' . JURL . 'j_admin/locations.php">Locations</a></li>';
			$navigation .= '</ul>';
			
			//Users menu
			$navigation .= '<ul class="admin-nav" id="admin-nav-users">';
				$navigation .= '<li class="admin-nav-item nav-item-header"><a href="' . JURL . 'j_admin/users.php">Users</a></li>';
				$navigation .= '<li class="admin-nav-item"><a href="' . JURL . 'j_admin/add-user.php">Add New</a></li>';
			$navigation .= '</ul>';
			
			return $navigation;
		}
	}
}

$jaNav = new JoombaAdminNav;
?>