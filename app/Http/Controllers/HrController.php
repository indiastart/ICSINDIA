<?php namespace ICSV1\Http\Controllers;

use ICSV1\Http\Requests;
use ICSV1\Http\Controllers\Controller;

use Illuminate\Http\Request;
use AppConf,AppBas,HrMod;
class HrController extends Controller {

	public function postLogin()
	{

		$array=array(
			'error'=>0,
			);

		if((empty($_POST['email'])) && (empty($_POST['pass']))){
			$array['error']=1;
		}


if((strlen($_POST['email'])<5) || (strlen($_POST['pass'])<5)){$array['error']=1;}


		if($array['error']==0){
			$array['error']='200OK';
  			$jktoken['_jktoken']=AppBas::encrypt(csrf_token());
			$jktoken['_jktoken_email']=AppBas::encrypt($_POST['email']);

print_r($_POST);
print_r(HrMod::postlogin($_POST['email'],$_POST['pass']));
return redirect()->action('UIController@index')->with('_jktoken', $jktoken);

		}else{
			$array['error']='Please enter Valid Username/password';
			return redirect()->action('AppController@index')->with('error', $array['error']);
		}
			
	
	}

}
