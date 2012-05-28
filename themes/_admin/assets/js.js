$(document).ready(function(){

	// enable tooltip for "download" element. use the "slide" effect 
    //$("#download_now").tooltip({ effect: 'slide' });
	
	//Tick checkbox
	function tick(){
		alert();
		n = $(":checkbox").index($(this)) + 1;
		if($(this).attr("checked")){
			$("#wrapper tr").eq(n).css("background-color","#ffcc99");
		}
		else{
			if( n % 2 != 0){
				$("#wrapper tr").eq(n).css("background-color","#fff");
			}
			else{
				$("#wrapper tr").eq(n).css("background-color","#f7f7f7");
			}
		}
	}
	
	$(".tickall").click(function(){
		$(":checkbox").attr("checked","checked");
		$("#wrapper tr").css("background-color","#ffcc99");
	});
	
	$(".untickall").click(function(){
		$(":checkbox").attr("checked","");		
		$("#wrapper tr:even").css("background-color","#f7f7f7");
		$("#wrapper tr:odd").css("background-color","#fff");
	});	
	
	$(":checkbox").click(tick);
	
});