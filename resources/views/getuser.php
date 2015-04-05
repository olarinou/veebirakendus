<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','Admin123','vv_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM kandidaadid WHERE kandidaadiID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>kandidaadiID</th>
<th>nimi</th>
<th>erakond</th>
<th>piirkond</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['kandidaadiID'] . "</td>";
    echo "<td>" . $row['nimi'] . "</td>";
    echo "<td>" . $row['erakond'] . "</td>";
    echo "<td>" . $row['piirkond'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
