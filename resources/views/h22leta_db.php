
<?php


function vote() {
    $link = mysqli_connect("localhost", "root", "Admin123", "vv_db");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 
if (isset($_POST['voteSubmit'])) {

	
	if (!empty($_POST['valitu'])) {
		$kandid = mysqli_real_escape_string($link, $_POST['valitu']);
		//var_dump($kandid);
		//die();
		$sql = "INSERT INTO tulemused (kandidaadiID, tulemus) VALUES ('$kandid', '1')";
		
		if(mysqli_query($link, $sql)){
    		//include ("addkandidaadid.php");
    		echo "Lisatud";
		} else{
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
		//$valitud_isik=$_POST['valitu'];
		} 
	else { echo "Palun vali kandidaat."; }
	}


mysqli_close($link);
}


$mysqli = NEW MySQLi('localhost','root','Admin123','vv_db');
$query = $mysqli->query("SELECT kandidaadiID, nimi, erakond, piirkond FROM kandidaadid ORDER BY kandidaadiID ASC");
if($query->num_rows != 0){
	echo '<form name="vote" id="vote" method="post" action="vote()">';
	
	while($rows = $query->fetch_assoc()){ 
		$kandid= $rows['kandidaadiID'] ;
		$nimi=$rows['nimi'];
		$erakond=$rows['erakond'];
		$piirkond=$rows['piirkond']; 
		
		echo '<input type="radio" name="valitu" value="' . $kandid . '"> ID: ' .$kandid. ' <strong> Nimi: ' .$nimi. '</strong> 
		Erakond: ' .$erakond. ' Piirkond: ' .$piirkond; 
		echo ' <br><br>';
		}	
	echo '<br><p><input type="submit" name="voteSubmit" value="Vali kandidaat" /></p></form>';
	} 
else { 
echo "Pole ühtegi kandidaati";
}

$mysqli->close();

?>
