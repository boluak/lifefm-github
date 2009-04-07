/* Global base events definition */

(function($) {

	$(document).ready(function(){

	  $(".j-hovered")
  	  .live("mouseover", function(){
    		$(this).addClass(this.className.match(/([^ ]+)/)[1] + "-hover");
  	  })
  	  .live("mouseout", function(){
    		$(this).removeClass(this.className.match(/([^ ]+)/)[1] + "-hover");
  	  })
  	  
  	$(".j-collapse")
  	  .live("click", function(){
  	    $(this).parents(".j-collapsed").toggleDependClass("collapsed");
  	  })

	});

})(jQuery);

/* Global base events definition (end) */