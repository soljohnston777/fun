<?php
// Our database class
if(!class_exists('JoombaDatabase')){
	class JoombaDatabase {
	
		/**
		 * Connects to the database server and selects a database
		 *
		 * PHP4 compatibility layer for calling the PHP5 constructor.
		 *
		 * @uses JoombaDatabase::__construct()
		 *
		 */	
		function JoombaDatabase() {
			return $this->__construct();
		}
		
		/**
		 * Connects to the database server and selects a database
		 *
		 * PHP5 style constructor for compatibility with PHP5. Does
		 * the actual setting up of the connection to the database.
		 *
		 */
		function __construct() {
			$this->connect();
		}
	
		/**
		 * Connect to and select database
		 *
		 * @uses the constants defined in config.php
		 */	
		function connect() {
			$link = mysql_connect('localhost', DB_USER, DB_PASS);

			if (!$link) {
				die('Could not connect: ' . mysql_error());
			}

			$db_selected = mysql_select_db(DB_NAME, $link);

			if (!$db_selected) {
				die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
			}
		}
		
		/**
		 * Clean the array using mysql_real_escape_string
		 *
		 * Cleans an array by array mapping mysql_real_escape_string
		 * onto every item in the array.
		 *
		 * @param array $array The array to be cleaned
		 * @return array $array The cleaned array
		 */
		function clean($array) {
			return array_map('mysql_real_escape_string', $array);
		}
				
		/**
		 * Create a secure hash
		 *
		 * Creates a secure copy of the user password for storage
		 * in the database.
		 *
		 * @param string $password The user's created password
		 * @param string $nonce A user-specific NONCE
		 * @return string $secureHash The hashed password
		 */
		function hash_password($password, $nonce) {
		  $secureHash = hash_hmac('sha512', $password . $nonce, SITE_KEY);
		  
		  return $secureHash;
		}
		
		/**
		 * Insert data into the database
		 *
		 * Does the actual insertion of data into the database.
		 *
		 * @param resource $link The MySQL Resource link
		 * @param string $table The name of the table to insert data into
		 * @param array $fields An array of the fields to insert data into
		 * @param array $values An array of the values to be inserted
		 */
		function insert($link, $table, $fields, $values) {
			$fields = implode(", ", $fields);
			$values = implode("', '", $values);
			$sql="INSERT INTO $table (id, $fields) VALUES ('', '$values')";

			if (!mysql_query($sql)) {
				die('Error: ' . mysql_error());
			} else {
				return TRUE;
			}
		}
		
		/**
		 * Update data in the database
		 *
		 * Does the actual update of data into the database.
		 *
		 * @param resource $link The MySQL Resource link
		 * @param string $table The name of the table to insert data into
		 * @param array $fields An array of the fields to insert data into
		 * @param array $values An array of the values to be inserted
		 * @param string $id the ID of the row to update
		 */
		function update($link, $table, $fields, $values, $id) {
			//Combine $fields and $values into a single array
			$combine = array_combine($fields, $values);
			
			//Loop through new array create the MySQL SET value
			foreach ( $combine as $k=>$v ) {
				$set .= $k . "='". $v . "', ";
			}
			
			//Remove the trailing comma. MySQL is picky, picky
			$set = substr($set, 0, -2);
			
			//Our now properly formed MySQL statment
			$sql="UPDATE $table SET $set WHERE ID = '" . $id . "'";

			//Run the query, die if it fails... return true if not.
			if (!mysql_query($sql)) {
				die('Error: ' . mysql_error());
			} else {
				return TRUE;
			}
		}
		
		/**
		 * Select data from the database
		 *
		 * Grabs the requested data from the database.
		 *
		 * @param string $table The name of the table to select data from
		 * @param string $columns The columns to return
		 * @param array $where The field(s) to search a specific value for
		 * @param array $equals The value being searched for
		 */
		function select($sql) {
			return mysql_query($sql);
		}
		
		function get($sql) {
			$resource = $this->select($sql);
			
			//Loop through to grab all rows
			while($results[] = mysql_fetch_assoc( $resource ));
			array_pop($results);
			
			return $results;
		}
	}
}

//Instantiate our database class
$jdb = new JoombaDatabase;
?>