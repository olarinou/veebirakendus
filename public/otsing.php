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
    	<form action="search.php" method="GET">
				<div class="form-group">
			        <label for="nimi">Nimi:</label>
			        <input type="text" class="form-control" name="query" placeholder="Nimi" required>
			    </div>
			<button type="submit" class="btn btn-default">Otsi</button>
		</form>		
		</div>
	</div>

	<div class="footer">
		<div class="container">
  		<p>Veebivalimised on loodud aine Veebirakenduste loomine korras</p>
		</div>
	</div>

		</body>
</html>