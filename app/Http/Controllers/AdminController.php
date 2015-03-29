<?php namespace ICSV1\Http\Controllers;

use ICSV1\Http\Requests;
use ICSV1\Http\Controllers\Controller;

use Illuminate\Http\Request;
use AppConf,AppBas,HrMod,Route;

class AdminController extends Controller {


	public function index()
	{
			$array_tablename=AppConf::configsetting();

			$array_table_column=array(
				'usertable'=>array(
					'uid'=>'increments',
					'google_id'=>'string',
					'google_link'=>'string',
					'facebook_id'=>'string',
					'facebook_link'=>'string',
					'google_picture'=>'string',
					'facebook_picture'=>'string',
					'name'=>'string',
					'faname'=>'string',
					'lname'=>'string',
					'sex'=>'string',
					'username'=>'string',
					'email'=>'string',
					'password'=>'string',
					'cookie'=>'string',
					'status'=>'boolean',
					'pjk'=>'string',
					'sjk'=>'string',
					'ac'=>'string',
					'timestamp'=>'timestamps'
					),

				'inFormMODtable'=>array(
					'id'=>'increments',
					'name'=>'string',
					'module'=>'string',
					'input_ids'=>'string',
					'input_types'=>'string',
					'form_code'=>'string',
					'timestamp'=>'timestamps',
					),

			#	'hrMODtable'=>array(),

			#	'inventoryMODtable'=>array(),

			#	'financeMODtable'=>array(),

			#	'reportMODtable'=>array(),

			#	'configMODtable'=>array(),

			#	'ACtable'=>array(),

			);

		foreach ($array_tablename as $key => $value) {
			$array_tablename_final[$value]=$array_table_column[$key];}

		foreach ($array_tablename_final as $key => $value) {
			#print_r(AppBas::maketable($key,$value));
		}

		#$ch = curl_init("http://www.icsindia.ddns.net/public");
		#print_r($ch);
   // $code = Input::get( 'code' );


	}
public function loginWithGoogle(Request $request)
{
//HrMod::login('Google',$request);
$demo=HrMod::googlelogin($request);
//print_r();
print_r($demo);
//print_r($response);
/*$array=array(
					'google_id'=>$reponse['id'],
					'google_link'=>$reponse['link'],
					'facebook_id'=>'',
					'facebook_link'=>' ',
					'google_picture'=>$reponse['picture'],
					'facebook_picture'=>' ',
					'name'=>$reponse['name'],
					'faname'=>$reponse['given_name'],
					'lname'=>$reponse['family_name'],
					'sex'=>$reponse['gender'],
					'username'=>$reponse['email'],
					'email'=>$reponse['email'],
					'password'=>' ',
					'cookie'=>' ',
					'status'=>' ',
					'pjk'=>' ',
					'sjk'=>' ',
					'ac'=>' ',

					);
//return view('Modules.HR.login.index')->with('error',$array['name']);
*/

}

public function loginWithGoogle2(Request $request)
{
// get data from request
    $code = $request->get('code');
    echo "<pre>";

    // get google service
    $googleService = \OAuth::consumer('Google');
print_r($request);
    // check if code is valid
     // get googleService authorization
        $url = $googleService->getAuthorizationUri();

        // return to google login url
        redirect((string)$url);
    
}
public function test(){
/*	$array_insert=array(
					'google_id'=>' ',
					'google_link'=>' ',
					'facebook_id'=>' ',
					'facebook_link'=>' ',
					'google_picture'=>' ',
					'facebook_picture'=>' ',
					'name'=>'Mitul Patel',
					'faname'=>'Mitul',
					'lname'=>'Patel',
					'sex'=>'Male',
					'username'=>'mitul.a.patel19@gmail.com',
					'email'=>'mitul.a.patel19@gmail.com',
					'password'=>'9662611234',
					'cookie'=>'0',
					'status'=>'0',
					'pjk'=>'',
					'sjk'=>'icsserver',
					'ac'=>'3',
					);
	$array_insert['password']=AppBas::encrypt($array_insert['password']);
	$array_insert['sjk']=AppBas::encrypt($array_insert['sjk']);
	$array_insert['pjk']=AppBas::encrypt($array_insert['username']);
			if(AppBas::inserttotable('user',$array_insert)){
				//print_r(AppBas::inserttotable('user',$array_insert));
				print_r('done insert');
				echo "<pre>";
				print_r($array_insert);
			}else{

				print_r(AppBas::inserttotable('user',$array_insert));
			}

			*/


			
}
	

}
