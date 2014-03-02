<?php
	if(isset($_GET['error'])) { 
   		echo 'Error registering!';
	}
	//sec_session_start();
?> 
<html>
<head>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/sha512.js"></script>
<title>Registration page</title>
</head>
<body>   
	<h1>Register here</h1>
	<form action="process_register.php" method="post" name="register_form">
		Username: <input type="text" name="username" />
		<br />
		Email: <input type="text" name="email" /> <!-- Enter email: test@example.com -->
		<br />
		Password: <input type="password" name="password" id="password"/><br />  <!-- enter password: 6ZaxN2Vzm9NUJT2y -->
		<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
	</form>
	
	

</body>
</html>
