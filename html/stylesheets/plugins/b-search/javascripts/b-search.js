/**************************************************
	Class:  Pretty Search
	Author: Egor Hmelyoff (hmelyoff@gmail.com)
	TODO:
		— allow safari to use own input[type=search]
		— find and return object if exist
	
**************************************************/
/*global document, jQuery */

var _classPrettySearchInit = true;
var _classPrettySearchSave = [];


function PrettySearch(){
	return this.init.apply(this, arguments);
}

jQuery(document).ready(function(){
	if(_classPrettySearchInit){
		jQuery("input[prettysearch=yes]").each(function(){
			_classPrettySearchSave.push(new PrettySearch(jQuery(this)));
		});
	}
});

PrettySearch.prototype = {
	init: function(){
		
		// Define default boolean vars
		this.is = {
			input: false
		};

		this._init.apply(this, arguments);
		
		return this;
	},
	
	_init: function(){
		var ptr = jQuery(arguments[0]);
		if(!ptr.is("input")) {ptr = ptr.find("input[type=text]");}

		if(ptr.is("input")){
			this.hSettings = {
				// base vars
				baseClass: "b-search",
				ptr: arguments[0],

				// default attributes
				id: ptr.attr("id") ? ptr.attr("id") : null,
				sClass: ptr.attr("class") ? ptr.attr("class"): null,
				placeholder: ptr.attr("placeholder") ? ptr.attr("placeholder") : null,
				incremental: ptr.attr("incremental") ? ptr.attr("incremental") : 'no',
				results: ptr.attr("results") ? ptr.attr("results") : 0,
				autocomplete: ptr.attr("autocomplete") ? ptr.attr("autocomplete") : 'on',
				
				// form attributes
				name: ptr.attr("name") ? ptr.attr("name") : 'q',
				value: ptr.attr("value") ? ptr.attr("value") : null,
				
				width: ptr.width()-13,
				
				// events
				onsearch: ptr.attr("onsearch") ? ptr.attr("onsearch") : function(){}
			};
			
			jQuery.extend(this.hSettings, arguments[1] ? arguments[1] : {});
			
			
			var ps = jQuery('<div></div>')
				.addClass(this.hSettings.sClass)
				.addClass(this.hSettings.baseClass);
				// .css({ width: this.hSettings.width });
			
			if(this.hSettings.id) {ps.attr("id", this.hSettings.id);}
			
			ps.append(
				'<div class="' + this.hSettings.baseClass +'_left g-png"></div>' +
				'<div class="' + this.hSettings.baseClass +'_container">' +
				  '<div class="' + this.hSettings.baseClass +'_right g-png"></div>' + 
				  '<div class="' + this.hSettings.baseClass +'_container">' +
  					'<span class="' + this.hSettings.baseClass +'_placeholder">' + (this.hSettings.placeholder ? this.hSettings.placeholder : '') + '</span>' +
  					'<span class="' + this.hSettings.baseClass +'_spinner"></span>' +
  					'<span class="' + this.hSettings.baseClass +'_clear"></span>' +
  				'</div>'+
				'</div>');

			var _ptr = ptr.clone(true);
			if(!jQuery.browser.msie) {
				_ptr.attr("type", "text");
			}
			
			ps.find("span." + this.hSettings.baseClass +"_placeholder").after(_ptr);

			ps.find("div." + this.hSettings.baseClass +"_container input")
				.removeAttr("placeholder")
				.removeAttr("incremental")
				.removeAttr("prettysearch")
				.addClass(this.hSettings.baseClass + "_input")
				.css({ outlineWidth: 0 });
				
			ptr.replaceWith(ps);
			this.ptr = ps;

			if(!this.hSettings.value && this.hSettings.placeholder) {
				this.placeholder(true);
			}

			if(this.hSettings.value) {
				this.clear(true);
			}
			this._events();
			
		} else {return false;}
	},
	
	_events: function(){
		var oThis = this;
		this.ptr.mousedown(function(){
			oThis.placeholder(false);
			oThis.ptr.addClass(oThis.hSettings.baseClass + "-focus");
			if(!oThis.is.input) {
				return false;
			} else {
				oThis.is.input = false;
			}
		})
		.mouseup(function(){
			oThis.ptr.find("input." + oThis.hSettings.baseClass + "_input").focus();
		});
		this.ptr.find("input." + this.hSettings.baseClass + "_input")
			.focus(function(){
				oThis.ptr.addClass(oThis.hSettings.baseClass + "-focus");
				oThis.placeholder(false);
			})
			.blur(function(){
				var $this = jQuery(this);
				oThis.ptr.removeClass(oThis.hSettings.baseClass + "-focus");
				if(!$this.val()) {
					oThis.placeholder(true);
				}
			})
			.keyup(function(){
				var $this = jQuery(this);
				if($this.val()) {
					oThis.clear(true);
				} else {
					oThis.clear(false);
				}
				
				oThis.value = $this.val();
				if(oThis.hSettings.incremental == 'yes') {
					oThis.onsearch();
				}
			})
			.mousedown(function(){
				oThis.is.input = true;
			})
			.change(function(){
				oThis.value = jQuery(this).val();
				if(oThis.hSettings.incremental == 'yes') {
					oThis.onsearch();
				}
			})
			.parents("form").submit(function(){
				oThis.onsubmit();
			});
			
		this.ptr.find("span." + this.hSettings.baseClass + "_clear")
			.mousedown(function(){
				jQuery(this).addClass(oThis.hSettings.baseClass + "_clear_down");
				oThis.ptr.find("input." + oThis.hSettings.baseClass + "_input").focus().select();
				return false;
			})
			.click(function(){
				oThis.value = oThis.ptr.find("input." + oThis.hSettings.baseClass + "_input").val("").focus().val();
				jQuery(this).removeClass(oThis.hSettings.baseClass + "_clear_down").hide();
				if(oThis.hSettings.incremental == 'yes') {
					oThis.onsearch();
				}
			});
			
		this.onsearch = function(){
			if(jQuery.isFunction(this.hSettings.onsearch)) {
				this.hSettings.onsearch.apply(oThis);
			} else {
				eval(this.hSettings.onsearch);
			}
		};
		
		this.events();
			
	},
	
	events: function(){
		
	},
	
	onsearch: function(){
		
	},
	
	onsubmit: function(){
		this.onsearch();
	},
	
	placeholder: function(b){
		var p = this.ptr.find("span." + this.hSettings.baseClass + "_placeholder");
		if(b) {p.show();}
		else {p.hide();}
	},
	
	clear: function(b){
		var p = this.ptr.find("span." + this.hSettings.baseClass + "_clear");
		if(b) {p.show();}
		else {p.hide();}
	},
	
	loading: function(b){
		if(b) {
			this.ptr.addClass(this.hSettings.baseClass + "-loading");
		} else {
			this.ptr.removeClass(this.hSettings.baseClass + "-loading");
		}
	}

};
