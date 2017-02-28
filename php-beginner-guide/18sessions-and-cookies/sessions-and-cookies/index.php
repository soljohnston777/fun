<?php
	//Sessions
	session_start();
	
	if ( isset ( $_SESSION['views'] ) ) {
		$_SESSION['views']++;
	} else {
		$_SESSION['views'] = 1;
	}
	
	echo '<p>Pageviews: ' . $_SESSION['views'] . '</p>';
	
	session_destroy();
	
	//Cookies
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
?>