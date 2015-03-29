<?php namespace ICSV1\Http\Controllers;

use ICSV1\Http\Requests;
use ICSV1\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session,AppBas,HrMod;

class UIController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	
		if(!empty(Session::get('_jktoken'))){

		$jktoken=Session::get('_jktoken');
		$csrf_token=csrf_token();
		$email=AppBas::decrypt($jktoken['_jktoken_email']);
		$csrf_token_encrypt=AppBas::decrypt($jktoken['_jktoken']);
		$array = array('email' =>$email ,
			'csrftoken'=>$csrf_token,
			'csrf_token_encrypt'=>$csrf_token_encrypt,
		 );
strcasecmp($csrf_token,$csrf_token_encrypt) ? 'true' : 'false';
		}
$user=AppBas::decodecookie($_COOKIE['ICS']);

if($user['status']==200){

		$array_menu=array(
			'HR'=>array('User'=>'','Students'=>'','Profile'=>''),
			'Inventory'=>array('Books'=>'','Branches'=>'','Subject'=>'','Stock'=>'','Issues'=>''),
			'Fincial'=>array('Fines'=>''),
			'Reports'=>array('Issue Reports'=>'','Fine Report'=>'','Students Report'=>'','Stock Report'=>''),
			'Configuration'=>array('Manage Profile'=>'','Manage User'=>'','Manage Forms'=>'','Import Data'=>'')
		);

#print_r($user);

return view('Modules.UI.cp.index')->with('user',$user)->with('menu',$array_menu);

		print_r(HrMod::updateuser());

}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
