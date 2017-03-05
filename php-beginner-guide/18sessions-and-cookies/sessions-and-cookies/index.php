<?php

// What he didn't cover in this tutorial is that it is best to start with cookies then go to sessions for they can easily conflict with each other.

	//Cookies  -  used on the users device
	$expiry = time()+60*60*24;//1 day
	setcookie('userdata[name]', 'John Morris', $expiry, '', '', '', TRUE);
	setcookie('userdata[age]', '29', $expiry, '', '', '', TRUE);
	setcookie('userdata[gender]', 'Male', $expiry, '', '', '', TRUE);
	
	/*
	$delete = time()-60*60;
	set_cookie('userdata', ' ', $delete, '', '', '', TRUE);
	*/
	echo '<pre>';
	print_r($_COOKIE);
	echo '</pre>'


	//Sessions - used on the server (and more secure) - yet anything can be hacked it is a little harder
	session_start();
	
	if ( isset ( $_SESSION['views'] ) ) {
		$_SESSION['views']++;
	} else {
		$_SESSION['views'] = 1;
	}
	
	echo '<p>Pageviews: ' . $_SESSION['views'] . '</p>';
	
	session_destroy();
	
	
// DEFINE -More secure than sessions and recommend for security
	
define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // outputs "Constant" and issues a notice.

define("GREETING", "Hello you.", true);
echo GREETING; // outputs "Hello you."
echo Greeting; // outputs "Hello you."

// Works as of PHP 7
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1]; // outputs "cat"

	
?>