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
			<form action="addtokandidaadid.php" method="post">
				<div class="form-group">
			        <label for="nimi">Nimi:</label>
			        <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" required>
			    </div>
			    <div class="form-group">
			        <label for="erakond">Erakond:</label>
			        <input type="text" class="form-control" name="erakond" id="erakond" placeholder="Erakond" required>
			    </div>
			    <div class="form-group">
			        <label for="piirkond">Piirkond:</label>
			        <input type="text" class="form-control" name="piirkond" id="piirkond" placeholder="Piirkond" required>
			    </div>
			    <button type="submit" class="btn btn-default">Lisa</button>
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