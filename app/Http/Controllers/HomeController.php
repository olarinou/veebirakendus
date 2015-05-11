<?php namespace App\Http\Controllers;
use Auth;
use URL;
use Session;
use Socialize;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddRequest;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller {

    /**
 * Show the application home page to the user.
 *
 * @return Response
 */

public function index()
	{
		return view('home');
	} 

public function tere()
	{
		return view('tere');
	} 	

public function usergetajax()
	{
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
		<th>KandidaadiID </th>
		<th> Nimi </th>
		<th> Erakond </th>
		<th> Piirkond </th>
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
	} 	
	
public function kandidaadid()
	{
		return view('kandidaadid');
	}

public function tulemus()
	{
		return view('tulemus');
	} 	
	
public function user()
	{
	$prevurl = URL::previous();	
	Session::put('url.intended', $prevurl);	
		if(Auth::check())
		{
			$username = Auth::user()->username;
			return view('loggedin')->with('username', $username);								
		}		
		else
		{
			return view('notloggedin');
		}		
	} 	

public function otsing()
    {
        return view('otsing');
    }

public function haaletus()
    {
        return view('haaletus');
    }	
	
public function postotsing()
    {	
	return view('search');
}	

public function getStats()
    {
	$mysqli = mysqli_connect('localhost','root','Admin123','vv_db');	
	$stats_arr = array();
	$query = $mysqli->query("SELECT k.kandidaadiID, k.nimi, k.erakond, k.piirkond, t.tulemus FROM kandidaadid as k
	JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID)");
	
	if($query->num_rows != 0){		
	
		while($rows = $query->fetch_assoc()){ 
			$kandid= $rows['kandidaadiID'] ;
			$nimi=$rows['nimi'];
			$erakond=$rows['erakond'];
			$piirkond=$rows['piirkond']; 
			$tulemus=$rows['tulemus']; 
			$stats_arr[$kandid] = array($piirkond, $nimi, $erakond, $tulemus);
		}	
	} 		
	$mysqli->close();
	return $stats_arr;
	
}

public function displaychart()
	{
	$mysqli = mysqli_connect('localhost','root','Admin123','vv_db');
		
	$lava = new Lavacharts();
	$infoTable = $lava->DataTable();
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
	
	$chart = $lava->PieChart('Info')
                    ->setOptions(array(
                        'datatable' => $infoTable,
                        'title' => 'Statistika'
                     ));	
	
	return view( 'statistika', array('lava'=>$lava));
	}


public function statistika()
	{
		return view('statistika');
		//$stats = $this->getStats();
		//return view('statistika', array('stats'=>$stats));
	} 

public function data($opt)
	{		
		header('Content-Type: text/event-stream');
		header('Cache-Control: no-cache');
		header('Connection: keep-alive');	
		
		$mysqli = mysqli_connect('localhost','root','Admin123','vv_db');
		
		if($opt == "Kandidaat"){
			$query = $mysqli->query("SELECT k.kandidaadiID, k.nimi, k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
			JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) GROUP BY k.kandidaadiID ORDER BY summa  DESC");
	
			if($query->num_rows != 0){		
	
			while($rows = $query->fetch_assoc()){ 
				$kandid= $rows['kandidaadiID'] ;			
				$nimi=$rows['nimi'];
				$erakond=$rows['erakond'];
				$piirkond=$rows['piirkond']; 
				$tulemus=$rows['summa'];			
					echo "data:	{$nimi}\n";				
					echo "data:	{$erakond}\n";
					echo "data:	{$piirkond}\n";
					echo "data:	{$tulemus}\n";
					echo "data:	 \n";			
				}	
			}
		}
		
		else if($opt == "Riik"){
			$query = $mysqli->query("SELECT k.erakond, k.piirkond, SUM( t.tulemus ) AS Summa FROM kandidaadid AS k
			JOIN tulemused AS t ON ( k.kandidaadiID = t.kandidaadiID ) 
			GROUP BY k.erakond DESC ");
	
			if($query->num_rows != 0){		
	
			while($rows = $query->fetch_assoc()){ 							
				$erakond=$rows['erakond'];				
				$piirkond=$rows['piirkond']; 
				$tulemus=$rows['Summa'];
					echo "data:	{$erakond} \n";
					echo "data:	{$piirkond} \n";
					echo "data:	{$tulemus} \n";
					echo "data:	 <br>\n";			
				}	
			}
		}
		
		$time = date('r');
		$mysqli->close();
		
		echo "data:	Uuendatud: {$time}\n";		
		echo "data: \n\n"; 							
		flush();
		sleep(1);
	} 	

public function data2($a, $b, $c)
	{		
		$ala = "";
		$partei = "";
		$lisa = "";
		$ala=$a;
		$partei=$b;
		$lisa=$c;
		$str = "";
		if($lisa == "kandidaat")
		{
			if($ala == "Riik")
			{
				if($partei == "Kõik")
				{
					$str = "SELECT k.nimi, k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) GROUP BY k.kandidaadiID, k.erakond ORDER BY k.piirkond, summa DESC";
				}
				else
				{
					$str = "SELECT k.nimi, k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) WHERE k.erakond = '".$partei."' GROUP BY k.kandidaadiID ORDER BY k.piirkond, summa DESC";
				}
			}
			else
			{
				if($partei == "Kõik")
				{
					$str = "SELECT k.nimi, k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) WHERE k.piirkond LIKE '".$ala."%' GROUP BY k.kandidaadiID, k.erakond ORDER BY k.piirkond, summa DESC";
				}
				else
				{
					$str = "SELECT k.nimi, k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) WHERE (k.piirkond LIKE '".$ala."%' AND k.erakond = '".$partei."') GROUP BY k.kandidaadiID, k.erakond ORDER BY k.piirkond, summa DESC";
				}
			}			
		}
		else
		{
			if($ala == "Riik")
			{
				if($partei == "Kõik")
				{
					$str = "SELECT k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) GROUP BY k.erakond ORDER BY k.piirkond, summa DESC";
				}
				else
				{
					$str = "SELECT k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) WHERE k.erakond = '".$partei."' GROUP BY k.erakond ORDER BY k.piirkond, summa DESC";
				}
			}
			else
			{
				if($partei == "Kõik")
				{
					$str = "SELECT k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) WHERE k.piirkond LIKE '".$ala."%' GROUP BY k.erakond, k.erakond ORDER BY k.piirkond, summa DESC";
				}
				else
				{
					$str = "SELECT k.erakond, k.piirkond, SUM(t.tulemus) as summa FROM kandidaadid as k
					JOIN tulemused as t ON (k.kandidaadiID = t.kandidaadiID) WHERE (k.piirkond LIKE '".$ala."%' AND k.erakond = '".$partei."') GROUP BY k.erakond, k.erakond ORDER BY k.piirkond, summa DESC";
				}
			}			
		}
		$mysqli = mysqli_connect('localhost','root','Admin123','vv_db');	
		
		if($lisa == "kandidaat")
		{	
			$query = $mysqli->query($str);	
			if($query->num_rows != 0){		
	
			while($rows = $query->fetch_assoc()){ 							
				$nimi=$rows['nimi'];
				$erakond=$rows['erakond'];
				$piirkond=$rows['piirkond']; 
				$tulemus=$rows['summa'];			
					echo "{$nimi}<br>";				
					echo "{$erakond}<br>";
					echo "{$piirkond}<br>";
					echo "{$tulemus}<br>";
					echo "<br>";			
				}	
			}
		}		
		else
		{
			$query = $mysqli->query($str);
			if($query->num_rows != 0){		
	
			while($rows = $query->fetch_assoc()){				
				
				$erakond=$rows['erakond'];
				$piirkond=$rows['piirkond']; 
				$tulemus=$rows['summa'];		
								
					echo "{$erakond}<br>";
					echo "{$piirkond}<br>";
					echo "{$tulemus}<br>";
					echo "<br>";			
				}	
			}
		}
		
		$time = date('r');
		$mysqli->close();
		
		echo "Uuendatud: {$time}<br>";		
		echo "<br>"; 						
		
	} 		

public function haaletusPost()
	{
	$link = mysqli_connect("localhost", "root", "Admin123", "vv_db");
	$msg="";
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
    		$msg= "Lisatud";
		} else{
    		$msg= "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
		//$valitud_isik=$_POST['valitu'];
		} 
	else { $msg= "Palun vali kandidaat."; }
	return view('haalkinnitatud',['response' => $msg]);
	}


mysqli_close($link);
	} 	
	
public function addkandidaadid()
	{
		if(Auth::check())
		{
			return view('addkandidaadid');								
		}
		else
		{
			return redirect()->route('user');
		}
	} 

public function postaddkandidaadid(AddRequest $request)
	{	
		$request->nimi;
		$request->erakond;
		$request->piirkond;
		if(Auth::check())
		{
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
				return view("kandidaatkinnitatud");
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
 
			// close connection
			mysqli_close($link);										
		}
		else
		{
			return redirect()->route('user');
		}
	}
 

/*public function index()
{
    return view('homepage');
}
*/ 
}
