<?

include 'db_connect.php';
include 'security.php';

sec_session_start(); // Our custom secure way of starting a php session. 
 
if(isset($_POST['account']) && !empty($_POST['account'])) { 
	$account = $_POST['account'];
	$a = substr($account, 0, 1);
	if($a == "3"){
  		if($stmt = $mysqli->prepare("UPDATE checking_account SET locked = '0' WHERE acc_no = '$account'")){
			$stmt->execute();
			header("Location: ./unlock_account.php?success=1");
		}
		else{
			header("Location: ./unlock_account.php?error=1");
		}
		$stmt->close();
		
	}elseif($a == "2"){
  		if($stmt = $mysqli->prepare("UPDATE saving_account SET locked = '0' WHERE acc_no = '$account'")){
			$stmt->execute();
			header("Location: ./unlock_account.php?success=1");
		}
		else{
			header("Location: ./unlock_account.php?error=1");
		}
		$stmt->close();
	}else{
		header("Location: ./unlock_account.php?error=1");
	}
}
else{
	header("Location: ./unlock_account.php?error=1");
}

?>