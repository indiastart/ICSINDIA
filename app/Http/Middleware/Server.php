<?php namespace ICSV1\Http\Middleware;

use Closure;

class Server {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		$_SERVER['MIBDIRS']=$_ENV['BRAND_NAME']." Cloud";// => F:/Mitul/server/php/extras/mibs
		$_SERVER['MYSQL_HOME']=$_ENV['BRAND_NAME']." Cloud"; //=> \xampp\mysql\bin
		$_SERVER['OPENSSL_CONF']=$_ENV['BRAND_NAME']." Cloud";//=> F:/Mitul/server/apache/bin/openssl.cnf
		$_SERVER['PHP_PEAR_SYSCONF_DIR']=$_ENV['BRAND_NAME']." Cloud";// => \xampp\php
		$_SERVER['PHPRC']=$_ENV['BRAND_NAME']." Cloud";// => \xampp\php
		$_SERVER['TMP']=$_ENV['BRAND_NAME']." Cloud";// => \xampp\tmp
		$_SERVER['HTTP_HOST']=$_ENV['BRAND_NAME']." Cloud"; //=> localhost
		#$_SERVER['HTTP_CONNECTION']="keep-alive"; //=> keep-alive
		#$_SERVER['HTTP_CACHE_CONTROL']="max-age=0";// => max-age=0
		#$_SERVER['HTTP_ACCEPT']="text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"; //=> 
		#$_SERVER['HTTP_USER_AGENT']="Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"; //=> 
		#$_SERVER['HTTP_REFERER']="ICS"; //=> http://localhost/
		#$_SERVER['HTTP_ACCEPT_ENCODING']="ICS";//=> gzip, deflate, sdch
		#$_SERVER['HTTP_ACCEPT_LANGUAGE']="ICS"; //=> en-US,en;q=0.8
		#$_SERVER['HTTP_COOKIE']="ICS"; //=> laravel_session=eyJpdiI6ImJabk9ZcjhYbW9BQ3ZSUDNKZ2NreGc9PSIsInZhbHVlIjoiRU1ReDMwTW43c1lmcmhHTkpWSzFnczNOQ1wvRzBqdGJRUkFBaEdUTnlZVGhkM0ZIcmxZQTFIWUk1WEZYMVpZb1A5TFlvVWp4TFFUOWY3a1orZXJrY0RRPT0iLCJtYWMiOiIyMGFmNDVmMDk3NDlhMmM5NmEwYWZjNWVkN2YyZjVmZDdjZmZjNDQ5ODllMjU2ODcwMzA4MjJlMDhiYWYxNWZkIn0%3D
		$_SERVER['PATH']=$_ENV['BRAND_NAME']." Cloud"; //=> C:\Program Files (x86)\Common Files\Intel\Shared Files\cpp\bin\Intel64;C:\Program Files (x86)\NVIDIA Corporation\PhysX\Common;C:\Program Files\Broadcom\Broadcom 802.11;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Hewlett-Packard\SimplePass\;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;F:\program file\matlab\runtime\win64;F:\program file\matlab\bin;F:\Mitul\server\php;C:\ProgramData\ComposerSetup\bin
		$_SERVER['SystemRoot']=$_ENV['BRAND_NAME']." Cloud"; //=> C:\Windows
		$_SERVER['COMSPEC']=$_ENV['BRAND_NAME']." Cloud"; //=> C:\Windows\system32\cmd.exe
		$_SERVER['PATHEXT']=$_ENV['BRAND_NAME']." Cloud"; //=> .COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC
		$_SERVER['WINDIR']=$_ENV['BRAND_NAME']." Cloud"; //=> C:\Windows
		$_SERVER['SERVER_SIGNATURE']=$_ENV['BRAND_NAME']." Cloud-".$_ENV['APP_KEY']; //=> 
		//Apache/2.4.10 (Win32) OpenSSL/1.0.1i PHP/5.5.15 Server at localhost Port 80


		$_SERVER['SERVER_SOFTWARE']=$_ENV['APP_NAME']." Cloud Application"; //=> Apache/2.4.10 (Win32) OpenSSL/1.0.1i PHP/5.5.15
		$_SERVER['SERVER_NAME']=$_ENV['APP_NAME']." Cloud Infine"; //=> localhost
		#$_SERVER['SERVER_ADDR']="ICS"; //=> ::1
		#$_SERVER['SERVER_PORT']="ICS"; //=> 80
		#$_SERVER['REMOTE_ADDR']="ICS"; //=> ::1
		$_SERVER['DOCUMENT_ROOT']=$_ENV['BRAND_NAME']." Cloud"; //=> F:/Mitul/server/htdocs/
		#$_SERVER['REQUEST_SCHEME']="ICS"; //=> http
		#$_SERVER['CONTEXT_PREFIX']="ICS"; //=> 
		$_SERVER['CONTEXT_DOCUMENT_ROOT']=$_ENV['BRAND_NAME']." Cloud"; //=> F:/Mitul/server/htdocs/
		$_SERVER['SERVER_ADMIN']=$_ENV['BRAND_NAME']." Cloud"; //=> webmaster@local.dev
		$_SERVER['SCRIPT_FILENAME']=$_ENV['BRAND_NAME']." Cluster Infine"; //=> F:/Mitul/server/htdocs/public/index.php
		$_SERVER['REMOTE_PORT']="ICS"; //=> 53247
		#$_SERVER['GATEWAY_INTERFACE']="ICS"; //=> CGI/1.1
		#$_SERVER['SERVER_PROTOCOL']="ICS"; //=> HTTP/1.1
		#$_SERVER['REQUEST_METHOD']="ICS"; //=> GET
		#$_SERVER['QUERY_STRING']="ICS"; //=> 
		#$_SERVER['REQUEST_URI']="ICS"; //=> /public/
		$_SERVER['SCRIPT_NAME']=$_ENV['APP_NAME']." Cloud Application"; //=> /public/index.php
		#$_SERVER['PHP_SELF']="ICS"; //=> /public/index.php
		#$_SERVER['REQUEST_TIME_FLOAT']="ICS"; //=> 1420827184.775
		#$_SERVER['REQUEST_TIME']="ICS"; //=> 1420827184
		$_SERVER['REDIRECT_MIBDIRS']=$_ENV['APP_NAME']." Cloud"; //=> F:/Mitul/server/php/extras/mibs
		$_SERVER['REDIRECT_MYSQL_HOME']=$_ENV['APP_NAME']." Cloud";// => \xampp\mysql\bin
		$_SERVER['REDIRECT_OPENSSL_CONF']=$_ENV['APP_NAME']." Cloud";// => F:/Mitul/server/apache/bin/openssl.cnf
		$_SERVER['REDIRECT_PHP_PEAR_SYSCONF_DIR']=$_ENV['APP_NAME']." Cloud"; //=> \xampp\php
		$_SERVER['REDIRECT_PHPRC']=$_ENV['APP_NAME']." Cloud";// => \xampp\php
		$_SERVER['REDIRECT_TMP']=$_ENV['APP_NAME']." Cloud";// => \xampp\tmp

		return $next($request);
	}

}
