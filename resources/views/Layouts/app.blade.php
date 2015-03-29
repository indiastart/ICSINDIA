<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <?php 

$url=array(
  #css
'bootstrapcss'=> asset('css/bootstrap.min.css'),
'appcss'=> asset('css/app.css'),
'font-awesome'=> asset('css/font-awesome.min.css'),
'ripplecss'=> asset('css/rippler.min.css'),
 #js
'jqueryjs'=> asset('js/jquery.min.js'),
'bootstrapjs'=> asset('js/bootstrap.min.js'),
'appjs'=> asset('js/app.js'),
'ripplejs'=>asset('js/jquery.ripple.js'),
#misc
'home'=>action('AppController@index')
  );

$meta=array(
'description'=>'Infinity Cousultancy Services,India',
'viewport'=>'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no',
'keywords'=>'infinity,enterprise,resource'

  );
foreach ($meta as $key => $value) {
echo "<meta name='".$key."' content='".$value."' />";
}
     ?>

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{$url['bootstrapcss']}}"> 
    <link rel="stylesheet" href="{{$url['font-awesome']}}" />    
    <link rel="stylesheet" href="{{$url['appcss']}}" />
    
    <script src="{{$url['jqueryjs']}}"></script>
    <script src="{{$url['bootstrapjs']}}"></script>
    <script src="{{$url['ripplejs']}}"></script>
    <script src="{{$url['appjs']}}"></script>

    <style>  @yield('css')  </style>
  </head>
  <body class="noselect " domain="{{$url['home']}}">
@yield('content')
     </body>
  </html>