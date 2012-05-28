var windows = [];

function showWindow(name,url, width, height){
	var instance = windows[name];
	if (!instance || instance.closed || !instance.location) {
		windows[name] = window.open( url + '&init=1', '',
	            'toolbar=0,location=0,directories=0,status=1,menubar=0,' +
	            'scrollbars=yes,resizable=yes,' +
	            'width='+width+',' +
	            'height='+height);
	}else instance.focus();
    
    return false;
}
function confirmLink( theLink, msg ) {
    var is_confirmed = confirm( 'Bạn chắc chắn muốn' + ' :\n' + msg );
    if ( is_confirmed ) {
        if ( typeof( theLink.href ) != 'undefined' ) {
            theLink.href += '&is_js_confirmed=1';
        } else if ( typeof(theLink.form) != 'undefined' ) {
            theLink.form.action += '&is_js_confirmed=1';            
        }
    }
    
    return is_confirmed;
}

function sort_link( link, current_sort ){
	if ( current_sort == 'desc' ){
		link.href += '&sort=asc&sortby=' +  link.name;
	}else{
		link.href += '&sort=desc&sortby=' +  link.name;
	}
}


function checkAll(field) {	
	cond = '#' + field + " :checkbox";	
	$( cond ).map( function(){
		$(this).attr('checked', true );
		$(this).parents( 'tr' ).addClass( 'marked' );		
	});
}

function uncheckAll(field) {
	cond = '#' + field + " :checkbox";	
	$( cond ).map( function(){
		$(this).attr('checked', false );
		$(this).parents( 'tr' ).removeClass( 'marked' );		
	});
}

function OpenFileBrowser( url, width, height ) {
	var iLeft = ( screen.width  - width ) / 2 ;
	var iTop  = ( screen.height - height ) / 2 ;

	var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes" ;
	sOptions += ",width=" + width ;
	sOptions += ",height=" + height ;
	sOptions += ",left=" + iLeft ;
	sOptions += ",top=" + iTop ;

	window.open( url, 'OpenFile', sOptions ) ;
}
var UploadField = false;

function UpoadFile( obj ){
	var sBasePath = document.location.href.substr( 0, document.location.href.indexOf('cms') ) ;
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( sBasePath + 'includes/libs/fckeditor/editor/filemanager/browser/default/browser.html?Type=File&Connector=' + sBasePath + '%2Fincludes%2Flibs%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500);	
}

function UpoadImage( obj ){
	var sBasePath = document.location.href.substr( 0, document.location.href.indexOf('cms') ) ;
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( sBasePath + 'includes/libs/fckeditor/editor/filemanager/browser/default/browser.html?Type=Image&Connector=' + sBasePath + '%2Fincludes%2Flibs%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500);	
}

function UpoadFlash( obj ){
	var sBasePath = document.location.href.substr( 0, document.location.href.indexOf('cms') ) ;
	UploadField = $( obj ).prev().prev( 'input' );	
	OpenFileBrowser( sBasePath + 'includes/libs/fckeditor/editor/filemanager/browser/default/browser.html?Type=Flash&Connector=' + sBasePath + '%2Fincludes%2Flibs%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500);	
}

function SetUrl( url ){		
	$( UploadField ).attr( 'value', decodeURI(url) );	
}

function ImageOff( field, display ){	
	$( '#' + field ).hide();	
}
function ImageOn( field, display){	
	$( '#' + field ).show();	
}
