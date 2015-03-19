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
		
	</head>
	
	<body>
		<div class="nav">
      <div class="container">
        <?php include('menu.php'); ?>
      </div>
    </div>	
		<header id="head" >
		 <p>Veebivalimised login</p>
		 <p><a href="register.php"><span id="register">Kasutajaks refistreerimine</span></a></p>
		</header>
		
		<div id="main-wrapper">
		 <div id="login-wrapper">
			 <form method="post" action="">
				 <ul>
					 <li>
						 <label for="usn">Kasutajanimi: </label>
						 <input type="text" maxlength="30" required autofocus name="username" />
					 </li>
					
					 <li>
						 <label for="passwd">Parool: </label>
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