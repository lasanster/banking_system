<?
	include 'db_connect.php';
	include 'security.php';
	sec_session_start(); 
	$random = rand(10000,99999);
	$_SESSION['random'] = $random;
	
	sendmessage($_SESSION['phone'], "Confirmation Number: ".$random);
	
	echo "Confirmation Number Sent";

?>