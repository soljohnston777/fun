<?php
//Set database access credentials
$name = 'database_name';
$user = 'database_user';
$password = 'database_pass';
$host = 'localhost';

//Set table name
$tname = 'demoone';

/*Open the connection to our database use the info from the config file.*/
$link = mysql_connect($host, $user, $password);
if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($name, $link);
if (!$db_selected) {
	die('Can\'t use ' . $name . ': ' . mysql_error());
}

$sql = "SELECT * FROM $tname";

$results = mysql_query($sql);
		
if (!$results) {
	die('Invalid query: ' . mysql_error());
}

$output = mysql_fetch_assoc( $results );
print_r($output);
?>