<?
        include 'process_balance.php';
     
    sec_session_start();
    if(login_check($mysqli) == FALSE) {
        // go back to login page
        header('Location: login.php');
		exit();
    }else{
     
 ?>
 
 
<!DOCTYPE HTML>

<html>
    <head>
        <title>Balance</title>
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
                        <a href="index.php" class="icon icon-home" ><span>Home</span></a>
                        <a href="transfer_funds.php" class="icon icon-dollar"><span>Transfer</span></a>
                        <a href="balance.php" class="icon icon-money active"><span>Balance</span></a>
                        <a href="security_questions.php" class="icon icon-user" ><span>Profile</span></a>
                        <a href="logout.php" class="icon icon-signout"><span>Log Out</span></a>
                    </nav>
 
                <!-- Main -->
                    <div id="main">
                        <!-- Me -->
                            <div id="balance" class="panel">
                                <header>
                                	<h1>Query Balance</h1>
                                    </header>
                                    <br />
                                    <h2><font size="6" and color="#000066">Checking Account:</font></h2>
                                    <span class="byline">$<? echo $_SESSION['checking_balance']; ?></span>
                                    <span class="error"><? if($_SESSION['checking_locked'] == 1){echo "Locked"; } ?></span>
                                
                                <h2><font size="6" and color="#000066">Saving Account:</font></h2>
                                    <span class="byline">$<? echo $_SESSION['saving_balance']; ?></span>
                                    <span class="error"><? if($_SESSION['saving_locked'] == 1){echo "Locked"; } ?></span>
 
                            </div>
 
                        <!-- Work --> 
                     
 
                    </div>
         
                <!-- Footer -->
                    <div id="footer">
                        <ul class="links">
                            <li>Senior Project Design: Banking System | by Kush Patel, Nicholas Rodriguez, Justin McClain</li>
                          
                        </ul>
                    </div>
         
            </div>
 
    </body>
</html>
 
 
<? 
    }
?>