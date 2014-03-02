<?
	include 'db_connect.php';
	include 'security.php';

	sec_session_start();
	
		if(login_check($mysqli) == FALSE) {
 		// go back to login page
		header('Location: login.php');
		exit();
	}else{
		if(isset($_GET['success'])){
			$message = "Transfer Successfull";
		}
		
 ?>
        


<!DOCTYPE HTML>
<!--
	Astral 2.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Transfer Receipt</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" />
		<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>
		
		</script>
		
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/noscript.css" />
			<link rel="stylesheet" href="css/forms.css" />
		</noscript>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav -->
					<nav id="nav">
						<a href="index.php" class="icon icon-home" ><span>Home</span></a>
                        <a href="transfer_funds.php" class="icon icon-dollar active"><span>Transfer</span></a>
                        <a href="balance.php" class="icon icon-money"><span>Balance</span></a>
						<a href="security_questions.php" class="icon icon-user" ><span>Profile</span></a>
                        <a href="logout.php" class="icon icon-signout"><span>Log Out</span></a>
					</nav>
				<!-- Main -->
					<div id="main">
							<center><b style="color: red;"><? echo $message; ?></b></center>
							<span id="output"></span>
						<!-- Email -->
							<div id="transfer" class="panel">
								<header>
									<h2>Transfer Receipt</h2>
								</header>			
								<form action="process_receipt.php" method="post" name="receipt_form">
									<div>
										<div class="row half">
											<div class="6u">
												<b> From Account:</b>
												<input type="hidden" id="from_account" value="<? $_SESSION['data'][0];?>" />
												<? echo $_SESSION['data'][0];?>
											</div>
											<div class="6u">
												<b> To Account: </b>
												<input type="hidden" id="to_account" value="<? $_SESSION['data'][1];?>" />
												<? echo $_SESSION['data'][1]; ?>

											</div>
										</div>
										<div class="row">
											<div class="12u">
												<b>Amount:</b>
												<input type="hidden" id="amount" value="<? $_SESSION['data'][2];?>" />
												<? echo $_SESSION['data'][2];?>

											</div>
										</div>
										<br />
										<div class="button" id="cancel" onclick="window.location.href = 'index.php'"> Cancel </div>
										<input type="submit" class="button" value="Confirm Transfer"/>				
									</div>
								</form>								
							</div>

					</div>
		
				<!-- Footer -->
					<div id="footer">
						<ul class="links">
							<li>Senior Project Design: Banking System | by Kush Patel, Nicholas Rodriguez, Justin McClain</li>
							<li>Design : <a href="http://html5up.net/">HTML5 UP</a></li>
						</ul>
					</div>
		
			</div>

	</body>
</html>

<? 
	}
?>