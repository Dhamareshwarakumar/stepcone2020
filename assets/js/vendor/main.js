jQuery(document).ready(function($) {
	  
	$(window).scroll(function(){
		 
		displayMenu();
		
	});
	
	displayMenu = function(){
		
		if($(window).width() > 622) {
			if (document.body.scrollTop > 480)
				$('#main-header').stop().animate({'top':0});
			else
				$('#main-header').stop().animate({'top':-45});	
		}
		
	}
	
	adjustWindowSize = function(){
		
		windowWidth = $(window).width();
		about_me_intro = $("#about-me .banner .intro");
		
		if(windowWidth > 622 && windowWidth < 1280)
			$("#about-me .banner .intro").width( windowWidth - ( 30 + (windowWidth*.15) ) );
		else if(windowWidth > 1280)
			about_me_intro.width(1160);
		else
			about_me_intro.width('auto');
			
	}
	
	$(window).resize(function(){
		adjustWindowSize();
	});
	
	$('.toggle-menu').click(function(e){
		e.preventDefault();
		$('.toggle-menu').toggleClass('toggle-off toggle-on');
		$('#main-header ul').toggleClass('toggle-off toggle-on');		
	
	});
	
	$(document).on('click','#main-header ul.toggle-on a', function(){
		$('.toggle-menu').toggleClass('toggle-off toggle-on');
		$('#main-header ul').toggleClass('toggle-off toggle-on');
	});
	
	adjustWindowSize();
	Grid.init();
	displayMenu();
	
});

var s = skrollr.init({
				edgeStrategy: 'set',
				smoothScrolling: true,
				forceHeight: false
	});
	
skrollr.menu.init(s);