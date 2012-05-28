(function($) { 
	
$.ajaxform = {
	reset : '.reset',
	onresetclicked : function(form) {
		form.reset();		
		if (typeof(CKEDITOR) != 'undefined') {	
			for(var name in CKEDITOR.instances)
		         CKEDITOR.instances[name].setData('');
		}			
		return false;
	},
	submit : '.submit',
	onsubmitclicked : function(form) {			
		if ($(this).hasClass('disabled')) return false;				
		
		if ($.ajaxform.validation == true) {			
			$(form).submit();
		}else{			
			$.ajaxform.onsubmit(form);
		}			
	},
	validation : false,
	validator : null,
	validsetting: {},
	ajax : true,
	init : function(form) {	
		// Fix for firefox
		form.reset();
		
		if ($.ajaxform.validation == true) {				
			settings = $.extend({submitHandler: $.ajaxform.onsubmit}, $.ajaxform.validsetting);    
			$.ajaxform.validator = $(form).validate(settings);			
		}
		
		$($.ajaxform.reset, form).click(function(){
			$.ajaxform.onresetclicked(form);
			return false;
		});		
		
		$($.ajaxform.submit, form).click(function(){
			$.ajaxform.onsubmitclicked(form);
			return false;
		});		
	},			
	onsubmit : function(form) {			

		if (typeof(CKEDITOR) != 'undefined') {	
			for(var name in CKEDITOR.instances)
				if (CKEDITOR.instances[name].getData() != '') {
					CKEDITOR.instances[name].updateElement();
				}
		}
		
		$($.ajaxform.submit).addClass('disabled');
		
		if ($.ajaxform.ajax) {
			$.ajax({
				  type: $(form).attr('method'),
				  url: form.action + '/ajax',
				  dataType: 'json',
				  success: function(data) {					  
					  $.ajaxform.success(data, form);					  
					  $($.ajaxform.submit, form).addClass('disabled');
				  },					  
				  error: function() {
					  console.debug('Ajax error');
					  $.ajaxform.error();						  
					  $($.ajaxform.submit, form).removeClass('disabled');
				  },
				  data: $(form).serialize()
			});			
		}else form.submit();
	},
	success: function(info, validator) { },
	error: function() {	}
};

$.fn.ajaxform = function(settings) {   
    settings = $.extend($.ajaxform, settings || {});    
    return this.each(function() {
    	settings.init(this);
    });
	
};

$.fn.nonajaxform = function() {
	
}
})(jQuery);