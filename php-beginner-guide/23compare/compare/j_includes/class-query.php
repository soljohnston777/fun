<?php
//Our query class

if ( !class_exists('jQuery') ) {
	class jQuery {
		
		/**
		 * Queries the database
		 *
		 * Grabs the requested data from the database.
		 *
		 * @param string $sql The SQL statement to run
		 *
		 * @return array $results The array of products
		 */
		function query($sql) {
			$query = mysql_query($sql);
			
			//Loop through to grab all rows
			while($results[] = mysql_fetch_object($query));
			array_pop($results);
			
			return $results;
		}
		
		/**
		 * Checks if products exist
		 *
		 * Queries the database to see if at least one product
		 * exists and returns true/false respectively
		 *
		 * @return bool True if products exist, false if not
		 */
		function have_products() {
			$table = 'j_products';
			
			//Query j_products table to see if at least one record exists
			$sql = "SELECT ID FROM $table LIMIT 1";
			$query = mysql_query($sql);
			$result = mysql_fetch_assoc($query);
			
			if ( !empty ( $result ) ) {
				return true;
			} else {
				return false;
			}
		}
	}
}

$jQuery = new jQuery;
?>