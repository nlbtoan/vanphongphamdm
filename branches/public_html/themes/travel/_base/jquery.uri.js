var uri = {	
	uri_string : '',
	base_uri_string : '',
	segments : [],
	keyval : {},
	fetch_uri_string : function() {
		this.keyval = {};
		this.segments = [];
		this.uri_string = '';
		uri._fetch_uri_string();
		uri._explode_sgments();
		uri._reindex_segments();	
	},
	_fetch_uri_string : function() {		
		if (window.location.hash != '') {
			var hash = window.location.hash;
			this.uri_string = hash.substr(hash.indexOf('#') + 1);						
		}else{
			this.uri_string = window.location + '';
			this.uri_string = this.uri_string.replace('#', '');
			this.uri_string = '/' + this.uri_string.replace(site_url(), '');						
		}		
		this.base_uri_string = window.location + '';
		this.base_uri_string = this.base_uri_string.replace(site_url(), '');
		this.base_uri_string = '/' + this.base_uri_string.replace(window.location.hash, '');
		
		if (this.uri_string == '/') this.uri_string = '';	
		if (this.base_uri_string == '/') this.base_uri_string = '';
	},
	// Parse
	_explode_sgments : function() {
		// Xoa / o 2 dau
		var tmp_uri_string = this.uri_string;
		if (tmp_uri_string.charAt(0) == '/') tmp_uri_string = tmp_uri_string.substr(1);
		var last = tmp_uri_string.length - 1;
		if (tmp_uri_string.charAt(last) == '') tmp_uri_string = tmp_uri_string.substr(0, last);
		
		var tmpsegments = tmp_uri_string.split('/');
		var val;
		for (i=0; i < tmpsegments.length; i++) {
			 val = tmpsegments[i];
			 if (val != '') {
				 this.segments[this.segments.length] = val;				 
			 }			 
		}	
	},
	// Danh dau lai
	_reindex_segments : function() {		
		var tmp = [];
		for (i=0; i < this.segments.length; i++)
			tmp[i+1] = this.segments[i];		
		this.segments = tmp;		
	},
	segment : function(n, no_result) {
		if (typeof no_result == 'undefined') no_result = false;				
		if (typeof this.segments[n] == "undefined")			
				return no_result;
		
		return this.segments[n];
	},
	total_segments : function() {
		return this.segments.length;
	}
	,
	uri_to_assoc : function(n, df) {
		if (typeof df == 'undefined') df = [];
		if (isNaN(n)) return df;
		
		if (typeof this.keyval[n] != 'undefined') {			
			return this.keyval[n];
		}
		if (this.total_segments() < n) {
			if (df.length == 0) 
				return [];
			var retval = [];
			for (i=0; i < df.length; i++) {
				retval[df[i]] = false;
			}
			return retval;
		}
		
		var tmpsegments = [];
		for (i=n; i< this.segments.length; i++) {
			tmpsegments[i-n] = this.segments[i];
		}
		
		var idx = 0;
		var lastval = '';
		var retval = {};
		for (i=0; i < tmpsegments.length; i++) {
			if (idx % 2) {
				retval[lastval] = tmpsegments[i];
			}else{
				retval[tmpsegments[i]] = false;
				lastval = tmpsegments[i];
			}
			idx++;
		}
		// Xoa nhung item ngoai def
		// Gan gia tri nhung item do = false
		if (df.length > 0) {
			for (i=0; i < df.length; i++) {
				if (typeof retval[df[i]] == 'undefined') {
					retval[df[i]] = false;
				}
			}
		}
		
		this.keyval[n] = retval;
		return retval;
	},
	assoc_to_uri : function(array) {
		var temp = '';
		$.each(array, function(key, val){
			if (temp == '') temp = key + '/' + val + '/'; 
			else temp += key + '/' + val;
		});
		return temp;
	},
	url_to_uri : function(url) {	
		return '/' + url.replace(site_url(), '');	
	}
};
