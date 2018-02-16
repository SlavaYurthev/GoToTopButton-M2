define(['jquery', 'domReady!'], function(jQuery){
	return function(config, element){
		jQuery(element).on('click', function(){
			jQuery('html, body').animate({scrollTop : 0}, 500);
		});
		if(jQuery(window).scrollTop() > config.scrollTop){
			jQuery(element).fadeIn();
		}
		else{
			jQuery(element).fadeOut();
		}
		jQuery(window).on('scroll', function(){
			if(jQuery(this).scrollTop() > config.scrollTop){
				jQuery(element).fadeIn();
			}
			else{
				jQuery(element).fadeOut();
			}
		});
	}
});