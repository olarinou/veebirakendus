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
	<div class="body">
		<div class="container">	
			<?php
				require __DIR__.'/../bootstrap/autoload.php';
				$app = require_once __DIR__.'/../bootstrap/app.php';
				$kernel = $app->make('Illuminate\Contracts\Http\Kernel');

				$response = $kernel->handle(
					$request = Illuminate\Http\Request::capture()
				);
				$response->send();
				$kernel->terminate($request, $response);				
			?>		
		</div>
	</div>

	<div class="footer">
		<div class="container">
  		<p>Veebivalimised on loodud aine Veebirakenduste loomine korras</p>
		</div>
	</div>

		</body>
</html>