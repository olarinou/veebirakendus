<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Admin123", "vv_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$nimi = ucwords(strtolower(mysqli_real_escape_string($link, $_POST['nimi'])));
$erakond = ucwords(strtolower(mysqli_real_escape_string($link, $_POST['erakond'])));
$piirkond = ucwords(strtolower(mysqli_real_escape_string($link, $_POST['piirkond'])));

 
// attempt insert query execution
$sql = "INSERT INTO kandidaadid (nimi, erakond, piirkond) VALUES ('$nimi', '$erakond', '$piirkond')";
if(mysqli_query($link, $sql)){
    include ("addkandidaadid.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
