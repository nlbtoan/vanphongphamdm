/*======================================================================*\
|| #################################################################### ||
|| # vBulletin 4.0.7
|| # ---------------------------------------------------------------- # ||
|| # Copyright �2000-2010 vBulletin Solutions Inc. All Rights Reserved. ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- VBULLETIN IS NOT FREE SOFTWARE ---------------- # ||
|| # http://www.vbulletin.com | http://www.vbulletin.com/license.html # ||
|| #################################################################### ||
\*======================================================================*/
var vB_ReadMarker={forum_statusicon_prefix:"forum_statusicon_",thread_statusicon_prefix:"thread_statusicon_",thread_gotonew_prefix:"thread_gotonew_",thread_title_prefix:"thread_title_"};function vB_AJAX_ReadMarker(A){this.forumid=A}vB_AJAX_ReadMarker.prototype.mark_read=function(){YAHOO.util.Connect.asyncRequest("POST","ajax.php?do=markread&f="+this.forumid,{success:this.handle_ajax_request,failure:this.handle_ajax_error,timeout:vB_Default_Timeout,scope:this},SESSIONURL+"securitytoken="+SECURITYTOKEN+"&do=markread&forumid="+this.forumid)};vB_AJAX_ReadMarker.prototype.handle_ajax_error=function(A){vBulletin_AJAX_Error_Handler(A)};vB_AJAX_ReadMarker.prototype.handle_ajax_request=function(C){var D=YAHOO.util.Dom.getElementsByClassName("threadbit","li","threadlist");for(var A=0;A<D.length;A++){YAHOO.util.Dom.removeClass(D[A],"new");var B=YAHOO.util.Dom.getElementsByClassName("threadtitle_unread","a",D[A]);B=B[0];if(B){YAHOO.util.Dom.removeClass(B,"threadtitle_unread")}}if(window.YAHOO&&YAHOO.vBulletin&&YAHOO.vBulletin.vBPopupMenu){YAHOO.vBulletin.vBPopupMenu.close_all()}};function mark_forum_read(A){if(AJAX_Compatible){vB_ReadMarker[A]=new vB_AJAX_ReadMarker(A);vB_ReadMarker[A].mark_read()}else{window.location="forumdisplay.php?"+SESSIONURL+"do=markread&forumid="+A}return false};