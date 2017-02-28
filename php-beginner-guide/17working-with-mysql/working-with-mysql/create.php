<?php
	//Set database access credentials
	$name = 'database_name';
	$user = 'database_user';
	$password = 'database_pass';
	$host = 'localhost';
	
	//Set table name and input fields
	$tname = 'demoone';
	$fields = array (
		array( "name" => "ID", "type" => "int", "init" => "NOT NULL", "increment" => "yes" ),
		array( "name" => "input1", "type" => "VARCHAR( 255 )", "init" => "NULL", "increment" => "no" ),
		array( "name" => "input2", "type" => "VARCHAR( 255 )", "init" => "NULL", "increment" => "no" ),
		array( "name" => "input3", "type" => "VARCHAR( 255 )", "init" => "NULL", "increment" => "no" )
	);
	
	$pkey = 'ID';

	//Link to MySQL
	$link = mysql_connect($host, $user, $password);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	} else {
		echo "Connected to MySQL successfully<br />";
	}

	//Create our database
	$dsql = 'CREATE DATABASE ' . $name;
	if (mysql_query($dsql, $link)) {
		echo "Database " . $name . "created successfully<br />";
	} else {
		die('Error creating database: ' . mysql_error() . "<br />");
	}
	
	//Select our newly created database
	$db_selected = mysql_select_db($name, $link);
	if (!$db_selected) {
		die('Can\'t use ' . $name . ': ' . mysql_error());
	} else {
		echo "Database selected successfully<br />";
	}

	//Create our table
	$sql .= "CREATE TABLE $tname ( ";
	foreach ( $fields as $field ) {
		$sql .= $field['name'] . ' ' . $field['type'] . ' ' . $field['init'];
		
		if ( $field['increment'] == 'yes' ) {
			$sql .= ' AUTO_INCREMENT';
		}
		
		$sql .= ',';
	}
	$sql .= "PRIMARY KEY($pkey)";
	$sql .= " )";

	$result = mysql_query($sql);
	
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	} else {
		echo "Table created successfully<br />";
	}

?>