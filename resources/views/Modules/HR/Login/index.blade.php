@extends('layouts.app')

@section('title')
Login: Infinity Inc.
@stop

@section('css')


@stop
<!-- login index -->
@section('content')
<?php
$url=array(
'loginimg1'=> asset('img/avatar2x.png'),
'brandlogo'=> asset($_ENV['BRAND_LOGO']),
'googlebtn'=>asset('img/sign-in-with-google.png'),
'signin-btn'=>action('HrController@postLogin')
	);
//echo "<pre>";
//print_r($_SERVER['PHP_SELF']);
//echo "</pre>";

 ?>



<center class="login-header" title="INFINITY Counsultancy Services (TM)"  ><a href="{{$_ENV['DOMAIN_NAME']}}"> <img itemprop="company" alt="Brand"   src="{{$url['brandlogo']}}"></img></a></center>

<div class="bg-gray login-box col-xs-10 col-sm-10 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-5 col-lg-offset-5 shadow">

<div title="Please Sign in" data-color="#F7F7F7" class="login-img ripple col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-4 col-md-offset-3 col-lg-offset-3" ><img  alt="Brand"  Class="img-responsive  img-circle shadow"  src="{{$url['loginimg1']}}"></img></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	<center class="fheader tx-pure-gray bx-header col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"><h4  >Please Sign in</h4></center>
</div>


<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
   @if(isset($error))
<div class="alert alert-danger ripple alert-dismissible" role="alert" data-color="#F44336" >
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 {{$error}} 
</div>
@endif
<form  action="{{ $url['signin-btn']}}" method="POST" id="login">

<div class="input-group paddingtop "  title="Please Enter Username Here">
   <span class="input-group-addon bg-white bottomshadow"><i class="fa fa-user "></i></span> <input class="bottomshadow form-control paddingtop"  itemprop="email" name="email" type="text" class="form-control no-rd" id="email" placeholder="Email" data-validation="required">
    </div> 
  <div class="input-group paddingtop " title="Please Enter Password Here">  
    <span class="input-group-addon bg-white bottomshadow"><i class="fa fa-lock "></i></span> <input class="bottomshadow form-control paddingtop" itemprop="password" name="pass" type="password" class="form-control no-rd" id="password" placeholder="Password" data-validation="required">
   </div>

   <div class="input-group paddingtop  col-xs-12 col-sm-12 col-md-12 col-lg-12 10-rd" >
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <button title="Click here to Sign in" itemprop="button" data-color="#03A9F4" class="btn shadow ripple paddingtop col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-pure-blue tx-white  fheader " id="submit" value="login"  >Sign in</button>
  </div>
</form>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> 
<a href="#" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><center class="tx-teal   paddingtop"><small class="btn col-xs-12 col-sm-12 col-md-12 col-lg-12 ripple " data-color="#03A9F4">Need Help ?</small> </center></a>
</div>

</div> 

</div>
<a href="{{$_ENV['DOMAIN_NAME']   }}"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bx-footer"> 
<center class="tx-teal " title="© 2008-2015 INFINITY Counsultancy Services"><small>A INFINITY Product</small> </center>
</div></a>



@stop