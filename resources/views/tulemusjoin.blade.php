<?php
$servername = "localhost";
$username = "root";
$password = "Admin123";
$dbname = "vv_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT tulemused.tulemusID, kandidaadid.kandidaadiID, kandidaadid.nimi, kandidaadid.erakond, kandidaadid.piirkond, SUM( tulemused.tulemus ) AS Summa FROM tulemused
   INNER JOIN kandidaadid ON tulemused.kandidaadiID=kandidaadid.kandidaadiID 
   GROUP BY Summa DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Tulemuse ID: " . $row["tulemusID"]. " - Kandidaadi ID: " . $row["kandidaadiID"]. " - Nimi: " . $row["nimi"]. " - Erakond: " . $row["erakond"]. " - Piirkond " . $row["piirkond"]. " - Tulemus " . $row["Summa"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>