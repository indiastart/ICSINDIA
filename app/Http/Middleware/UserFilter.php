<?php namespace ICSV1\Http\Middleware;

use Closure;
use AppBas;

class UserFilter {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{	
if(isset($_COOKIE['ICS'])){
$user=AppBas::decodecookie($_COOKIE['ICS']);	
}else{
	$user['status']=404;
}		


if($user['status']==200){

return $next($request);


}else{

			$array['error']='Please Login First';
			return redirect()->action('AppController@index')->with('error', $array['error']);
}
		
	}

}
