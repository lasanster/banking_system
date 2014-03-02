<?

include 'db_connect.php';
include 'security.php';
sec_session_start(); // Our custom secure way of starting a php session. 

	$from_account = $_SESSION['data'][0];
	$to_account = $_SESSION['data'][1];
	$amount = $_SESSION['data'][2];
	$from_balance = $_SESSION['data'][3];
	$to_balance = $_SESSION['data'][4];
	$from_status = $_SESSION['data'][5];
	$to_status = $_SESSION['data'][6];
		//update checking account balance if from account is checking account
	if($from_status == 1){
		if($stmt = $mysqli->prepare("UPDATE checking_account SET balance = '$from_balance' WHERE acc_no = '$from_account'")){
			$stmt->execute();
		}
		$_SESSION['checking_balance'] = $from_balance;
		$stmt->close();
		//post_newChekcingBalance($from_account, $from_balance);
	}
	//update saving account balance if from account is saving account
	if($from_status == 2){
		if($stmt = $mysqli->prepare("UPDATE saving_account SET balance = '$from_balance' WHERE acc_no = '$from_account'")){
			$stmt->execute();
		}
		$_SESSION['saving_balance'] = $from_balance;
		$stmt->close();
		//post_newSavingBalance($from_account, $from_balance);
	}
	//update checking account balance if to account is checking account
	if($to_status == 1){
		if($stmt = $mysqli->prepare("UPDATE checking_account SET balance = '$to_balance' WHERE acc_no = '$to_account'")){
			$stmt->execute();
		}
		$stmt->close();
		if ($to_account == $_SESSION['checking_account']){
			$_SESSION['checking_balance'] = $to_balance;
		}
		//post_newChekcingBalance($to_account, $to_balance);
	}
	//update saving account balance if to account is saving account
	if($to_status == 2){
		if($stmt = $mysqli->prepare("UPDATE saving_account SET balance = '$to_balance' WHERE acc_no = '$to_account'")){
			$stmt->execute();
		}
		$stmt->close();
		if($to_account == $_SESSION['saving_account']){
			$_SESSION['saving_balance'] = $to_balance;
		}
		//post_newSavingBalance($to_account, $to_balance);
	}
	header('Location: ./index.php?transfersuccess=1');
	exit();

?>
