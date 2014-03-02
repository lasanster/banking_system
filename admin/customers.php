<?
	include 'db_connect.php';
	include 'security.php';
	sec_session_start();
	if(login_check($mysqli) == FALSE) {
 		// go back to login page
		header('Location: login.php');
	}else{
	
?>
      
<html>
	<head>
		<title>Customers</title>
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

		<style>
			table
			{
				border-collapse:collapse;
			}
			table, td, th
			{
				border:1px solid black;
			}
		</style>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav -->
					<nav id="nav">
						<a href="customers.php" class="icon icon-home active"><span>Customers</span></a>
						<a href="unlock_account.php" class="icon icon-unlock"><span>Unlock </span></a>
                        <a href="logout.php" class="icon icon-signout"><span>Log Out</span></a>
					</nav>
				<!-- Main -->
					<div id="main">
						
						<!-- Me -->
							<div id="customers" class="panel">
								<header>
									<h1>Customers</h1>	
								</header>
								<? 
									if($stmt = $mysqli->prepare("SELECT id, first_name, last_name, checking_account.acc_no AS checkingNumber, checking_account.balance AS checkingBalance, checking_account.locked AS checkingLocked, saving_account.acc_no AS savingNumber, saving_account.balance AS savingBalance, saving_account.locked AS savingLocked FROM member_profile LEFT JOIN checking_account ON member_profile.id = checking_account.acc_holder LEFT JOIN saving_account ON member_profile.id = saving_account.acc_holder"))
									{
										$stmt->execute();
										$stmt->store_result();
										$stmt->bind_result($id, $firstname, $lastname, $checkingNumber, $checkingBalance, $checkingLocked, $savingNumber, $savingBalance, $savingLocked);
										echo '<table border="1">';
											echo '<tr>';
												echo '<th> ID </th>';
												echo '<th> NAME </th>';
												echo '<th> CHECKING ACCOUNT </th>';
												echo '<th> BALANCE </th>';
												echo '<th> STATUS </th>';
												echo '<th> SAVING ACCOUNT </th>';
												echo '<th> BALANCE </th>';
												echo '<th> STATUS </th>';
											echo '</tr>';
										for($i=1; $i <= $stmt->num_rows; $i++){
											$row = $stmt->fetch();
											echo "<tr>";
												echo "<td>".$id."</td>";
												echo "<td>".$lastname.", ".$firstname."</td>";
												echo "<td>".$checkingNumber."</td>";
												echo "<td>".$checkingBalance."</td>";
												if ($checkingLocked == 1){
													echo "<td>Locked</td>";
												}else{ echo "<td> </td>";}
												echo "<td>".$savingNumber."</td>";
												echo "<td>".$savingBalance."</td>";
												if ($savingLocked == 1){
													echo "<td>Locked</td>";
												}else{ echo "<td> </td>";}
											echo "</tr>";
										}
										echo'</table>';
										
									}
									$stmt->close();
								?>
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