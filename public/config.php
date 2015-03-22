<?php
	//set off all error for security purposes
error_reporting(0);


//define some contstant
	define( "DB_DSN", "mysql:host=localhost;dbname=vv_db" ); //this constant will be use as our connectionstring/dsn

	define( "DB_USERNAME", "root" ); //username of the database
	define( "DB_PASSWORD", "" ); //password of the database
	define( "CLS_PATH", "class" ); //the class path of our project
 	//include the classes
	include_once( CLS_PATH . "/user.php" );
?>