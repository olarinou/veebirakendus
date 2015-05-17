<?php namespace App\Http\Controllers;
use Auth;
use URL;
use Session;
use Socialize;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddRequest;
use Khill\Lavacharts\Lavacharts;

class PieController extends Controller {

    /**
 * Show the application home page to the user.
 *
 * @return Response
 */

public function displaychart()
	{
	$mysqli = mysqli_connect('localhost','root','Admin123','vv_db');
		
	$infoTable = Lava::DataTable();
	$infoTable->addStringColumn('???')			
            ->addNumberColumn('Hääled')
			->addRow(array('test1', 5))
			->addRow(array('test2', 2))
			->addRow(array('test3', 4))
			->addRow(array('test4', 89));;	
	
	//		 	
	/*$query = $mysqli->query("SELECT k.kandidaadiID, k.nimi, k.erakond, k.piirkond, t.tulemus FROM kandidaadid as k
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
	*/
	$chart = Lava::PieChart('Info')
                    ->setOptions(array(
                        'datatable' => $infoTable,
                        'title' => 'Statistika',
						'is3D' => true,
						'slices' => array(
                        $lava->Slice(array(
                          'offset' => 0.2
                        )),
                        $lava->Slice(array(
                          'offset' => 0.25
                        )),
                        $lava->Slice(array(
                          'offset' => 0.3
                        ))
                      )
                  ));	
	
	echo '<div id="chart-div"></div>';
	echo Lava::render('PieChart', 'IMDB', 'chart-div');
	}

}
