<?php
//Set database access credentials
$name = 'database_name';
$user = 'database_user';
$password = 'database_pass';
$host = 'localhost';

//Set table name
$tname = 'demoone';

$link = mysql_connect($host, $user, $password);
if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($name, $link);
if (!$db_selected) {
	die('Can\'t use ' . $name . ': ' . mysql_error());
}

$value = $_POST['input1'];
$value2 = $_POST['input2'];

$sql = "INSERT INTO $tname (input1, input2) VALUES ('$value', '$value2')";

if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}

mysql_close();

echo '<p>Form submitted successfully</p>';
?>