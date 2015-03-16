<?php 
//Based on Codecall tutorial
include_once("config.php"); //include the config 
?>

<?php
//if user did not click registration button show the registration field.
 if( !(isset( $_POST['register'] ) ) ) { ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Veebivalimised</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="theme.css">
		
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
		 <p>Kasutajaks registreerimine</p>
		</header>
		
		<div id="main-wrapper">
		 <div id="register-wrapper">
			 <form method="post">
				 <ul>
					 <li>
						 <label for="usn">Kasutajanimi: </label>
						 <input type="text" id="usn" maxlength="30" required autofocus name="username" />
					 </li>
					
					 <li>
						 <label for="passwd">Parool: </label>
						 <input type="password" id="passwd" maxlength="30" required name="password" />
					 </li>
						
						<li>
						 <label for="conpasswd">Parool uuesti: </label>
						 <input type="password" id="conpasswd" maxlength="30" required name="conpassword" />
					 </li>
					 <li class="buttons">
						 <input type="submit" name="register" value="Register" />
							<input type="button" name="cancel" value="Cancel" onclick="location.href='index.php'" />
					 </li>
					
				 </ul>
			 </form>
			</div>
		</div>
	
	</body>
</html>

<?php 

//if register button was clicked.
} else {
$usr = new Users; //create new instance of the class Users
$usr->storeFormValues( $_POST ); //store form values

//if the entered password is match with the confirm password then register him
if( $_POST['password'] == $_POST['conpassword'] ) {
echo $usr->register($_POST); 
} else {
//if not then say that he must enter the same password to the confirm box.
echo "Password and Confirm password not match"; 
}
}
?>