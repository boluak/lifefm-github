jQuery.noConflict();

(function($) {

  this.GLOBAL = {
    debug: true,

    // Global object for reinit something
    // after ajax answer for example
    aInit: [],
    reInit: function(func){
      try{
        if(func && $.isFunction(func)){
          func.call();
          this.aInit.push(func);
        } else {
          $.each(this.aInit, function(){
            this.call();
          })
        }
      } catch(e){
        debug(e);
      }
    }
  }

  this.debug = function(str) {
  	if (window.console && window.console.log && GLOBAL.debug)
  	window.console.log("[GLOBAL: '" + str + "']\n" + debug.caller.toString());
  };

})(jQuery);
