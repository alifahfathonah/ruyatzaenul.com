
/*	Name: theme-options.js
	Written by: Iwthemes - (http://www.iwthemes.com)
	Email: support@iwthemes.com
	Version: 1.0
*/

(function($) {

  	/* Selec your skin and layout Style */
	function interface(){

    // Skin value
    var skin = "purple"; // blue, red , purple, green, orange, purple, pink, cocoa, 

    // Boxed value
    var layout = "layout-boxed"; // layout-wide, layout-boxed

    //Only in boxed version 
    var bg = "bg2";  // none (default), bg1, bg2, bg3, bg4, bg5, bg6, bg7, bg8, bg9

    $(".skin").attr("href", "css/skins/"+ skin + "/" + skin + ".css");
    $("#layout").addClass(layout);	
    $("body").addClass(bg);   
    return false;
  }

  interface();

	//=================================== Theme Options ====================================//

	$('.wide').click(function() {
		$('.boxed').removeClass('active');
		$('.boxed-margin').removeClass('active');
		$(this).addClass('active');
		$('.patterns').css('display' , 'none');
		$('#layout').removeClass('layout-boxed').removeClass('layout-boxed-margin').addClass('layout-wide');
	});
	$('.boxed').click(function() {
		$('.wide').removeClass('active');
		$('.boxed-margin').removeClass('active');
		$(this).addClass('active');
		$('.patterns').css('display' , 'block');
		$('#layout').removeClass('layout-boxed-margin').removeClass('layout-wide').addClass('layout-boxed');
	});

	$('.wide').click(function() {
		$('.boxed').removeClass('active');
		$('.boxed-margin').removeClass('active');
		$(this).addClass('active');
		$('.patterns').css('display' , 'none');
		$('#layout').removeClass('layout-boxed').removeClass('layout-boxed-margin').addClass('layout-wide');
	});

		//=================================== Skins Changer ====================================//

	google.setOnLoadCallback(function(){

		'use strict';

	    // Color changer 
	    $(".green").click(function(){
	        $(".skin").attr("href", "css/skins/green/green.css");
	        return false;
	    });

	    $(".orange").click(function(){
	        $(".skin").attr("href", "css/skins/orange/orange.css");
	        return false;
	    });

	    $(".red").click(function(){
	        $(".skin").attr("href", "css/skins/red/red.css");
	        return false;
	    });

	    $(".blue").click(function(){
	        $(".skin").attr("href", "css/skins/blue/blue.css");
	        return false;
	    });

	    $(".purple").click(function(){
	        $(".skin").attr("href", "css/skins/purple/purple.css");
	        return false;
	    });

	    $(".pink").click(function(){
	        $(".skin").attr("href", "css/skins/pink/pink.css");
	        return false;
	    });
	    
	});

	//=================================== Background Options ====================================//
	
	$('#theme-options ul.backgrounds li').click(function(){
	var 	$bgSrc = $(this).css('background-image');
		if ($(this).attr('class') == 'bgnone')
			$bgSrc = "none";

		$('body').css('background-image',$bgSrc);
		$.cookie('background', $bgSrc);
		$.cookie('backgroundclass', $(this).attr('class').replace(' active',''));
		$(this).addClass('active').siblings().removeClass('active');
	});

	//=================================== Panel Options ====================================//

	$('#theme-options .title').click(function(){
		if ($('#theme-options').css('left') == "-222px")
		{
			$left = "0px";
			$.cookie('displayoptions', "0");
		} else {
			$left = "-222px";
			$.cookie('displayoptions', "1");
		}
		$('#theme-options').animate({
			left: $left
		},{
			duration: 500,
			easing: "easeInOutExpo"
		});

	});

	$(function(){
		$('#theme-options').fadeIn();
		$bgSrc = $.cookie('background');
		$('body').css('background-image',$bgSrc);

		if ($.cookie('displayoptions') == "1")
		{
			$('#theme-options').css('left','-222px');
		} else if ($.cookie('displayoptions') == "0") {
			$('#theme-options').css('left','0');
		} else {
			$('#theme-options').delay(800).animate({
				left: "-222px"
			},{
				duration: 500,
				easing: "easeInOutExpo"
			});
			$.cookie('displayoptions', "1");
		}
		$('#theme-options ul.backgrounds').find('li.' + $.cookie('backgroundclass')).addClass('active');

	});

})(jQuery);