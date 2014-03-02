<?
	include 'db_connect.php';
	include 'security.php';
	sec_session_start();
	if(login_check($mysqli) == FALSE) {
 		// go back to login page
		header('Location: login.php');
		exit();
	}else{
			
		if(isset($_GET['success'])) 
     	{
				$message = "Profile was Updated";
		}
		if(isset($_GET['transfersuccess'])) 
     	{
				$message = "Transfer was Successfull";
		}
		
			
 ?>
        
<!--
	Astral 2.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
        
<html>
	<head>
		<title>Main Menu</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
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
						<a href="index.php" class="icon icon-home active" ><span>Home</span></a>
                        <a href="transfer_funds.php" class="icon icon-dollar"><span>Transfer</span></a>
                        <a href="balance.php" class="icon icon-money"><span>Balance</span></a>
                        <a href="security_questions.php" class="icon icon-user" ><span>Profile</span></a>
                        <a href="logout.php" class="icon icon-signout"><span>Log Out</span></a>
					</nav>
				<!-- Main -->
					<div id="main">
						<center><b style="color: red;"><? echo $message; ?></b></center>
						<!-- Me -->
							<div id="menu" class="panel">
								<header>
									<h1>Home</h1>
									
								</header>
								Welcome <? echo $_SESSION['username']; ?>
								<!--
                                    <a href="menu.php" ><span class="button">Home</span></a>
                                    <a href="transfer_funds.php"><span class="button">Transfer Funds</span></a>
                                    <a href="balance.php" <span class="button">Query Balance</span></a>
                                    <a href="change_profile.php" ><span class="button">Change Profile</span></a>
							-->
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