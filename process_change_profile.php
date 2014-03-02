<?

include 'db_connect.php';
include 'security.php';

sec_session_start();
// Our custom secure way of starting a php session.
$userid = $_SESSION['user_id'];

if (isset($_POST['phonenumber'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['confirmnum']) && !empty($_POST['phonenumber']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip'])) {
		$newPhonenum = $_POST['phonenumber'];
		$newAddress = $_POST['address'];
		$newCity = $_POST['city'];
		$newState = $_POST['state'];
		$newZip = $_POST['zip'];
		$confirmNum = $_POST['confirmnum'];
	
	if($confirmNum == $_SESSION['random'])
	{
		if ($stmt = $mysqli -> prepare("UPDATE member_profile SET address = '$newAddress', city = '$newCity', state = '$newState', zipcode = '$newZip', phone = '$newPhonenum' WHERE id = '$userid'")) {
			$stmt -> execute();
			$_SESSION['address'] = $newAddress;
			$_SESSION['city'] = $newCity;
			$_SESSION['state'] = $newState;
			$_SESSION['zip'] = $newZip;
			$_SESSION['phone'] = $newPhonenum;	
		}
		
		
		$stmt -> close();
		header('Location: ./index.php?success=1');
		exit();
	}
	else 
	{
		header('Location: ./change_profile.php?error=2');
		exit();
	}
}
else {
	header('Location: ./change_profile.php?error=1');
	exit();
}	
		
?>