<?php namespace ICSV1\lib\conapp;

class AppConf {

  public static function test() {echo "<pre>";return print_r($_ENV);}
  public static function configsetting(){
$array=array(
				'usertable'=>'user',
				'inFormMODtable'=>'inform',
				#'hrMODtable'=>'hr',
				#'inventoryMODtable'=>'invetory',
				#'financeMODtable'=>'finance',
				#'reportMODtable'=>'report',
				#'configMODtable'=>'config',
				#'ACtable'=>'AC',
	);
return $array;
  }

  public static function usertablecolums(){

  	$array[AppConf::configsetting()['usertable']]=
  			array(
					'uid'=>'',
					'google_id'=>'',
					'google_link'=>'',
					'facebook_id'=>'',
					'facebook_link'=>'',
					'google_picture'=>'',
					'facebook_picture'=>'',
					'name'=>'',
					'faname'=>'',
					'lname'=>'',
					'sex'=>'',
					'username'=>'',
					'email'=>'',
					'password'=>'',
					'cookie'=>'',
					'status'=>'',
					'pjk'=>'',
					'sjk'=>'',
					'ac'=>'',
					'created_at'=>'',
					'updated_at'=>''
					);

  	return $array;
  }

  public static function CookieName()
  {
  	$cookiename='ICS';
  	return $cookiename;
  }








}
