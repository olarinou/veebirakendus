<?php 
//Based on Codecall tutorial
include_once("config.php"); ?>

<?php if( !(isset( $_POST['login'] ) ) ) { ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Veebivalimised</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="theme.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
		<div class="nav">
      <div class="container">
        <ul class="text-center">
        	<li><a href="index.php">Avaleht</a></li>
          	<li><a href="login.php">Logi sisse</a></li>
          	<li><a href="index.php">Kandidaadi lisamine</a></li>
          	<li><a href="#">Hääleta</a></li>
          	<li><a href="#">Tühista hääl</a></li>
          	<li><a href="#">Kandidaadid</a></li>
          	<li><a href="#">Otsing</a></li>
          	<li><a href="#">Tulemuste jälgimine</a></li>
          	<li><a href="#">Statistika</a></li>
        </ul>
      </div>
    </div>	
		<header id="head" >
		 <p>Veebivalimised login</p>
		 <p><a href="register.php"><span id="register">Register</span></a></p>
		</header>
		
		<div id="main-wrapper">
		 <div id="login-wrapper">
			 <form method="post" action="">
				 <ul>
					 <li>
						 <label for="usn">Username : </label>
						 <input type="text" maxlength="30" required autofocus name="username" />
					 </li>
					
					 <li>
						 <label for="passwd">Password : </label>
						 <input type="password" maxlength="30" required name="password" />
					 </li>
					 <li class="buttons">
						 <input type="submit" name="login" value="Log me in" />
							<input type="button" name="register" value="Register" onclick="location.href='register.php'" />
					 </li>
					
				 </ul>
			 </form>
				
			</div>
		</div>
	
	</body>
</html>

<?php 
} else {
$usr = new Users; //create a new instance of the Users class
$usr->storeFormValues( $_POST ); //will use the function storeFormValues to store the form values

if( $usr->userLogin() ) {
echo "Welcome"; 
} else {
echo "Incorrect Username/Password"; 
}
}
?>