<?
	include 'db_connect.php';
	include 'security.php';

	sec_session_start();
	
	//$random = rand(10000,99999);
	if(login_check($mysqli) == FALSE) {
 		// go back to login page
		header('Location: login.php');
		exit();
	}else{
		if(isset($_GET['error'])) {
			$error = $_GET['error'];
			if($error == 1){
				$message = "Invalid Entries";
			}
			elseif($error == 2){
				$message = "Please Enter Values";
			}
			elseif($error == 3){
				$message = "From Account Not Found";
			}
			elseif($error == 4){
				$message = "Either your account is already locked, or you dont have enough balance in you account, or cannot transfer to same account";
			}	
			elseif($error == 5){
				$message = "Cofirmation Number Does Not Match";
			}	
		}
		elseif(isset($_GET['success'])){
			$message = "Transfer Successfull";
		}
		elseif(isset($_GET['locked'])){
			$message = "Your Account is Locked";
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
		<title>Transfer Funds</title>
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
		  ajax.open("GET", "send_message.php?success=1", true);
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
									<h2>Transfer Funds</h2>
								</header>
								<form action="process_transfer.php" method="post" name="transfer_form">
									<input type="hidden" name="hidden" value=""/>
									<div>
										<div class="row half">
											<div class="6u">
												<b> From Account:</b>
												<select name="from_account">
													<option value="" selected="selected">-select-</option>
													<option value="<? echo $_SESSION['checking_account']; ?>"> <? echo $_SESSION['checking_account']; ?></option>
													<option value="<? echo $_SESSION['saving_account']; ?>"> <? echo $_SESSION['saving_account']; ?></option>
												</select>
											</div>
											<div class="6u">
												<b> To Account: </b>
												<input type="number" class="text" name="to_account" placeholder="To Account #" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="number" class="text" name="transfer_amount" placeholder="Amount to Transfer" />
											</div>
										</div>
										<br />
										
										<div class="button" id="confirm_button" onclick="sendMail(); return false">Confirm</div>
								
										<div id="hidden" >
											<fieldset>
												<label for="confirmation"> Enter Confirmation Number:</label>
												<input type="number" name="num" id="num"/>
											</fieldset>
											<input type="submit" class="button" value="Transfer"/>	
										</div>
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