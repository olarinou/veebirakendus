<?php
$mysqli = NEW MySQLi('localhost','root','Admin123','vv_db');

$infoTable = Lava::DataTable();
	$infoTable->addStringColumn('Piirkond')
			->addStringColumn('Kandidaat') 
            ->addStringColumn('Erakond') 
            ->addNumberColumn('Hääled');	
	
	//		 	
	$query = $mysqli->query("SELECT k.kandidaadiID, k.nimi, k.erakond, k.piirkond, t.tulemus FROM kandidaadid as k
	JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID)");
	if($query->num_rows != 0){		
	
		while($rows = $query->fetch_assoc()){ 
			$kandid= $rows['kandidaadiID'] ;
			$nimi=$rows['nimi'];
			$erakond=$rows['erakond'];
			$piirkond=$rows['piirkond']; 
			$tulemus=$rows['tulemus']; 
			$rowData = array(
			$piirkond, $nimi, $erakond, $tulemus
			);
			$infoTable->addRow($rowData);
		}	
	} 	
	$mysqli->close();
	//	
	
	$chart = Lava::LineChart('infoChart');
	$chart->datatable($infoTable);
	$chart->Lava::render('LineChart','infoChart','chart',true);
	
?>