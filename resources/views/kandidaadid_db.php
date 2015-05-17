<?php

$mysqli = NEW MySQLi('localhost','root','Admin123','vv_db');

$resultSet = $mysqli->query("SELECT * FROM kandidaadid");
if($resultSet->num_rows != 0){
	while($rows = $resultSet->fetch_assoc())
	{
	$kandidaat = $rows['nimi'];
	$erakond = $rows['erakond'];
	$piirkond = $rows['piirkond'];

	echo "<p class='$erakond'>Nimi: $kandidaat<br>Erakond: $erakond<br>Piirkond $piirkond</p>";

}
}else{
	echo "No results.";
}
?>
