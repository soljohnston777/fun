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

$sql = "UPDATE $tname SET input1 = 'update' WHERE ID = '1'";

if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
} else {
	echo 'Update submitted successfully';
}

?>