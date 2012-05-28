//TOPSTORY
var iMaxTS=5,iMaxTBS=3;
var iReadStep=0;
var sLoDID=',';
var iDelay=100;
var iDisplayCateNo=0;
var iTSTimer=0;
var iTSCount,iTSCur,iTSFading,iTSPrev=0,iTSNext=0,iTSFastMove=0;
var iFadeDelay=40;
var iBoxCount=0;
function displayid(id,add){
	if (typeof(add)=='undefined') add=true;
	if (sLoDID.indexOf(id)<=0){
		if (add) sLoDID=sLoDID.concat(id).concat(',');
		return true;
	}
	else{
		return false;
	}
}

function showtopstoryitem(arItemTS, num){
	iTSCount = arItemTS.length-1;
	var sHTML='';
	sHTML=sHTML.concat('<div style="position:relative;width:201px;height:180px;top:2px;margin:10px 0;border:2px #CCC solid;">');
	for (var i=0;i<=iTSCount;i++){
		sHTML=sHTML.concat('	<div id="divTopStory').concat(num).concat(i).concat('" onmousemove="cleartopstorycounter(').concat(num).concat(');" style="overflow:hidden;position:absolute;').concat(iif(i==0,'left:0px','left:-10000px;')).concat(';top:0px;width:201px;height:180px;">');
		if(arItemTS[i][10]>0){
			sHTML=sHTML.concat('		<a href="').concat('#').concat('"><img border="0" src="').concat(arItemTS[i][1]).concat(arItemTS[i][4]).concat('" width="201" height="180"></a>');	
		}
		else{
			sHTML=sHTML.concat('		<a href="').concat(arItemTS[i][1]).concat('"><img border="0" src="').concat(arItemTS[i][5]).concat('" title="').concat(arItemTS[i][4]).concat('" width="201" height="180"></a>');
		}
		sHTML=sHTML.concat('	</div>');
		sHTML=sHTML.concat('	<div id="divTopStoryLayer').concat(num).concat(i).concat('" onmousemove="cleartopstorycounter(').concat(num).concat(');" style="').concat(iif(i==0,'left:0px;','left:-10000px')).concat(';top:125px;width:201px;height:55px;" class="HomeTopStoryColorLayer"></div>');
		sHTML=sHTML.concat('	<div id="divTopStoryTitle').concat(num).concat(i).concat('" onmousemove="cleartopstorycounter(').concat(num).concat(');" style="').concat(iif(i==0,'left:0px','left:-10000px')).concat(';top:125px;width:201px;height:55px;" class="HomeTopStoryColorLayerContent">');
		if(arItemTS[i][10]>0){
			sHTML=sHTML.concat('		<div style="left:5px;top:2px;width:175px;" class="HomeTopStoryTitle" onclick="window.location=\'').concat('#').concat('\'">').concat(arItemTS[i][2]).concat('</div>');	
		}
		else{
			sHTML=sHTML.concat('		<div style="left:5px;top:2px;width:175px;" class="HomeTopStoryTitle" onclick="window.location=\'').concat(arItemTS[i][1]).concat('\'">').concat(arItemTS[i][2]).concat('</div>');
		}
		sHTML=sHTML.concat('		<div style="left:6px;top:3px;width:175px;height:30px;" class="HomeTopStoryTitleShadow">').concat(arItemTS[i][2]).concat('</div>');
		sHTML=sHTML.concat('		<div style="left:5px;top:20px;width:175px;height:30px;" class="HomeTopStoryLead">').concat(arItemTS[i][3]);
		if (arItemTS[i][7]>0){
			sHTML = sHTML.concat('<img src="'+BASE_URL+'themes/travel/assets/TopStory/css/images/Video.gif" hspace=2>');
		}
		if (arItemTS[i][8]>0){
			sHTML = sHTML.concat('<img src="'+BASE_URL+'themes/travel/assets/TopStory/css/images/Photo.gif" hspace=2>');
		}
		if (arItemTS[i][9]>0){
			sHTML = sHTML.concat('<img src="'+BASE_URL+'themes/travel/assets/TopStory/css/images/Story.gif" hspace=2>');
		}
		sHTML = sHTML.concat('		</div>');
		sHTML=sHTML.concat('	</div>');
	}
	sHTML=sHTML.concat('<div style="left:182px;top:168px;width:15px;height:9px;" class="HomeTopStoryColorLayerSubImage">');
	if (iTSCount > 0){
		sHTML=sHTML.concat('<img id="imgTSPrev').concat(num).concat('" src="'+BASE_URL+'themes/travel/assets/TopStory/css/images/topstory_prev.gif" hspace="2" vspace="0" onmouseover="iTSPrev=1;this.src=\''+BASE_URL+'themes/travel/assets/TopStory/css/images/topstory_prev1.gif\'" onmouseout="iTSPrev=0;this.src=\''+BASE_URL+'themes/travel/assets/TopStory/css/images/topstory_prev.gif\'" style="cursor:pointer" onclick="changetopstory(-1,false,').concat(num).concat(');">');
		sHTML=sHTML.concat('<img id="imgTSNext').concat(num).concat('" src="'+BASE_URL+'themes/travel/assets/TopStory/css/images/topstory_next.gif" hspace="2" vspace="0" onmouseover="iTSNext=1;this.src=\''+BASE_URL+'themes/travel/assets/TopStory/css/images/topstory_next1.gif\'" onmouseout="iTSNext=0;if (!iTSFading) this.src=\''+BASE_URL+'themes/travel/assets/TopStory/css/images/topstory_next.gif\'" style="margin-left:3px;cursor:pointer" onclick="changetopstory(1,false,').concat(num).concat(');">');
	}
	sHTML=sHTML.concat('</div>');
	sHTML=sHTML.concat('</div>');
	return sHTML;
}
function getHtmlDivID(arItemTS, divID, num, timeoutID){
	timeoutID = setInterval(function(){topstorycounter(num);},100);	
	gmobj(divID).innerHTML=showtopstoryitem(arItemTS, num);
	iTSCur=0;
}

function changetopstory(direction,fade,num){

	var iTop, iBot;
	var oTop, oBot, oTopLayer, oBotLayer, oTopTitle, oBotTitle;
	iTop=iTSCur;
	iBot=iTop+direction;
	//alert(iBot);
	if (iBot<0) iBot=iTSCount;
	if (iBot>iTSCount) iBot=0;
	oTop = 'divTopStory'.concat(num) + iTop;
	oBot = 'divTopStory'.concat(num) + iBot;
	oTopLayer = 'divTopStoryLayer'.concat(num)+iTop;
	oBotLayer = 'divTopStoryLayer'.concat(num)+iBot;
	oTopTitle = 'divTopStoryTitle'.concat(num)+iTop;
	oBotTitle = 'divTopStoryTitle'.concat(num)+iBot;
	if (iTSFading==1){
		//alert('divTopStory'.concat(num)+(iTop));
		gmobj('divTopStory'.concat(num)+(iTop)).style.left='-10000px';
		gmobj('divTopStoryLayer'.concat(num)+(iTop)).style.left='-10000px';
		gmobj('divTopStoryTitle'.concat(num)+(iTop)).style.left='-10000px';
		outdirectionimage(num);
		iTSFading=0;
	}
	iTSTimer=0;
	if (!fade){
		iTSFastMove=1;
		changeOpac(100,oBot);
		changeOpac(40,oBotLayer);
		changeOpac(100,oBotTitle);
		gmobj(oTop).style.zIndex=1;
		gmobj(oBot).style.zIndex=2;
		gmobj(oBot).style.left='0px';
		gmobj(oTop).style.left='-10000px';
		gmobj(oBotLayer).style.left='0px';
		gmobj(oTopLayer).style.left='-10000px';
		gmobj(oBotTitle).style.left='0px';
		gmobj(oTopTitle).style.left='-10000px';
		iTSFading=0;
		iTSCur=iBot;
	}
	else{
		iTSFastMove=0;
		changeOpac(100,oBot);
		changeOpac(0,oBotLayer);
		changeOpac(0,oBotTitle);
		//alert(oTop);
		gmobj(oTop).style.zIndex=2;
		gmobj(oBot).style.zIndex=1;
		gmobj(oBot).style.left='0px';
		gmobj(oBotLayer).style.left='0px';
		gmobj(oBotTitle).style.left='0px';
		iTSFading=1;
		changingdirectionimage(direction, num);
		changingtopstory(iTop,iBot,0,100,num);
	}
}

function changingtopstory(iTop,iBot,iStep,iCurOpac,num){
	//alert(num);
	var oTop, oBot, oTopLayer, oBotLayer, oTopTitle, oBotTitle;
	oTop = 'divTopStory'.concat(num)+iTop;
	oBot = 'divTopStory'.concat(num)+iBot;
	oTopLayer = 'divTopStoryLayer'.concat(num)+iTop;
	oBotLayer = 'divTopStoryLayer'.concat(num)+iBot;
	oTopTitle = 'divTopStoryTitle'.concat(num)+iTop;
	oBotTitle = 'divTopStoryTitle'.concat(num)+iBot;
	if (iTSFading==1){
		if (iStep==0){
			if (iCurOpac>=0){
				changeOpac(iCurOpac,oTopTitle);
				changeOpac(iCurOpac*40/100,oTopLayer);
				iCurOpac-=5;
				setTimeout(function(){changingtopstory(iTop,iBot,0,iCurOpac,num)},iFadeDelay);
			}
			else{
				setTimeout(function(){changingtopstory(iTop,iBot,1,100,num)},100);
			}
		}
		else if (iStep==1){
			if (iCurOpac>=0){
				changeOpac(iCurOpac,oTop);
				iCurOpac-=5;
				setTimeout(function(){changingtopstory(iTop,iBot,1,iCurOpac,num)},iFadeDelay);
			}
			else{
				iTSCur=iBot;
				gmobj(oTop).style.left='-10000px';
				gmobj(oTopLayer).style.left='-10000px';
				gmobj(oTopTitle).style.left='-10000px';
				setTimeout(function(){changingtopstory(iTop,iBot,2,0,num)},100);
			}
		}
		else if (iStep==2){
			if (iCurOpac<=100){
				changeOpac(iCurOpac,oBotTitle);
				changeOpac(iCurOpac*40/100,oBotLayer);
				iCurOpac+=5;
				setTimeout(function(){changingtopstory(iTop,iBot,2,iCurOpac,num)},iFadeDelay);
			}
			else{
				outdirectionimage(num);
				iTSFading=0;
				iTSTimer=0;
			}
		}
	}
	else if (iStep<2 && iTSFastMove==0) {
		gmobj(oBot).style.left='-10000px';
		gmobj(oBotLayer).style.left='-10000px';
		gmobj(oBotTitle).style.left='-10000px';
		outdirectionimage(num);
		iTSFading=0;
		iTSTimer=0;
	}
}

function changingdirectionimage(direction, num){
	if (direction>0) gmobj('imgTSNext'.concat(num)).src=BASE_URL+"themes/travel/assets/TopStory/css/images/topstory_next1.gif"
	else gmobj('imgTSPrev'.concat(num)).src=BASE_URL+"themes/travel/assets/TopStory/css/images/topstory_prev1.gif"
}

function outdirectionimage(num){
	if (iTSNext==0) gmobj('imgTSNext'.concat(num)).src=BASE_URL+"themes/travel/assets/TopStory/css/images/topstory_next.gif"
	if (iTSPrev==0) gmobj('imgTSPrev'.concat(num)).src=BASE_URL+"themes/travel/assets/TopStory/css/images/topstory_prev.gif"
}

function topstorycounter(num){
	iTSTimer++;
	if (iTSTimer>70) {
		iTSTimer=0;
		changetopstory(1,true,num);
	}
}

function cleartopstorycounter(num){
	changeOpac(100,'divTopStory'.concat(num)+iTSCur);
	changeOpac(40,'divTopStoryLayer'.concat(num)+iTSCur);
	changeOpac(100,'divTopStoryTitle'.concat(num)+iTSCur);
	iTSFading=0;
	iTSTimer=0;
}

function changeOpac(opacity, id) {
	gmobj(id).style.opacity = (opacity / 100);
	gmobj(id).style.MozOpacity = (opacity / 100);
	gmobj(id).style.KhtmlOpacity = (opacity / 100);
	gmobj(id).style.filter = "alpha(opacity=" + opacity + ")";
}

//TOPSTORY
var arItemTS = new Array();
var sLink = 'news/topstory';

var timeoutID;
//var timeoutID1;

AjaxRequest.get(
{
	'url':sLink
	,'onSuccess':function(req){	
		var iCount=0;
		for (var i=0;i<req.responseXML.getElementsByTagName('Item').length;i++){
			with(req.responseXML.getElementsByTagName('Item').item(i)){
				if (iCount<iMaxTS){
					var sTemp = getNodeValue(getElementsByTagName('sID'));
					if (sTemp!='' && displayid(sTemp)){
						arItemTS[iCount] = new Array(11);
						arItemTS[iCount][0] = getNodeValue(getElementsByTagName('sID'));
						arItemTS[iCount][1] = getNodeValue(getElementsByTagName('sPath'));
						arItemTS[iCount][2] = getNodeValue(getElementsByTagName('sTitle'));
						arItemTS[iCount][3] = getNodeValue(getElementsByTagName('sLead'));
						arItemTS[iCount][4] = getNodeValue(getElementsByTagName('sImageTopStory'));
						arItemTS[iCount][5] = getNodeValue(getElementsByTagName('sImageHome'));
						arItemTS[iCount][6] = getNodeValue(getElementsByTagName('sImageFolder'));
						arItemTS[iCount][7] = getNodeValue(getElementsByTagName('sHasVideo'));
						arItemTS[iCount][8] = getNodeValue(getElementsByTagName('sHasPhoto'));
						arItemTS[iCount][9] = getNodeValue(getElementsByTagName('sHasStory'));
						arItemTS[iCount][10] = getNodeValue(getElementsByTagName('sHasInterview'));
						iCount++;
					}
				}
			}
		}

		getHtmlDivID(arItemTS, "tdTS", "1", timeoutID);
		iReadStep=2;
	}
	,'onError':function(req){
		gmobj('tdTS').innerHTML = req.statusText;
		iReadStep=2;
	}
});
