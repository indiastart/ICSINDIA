$(document).ready(function(){
//start

var bcolor='bg-teal';
$('.nav-user-menu').hide();
$('.menu-main').slideUp(500);
$('.sub-menu').hide();

var menubtn=0;
var userbtn=0;

$('.nav-user').click(function(){

$('.nav-user-menu').slideToggle();
$('.sub-menu').slideUp();
$('.menu').removeClass('tx-off-white');
$('.menu').children("h4").removeClass('tx-off-white');
$('.menu-main').slideUp();
//alert(userbtn);
if(userbtn==1){
$(".nav-user").removeClass("shadow");
userbtn=0;
}else{ 
$(".nav-user").addClass(" shadow ");
userbtn=1;
$(".menubtn").removeClass("shadow");
menubtn=0;
}
//alert(userbtn);

});



$(".nav-user").hover(function(){
    $(".nav-user").toggleClass('border10 '+bcolor);
    }, function(){
     $(".nav-user").toggleClass('border10 ' +bcolor);
});

$(".menubtn").hover(function(){
    $(".menubtn").toggleClass('border10 '+bcolor);
    }, function(){
     $(".menubtn").toggleClass('border10 '+bcolor);
});

$('.menubtn').click(function(){
$('.menu-main').slideToggle(200);
$('.nav-user-menu').slideUp();
$('.sub-menu').slideUp();
$('.menu').removeClass('tx-off-white');
$('.menu').children("h4").removeClass('tx-off-white bottomshadow');
if(menubtn==1){
$(".menubtn").removeClass("shadow");
menubtn=0;
}else{ 
$(".menubtn").addClass("shadow");
menubtn=1;
$(".nav-user").removeClass("shadow");
userbtn=0;
}


//$(".box").css("padding-top", "250px",500);


});

$(".menu").click(function(){
var menudown=0;
var id=$(this).attr("id");
$('.sub-menu').slideUp();
$('.menu').removeClass('shadow tx-off-white bg-teal');
$('.menu').children("h4").removeClass('bottomshadow');
jQuery(this).children(".sub-menu").slideToggle();
jQuery(this).toggleClass('tx-off-white '+bcolor);
jQuery(this).children("h4").toggleClass('bottomshadow');;

//$(this).attr("href");
//alert(height);
});


$(".menu").hover(function(){
    jQuery(this).toggleClass('shadow border10');
    }, function(){
     jQuery(this).toggleClass('shadow border10');

});



$(".menu-list").hover(function(){
    $(this).toggleClass('shadow bg-white tx-black');    
    }, function(){
     $(this).toggleClass('shadow bg-white tx-black');     
});

$(".menu-list").click(function(){
    var base=$('body').attr('domain'); 
    var route=$(this).attr('routename');
    $('.sub-menu').slideUp();
    $('.menu-main').slideUp();
    
    $.get(route, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
        $("#livebox").html( data);

        $(data).replaceAll("#livebox");
    });


    });


var shift=0;
var ctrl=0;
var alt=0;

$("body").keydown(function(){
//alert(event.which);
var key=event.which;
var shortcut=0;
var e = window.event;
if(key==16 && shift!=1){
	shift=1;
    ctrl=0;
    alt=0;
	console.log("Shift Pressed");
}
if(key==17 && ctrl!=1){
	ctrl=1;
    shift=0;
    ctrl=0;
	console.log("Ctrl Pressed");
}


if(ctrl==1){
if((key==107 || key==187)&&shortcut==0){
$('.menu-main').slideToggle();
$('.nav-user-menu').slideUp();
$('.sub-menu').slideUp();
$('.menu').removeClass('shadow tx-off-white '+bcolor);

if(menubtn==1){
$(".menubtn").removeClass("shadow");
menubtn=0;
}else{ 
$(".menubtn").addClass("shadow");
menubtn=1;
$(".nav-user").removeClass("shadow");
userbtn=0;
}
}
ctrls=0;
shortcut=1;
e.preventDefault();     
//e.stopPropagation();
}

//menu button
if((key==107 || key==187)&&shortcut==0){
$('.menu-main').slideToggle();
$('.nav-user-menu').slideUp();
$('.sub-menu').slideUp();
$('.menu').removeClass('shadow tx-off-white '+bcolor);

if(menubtn==1){
$(".menubtn").removeClass("shadow");
menubtn=0;
}else{ 
$(".menubtn").addClass("shadow");
menubtn=1;
$(".nav-user").removeClass("shadow");
userbtn=0;
}

}

//userbtn
if(key==109 || key==189){

$('.nav-user-menu').slideToggle();

$('.menu-main').slideUp();
//alert(userbtn);
if(userbtn==1){
$(".nav-user").removeClass("shadow");
userbtn=0;
}else{ 
$(".nav-user").addClass(" shadow ");
userbtn=1;
$(".menubtn").removeClass("shadow");
menubtn=0;
}
}




    });


$( '.ripple' ).ripple({
'v_duration': 1250, 
'h_duration': 1250
});



//end
});