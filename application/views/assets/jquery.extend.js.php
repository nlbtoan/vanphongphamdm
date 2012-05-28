<?php echo $jquery ?>
_cache = {};

var BASE_URL = '<?php echo base_url(); ?>';

function isset(check_var) {
	return (typeof check_var != "undefined" && check_var != '');
}

function site_url(uri) {		
	if (uri == null) { 
		return '<?php echo site_url() ?>';
	} else {
		// Doa dau slash (/) o 2 dau 
		if (uri.charAt(0) == '/') uri = uri.substr(1); 			
		last = uri.length - 1;
		
		if (uri.charAt(last) == '/') uri = uri.substr(0, last); 					
		return '<?php echo $this->config->slash_item('base_url') ?>' + uri;
	}
}

function var_dump(obj) {
	html = '';
	if (typeof obj == 'object') {
		html = "(object){\n";
		$.each(obj, function(key, val){
			html += key + " => " + val + "\n";
		});		
		html += "}\n";
	}
	alert(html);
}

function my_alert(content, title){
	if (typeof(title) == "undefined"){
		title = "Thông báo";
	}
	if (typeof(content) == "undefined"){
		content = "Nội dung thông báo";
	}
	
	$('body').append('<div id="dialog-message" title="'+title+'"><p>'+content+'</p></div>');
	$("#dialog").dialog("destroy");
	$("#dialog-message").dialog({
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog('close');
			}
		}
	});
	
}

function current_url() {
	return window.location;
}

function remove_accents(str) {		
		str= str.toLowerCase();  
		str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
		str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
		str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
		str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
		str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
		str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
		str= str.replace(/đ/g,"d");  
		str= str.replace(/%/g, "phan-tram");
		str= str.replace(/!|@|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g," ");  
		str= str.replace(/ + /g," "); //thay thế 2- thành 1- 
		str= str.replace(/^\ +|\ +$/g,"");
		return str;
	}

<?php $this->load->file('assets/_base/jquery.uri.js') ?>

uri.fetch_uri_string();

if (uri.base_uri_string != uri.uri_string) {
	
	window.location = site_url(uri.uri_string);
}

$(document).ready(function(){		
	$.fn.assoc = function() {		
		if ($(this).length > 1) return;
		var obj = $(this).get(0);
		var hash = obj.hash.substr(1);
		var splits = hash.split('/');
		var assoc = {};
		var lastval = '';
		for (var i=0; i < splits.length; i++){
			if (i % 2) {
				assoc[lastval] = splits[i];
			}else{
				assoc[splits[i]] = false;
				lastval = splits[i];
			}		
		}
		return assoc;
	}
	
	$.fn.show_message = function(html) {
		$(this).html(html).fadeIn('slow').delay(1000).fadeOut('slow');
	}
	
	$('body').ajaxSend(function(e, xhr, settings) {					
		if (settings.type == 'GET') {			
			var hash = uri.url_to_uri(settings.url);							
			window.location.hash = hash;
			uri.fetch_uri_string(); 
		}
	});
	
	$('body').ajaxComplete(function(e, xhr, settings) {		
		// convert text to json
		
		var data = eval('(' + xhr.responseText + ')');
		if (typeof data == 'xml') return;
		if (typeof data._redirect != "undefined") {			
    		window.location = data._redirect;    	
    	}
	});	
});