<?php


$link = mysqli_connect("localhost", "root", "Admin123", "vv_db");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if (isset($_POST['voteSubmit'])) {

	
	if (!empty($_POST['valitu'])) {
		$kandid = mysqli_real_escape_string($link, $_POST['kandidaadiID']);
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
?>