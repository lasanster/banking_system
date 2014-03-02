<?
	include 'db_connect.php';
	include 'security.php';
	sec_session_start();
	if(login_check($mysqli) == FALSE) {
 		// go back to login page
		header('Location: login.php');
	}else{
		if(isset($_GET['error'])){
			$message = "ERROR";
		}
		if(isset($_GET['success'])){
			$message = "Unlock Successfull";
		}
?>
      
<html>
	<head>
		<title>Customers</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" />
		<script src="/js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script type="text/javascript" src="js/sha512.js"></script>
		<script type="text/javascript" src="js/forms.js"></script>
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
						<a href="customers.php" class="icon icon-home"><span>Customers</span></a>
						<a href="unlock_account.php" class="icon icon-unlock active"><span>Unlock </span></a>
                        <a href="logout.php" class="icon icon-signout"><span>Log Out</span></a>
					</nav>
				<!-- Main -->
					<div id="main">
						<center><b style="color: red;"><? echo $message; ?></b></center>
						<!-- Me -->
							<div id="unlock_account" class="panel">
								<header>
									<h1>Unlock Account</h1>	
								</header>
								<form action="process_unlock.php" method="post" name="unlock_form">
									
									<div>
										<div class="row half">
											<div class="6u">
												<b> Account Number:</b>
												<input type="number" class="text" name="account" placeholder="Account #" />
											</div>										
										</div>
										<br />
										<input type="submit" class="button" value="Unlock"/>	
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