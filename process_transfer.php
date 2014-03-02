<?

include 'db_connect.php';
include 'security.php';
sec_session_start(); // Our custom secure way of starting a php session. 

$userid = $_SESSION['user_id'];
$randomNum = $_SESSION['random'];
$phone = $_SESSION['phone'];



if(isset($_POST['from_account'], $_POST['to_account'], $_POST['transfer_amount'], $_POST['num']) && !empty($_POST["to_account"]) && !empty($_POST['transfer_amount']) && !empty($_POST['num'])){

	$confirmationNum = $_POST['num'];
	if ($randomNum != $confirmationNum){
		header("Location: ./transfer_funds.php?error=5");
		exit();
	}else{
	$from_account = $_POST['from_account'];
	$to_account = $_POST['to_account'];
	$amount = $_POST['transfer_amount'];
	
	// Creating a Transfer Summery Message
	$message = "Tranfer Summery: \n";
	$message = $message."From Account: ".$from_account."\n";
	$message = $message."To Account: ".$to_account."\n";
	$message = $message."Amount: ".$amount."\n";

	$f = substr($from_account, 0, 1);
	$t = substr($to_account, 0, 1);
	
	if($f == "3"){
		$from_balance = $_SESSION['checking_balance'];
		$locked = $_SESSION['checking_locked'];		
		$from_status = 1;	
	}elseif($f == "2"){
		$from_balance = $_SESSION['saving_balance'];
		$locked = $_SESSION['saving_locked'];
		$from_status = 2;
	}
	//get checking account balance
	if($t == "3"){
		if($stmt = $mysqli->prepare("SELECT balance FROM checking_account WHERE acc_no = '$to_account'")){
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($to_balance);
			$stmt->fetch();
			if($stmt->num_rows == 1){
				$to_status = 1;
			}else{
				header('Location: ./transfer_funds.php?error=3');
				exit();
			}
		}
		$stmt->close();
			
	}
	//get saving account balance
	elseif($t == "2"){
		if($stmt = $mysqli->prepare("SELECT balance FROM saving_account WHERE acc_no = '$to_account'")){
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($to_balance);
			$stmt->fetch();
			if($stmt->num_rows == 1){
				$to_status = 2;
			}else{
				header('Location: ./transfer_funds.php?error=3');
				exit();
			}
		}
		$stmt->close();
	}
	//if accounts not found return error
	else{
		header('Location: ./transfer_funds.php?error=1');
		exit();
	}
		
	if ($from_account != $to_account && $from_balance > $amount && $locked == 0 ){
		if($amount <= 1000){
			$from_balance = $from_balance - $amount;
			$to_balance = $to_balance + $amount;
			$_SESSION['data'] = array($from_account, $to_account, $amount, $from_balance, $to_balance, $from_status, $to_status);
			header('Location: ./transfer_receipt.php');
			
			sendmessage($phone, $message);
			exit();
		}

		else{
			//lock checking account
			if($from_status == 1){
				if($stmt = $mysqli->prepare("UPDATE checking_account SET locked = '1' WHERE acc_no = ?")){
					$stmt->bind_param('i',  $from_account);
					$stmt->execute();
				}
				$_SESSION['checking_locked'] = 1;
				$stmt->close();
				//lock_ChekcingAccount($from_account);
			}
			//lock saving account
			elseif($from_status == 2){
				if($stmt = $mysqli->prepare("UPDATE saving_account SET locked = '1' WHERE acc_no = ?")){
					$stmt->bind_param('i',  $from_account);
					$stmt->execute();
				}
				$_SESSION['saving_locked'] = 1;
				$stmt->close();	
				//lock_SavingAccount($from_account);
			}
			
			header('Location: ./transfer_funds.php?locked=1');
			exit();
		}		
	}
	else{
		header('Location: ./transfer_funds.php?error=4');
		exit();
	}
	}
}else{
	header('Location: ./transfer_funds.php?error=2');
	exit();
}

?>