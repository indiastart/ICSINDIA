<?php namespace ICSV1\lib\hrmodule;
use Illuminate\Http\Request;
use OAuth,DB,Schema,AppConf,AppBas;

class HrMod {  

	public static function test() {echo "<pre>";return print_r($_ENV);}

    public static function getuserid($email=null){
        $_ENV['TEMP.CONF']=AppConf::configsetting();
        $_ENV['TEM.1']=$email;
        $tablename=$_ENV['TEMP.CONF']['usertable'];
        $wherecolumn=$_ENV['TEMP.CONF']['usertable'].'_email';
        $wherecolumnvalue=$_ENV['TEM.1'];
        $pluckcolumn=$_ENV['TEMP.CONF']['usertable'].'_uid';
        $userid=DB::table($tablename)->where($wherecolumn,$wherecolumnvalue)->pluck($pluckcolumn);
        if(!empty($userid)){
        return $userid;    
        }
        return  false;
        
    }

    public static function GetUserArray($email=null){
        $array=array(
            'error'=>'0',
            'status'=>'0'
            );
        $_ENV['TEMP.CONF']=AppConf::configsetting();
        if(HrMod::getuserid($email)==false){
            
            $array['error']=1;            
            }else{
              $userid=HrMod::getuserid($email);  
              
            }    

        if($array['error']==0){

            $array['status']='200OK';

                $array['user']= 
                    array(
                        'name'   => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_name'),
                        'status' => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_status'), 
                        'email'  => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_email'),
                        'cookie' => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_cookie'),
                        'pjk' => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_pjk'),
                        'ac' => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_ac'),
                        'last'   => DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck('updated_at'),
                        );
                 
        }
        return $array;
    }

    public static function postlogin($email=null,$password=null){
        $array=array(
            'error'=>'0',
            'status'=>'0'
            );
        $_ENV['TEMP.CONF']=AppConf::configsetting();
        if(HrMod::getuserid($email)!=true){
            $array['error']=1;            
            }else{
              $userid=HrMod::getuserid($email);  
            }   

            if($array['error']==0){
                $passwordondb=DB::table($_ENV['TEMP.CONF']['usertable'])->where($_ENV['TEMP.CONF']['usertable'].'_uid',$userid)->pluck($_ENV['TEMP.CONF']['usertable'].'_password');
                $decryptpassword=AppBas::decrypt($passwordondb);
                    if(strcasecmp($decryptpassword,$password)!=true){
                        $array['error']=1;
                    }
                    if($array['error']==0){
                        //register user login
                        $user=HrMod::GetUserArray($email);
                       
                    if($user['error']==0){
                        $arrayUser['username']=$user[AppConf::configsetting()['usertable']]['email'];
                        $arrayUser['pjk']=$user[AppConf::configsetting()['usertable']]['pjk'];
                        $arrayUser['ac']=$user[AppConf::configsetting()['usertable']]['ac'];
                        $user['user']['cookie']=Appbas::encodecookie($arrayUser);
                        $array['user']=$user;
                        $usertablecolums=AppConf::usertablecolums();
                        $finalarray=array(); 
                        foreach ($usertablecolums[AppConf::configsetting()['usertable']] as $key => $value) {

                            switch($key){
                             case 'cookie':
                             $finalarray[$key]=$user[AppConf::configsetting()['usertable']]['cookie'];
                             break;

                             case 'status':
                             if($user[AppConf::configsetting()['usertable']]['status']==0)$finalarray[$key]=1;
                            break;                             

                         }
                             
                        }
                        AppBas::setcookie(AppConf::CookieName(),$user['user']['cookie'],60);
                        AppBas::updatetable(AppConf::configsetting()['usertable'],$finalarray,$userid);
                        //print_r($usertablecolums);

                    }

                    }

            } 
        return $array;
    }

	public static function login($type,$request){
		$array=array(
			'type'=>$type
			);
		$array_type=array(
			'Google','Facebook'
			);
		$array_key=array_search($type,$array_type);

	switch ($array_key) {
    case 0:

    $array['Response']=HrMod::googlelogin($request);
    break;
    case 1:
    $array['Response']=HrMod::facebooklogin($request);
    break;
}
return $array;
}
	

	public static function googlelogin($request){
    $code = $request->get('code'); // get data from request
    $googleService = \OAuth::consumer('Google'); // get google service

    if ( ! is_null($code))
    {
        // This was a callback request from google, get the token
        $token = $googleService->requestAccessToken($code);
        // Send a request with it
        $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);
        $array['reponse']=$result;
        return $array;
    }
    // if not ask for permission first
    else
    {   
        // get googleService authorization
        $url = $googleService->getAuthorizationUri();

        // return to google login url
        return redirect($url);
    }
	}

    public static function updateuser(){
        
        $array=array(
            'error'=>0,
            'status'=>0
            );

        if(isset($_COOKIE[AppConf::Cookiename()])){
                $cookie=$_COOKIE[AppConf::Cookiename()];
        if(strlen($cookie)<450){
                $array['error']=1;
                 }

        }else{
            $array['error']=1; 
        }        

        if($array['error']==0){
        $cookiemain=$cookie;
        $cookie=AppBas::decodecookie($cookie);
        $tableName=AppConf::configsetting()['usertable'];
        
        $whereid=HrMod::getuserid($cookie['email']);
     
        $cookieonline=HrMod::GetUserArray($cookie['email'])['user']['cookie'];
       # dd(array(
        #    'inbrowser'=>$cookiemain,
        #    'onserver'=>$cookieonline
        #    ));
       

        if((strlen($cookiemain)!=strlen($cookieonline))&&(strcmp(trim($cookiemain),trim($cookieonline))!=0)){            
            $array['error']=1;     
        }


        if($array['error']==0){
                
                 $array=array(
            'status'=>'200'
            );

                 $last=AppBas::TDexplode(HrMod::GetUserArray($cookie['email'])['user']['last']);
                 $current=getdate();

                 if($last['hh']==$current['hours']){

                    if($last['hh']>=$current['hours']){
                        $dif=$current['minutes']-$last['mm'];

                        if($dif<60){
                            print_r('< 20');
                            $arrayColumn['status']='1';
                            AppBas::updatetable($tableName,$arrayColumn,$whereid); 
                        }else{
                             $array['error']=1; 
                             $arrayColumn['status']='0';
                             AppBas::updatetable($tableName,$arrayColumn,$whereid); 
                        }

                        print_r($dif);
                    }

               
                    
                 }

                AppBas::updatetable($tableName,$arrayColumn,$whereid);  
        }

        return $array;

        }else{
             $array=array(
            'status'=>'500'
            );
            return $array;
        }
    }


	


}