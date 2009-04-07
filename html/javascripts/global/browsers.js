/* Global browsers definition */

(function($) {

	$(document).ready(function(){
		if($.browser.safari)
			$(document.documentElement)
			  .addClass("b-safari");

		if($.browser.mozilla)
			$(document.documentElement).addClass("b-gecko");

		if($.browser.opera)
			$(document.documentElement).addClass("b-opera");
	});

})(jQuery);

/* Global browsers definition (end) */