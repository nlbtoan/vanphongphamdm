(function($){
	$.ajaxform = {
		init : function(form) {				
			$(form).validate({submitHandler: $.ajaxform.submitHandler});
			
			$.ajaxform.trackchange(form);
			
			$('.reset', form).click(function(){
				form.reset();
				return false;
			});
			
			$('.submit', form).each(function(){
				if (!$(this).hasClass('disabled')) $(this).addClass('disabled');
				$(this).click(function(){	
					if ($(this).hasClass('disabled')) return false;														
					$(form).submit();	
					return false;
				});
			});
		},
		trackchange: function(form) {
			$('input, textarea', form).one("change", function() {				
				$('.submit').removeClass('disabled');
		    });
		},
		submitHandler : function(form) {
		
			if (typeof(CKEDITOR) != 'undefined') {	
				for(var name in CKEDITOR.instances)
			         CKEDITOR.instances[name].updateElement();
			}
			
			var method = $(form).attr('method');
			$('.submit').addClass('disabled');	
			$.ajax({
				  type: method,
				  url: form.action,
				  success: function(data) {
					  $.ajaxform.success(data);
					  $.ajaxform.trackchange(form);
					  $('.submit', form).addClass('disabled');
				  },	
				  error: function() {
					  $.ajaxform.error();
					  $.ajaxform.trackchange(form);
					  $('.submit', form).removeClass('disabled');
				  },
				  data: $(form).serialize()
				});			
		},
		success: function(data) { },
		error: function() {	}
	};
	
	$.fn.ajaxform = function(success, error){			
		$(this).each(function(){
			if (typeof(success) == 'function')
				$.ajaxform.success = success;
			if (typeof(error) == 'function')
				$.ajaxform.error = error;
			$.ajaxform.init(this);			
		});		
	};
})(jQuery);
