<?php namespace App\Http\Controllers;
use Auth;
use URL;
use Session;
use Socialize;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddRequest;

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

public function postotsing()
    {	
	return view('search');
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
