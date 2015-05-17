
<?php

$mysqli = NEW MySQLi('localhost','root','Admin123','vv_db');
$query = $mysqli->query("SELECT kandidaadiID, nimi, erakond, piirkond FROM kandidaadid ORDER BY kandidaadiID ASC");
if($query->num_rows != 0){
	echo '<form name="vote" id="vote" method="post" action="/haaletus">';
	
	while($rows = $query->fetch_assoc()){ 
		$kandid= $rows['kandidaadiID'] ;
		$nimi=$rows['nimi'];
		$erakond=$rows['erakond'];
		$piirkond=$rows['piirkond']; 
		
		echo '<input type="radio" name="valitu" value="' . $kandid . '"> ID: ' .$kandid. ' <strong> Nimi: ' .$nimi. '</strong> 
		Erakond: ' .$erakond. ' Piirkond: ' .$piirkond; 
		echo ' <br><br>';
		}	
	echo '<br><p><input class="btn btn-default" type="submit" name="voteSubmit" value="Vali kandidaat" /></p></form>';
	} 
else { 
echo "Pole ühtegi kandidaati";
}

$mysqli->close();

?>
