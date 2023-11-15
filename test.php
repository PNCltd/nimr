<?php

// Program to display current page URL.
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
				=== 'on' ? "https" : "http") . 
				"://" . $_SERVER['HTTP_HOST'] . 
				$_SERVER['REQUEST_URI'];
echo $link;

?>
