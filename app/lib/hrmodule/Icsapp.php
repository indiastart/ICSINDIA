<?php namespace ICSV1\lib\ics;
use Schema;


class Icsapp  {



public static function test() { 
  	echo "<pre>";
  	return print_r($_ENV);   }


public static function rad($length = null) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public static function encrypt($text=null){
	$key = Icsapp::rad(16);
	$keyd1=Icsapp::rad(10);
	$keyd2=Icsapp::rad(10);
	$key_size = strlen($key);
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$text, MCRYPT_MODE_CBC, $iv);
    $ciphertext = $iv . $ciphertext;
    $ciphertext_base64 = base64_encode($ciphertext);
    $ciphertext_base64 = $key."=".$ciphertext_base64."=".$keyd2."+".$keyd1;
    return $ciphertext_base64;
}

public static function decrypt($text=null){
	$text=explode("=", $text);
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	$ciphertext_dec = base64_decode($text['1']);
	$iv_dec = substr($ciphertext_dec, 0, $iv_size);
	$ciphertext_dec = substr($ciphertext_dec, $iv_size);
	$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$text['0'],$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
	return $plaintext_dec;
}

public static function maketable($tableName=null,$arrayColumn=null){
	#print_r();
	$array=array();
	$_ENV['temp.1']=$tableName;
	$_ENV['temp.2']=$arrayColumn;
	$array['status']=0;
	if($array['status']==0&&strlen($tableName)<3){
		$array['status']=1;
		$array['error']='Table Name Not valid';
	}
	if($array['status']==0&&gettype($arrayColumn)!='array'){
		$array['status']=1;
		$array['error']='Column Array Not Found';
	}
	if($array['status']==0 && count($_ENV['temp.2'])<1){
		$array['status']=1;
		$array['error']='Column Array Not Found';
	}

	if($array['status']==0 && Schema::hasTable($_ENV['temp.1'])){
		$array['status']=1;
		$array['error']='Table Already Exist';
	}

	if($array['status']==0){
		Schema::create($_ENV['temp.1'], function($table)
{
	$array_type=['increments','bigIncrements','integer','bigInteger','string','longText','boolean','timestamps','softDeletes'];
	foreach ($_ENV['temp.2'] as $key => $value) {
		$array_key=array_search($value,$array_type);
		$done=0;
		if($done==0&&$array_key==0){
			$table->increments($_ENV['temp.1'].'_'.$key);
		}
		if($done==0&&$array_key==1){
			$table->bigIncrements($_ENV['temp.1'].'_'.$key);
		}
		if($done==0&&$array_key==2){
			$table->integer($_ENV['temp.1'].'_'.$key)->nullable();
		}
		if($done==0&&$array_key==3){
			$table->bigInteger($_ENV['temp.1'].'_'.$key)->nullable();
		}
		if($done==0&&$array_key==4){
			$table->string($_ENV['temp.1'].'_'.$key)->nullable();
		}
		if($done==0&&$array_key==5){
			$table->longText($_ENV['temp.1'].'_'.$key)->nullable();
		}
		if($done==0&&$array_key==6){
			$table->boolean($_ENV['temp.1'].'_'.$key)->default('0');
		}
		if($done==0&&$array_key==7){
			$table->nullableTimestamps();
		}
		if($done==0&&$array_key==8){
			$table->softDeletes();
		}

	}
   
});
$array['status']=200;
$array['msg']=$_ENV['temp.1']." Created Succefully";
	}	
return $array;
}


public static function deletetable($tableName){
	$array=array();
	$_ENV['temp.1']=$tableName;
	$array['status']=0;
	if($array['status']==0&&strlen($tableName)<3){
		$array['status']=1;
		$array['error']='Table Name Not valid';
	}
	if($array['status']==0 && Schema::hasTable($_ENV['temp.1'])!=true){
		$array['status']=1;
		$array['error']='Table Not Exist';
	}

	if($array['status']==0){
		Schema::dropIfExists($tableName);
		$array['status']=200;
		$array['msg']=$tableName." Deleted Succefully";
	}
return $array;
	
}

public static function encodecookie($arrayUser){
	$array=array();
	$_ENV['temp.1']=$arrayUser;
	$array['status']=0;
	if($array['status']==0&&(gettype($arrayUser)!='array'&&count($arrayUser)<3)){
		$array['status']=1;
		$array['error']='User Array Not Found';
	}

	if($array['status']==0){
	$encrypted_username=Icsapp::encrypt($arrayUser['username']);
	$encrypted_pjk=Icsapp::encrypt($arrayUser['pjk']);
	$encrypted_ac=Icsapp::encrypt($arrayUser['ac']);

	$cookie=Icsapp::encrypt($encrypted_username."#".$encrypted_pjk.'#'.$encrypted_ac);
//$array['test']=strlen($cookie);
	$array['status']=200;
	$array['cookie']=$cookie;
	return $cookie;
	}

return $array;
}
public static function Decodecookie($Cookie){
	$array=array();
	$_ENV['temp.1']=$Cookie;
	$array['status']=0;
	if($array['status']==0&& strlen($Cookie)<300){
		$array['status']=1;
		$array['error']='Cookie Not Found';
	}

	if($array['status']==0){
	$decrypted_cookie=Icsapp::decrypt($Cookie);
	$decrypted_cookie=explode("#", $decrypted_cookie);
	$decrypted_username=Icsapp::decrypt($decrypted_cookie['0']);
	$decrypted_pjk=Icsapp::decrypt($decrypted_cookie['1']);
	$decrypted_ac=Icsapp::decrypt($decrypted_cookie['2']);
	$array['status']=200;
	$array['username']=$decrypted_username;
	$array['ac']=$decrypted_ac;
	}

return $array;
}







}