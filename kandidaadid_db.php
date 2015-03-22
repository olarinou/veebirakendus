<?php

$mysqli = NEW MySQLi('veebivalimised','root','root','vv_db');

$resultSet = $mysqli->query("SELECT * FROM kandidaadid");
if($resultSet->num_rows != 0){
	while($rows = $resultSet->fetch_assoc())
	{
	$kandidaat = $rows['nimi'];
	$erakond = $rows['erakond'];
	$piirkond = $rows['piirkond'];

	echo "<p>Nimi: $kandidaat<br>Erakond: $erakond<br>Piirkond: $piirkond</p>";

}
}else{
	echo "No results.";
}
?>
