
<?php
	
	if(isset($_GET['error'])) {
		$message = 'Error Logging In!';
	}
	
?> 

<html>
	<head>
		<title>Login Page</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
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
					

				<!-- Main -->
					<div id="main">
							<center><b style="color: red;"><? echo $message; ?></b></center>						<!-- Me -->
							<div id="Login" class="panel">
								<header>
									<h1>Admin Login</h1>
								</header>
								     <form action="process_login.php" method="post" name="login_form">

										<legend>Email:</legend>
                                    <div class="row">
                                    	<div class="6u">
											<input type"text" name="email" placeholder="Email" />  
										</div>
									</div>                               
										<legend>Password:</legend>
									<div class="row">
                                    	<div class="6u">
                                 			<input type="password" name="password" id="password" placeholder="Password"/> 
										 </div>
									</div>                                       
									<br />
										<input class="button" type="submit" value=" Login " onclick="formhash(this.form, this.form.password);" />
                                    
                                	</form>
								<br />				
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