<?php
 /* Set oracle user login and password info */
$dbuser = "";  /* your deakin login */
$dbpass = "";  /* your deakin password */
$db = "SSID"; 
$connect = OCILogon($dbuser, $dbpass, $db); 
if (!$connect)  {
	echo "An error occurred connecting to the database"; 
	exit;
  }
 
 
?>