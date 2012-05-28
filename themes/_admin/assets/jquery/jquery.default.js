$( document ).ready(function() {
	//To dong cho cac selector
  $( ".selector" ).change(function() {		  
	  if ( $(this).attr('checked') == true ){
		  $(this).parents( 'tr' ).addClass( 'marked' );
	  }else{		  
		  $(this).parents( 'tr' ).removeClass( 'marked' );
	  }
  });    
});