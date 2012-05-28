(function($){
// begin
$.fn.pagination = function(config) {
	var config = $.extend({
		obj : null,
		cache : {},
        base_url : '',
        click : function() {},
        total_rows : 100,
        per_page : 10,
        num_links : 10,
        cur_page : 0,
        prev_page : 0,
        next_page : 0,
        first_link : '&lsaquo; Đầu',
        next_link : '&gt;',
		prev_link : '&lt;',
		last_link : 'Cuối &rsaquo;',
		uri_segment : 4,
		full_tag_open : '',
		full_tag_close : '',
		first_tag_open : '',
		first_tag_close : '&nbsp;',
		last_tag_open : '&nbsp;',
		last_tag_close : '',
		cur_tag_open : '&nbsp;<strong>',
		cur_tag_close : '</strong>',
		next_tag_open : '&nbsp;',
		next_tag_close : '&nbsp;',
		prev_tag_open : '&nbsp;',
		prev_tag_close: '',
		num_tag_open : '&nbsp;',
		num_tag_close : '',		
		initialize : function(obj) {
        	this.obj = obj;             	
			this.create_links();				
		},
		create_links: function() {								
			var html = this._create_links();	
			
			if (html == '')
				html = this.cur_tag_open + '1' + this.cur_tag_close;			
			
			$(this.obj).html(html);	
			this.bind_event();
		},		
		_create_links : function() {						
			if (this.total_rows == 0 || this.per_page == 0)
				return '';
			var num_pages = Math.ceil(this.total_rows / this.per_page);
			
			if (num_pages == 1) return '';
			// TODO check hash
						
			if (uri.segment(this.uri_segment)) {
				this.cur_page = uri.segment(this.uri_segment);			
			}else{
				this.cur_page = 0;
			}
											
			if (this.num_links < 1) return '';
			
			if (isNaN(this.cur_page))
				this.cur_page = 0;
			
			if (this.cur_page > this.total_rows) {					
				this.cur_page = (num_pages-1 ) * this.per_page;				
			}
			
	 		var uri_page_number = this.cur_page;
			
	 		this.cur_page = Math.floor((this.cur_page/this.per_page) + 1);	 		
	 		
			var start = ((this.cur_page - this.num_links) > 0) ? this.cur_page - (this.num_links - 1) : 1;
			var end = ((this.cur_page + this.num_links) < num_pages) ? this.cur_page + this.num_links : num_pages;
			
			if (typeof this.base_url != 'undefined') {
				var last = this.base_url.length - 1;
				if (this.base_url.charAt(last) != '/') this.base_url += '/';
			}
			
			var output = '';
			// first link
			if (this.cur_page > (this.num_links + 1)) 
				output += this.first_tag_open + '<a href="'+this.base_url+'"' + this.first_link + '</a>' + this.first_tag_close;
			// previous link
			if (this.cur_page != 1) {
				var i = uri_page_number - this.per_page + '';
				this.prev_page = i;
				if (i == 0) i = '';
				output += this.prev_tag_open + '<a href="'+this.base_url + i+'">' + this.prev_link + '</a>' +  this.prev_tag_close;			
			}
			
			// digit links
			for (var loop = start - 1; loop <= end; loop++) {			
				var i = (loop * this.per_page) - this.per_page;
				if (i >= 0) {
					if (this.cur_page == loop) {
						output += this.cur_tag_open + loop + this.cur_tag_close; // current page
					}else{
						n = (i==0) ? '' :  i;
						output += this.num_tag_open + '<a href="' + this.base_url + n + '">' + loop + '</a>' + this.num_tag_close;					
					}
				}
			}
			
			// next link
			if (this.cur_page < num_pages) {
				this.next_page = this.cur_page * this.per_page;
				output += this.next_tag_open + '<a href="'+this.base_url+ (this.cur_page * this.per_page) +'">' + this.next_link +'</a>' + this.next_tag_close;
			}
			// last link
			if ((this.cur_page + this.num_links) < num_pages)  {
				i = ((num_pages * this.per_page) - this.per_page);
				output += this.last_tag_open + '<a href="'+this.base_url + i+'">'+this.last_link+'</a>' + this.last_tag_close;
			}
			output = this.full_tag_open + output + this.full_tag_close;
			
			return output;			
		},
		bind_event : function(){		
			var cfg = this;
			$('a', cfg.obj).each(function(){	
				$(this).click(cfg.click);
				$(this).click(function(e){					
					e.preventDefault();											
				});				
			});
			
		}
    }, config || {});	
	
	config.initialize($(this).get(0));	
	return config;
};
// end
})(jQuery);