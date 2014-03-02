<?

include 'db_connect.php';
include 'security.php';

sec_session_start(); // Our custom secure way of starting a php session. 

$time = $_SESSION['time'];
//if ($time + 2 * 60 < time()){
	
	$phone = $_SESSION['phone'];
	date_default_timezone_set("America/Chicago");
	$date = date("F j, Y, g:i a", time()); 

	$message = "Account balance was access: ". $date;

	sendmessage($phone, $message);
//}


?>