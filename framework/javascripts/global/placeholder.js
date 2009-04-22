/* Placeholder for inputs */

(function($) {
  
  $(document).ready(function(){
    GLOBAL.reInit(function(){
      $("input[placeholder], textarea[placeholder]").not("[prettysearch=yes]").each(function(){
        new g_placeholder(this);
      })
    })
  })
  
  this.g_placeholder = function(input){
  	return this.init.apply(this, arguments);
  }
  
  g_placeholder.prototype = {
    init: function(obj){
      this.ptr = $(obj);

      this.placeholder = this.ptr.attr("placeholder");
      this.ptr.removeAttr("placeholder");

      this.create();
      this.bindEvents();
      
      if(this.ptr.val() != '')
        this.f_placeholder(false);
    },
    create: function(){
      this.domNode = $("<span>");
      this.domNode.css({
        display: "inline-block",
        position: "relative"
      })
      this.ptr.wrap(this.domNode);

      this.placeholderNode = $("<span>");
      this.placeholderNode
        .text(this.placeholder)
        .css({ position: "absolute", left: 3, top: 3, height: "1.5em", color: "gray", zIndex: 1 })
      this.ptr.after(this.placeholderNode);
    },
    bindEvents: function(){
      var $this = this;
      this.ptr
        .focus(function(){
          $this.f_placeholder(false);
        })
        .blur(function(){
          if($this.ptr.val() == '')
            $this.f_placeholder(true);
        })
      this.placeholderNode
        .mouseup(function(){
          $this.ptr.focus();
        })
    },
    f_placeholder: function(status){
      if(status)
        this.placeholderNode.show()
      else
        this.placeholderNode.hide()
    }
  }
  
})(jQuery);

/* Placeholder for inputs (end) */
