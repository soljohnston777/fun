<?php
	//Our functions file. Mainly used by themes
	function get_theme_path($theme) {
		return ABSPATH . 'j_content/themes/' . $theme . '/';
	}
	
	function get_theme_url($theme) {
		return JURL . 'j_content/themes/' . $theme . '/';		
	}
	
	function have_products() {
		global $jQuery;
		
		return $jQuery->have_products();
	}
	
	function product_loop() {
		global $jQuery;
		
		//Get our query parameters
		$p = $_GET['p'];
		$c = $_GET['c'];
		
		//If $p is empty, we're either on the home page or a category page... in either case, we want all posts
		if ( empty ( $p ) && empty ( $c ) ) {
			$table = 'j_products';
			$sql = "SELECT * FROM $table ORDER BY ID";
			$products = $jQuery->query($sql);
			
			return $products;
		} elseif ( !empty ( $p ) ) {
			$table = 'j_products';
			$sql = "SELECT * FROM $table WHERE ID = '" . $p . "' ORDER BY ID";
			$products = $jQuery->query($sql);
			
			return $products;
		} elseif ( !empty ( $c ) ) {
			//Get the slug for the passed category
			$slug = get_category_slug($c);
			
			//Now, pull the products that that belong to the category
			$table = 'j_products';
			$sql = "SELECT * FROM $table WHERE product_category = '" . $slug . "' ORDER BY ID";
			$products = $jQuery->query($sql);
			
			return $products;
		} else {
			return array();
		}
	}
	
	function get_merchant($merchant_id) {
		global $jQuery;
		
		$table = 'j_merchants';
		$sql = "SELECT * FROM $table WHERE ID = '" . $merchant_id . "' ORDER BY ID";
		$merchant = $jQuery->query($sql);
		$merchant = $merchant[0];
		
		return $merchant;
	}
	
	function get_product_comparison($product_id) {
		global $jQuery;
		
		$table = 'j_comparisons';
		$sql = "SELECT * FROM $table WHERE product_id = '" . $product_id . "' ORDER BY merchant_id";
		$comparisons = $jQuery->query($sql);
		
		return $comparisons;
	}
	
	function get_permalink($product_id) {
		return JURL . '?p=' . $product_id;
	}
	
	function get_category_permalink($category_slug) {
		$cat_id = get_category($category_slug, 'ID');
		return JURL . '?c=' . $cat_id;
	}
	
	function get_category_slug($cat_id) {
		global $jQuery;
	
		//Get the slug for the passed category
		$table = 'j_categories';
		$sql = "SELECT category_slug FROM $table WHERE ID = '" . $cat_id . "'";
		$category = $jQuery->query($sql);
		$slug = $category[0]->category_slug;
		
		return $slug;
	}
	
	function get_category($category_slug, $field) {
		global $jQuery;
		
		$table = 'j_categories';
		$sql = "SELECT * FROM $table WHERE category_slug = '" . $category_slug . "' ORDER BY ID";
		$categories = $jQuery->query($sql);
		$category = $categories[0];
		
		if ( $field != 'all' ) {
			return $category->$field;
		}
		
		return $category;
	}
	
	function get_cat_title($cat_id) {
		$slug = get_category_slug($cat_id);
		
		return get_category($slug, 'category_name');
	}
	
	function get_categories() {
		global $jQuery;
		
		$table = 'j_categories';
		$sql = "SELECT * FROM $table ORDER BY category_slug";
		
		return $jQuery->query($sql);
	}
	
	function list_categories() {
		$categories = get_categories();
		
		$results = '<ul class="category-list">';
		
		foreach ( $categories as $category ) {
			$results .= '<li class="category-list-item" id="category-list-item-' . $category->ID . '"><a href="' . JURL . '?c=' . $category->ID . '">' . $category->category_name . '</a></li>';
		}
		
		$results .= '</ul>';
		
		return $results;
	}
	
	function get_excerpt($content, $length) {
		//Break the text into an array of $length +1 number of elements
		$content = explode(' ', trim($content), $length+1);
		
		//Pop of the last element containing the remaining text (thus the +1 above)
		array_pop($content);
		
		//Put it all back together into a string
		$content = implode(' ', $content);
		
		//Add our ellipsis
		$content = $content . '...';
		
		return $content;
	}
	
	function search($term, $offset, $limit) {
		global $jQuery;
	
		//Set our table
		$table = 'j_products';
	
		//Set keyword character limit
		if(strlen($term) < 3) {
			return 'Search Error: Keywords with less then three characters are omitted' ;
		}
		
		//Trim whitespace from the stored variable
		$trimmed = trim($term);
			 
		//Check for an empty string and display a message.
		if ($trimmed == "") {
			return 'Search Error: Please enter a search';
		}
		 
		//Check for a search parameter
		if (!isset($term)){
			return 'Search Error: We do not seem to have a search parameter!';
		}
		
		//Build SQL Query for each keyword entered
		//MySQL "MATCH" is used for full-text searching. Please visit mysql for details.
		//$sql = "SELECT * , MATCH (product_name, product_description) AGAINST ('".$trimmed."') AS score FROM $table WHERE MATCH (product_name, product_description) AGAINST ('+".$trimmed."') ORDER BY score DESC";
		$sql = "SELECT * FROM $table WHERE product_name LIKE '%$trimmed%' OR product_description LIKE '%$trimmed%'  ORDER BY ID DESC";
    
		 //Execute the query to  get number of rows that contain search kewords
		 //$numresults=mysql_query ($query);
		 //$row_num_links_main =mysql_num_rows ($numresults);
		 return $jQuery->query($sql);
		 //return $sql;
		
	}
?>