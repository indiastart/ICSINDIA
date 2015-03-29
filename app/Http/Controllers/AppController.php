<?php namespace ICSV1\Http\Controllers;

use ICSV1\Http\Requests;
use ICSV1\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AppConf,AppBas,Session;
class AppController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return hello
	 */
	public function index()
	{
	
	$error=Session::get('error');

		//print_r($error);
	if(!empty($error)){
		return view('Modules.HR.login.index')->with('error',$error);
	}

	if(isset($_COOKIE['ICS'])){
		return redirect()->action('UIController@index');
	}
		return view('Modules.HR.login.index');
	}
	
	
	

	
}
