<?php namespace App\Http\Controllers;
use Auth;
class HomeController extends Controller {

    /**
 * Show the application home page to the user.
 *
 * @return Response
 */

public function index()
	{
		if(Auth::check())
		{
			$username = Auth::user()->username;
			return view('homepage')->with('username', $username);								
		}
		else
		{
			return view('dashboard');
		}
	} 
/*public function index()
{
    return view('homepage');
}
*/ 
}
