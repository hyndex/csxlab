
<!DOCTYPE HTML>
<html>
<head>

<title>Secure Login: Log In</title>
<link rel="stylesheet" href="styles/main.css" />
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script> 
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href="../www/admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<!----------error login----------->

        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
	<!----------start member-login----------->
		<div class="member-login">
			<!----------star form----------->
        <form action="includes/process_login.php" method="post" name="login_form"> 			
	
					<div class="formtitle">Admin Login</div>
					<div class="input">
						<input type="text" name="email" placeholder="User Name"  required/> 
						<span> <img src="../www/admin/images/select.png"/></span>
					</div>
					<div class="input">
						<input type="password" 
                             name="password" 
                             id="password" placeholder="Password" required/>
						<span><img src="../www/admin/images/select.png"/></span>
					</div>
					<div class="buttons">
						<a href="#">Forgot password?</a>
						<input class="bluebutton" type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
         
						<div class="clear"> </div>
					</div>
		
				</form>
				<!----------end form----------->
		</div>
		<!----------end member-login----------->
		
		<!----------start copyright----------->
			<p class="copy_right">&#169; Hyndex <a href="http://w3layouts.com" target="_blank">&nbsp;Hyndex</a> </p>
</body>
</html>
