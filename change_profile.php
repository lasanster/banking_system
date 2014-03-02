<?
include 'db_connect.php';
include 'security.php';

sec_session_start(); // Our custom secure way of starting a php session.

    if(login_check($mysqli) == FALSE) {
        // go back to login page
        header('Location: login.php');
		exit();
    }else{
    	if(isset($_GET['error'])) 
     	{
			$error = $_GET['error'];
			if($error == 1){
				$message = "Please Fill Every Field";
			}
			elseif($error == 2){
				$message = "Invalid Confirmation Code";
			}
		}
     
 ?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Change Profile</title>
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
		function getRequest() {
		    var req = false;
		    try{
		        // most browsers
		        req = new XMLHttpRequest();
		    } catch (e){
		        // IE
		        try{
		            req = new ActiveXObject("Msxml2.XMLHTTP");
		        } catch (e) {
		            // try an older version
		            try{
		                req = new ActiveXObject("Microsoft.XMLHTTP");
		            } catch (e){
		                return false;
		            }
		        }
		    }
		    return req;
		}
		function sendMail() {
		  var ajax = getRequest();
		  ajax.onreadystatechange = function(){
		      if(ajax.readyState == 4){
		          document.getElementById('output').innerHTML = ajax.responseText;
		          
		      }
		  }
		  ajax.open("GET", "send_message.php", true);
		  ajax.send(null);
		}
		
    	$(document).ready(function() {
  			var par = $('#hidden');
  			$(par).hide();
  
  			$('#confirm_button').click(function(e) {
      			$(par).slideToggle('slow');
      			e.preventDefault();
  			});
		});
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
                        <a href="transfer_funds.php" class="icon icon-dollar"><span>Transfer</span></a>
                        <a href="balance.php" class="icon icon-money"><span>Balance</span></a>
                        <a href="security_questions.php" class="icon icon-user active" ><span>Profile</span></a>
                        <a href="logout.php" class="icon icon-signout"><span>Log Out</span></a>
					</nav>
				<!-- Main -->
					<div id="main">
						<center><b style="color: red;"><? echo $message; ?></b></center>
						<span id="output"></span>
						<!-- Email -->
							<div id="profile" class="panel">
								<header>
									<h2>Change Profile Info</h2>
								</header>
								<form action="process_change_profile.php" method="post">
									<div>
										<div class="row half">
											<div class="6u">
												 <b>First Name:</b>  <? echo $_SESSION['firstname']; ?>
											</div>
											<div class="6u">
												<b>Last Name:</b>  <? echo $_SESSION['lastname']; ?>
											</div>
										</div>
										<div class="row half">
											<div class="6u">
												<b>Phone Number:</b>
												<input type="text" class="text" name="phonenumber" value = "<? echo $_SESSION['phone']; ?>" />
											</div>
										</div>
                                            
										<div class="row half">
											<div class="10u">
												<b>Address:</b>
												<input type="text" class="text" name="address" value = "<? echo $_SESSION['address']; ?>" />
                                            </div>
										</div>
                                        <div class="row half">
											<div class="4u">
												<input type="text" class="text" name="city" value = "<? echo $_SESSION['city']; ?>" />
											</div>
                          
											<div class="4u">
												<input type="text" class="text" name="state" value = "<? echo $_SESSION['state']; ?>" />
											</div>
											<div class="4u">
												<input type="text" class="text" name="zip" value = "<? echo $_SESSION['zip']; ?>" />
											</div>
										</div>
                                     
										
										<div class="button" id="confirm_button" onclick="sendMail(); return false">Complete</div>
								
										<div id="hidden" >
											<fieldset>
												<label for="confirmation"> Enter Confirmation Number:</label>
												<input type="number" name="confirmnum" id="num"/>
											</fieldset>
											<input type="submit" class="button" value="Submit"/>	
										</div>
									</div>
								</form>
							</div>

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