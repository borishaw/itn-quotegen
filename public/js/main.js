$(document).ready(function(){

	// Shrink Nav On Scroll
	function init() {
	    window.addEventListener('scroll', function(e){
	        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
	            shrinkOn = 100,
	            nav = document.querySelector("nav");
	        if (distanceY > shrinkOn) {
	            classie.add(nav,"shrink");
	        } else {
	            if (classie.has(nav,"shrink")) {
	                classie.remove(nav,"shrink");
	            }
	        }
	    });
	}
	window.onload = init();


	//Affix Div
	$('aside').affix({
	    offset: {   
	    	top: ($('nav').outerHeight(true) + $('#banner').outerHeight(true)) - 40,
	    	// top: $('.contact-box').offset().top,
	    	bottom: ($('footer').outerHeight(true) + $('.stopper').outerHeight(true)) + 40
	    }
	});

	//Scroll To Top
	//Check to see if the window is top if not then display button
	// $(window).scroll(function(){
	// 	if ($(this).scrollTop() > 100) {
	// 		$('.scrollToTop').slideDown();
	// 		// $('.scrollToTop').addClass('slide');
	// 	} else {
	// 		$('.scrollToTop').slideUp();
	// 		// $('.scrollToTop').removeClass('slide');
	// 	}
	// });
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 400) {
			// $('.scrollToTop').slideDown();
			$('.scrollToTop').addClass('slide');		
		} else {
			$('.scrollToTop').removeClass('slide');
		}
	});	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

});