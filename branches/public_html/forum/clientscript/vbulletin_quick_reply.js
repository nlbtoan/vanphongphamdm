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
var qr_repost=false;var qr_errors_shown=false;var qr_active=false;var qr_ajax=null;var qr_postid=null;var qr_withquote=null;var qr_imgsrc="";var clickedelm=false;var qr_require_click=false;if(typeof (vB_XHTML_Ready)!="undefined"){vB_XHTML_Ready.subscribe(qr_init)}function qr_init(){if(typeof (vBulletin.attachinfo)=="undefined"){vBulletin.attachinfo={posthash:"",poststarttime:""}}if(fetch_object("quick_reply")){qr_disable_controls();qr_init_buttons(fetch_object("posts"))}}function qr_init_buttons(D){var C=fetch_tags(D,"a");for(var B=0;B<C.length;B++){if(C[B].id&&(C[B].id.substr(0,3)=="qr_"||C[B].id.substr(0,5)=="qrwq_")){YAHOO.util.Event.on(C[B],"click",qr_newreply_activate,this)}}var A=["newreplylink_top","newreplylink_bottom"];YAHOO.util.Event.on(A,"click",qr_replytothread_activate,this);YAHOO.util.Event.on(A,"dblclick",function(E){window.location=this.href},this)}function qr_disable_controls(){if(require_click){fetch_object("qr_postid").value=0;vB_Editor[QR_EditorID].disable_editor(vbphrase.click_quick_reply_icon);var A=fetch_object("cb_signature");if(A!=null){A.disabled=true}active=false;qr_active=false}else{vB_Editor[QR_EditorID].write_editor_contents("");qr_active=true}}function qr_activate(D,B){var C=fetch_object("collapseobj_quickreply");if(C&&C.style.display=="none"){toggle_collapse("quickreply")}fetch_object("qr_postid").value=D;if(fetch_object("qr_specifiedpost")){fetch_object("qr_specifiedpost").value=1}var A=fetch_object("cb_signature");if(A){A.disabled=false;A.checked=true}B=(B?B:"");vB_Editor[QR_EditorID].enable_editor(B);if(!is_ie&&vB_Editor[QR_EditorID].wysiwyg_mode){fetch_object("qr_scroll").scrollIntoView(false)}vB_Editor[QR_EditorID].check_focus();qr_active=true;return false}function qr_replytothread_activate(C){var A=this.href;if(qr_postid==last_post_id&&qr_withquote==true){window.location=A;return true}YAHOO.util.Event.preventDefault(C);qr_postid=last_post_id;qr_withquote=true;YAHOO.util.Dom.setStyle("progress_newreplylink_top","display","");YAHOO.util.Dom.setStyle("progress_newreplylink_bottom","display","");document.body.style.cursor="wait";var B=YAHOO.util.Dom.get("qr_threadid").value;qr_ajax=YAHOO.util.Connect.asyncRequest("POST","ajax.php",{success:qr_replytothread_handle_activate,failure:function(D){window.location=A},timeout:vB_Default_Timeout},SESSIONURL+"securitytoken="+SECURITYTOKEN+"&do=getquotes&t="+B)}function qr_replytothread_handle_activate(B){qr_reset();qr_disable_controls();qr_hide_errors();var C="";if(B){var A=B.responseXML.getElementsByTagName("quotes");if(A.length&&A[0].firstChild){var C=A[0].firstChild.nodeValue;if(vB_Editor[QR_EditorID].wysiwyg_mode){C=C.replace(/\r?\n/g,"<br />")}}}if(YAHOO.util.Dom.hasClass("qr_defaultcontainer","qr_require_click")){YAHOO.util.Dom.removeClass("qr_defaultcontainer","qr_require_click");qr_require_click=true}qr_activate(last_post_id,C);fetch_object("progress_newreplylink_top").style.display="none";fetch_object("progress_newreplylink_bottom").style.display="none";document.body.style.cursor="auto"}function qr_newreply_activate(C){var B=false;if(this.id.substr(0,3)=="qr_"){var D=this.id.substr(3)}else{if(this.id.substr(0,5)=="qrwq_"){var D=this.id.substr(5);B=true}else{return true}}if(qr_postid==D&&qr_withquote==B){return true}YAHOO.util.Event.stopEvent(C);qr_postid=D;qr_withquote=B;if(YAHOO.util.Dom.get("progress_"+D)){var A=(B?"quoteimg_":"replyimg_")+D;qr_imgsrc=YAHOO.util.Dom.get(A).getAttribute("src");YAHOO.util.Dom.get(A).setAttribute("src",YAHOO.util.Dom.get("progress_"+D).getAttribute("src"))}document.body.style.cursor="wait";if(B){qr_ajax=YAHOO.util.Connect.asyncRequest("POST","ajax.php?do=getquotes&p="+D,{success:qr_handle_activate,failure:vBulletin_AJAX_Error_Handler,timeout:vB_Default_Timeout},SESSIONURL+"securitytoken="+SECURITYTOKEN+"&do=getquotes&p="+D)}else{qr_handle_activate(false)}}function qr_handle_activate(H){var B=qr_postid;qr_reset();qr_disable_controls();qr_hide_errors();qr_postid=B;var F="";if(H){var E=H.responseXML.getElementsByTagName("quotes");if(E){var F=E[0].firstChild.nodeValue;if(vB_Editor[QR_EditorID].wysiwyg_mode){F=F.replace(/\r?\n/g,"<br />")}}}var G=fetch_object("qr_cancelbutton");G.style.display="";var J=document.createElement("li");J.id="qr_"+B;var I=YAHOO.util.Dom.get("post_"+B);var D=I.parentNode.insertBefore(J,I.nextSibling);var C=fetch_object("quick_reply");D.appendChild(C);qr_activate(B,F);if(YAHOO.util.Dom.get("progress_"+B)){var A=(qr_withquote?"quoteimg_":"replyimg_")+B;YAHOO.util.Dom.get(A).setAttribute("src",qr_imgsrc)}document.body.style.cursor="auto"}function qr_reset(){qr_postid=null;fetch_object("qr_postid").value=last_post_id;var C=fetch_object("quick_reply");var B=fetch_object("qr_defaultcontainer");if(C.parentNode!=B){var D=C.parentNode;B.appendChild(C);D.parentNode.removeChild(D)}var A=fetch_object("qr_cancelbutton");A.style.display="none";if(!require_click){vB_Editor[QR_EditorID].enable_editor("")}if(qr_require_click&&!YAHOO.util.Dom.hasClass("qr_defaultcontainer","qr_require_click")){YAHOO.util.Dom.addClass("qr_defaultcontainer","qr_require_click")}return false}function qr_prepare_submit(E,A){if(qr_repost==true){return true}if(!allow_ajax_qr||!AJAX_Compatible){E.posthash.value=vBulletin.attachinfo.posthash;E.poststarttime.value=vBulletin.attachinfo.poststarttime;return qr_check_data(E,A)}else{if(qr_check_data(E,A)){if(typeof vb_disable_ajax!="undefined"&&vb_disable_ajax>0){return true}if(is_ie&&userAgent.indexOf("msie 5.")!=-1){if(PHP.urlencode(E.message.value).indexOf("%u")!=-1){return true}}var H=fetch_object("cb_openclose");var B=fetch_object("cb_stickunstick");if((H&&H.checked)||(B&&B.checked)){return true}if(YAHOO.util.Connect.isCallInProgress(qr_ajax)){return false}E.posthash.value=vBulletin.attachinfo.posthash;E.poststarttime.value=vBulletin.attachinfo.poststarttime;if(clickedelm==E.preview.value){return true}else{var F="ajax=1";if(typeof ajax_last_post!="undefined"){F+="&ajax_lastpost="+PHP.urlencode(ajax_last_post)}for(var D=0;D<E.elements.length;D++){var G=E.elements[D];if(G.name&&!G.disabled){switch(G.type){case"text":case"textarea":case"hidden":F+="&"+G.name+"="+PHP.urlencode(G.value);break;case"checkbox":case"radio":F+=G.checked?"&"+G.name+"="+PHP.urlencode(G.value):"";break;case"select-one":F+="&"+G.name+"="+PHP.urlencode(G.options[G.selectedIndex].value);break;case"select-multiple":for(var C=0;C<G.options.length;C++){F+=(G.options[C].selected?"&"+G.name+"="+PHP.urlencode(G.options[C].value):"")}break}}}fetch_object("qr_posting_msg").style.display="";document.body.style.cursor="wait";qr_ajax_post(E.action,F);return false}}else{return false}}}function qr_resubmit(){qr_repost=true;var B=document.createElement("input");B.type="hidden";B.name="ajaxqrfailed";B.value="1";var A=YAHOO.util.Dom.get("quick_reply");if(!A){A=YAHOO.util.Dom.get("qrform")}A.appendChild(B);A.submit()}function qr_check_data(B,A){switch(fetch_object("qr_postid").value){case"0":fetch_object("qr_postid").value=last_post_id;case"who cares":if(typeof B.quickreply!="undefined"){B.quickreply.checked=false}break}if(clickedelm==B.preview.value){A=0}return vB_Editor[QR_EditorID].prepare_submit(0,A)}function qr_ajax_post(B,A){if(YAHOO.util.Connect.isCallInProgress(qr_ajax)){YAHOO.util.Connect.abort(qr_ajax)}qr_repost=false;qr_ajax=YAHOO.util.Connect.asyncRequest("POST",B,{success:qr_do_ajax_post,failure:qr_handle_error,timeout:vB_Default_Timeout},SESSIONURL+"securitytoken="+SECURITYTOKEN+"&"+A)}function qr_handle_error(A){vBulletin_AJAX_Error_Handler(A);fetch_object("qr_posting_msg").style.display="none";document.body.style.cursor="default";qr_resubmit()}function qr_do_ajax_post(F){if(F.responseXML){document.body.style.cursor="auto";fetch_object("qr_posting_msg").style.display="none";var D;if(fetch_tag_count(F.responseXML,"postbit")){qr_reset();ajax_last_post=F.responseXML.getElementsByTagName("time")[0].firstChild.nodeValue;qr_disable_controls();qr_hide_errors();var C=F.responseXML.getElementsByTagName("postbit");for(D=0;D<C.length;D++){var I=document.createElement("div");I.innerHTML=C[D].firstChild.nodeValue;var A=I.getElementsByTagName("li")[0];var H=YAHOO.util.Dom.get("posts");if(A){var B=H.appendChild(A);PostBit_Init(B,C[D].getAttribute("postid"));A.scrollIntoView(false)}}if(typeof mq_unhighlight_all=="function"){mq_unhighlight_all()}if(fetch_object("qr_submit")){fetch_object("qr_submit").blur()}}else{if(!is_saf){var G=F.responseXML.getElementsByTagName("error");if(G.length){var E="<ol>";for(D=0;D<G.length;D++){E+="<li>"+G[D].firstChild.nodeValue+"</li>"}E+="</ol>";qr_show_errors(E);return false}}qr_resubmit()}}else{qr_resubmit()}}function qr_show_errors(A){qr_errors_shown=true;fetch_object("qr_error_td").innerHTML=A;YAHOO.util.Dom.removeClass("qr_error_tbody","hidden");vB_Editor[QR_EditorID].check_focus();return false}function qr_hide_errors(){if(qr_errors_shown){qr_errors_shown=true;YAHOO.util.Dom.addClass("qr_error_tbody","hidden");return false}}var vB_QuickReply=true;