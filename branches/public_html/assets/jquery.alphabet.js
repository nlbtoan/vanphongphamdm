(function($){
// start alphabet
$.fn.alphabet = function(options) {	
	var options = $.extend({
			obj : null,
			uri_segment : 5,
			base_url : false,	
			click : function() {},			
			// initialize
			initialize : function(obj) {
				this.obj = obj;
				this.update();
				this.bind_event();
			},
			update : function() {
				var base_url = this.base_url;

				$('a', this.obj).each(function() {
					$(this).removeClass('selected');					
					if (base_url != false) {												
						this.href = base_url + '/alpha/' + this.id.replace('alphabet_', '');
					} 
				});	
				
				var select;	
				var assoc = uri.uri_to_assoc(this.uri_segment, ['alpha']);
				
				if (select = assoc['alpha']) {					
					if ($('#alphabet_' + select).length == 0) {			
						select = 'all';
					}		
				}else select = 'all';				
				
				$('#alphabet_' + select).addClass('selected');					
			},
			bind_event : function() {	
				var opts = this;			
				$('a', this.obj).each(function(){
					if (typeof opts.click == 'function') 
						$(this).click(opts.click);
					
					$(this).click(function(e){
						e.preventDefault();
						opts.update();													
					});
				});		
			}	
	}, options || {});	
	
	// main
	options.initialize($(this).get(0));	
	return options;
};	
// end
})(jQuery);