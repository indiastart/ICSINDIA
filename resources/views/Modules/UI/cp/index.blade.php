@extends('layouts.app')

@section('title')
Control Panel: Infinity Inc.
@stop

@section('css')


@stop
<!-- Control Panel index -->
@section('content')
<?php
$url=array(
 // 'loginimg1'=> $user['picture'],
'loginimg1'=> asset('img/avatar2x.png'),
'brandlogo'=> asset('img/logo-bw 1.png')
	);
$name=explode('@', $user['email']);
//$username=explode("@",$user['username']);
#print_r($user);
$url['home']=action('UIController@index');
 ?>
<nav class="navbar shadow navbar-fixed-top bg-white">

  <div class="nav navbar-nav pull-left" title="A INFINITY Product.">
  <a href="{{$url['home']}}">
<img  alt="Brand" Class="img-responsive logo" src="{{$url['brandlogo']}}"></img>
</a>
</div>




 <div class="fheader pull-right menubtn" title="Click Here To View Menu"><center><i class="fa fa-align-justify fa-2x"></i><br>Menu</center>
 </div>


  <div class="ftext  pull-right">
		<center>
  	<div class="nav-user" title="{{$user['email']}}" style="word-wrap: break-word;">
  	
  			<img  alt="Brand" Class="img-responsive img-circle" style="max-height:40px;"  src="{{$url['loginimg1']}}"></img>
{{ $name[0] }}
 
<div class="nav-user-menu" title="Click Here To Sign out">
	<a href="login/logout"><button class="btn btn-danger" href="">signout</button></a>
</div>

 </div>

</center>

 </div>





</nav>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box ">

 	<div class="menu-main row col-xs-12 col-sm-12 col-md-12 col-lg-12 shadow" >
@foreach ($menu as $key=>$value)
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 menu bg-gray" id="{{$key}}"  >
<?php	

$fav='0';

switch ($key) {
    case 'HR':
        $fav="<i class='fa fa-users fa-2x menu-fav'></i>";
        break;
    case 'Inventory':
        $fav="<i class='fa fa-truck fa-2x menu-fav'></i>";
        break;
    case 'Fincial':
        $fav="<i class='fa fa-inr fa-2x menu-fav' style='padding-left:10px;padding-right:7px;'></i>";
        break;
    case 'Reports':
        $fav="<i class='fa fa-file-text fa-2x menu-fav' style='padding-left:5px;'></i>";
        break;
    case 'Configuration':
        $fav="<i class='fa fa-cog fa-2x menu-fav' style='padding-left:3px;'></i>";
        break;
    default:
        $fav="<i class='fa fa-spinner fa-pulse fa-2x menu-fav '></i>";
}
?>
<h4 class="fheader"><?php echo $fav; ?> {{$key}}</h4>

<div class="sub-menu"  id="menu-{{$key}}">
@foreach ($value as $key=>$value)
<div class="menu-list row" routename="{{$value}}">

<h5 class="fheader"><i class='fa fa-chevron-right'></i> {{$key}}	</h5>
</div>

	@endforeach


</div>
</div>

@endforeach
</div>


<div  domain="" class="workingPart col-xs-12 col-sm-12 col-md-10 col-lg-10 bg-gray" id="livebox">
Home Page
</div>
<div class="HelpMenu col-xs-2 col-sm-2 col-md-2 col-lg-2 bg-blue visible-md visible-lg" title="Help Menu ...">
		<h5 class="fheader">How To ..?	<div class=" pull-right help-hide" title="Click Here to Hide Help Section"><i class="help-hide fa fa-power-off"></i></div></h5>
	</div>
	</div>

<div class="modal"><!-- Place at bottom of page --></div>
@stop