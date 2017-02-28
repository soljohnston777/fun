<?php
	$file_name = "filedemo.txt";
	
	//Create the file
	$fh = fopen($file_name, 'w') or die("can't open file");
	$content = "This is how you create a file and add text to it. \n";
	fwrite($fh, $content);
	fclose($fh);
	
	//Read the data in the file
	$fh = fopen($file_name, 'r');
	$content = fread($fh, filesize($file_name));
	fclose($fh);
	echo '<p>Before append: ' . $content . '</p>';
	
	//Append data to the file
	$fh = fopen($file_name, 'a');
	$content = "This is how to append data to the file. \n";
	fwrite($fh, $content);
	fclose($fh);
	
	//Read file with appended data
	$fh = fopen($file_name, 'r');
	$acontent = fread($fh, filesize($file_name));
	fclose($fh);
	echo '<p>After append: ' . $acontent . '</p>';
	
	unlink($file_name);
?>