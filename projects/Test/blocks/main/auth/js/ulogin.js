if("undefined"==typeof uLogin||!uLogin.uLogin){Array.indexOf||(Array.prototype.indexOf=function(d){for(var c=0;c<this.length;c++){if(this[c]==d){return c}}return -1});var uLogin_uLoginHost=function(e){var d,f;for(f in e){if(f in e&&e[f].src&&0<e[f].src.indexOf("ulogin.js")){d=e[f];break}}e=d.src.match(/^.*\/\/([^/]+)/);e=e[1].replace(/^www\./,"");return"u-login.com"===e?"u-login.com":"ulogin.ru"}(document.getElementsByTagName("script")),uLogin={protocol:location.href.match(/^https/i)?"https":"http",host:encodeURIComponent(location.host),uLoginHost:uLogin_uLoginHost,uLoginLocalHost:location.host,uLogin:!0,ids:[],lang:(navigator.language||navigator.systemLanguage||navigator.userLanguage||"en").substr(0,2).toLowerCase(),supportedLanguages:["en","ru","uk"],dialog:"",close:"",lightbox:"",dialogSocket:"",pixel:"//"+uLogin_uLoginHost+"/match?rand=[rand]&u=[u]&r=[r]",mobile:!1,enabledMobile:{OS:["ios","android"],browsers:["opera","safari"]},mobilePlatform:{desktop:0,tablet:0,phone:0},maxSizes:{width:500,height:!1},scrollTimer:!1,providerNames:"vkontakte odnoklassniki mailru facebook twitter google yandex livejournal openid lastfm linkedin liveid soundcloud steam flickr youtube vimeo webmoney foursquare tumblr googleplus dudu".split(" "),states:["ready","receive","open","close"],asyncCheckID:!1,easyxdmDone:!1,widgetSettings:{},altway:function(b){b=b.toLowerCase();return(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|bolt|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|minimo|mmp|netfront|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|skyfire|symb(ian|os)|teashark|treo|up\.(browser|link)|uzardweb|vodafone|wap|windows (ce|phone)|xda|xiino|opera m(ob|in)i/i.test(b)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(b.substr(0,4)))&&/(iPhone|iPad)(.*?)(chrome|crios|IE Mobile|UCWEB)/i.test(b)?!0:!1}(navigator.userAgent||navigator.vendor||window.opera),get:function(b){return document.getElementById(b)},exists:function(b){return"undefined"!=typeof b},add:function(e,d,f){e.addEventListener?e.addEventListener(d,function(a){f(e,a)},!1):e.attachEvent?e.attachEvent("on"+d,function(a){f(e,a)}):e["on"+d]=function(a){f(e,a)}},is_encoded:function(b){return decodeURIComponent(b)!=b},genID:function(){for(var d=new Date,c=d.getTime()+Math.floor(100000*Math.random());uLogin.get("ul_"+c);){c=d.getTime()+Math.floor(100000*Math.random())}return"ul_"+c},show:function(b){this.exists(b)&&(b.style.visibility="visible")},hide:function(b){this.exists(b)&&(b.style.visibility="hidden")},parse:function(f){var e={};if(!f){return e}var h=f.split("&"),h=1<h.length?h:f.split(";");for(f=0;f<h.length;f++){var g=h[f].split("=");g[0]&&(g[0]=g[0].trim());g[1]&&(g[1]=g[1].trim());e[g[0]]=g[1]}return e},def:function(e,d,f){return this.exists(e[d])?e[d]:f},scrollTop:function(){return window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop},scrollLeft:function(){return window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft},dialogHeight:function(){return uLogin.mobile?uLogin.mobilePlatform.tablet?700:window.innerHeight:358},dialogWidth:function(){return uLogin.mobile?uLogin.mobilePlatform.tablet?500:window.innerWidth:564},clientWidth:function(){var b=0;"[object Opera]"==Object.prototype.toString.call(window.opera)&&9.5>window.parseFloat(window.opera.version())?b=document.body.clientWidth:window.innerWidth&&(b=window.innerWidth);uLogin.isIE()&&(b=document.documentElement.clientWidth);return b},clientHeight:function(){var b=0;"[object Opera]"==Object.prototype.toString.call(window.opera)&&9.5>window.parseFloat(window.opera.version())?b=document.body.clientHeight:window.innerHeight&&(b=window.innerHeight);uLogin.isIE()&&(b=document.documentElement.clientHeight);return b},hideAll:function(){this.lightbox&&(this.hide(this.lightbox),this.hide(this.dialog),this.hide(this.close));for(var b=0;b<this.ids.length;b++){this.ids[b].showed=!1,this.hide(this.ids[b].hiddenW),this.hide(this.ids[b].hiddenA)}},isIE:function(){if(/MSIE (\d+\.\d+);/.test(navigator.userAgent)){var b=new Number(RegExp.$1);if(9>b){return b}}return !1},browserDetect:{init:function(){this.OS=this.detectMobilePlatfrom();this.browser=this.searchString(this.dataBrowser)||0;this.version=this.searchVersion(navigator.userAgent)||this.searchVersion(navigator.appVersion)||0},searchString:function(f){for(var e=0;e<f.length;e++){var h=f[e].string,g=f[e].prop;this.versionSearchString=f[e].versionSearch||f[e].identity;if(h){if(f[e].subString.test(h)){return f[e].identity}}else{if(g){return f[e].identity}}}},searchVersion:function(d){var c=d.indexOf(this.versionSearchString);if(-1!=c){return parseFloat(d.substring(c+this.versionSearchString.length+1))}},detectMobilePlatfrom:function(){var b=navigator.userAgent.toLowerCase();if(function(){var e=navigator.platform.toLowerCase(),g=navigator.userAgent.toLowerCase(),f=/mobi(le)?|tablet|phone|palm|pocket|handheld|e?book|reader|ip(ad|od|hone)|android|blackberry|playbook|webos|windows ce/;if(f.test(e)||f.test(g)){return !1}if(/linux|unix|^win|^mac/.test(e)){return !0}if("ontouchstart" in window){return !1}}()){return uLogin.mobilePlatform.desktop=1,"desktop"}if(/android/.test(b)){return/tablet/.test(b)?uLogin.mobilePlatform.tablet=1:/mobile|phone/.test(b)?uLogin.mobilePlatform.phone=1:uLogin.mobilePlatform.tablet=1,"android"}if(/ip(ad|od|hone)/.test(b)){return/ip(od|hone)|phone/.test(b)?uLogin.mobilePlatform.phone=1:/ipad|tablet/.test(b)&&(uLogin.mobilePlatform.tablet=1),"ios"}if(/blackberry|playbook/.test(b)){return/playbook|tablet/.test(b)?uLogin.mobilePlatform.tablet=1:uLogin.mobilePlatform.phone=1,"blackberry"}if(/windows/.test(b)){return/tablet/.test(b)?uLogin.mobilePlatform.tablet=1:uLogin.mobilePlatform.phone=1,"winmobile"}if(/tablet/.test(b)){return uLogin.mobilePlatform.tablet=1,0}if(/phone/.test(b)){return uLogin.mobilePlatform.phone=1,0}uLogin.mobilePlatform.phone=1;return 0},dataBrowser:[{string:navigator.userAgent,subString:/Chrome/,identity:"Chrome"},{string:navigator.userAgent,subString:/CriOS/,identity:"Chrome"},{string:navigator.userAgent,subString:/OmniWeb/,versionSearch:"OmniWeb/",identity:"OmniWeb"},{string:navigator.vendor,subString:/Apple/,identity:"Safari",versionSearch:"Version"},{string:navigator.userAgent,subString:/Safari/,identity:"Safari",versionSearch:"Version"},{string:navigator.userAgent,subString:/Opera Mini/,identity:"OperaMini"},{prop:window.opera,identity:"Opera",versionSearch:"Version"},{string:navigator.vendor,subString:/iCab/,identity:"iCab"},{string:navigator.vendor,subString:/KDE/,identity:"Konqueror"},{string:navigator.userAgent,subString:/Firefox/,identity:"Firefox"},{string:navigator.vendor,subString:/Camino/,identity:"Camino"},{string:navigator.userAgent,subString:/Netscape/,identity:"Netscape"},{string:navigator.userAgent,subString:/MSIE/,identity:"Explorer",versionSearch:"MSIE"},{string:navigator.userAgent,subString:/Gecko/,identity:"Mozilla",versionSearch:"rv"},{string:navigator.userAgent,subString:/Mozilla/,identity:"Netscape",versionSearch:"Mozilla"}]},inArray:function(f,e){if(!f||!e){return !1}for(var h=0,g=e.length;h<g;h++){if(f==e[h]){return !0}}return !1},isMobile:function(){uLogin.inArray(uLogin.browserDetect.OS.toLowerCase(),uLogin.enabledMobile.OS)&&uLogin.inArray(uLogin.browserDetect.browser.toLowerCase(),uLogin.enabledMobile.browsers)&&(uLogin.mobile=!0)},extraction:function(){if(uLogin.extraction.disabled){return !1}for(var g=0,f=[],j=[],i=document.getElementsByTagName("div"),h=document.getElementsByTagName("a");h[g];){h[g]&&(f[g]=h[g]),g++}for(g=0;i[g];){i[g]&&(j[g]=i[g]),g++}for(g=0;j[g]||f[g];){j[g]&&uLogin.addWidget(j[g]),f[g]&&uLogin.addWidget(f[g]),g++}},addWidget:function(f){var e="",h="",g=f.getAttribute("data-uloginid");if(g){"undefined"==typeof easyXDM&&1>=this.ids.length&&uLogin.easyXDMadd(),uLogin.getWidget(g,f.id)}else{if(f.id&&(e=f.id,h=(h=f.getAttribute("x-ulogin-params"))?h:f.getAttribute("data-ulogin")),e&&h){f=this.parse(h);h=!0;for(g=0;g<this.ids.length;g++){if(e==this.ids[g].id){h=!1;break}}h&&this.setWidgetProperties(e,this.ids.length,f)}}},initWidget:function(f){if(f){var e=uLogin.get(f);if(e&&(e=e.getAttribute("data-ulogin")||e.getAttribute("x-ulogin-params"))){var h=uLogin.parse(e),e=!1,g;for(g=0;g<uLogin.ids.length;g++){if(f==uLogin.ids[g].id){e=!0;break}}e?uLogin.ids[g].initCheck||(uLogin.ids[g].initCheck=window.setInterval(function(){uLogin.ids[g].done&&(window.clearInterval(uLogin.ids[g].initCheck),uLogin.setWidgetProperties(f,g,h))},50)):(g=uLogin.ids.length,uLogin.setWidgetProperties(f,g,h))}}},setWidgetProperties:function(f,e,h){this.ids[e]={id:f,dropTimer:!1,initCheck:!1,done:!1,type:this.def(h,"display",""),providers:this.def(h,"providers",""),hidden:this.def(h,"hidden",""),redirect_uri:this.def(h,"redirect_uri",""),callback:this.def(h,"callback",""),fields:this.def(h,"fields","first_name,last_name"),optional:this.def(h,"optional",""),color:this.def(h,"color","fff"),opacity:this.def(h,"opacity","75"),verify:this.def(h,"verify",""),lang:this.def(h,"lang",uLogin.lang),state:"",ready_func:[],receive_func:[],open_func:[],close_func:[]};""==this.ids[e].providers&&"window"==this.ids[e].type&&(this.ids[e].providers=uLogin.providerNames.join(","));"undefined"!=typeof h.mobilebuttons&&0==h.mobilebuttons&&(uLogin.mobile=0);this.ids[e].redirect_uri=uLogin.is_encoded(this.ids[e].redirect_uri)?this.ids[e].redirect_uri.replace(/\//g,"%2F"):encodeURIComponent(this.ids[e].redirect_uri);uLogin.altway&&(this.ids[e].redirect_uri||(this.ids[e].redirect_uri=location.href),this.ids[e].callback="");this.ids[e].callback&&"buttons"!==this.ids[e].type&&(this.ids[e].redirect_uri="");-1==uLogin.supportedLanguages.indexOf(this.ids[e].lang)&&(this.ids[e].lang=uLogin.lang);"undefined"==typeof easyXDM&&1>=this.ids.length&&uLogin.easyXDMadd();var g=window.setInterval(function(){if("undefined"!=typeof easyXDM&&"undefined"!=typeof easyXDM.Socket){switch(window.clearInterval(g),h.display=uLogin.ifMobileSetMobile(h.display),h.display){case"small":case"panel":uLogin.ids[e].listener_id=!1;uLogin.initPanel(e);break;case"window":uLogin.initWindow(e);break;case"buttons":uLogin.initButtons(e,uLogin.def(h,"receiver",uLogin.ids[e].redirect_uri));break;case"mobile":uLogin.initMobile(e);break;default:uLogin.ids.splice(e,e)}}},100)},sendPixel:function(){if(uLogin.pixel){uLogin.pixel=!1}},ifMobileSetMobile:function(b){return uLogin.mobile&&"buttons"!=b?"mobile":b},requireVerify:function(b){window.open("https://"+uLogin.uLoginHost+"/require_verify.php?token="+b,"uLogin","width=800,height=600,left="+(screen.width-800)/2+",top="+(screen.height-600)/2)},init:function(f){uLogin.extraction.disabled=!1;uLogin.browserDetect.init();uLogin.isMobile();""==f&&(uLogin.add(window,"load",function(d,c){setTimeout(function(){clearInterval(uLogin.asyncCheckID)},uLogin.extraction.disabled?100:0);setTimeout(uLogin.sendPixel,200);uLogin.extraction()}),f=document.getElementsByTagName("script"),f=f[f.length-1].src,-1==f.indexOf("?")&&(f+="?"),f=f.substr(f.indexOf("?")+1));if(""!=f){var e=this.parse(f);if(e.display){var h=this.def(e,"id","uLogin");if(this.get(h)){f=!0;for(var g=0;g<this.ids.length;g++){h==this.ids[g].id&&(f=!1)}f&&(h=this.ids.length,this.setWidgetProperties(this.def(e,"id","uLogin"),h,e))}else{window.setTimeout('uLogin.init("'+f+'")',1000)}}}},initSocket:function(h,g,l,k,j){var i=new easyXDM.Socket({remote:h,swf:uLogin.isIE()?"https://"+uLogin.uLoginHost+"/js/easyxdm.swf":"",props:l,container:g,onMessage:function(d,c){-1<d.indexOf("http")?location.href=d:-1<uLogin.states.indexOf(d)?uLogin._changeState(k,d):"closeme"==d&&uLogin.mobile?(uLogin.hide(uLogin.dialog),uLogin.hide(uLogin.lightbox),uLogin.dialog.style.visibility="hidden",uLogin.dialog.style.display="none",uLogin.lightbox.style.display="none",i.destroy()):"undefined"!=typeof window[uLogin.ids[k].callback]&&(window[uLogin.ids[k].callback](d),uLogin.dialog&&(uLogin.lightbox.style.display="none",uLogin.dialog.style.display="none",uLogin.hide(uLogin.close)))}});return i},getWidgetNumber:function(d){for(var c=0;c<uLogin.ids.length;c++){if(d==uLogin.ids[c].id){return c}}return NaN},initMobile:function(h){if(!uLogin.ids[h].done){var g=uLogin.ids[h].type,l=""!=uLogin.ids[h].hidden,k=uLogin.ids[h].providers,j=uLogin.ids[h].type="mobile";"other"==uLogin.ids[h].hidden?uLogin.ids[h].providers="":""!=uLogin.ids[h].hidden&&(uLogin.ids[h].providers+=(""==uLogin.ids[h].providers?"":",")+uLogin.ids[h].hidden);var i=uLogin.get(uLogin.ids[h].id);"undefined"==typeof i.getElementsByTagName("iframe")[0]&&(i.innerHTML="",i=k.split(",").length,"window"==g?i=187:(i=("small"==g?21:42)*(l?i+1:i),i="small"==g?128>i?128:i:160>i?160:i),j="https://"+uLogin.uLoginHost+"/mobile_button.html?id="+h+"&display="+j+"&redirect_uri="+this.ids[h].redirect_uri,j+="&callback="+this.ids[h].callback+"&providers="+this.ids[h].providers+"&fields="+this.ids[h].fields+"&optional="+this.ids[h].optional,j+="&protocol="+uLogin.protocol,j+="&host="+uLogin.host,j+="&lang="+this.ids[h].lang,j+="&verify="+this.ids[h].verify,j=j+("&originaltype="+g)+("&originalhidden="+l),j+="&originalproviders="+k,uLogin.initSocket(j,uLogin.ids[h].id,{style:{display:"inline-block",margin:"0",padding:"0",width:i+2+"px",height:("small"==g?14:28)+2+"px",border:"0",overflow:"hidden"},frameBorder:"0",allowTransparency:"true"},h));uLogin.ids[h].done=!0}},initWindow:function(i){var h=document.createElement("div");if(""==this.dialog){h.innerHTML='<div style="'+("position:fixed;z-index:9997;left:0;top:0;margin:0;padding:0;width:100%;height:100%;background:#"+this.ids[i].color+";opacity:0."+this.ids[i].opacity+";filter:progid:DXImageTransform.Microsoft.Alpha(opacity="+this.ids[i].opacity+");display:none;")+'"></div>';this.lightbox=h.firstChild;var p=uLogin.dialogHeight(),o=uLogin.dialogWidth(),n=Math.floor(uLogin.scrollLeft()+(uLogin.clientWidth()-o)/2),m=Math.floor(uLogin.scrollTop()+(uLogin.clientHeight()-p)/2),p="position:absolute;z-index:9998;left:"+n+"px;top:"+m+"px;margin-bottom:0;margin-right:0;margin-top:0px;margin-left:0px;padding:0;overflow:hidden;width:"+o+"px;height:"+p+"px;display:none;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;"+(!uLogin.mobile||uLogin.mobile&&uLogin.mobilePlatform.tablet?"border:10px solid #666;border-radius:8px;":"");h.innerHTML='<div id = "'+uLogin.genID()+'" style="'+p+'"></div>';this.dialog=h.firstChild;if(!uLogin.mobile){h.innerHTML='<img style="width:30px;height:30px;position:absolute;z-index:9999;border:0px;left:0;top:0;margin:0;padding:0;background:url(http://'+uLogin.uLoginLocalHost+'/images/ulogin/x.png);cursor:pointer;visibility:hidden" src="http://'+uLogin.uLoginLocalHost+'/images/ulogin/blank.gif"/>';this.close=h.firstChild;this.add(this.close,"click",function(d,c){uLogin.lightbox.style.display="none";uLogin.dialog.style.display="none";uLogin.hide(uLogin.close)});this.add(this.close,"mouseover",function(d,c){d.style.background="url(https://"+uLogin.uLoginHost+"/img/x_.png)"});this.add(this.close,"mouseout",function(d,c){d.style.background="url(https://"+uLogin.uLoginHost+"/img/x.png)"});document.body.appendChild(this.close);this.add(this.lightbox,"click",function(d,c){uLogin.lightbox.style.display="none";uLogin.dialog.style.display="none";uLogin.hide(uLogin.close)});var h=this.get(this.ids[i].id).getElementsByTagName("img")[0],l="ru"==this.ids[i].lang?"http://"+uLogin.uLoginLocalHost+"/images/ulogin/button.png":"https://"+uLogin.uLoginHost+"/img/"+this.ids[i].lang+"/button.png",j="ru"==this.ids[i].lang?"http://"+uLogin.uLoginHost+"/img/button_.png":"https://"+uLogin.uLoginHost+"/img/"+this.ids[i].lang+"/button_.png";h&&(h.src=l,h.style.border="none",this.add(h,"mouseover",function(d,c){if(/disabled/.test(d.parentNode.className)){return !1}d.src!=j&&(d.src=j)}),this.add(h,"mouseout",function(d,c){if(/disabled/.test(d.parentNode.className)){return !1}d.src!=l&&(d.src=l)}))}document.body.appendChild(this.lightbox);document.body.appendChild(this.dialog)}this.ids[i].done||(this.add(this.get(this.ids[i].id),"click",function(e,d){d.preventDefault?d.preventDefault():d.returnValue=!1;if(/disabled/.test(e.className)){return !1}var f=e.id?e:d.srcElement;f&&uLogin.showWindow(f.id);return !1}),uLogin.add(window,"scroll",function(d,c){uLogin.onMoveWindow()}),uLogin.add(window,"resize",function(d,c){uLogin.onMoveWindow()}),this.ids[i].done=!0)},onMoveWindow:function(){uLogin.mobile?uLogin.moveWindow():(uLogin.scrollTimer&&window.clearTimeout(uLogin.scrollTimer),uLogin.scrollTimer=window.setTimeout(uLogin.moveWindow,200))},showWindow:function(f){f=uLogin.getWidgetNumber(f);var e="https://"+uLogin.uLoginHost+"/"+(uLogin.mobile?"mobile.html":"window.html")+"?id="+f+"&redirect_uri="+uLogin.ids[f].redirect_uri+"&callback="+uLogin.ids[f].callback+"&fields="+uLogin.ids[f].fields+"&optional="+uLogin.ids[f].optional+(uLogin.altway?"&altway=1":"")+"&protocol="+uLogin.protocol+"&host="+uLogin.host+"&lang="+this.ids[f].lang+"&verify="+this.ids[f].verify+(uLogin.mobile?"&providers="+uLogin.ids[f].providers:""),h=uLogin.dialogWidth(),g=uLogin.dialogHeight();""!=uLogin.dialogSocket&&uLogin.dialogSocket.destroy();uLogin.dialogSocket=uLogin.initSocket(e,uLogin.dialog.getAttribute("id"),{style:{margin:"0",padding:"0",background:"#fff",width:h+"px",height:g+"px",border:"0",position:"absolute",left:"0",top:"0",overflow:"hidden"},frameBorder:"0"},f);uLogin.mobile||(uLogin.close.style.left=Math.floor(uLogin.scrollLeft()+(uLogin.clientWidth()+562)/2)+"px",uLogin.close.style.top=Math.floor(uLogin.scrollTop()+(uLogin.clientHeight()-374)/2)+"px",uLogin.show(uLogin.close));uLogin.lightbox.style.display="block";uLogin.dialog.style.display="block";uLogin.lightbox.style.visibility="visible";uLogin.dialog.style.visibility="visible";uLogin.onMoveWindow()},moveWindow:function(){if(!uLogin.dialog.firstChild){return !1}var g=uLogin.dialogWidth(),f=uLogin.dialogHeight();if(uLogin.mobile){var j=uLogin.clientWidth(),i=uLogin.clientHeight(),g=g>j?j-2:g-2,f=f>i?i-2:f-2;if(uLogin.mobilePlatform.tablet){uLogin.dialog.style.left=Math.floor(uLogin.scrollLeft()+(j-g-20)/2)+"px",uLogin.dialog.style.top=Math.floor(uLogin.scrollTop()+(i-f-20)/2)+"px",uLogin.dialogSocket.postMessage("resize:"+g+":"+f+"")}else{uLogin.dialog.style.left=uLogin.scrollLeft()+"px";uLogin.dialog.style.top=uLogin.scrollTop()+"px";if(!uLogin.maxSizes.height||100>uLogin.maxSizes.height){uLogin.maxSizes.height=uLogin.maxSizes.width/g*f}uLogin.dialogSocket.postMessage("resize:"+g+":"+f+":"+(g<f?g/uLogin.maxSizes.width:f/uLogin.maxSizes.height)+"")}uLogin.dialog.style.width=g+"px";uLogin.dialog.style.height=f+"px";uLogin.dialog.firstChild.style.width=g+"px";uLogin.dialog.firstChild.style.height=f+"px"}else{for(var j=(Math.floor(uLogin.scrollLeft()+(uLogin.clientWidth()-g)/2)-new Number(uLogin.dialog.style.left.slice(0,-2)))/10,f=(Math.floor(uLogin.scrollTop()+(uLogin.clientHeight()-f)/2)-new Number(uLogin.dialog.style.top.slice(0,-2)))/10,i=(Math.floor(uLogin.scrollLeft()+(uLogin.clientWidth()+562)/2)-new Number(uLogin.close.style.left.slice(0,-2)))/10,g=(Math.floor(uLogin.scrollTop()+(uLogin.clientHeight()-374)/2)-new Number(uLogin.close.style.top.slice(0,-2)))/10,h=0;10>h;h++){uLogin.dialog.style.left=j+new Number(uLogin.dialog.style.left.slice(0,-2))+"px",uLogin.dialog.style.top=f+new Number(uLogin.dialog.style.top.slice(0,-2))+"px",uLogin.close.style.left=i+new Number(uLogin.close.style.left.slice(0,-2))+"px",uLogin.close.style.top=g+new Number(uLogin.close.style.top.slice(0,-2))+"px"}}},initPanel:function(t){function s(){uLogin.ids[t].listener_id&&uLogin.removeStateListener(uLogin.ids[t].id,uLogin.ids[t].listener_id,"ready");if(!r&&""!=uLogin.ids[t].hidden&&!uLogin.ids[t].done){var a=document.createElement("div"),c=uLogin.ids[t].opacity;a.innerHTML='<img src="http://'+uLogin.uLoginLocalHost+'/images/ulogin/blank.gif" style="position:relative;width:'+p+"px;height:"+p+"px;margin:"+o+";cursor:pointer;background:"+n+';vertical-align:top;border:0px;"/>';uLogin.add(a.firstChild,"mouseover",function(d,e){uLogin.ids[t].showed=!1;uLogin.dropdownDelayed(t,j);d.style.filter="alpha(opacity="+c+") progid:DXImageTransform.Microsoft.AlphaImageLoader(src=transparent.png, sizingMethod='crop')";d.style.opacity=parseFloat(c)/100});uLogin.add(a.firstChild,"mouseout",function(d,e){uLogin.ids[t].showed=!0;uLogin.dropdownDelayed(t,j);d.style.filter="";d.style.opacity=""});uLogin.add(a.firstChild,"click",function(d,e){uLogin.dropdown(t,j)});uLogin.ids[t].drop=a.firstChild;uLogin.get(uLogin.ids[t].id).appendChild(uLogin.ids[t].drop);uLogin.initDrop(t);uLogin.ids[t].listener_id=uLogin.setStateListener(uLogin.ids[t].id,"ready",function(){uLogin.ids[t].done=!0;uLogin.removeStateListener(uLogin.ids[t].id,uLogin.ids[t].listener_id,"ready")})}else{if(""==uLogin.ids[t].hidden||r){uLogin.ids[t].done=!0}}}uLogin.get(uLogin.ids[t].id).innerHTML="";var r=!0,q="small"==uLogin.ids[t].type?21:42,p="small"==uLogin.ids[t].type?16:32,o="small"==uLogin.ids[t].type?"0 5px 0 0":"0 10px 0 0",n="small"==uLogin.ids[t].type?"url(https://"+uLogin.uLoginHost+"/img/small8.png) 0 0":"url(https://"+uLogin.uLoginHost+"/img/panel8.png) 0 -3px",j="small"==uLogin.ids[t].type?1:2;if(this.ids[t].providers){document.createElement("div");var m="https://"+uLogin.uLoginHost+"/panel.html?id="+t+"&display="+j+"&redirect_uri="+this.ids[t].redirect_uri+"&callback="+this.ids[t].callback+"&providers="+this.ids[t].providers+"&fields="+this.ids[t].fields+"&optional="+this.ids[t].optional+"&othprov="+uLogin.ids[t].hidden,m=m+(uLogin.altway?"&altway=1":""),m=m+("&protocol="+uLogin.protocol),m=m+("&host="+uLogin.host),m=m+("&lang="+this.ids[t].lang),m=m+("&verify="+this.ids[t].verify);uLogin.initSocket(m,uLogin.ids[t].id,{style:{display:"inline-block",margin:"0",padding:"0",width:this.ids[t].providers.split(",").length*q+"px",height:p+"px",border:"0",overflow:"hidden"},frameBorder:"0",allowTransparency:"true"},t);if(this.ids[t].hidden){var q=this.ids[t].providers.split(","),i;for(i in this.providerNames){if(!q[i]){r=!1;break}}}else{r=!1}}else{r=!1}this.ids[t].providers?uLogin.ids[t].listener_id=uLogin.setStateListener(uLogin.ids[t].id,"ready",s):s()},initDrop:function(i){if(""!=this.ids[i].hidden){var h=document.createElement("div"),n=this.get(this.ids[i].id),m=uLogin.genID();if("other"==this.ids[i].hidden){for(var l=this.providerNames.slice(0),k=this.ids[i].providers.split(","),j=0;j<k.length;j++){l.splice(l.indexOf(k[j]),1)}this.ids[i].hidden=l.toString()}h.innerHTML='<div id = "'+m+'" style="position:absolute;z-index:9999;left:0;top:0;margin:0;padding:0;width:128px;height:'+(23*this.ids[i].hidden.split(",").length+-2)+'px;border:5px solid #666;border-radius:4px;visibility:hidden;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;"></div>';this.ids[i].hiddenW=h.firstChild;n.appendChild(this.ids[i].hiddenW);l="https://"+uLogin.uLoginHost+"/drop.html?id="+i+"&redirect_uri="+this.ids[i].redirect_uri+"&callback="+this.ids[i].callback+"&providers="+this.ids[i].hidden+"&fields="+this.ids[i].fields+"&optional="+uLogin.ids[i].optional+"&othprov="+uLogin.ids[i].providers;l+=uLogin.altway?"&altway=1":"";l+="&protocol="+uLogin.protocol;l+="&host="+uLogin.host;l+="&lang="+this.ids[i].lang;l+="&verify="+this.ids[i].verify;uLogin.initSocket(l,m,{style:{position:"relative",margin:"0",padding:"0",background:"#fff",width:"128px",height:23*this.ids[i].hidden.split(",").length-2+"px",border:"0",overflow:"hidden"},frameBorder:"0"},i);h.innerHTML='<div style="position:absolute;background:#000;left:82px;top:'+(23*this.ids[i].hidden.split(",").length-7)+'px;margin:0;padding:0;width:41px;height:13px;border:5px solid #666;border-radius:0px;text-align:center;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;"><a href="https://'+uLogin.uLoginHost+'/" target="_blank" style="display:block;margin:0px;width:41px;height:13px;background:url(https://'+uLogin.uLoginHost+'/img/text.png) no-repeat;"></a></div>';this.ids[i].hiddenW.appendChild(h.firstChild);h.innerHTML='<img src="https://'+uLogin.uLoginHost+'/img/link.png" style="width:8px;height:4px;position:absolute;z-index:9999;margin:0;padding:0;visibility:hidden"/>';this.ids[i].hiddenA=h.firstChild;n.appendChild(this.ids[i].hiddenA);this.ids[i].showed=!1;this.add(document.body,"click",function(e,d){d.target||(d.target=d.srcElement);for(var f=0;f<uLogin.ids.length;f++){d.target!=uLogin.ids[f].drop&&(uLogin.hide(uLogin.ids[f].hiddenW),uLogin.hide(uLogin.ids[f].hiddenA))}});uLogin.ids[i].hiddenW&&uLogin.ids[i].hiddenA&&(this.add(uLogin.ids[i].hiddenW,"mouseout",function(a,d){uLogin.dropdownDelayed(i,0)}),this.add(uLogin.ids[i].hiddenA,"mouseout",function(a,d){uLogin.dropdownDelayed(i,0)}),this.add(uLogin.ids[i].hiddenW,"mouseover",function(a,d){uLogin.clearDropTimer(i)}),this.add(uLogin.ids[i].hiddenA,"mouseover",function(a,d){uLogin.clearDropTimer(i)}))}},showDrop:function(g,f){if(uLogin.ids[g].hiddenW||uLogin.ids[g].hiddenA){if(uLogin.ids[g].showed||0==f){uLogin.ids[g].showed=!1,uLogin.hide(uLogin.ids[g].hiddenW),uLogin.hide(uLogin.ids[g].hiddenA)}else{uLogin.ids[g].showed=!0;var j,i,h=uLogin.ids[g].drop;j=0+h.offsetLeft;i=0+h.offsetTop;j-=h.scrollLeft;i-=h.scrollTop;uLogin.ids[g].hiddenW.style.left=j-(1==f?100:106)+"px";uLogin.ids[g].hiddenW.style.top=i+(1==f?21:37)+"px";uLogin.ids[g].hiddenA.style.left=j+(1==f?4:12)+"px";uLogin.ids[g].hiddenA.style.top=i+(1==f?17:33)+"px";uLogin.show(uLogin.ids[g].hiddenA);uLogin.show(uLogin.ids[g].hiddenW)}}},clearDropTimer:function(b){uLogin.ids[b].dropTimer&&window.clearTimeout(uLogin.ids[b].dropTimer)},dropdown:function(d,c){uLogin.clearDropTimer(d);uLogin.showDrop(d,c)},dropdownDelayed:function(d,c){uLogin.clearDropTimer(d);uLogin.ids[d].dropTimer=window.setTimeout(function(){uLogin.showDrop(d,c)},600)},initButtons:function(e,d){var f=uLogin.get(uLogin.ids[e].id);d=uLogin.is_encoded(d)?d.replace(/\//g,"%2F"):encodeURIComponent(d);uLogin._proceedChildren(f,uLogin._initButton,e,d);uLogin._changeState(e,uLogin.states[0]);uLogin.ids[e].done=!0},_proceedChildren:function(i,h,n,m){i=i.childNodes;var l,k;for(k=0;k<i.length;k++){var j=i[k];j.getAttribute&&(h(j,n,m),(l=j.getAttribute("data-uloginbutton")||j.getAttribute("x-ulogin-button"))&&!RegExp(l+"(,|$)","i").test(uLogin.ids[n].providers)&&(uLogin.ids[n].providers+=l+","));uLogin._proceedChildren(j,h,n,m)}},_initButton:function(h,g,l){var k=h.getAttribute("data-uloginbutton")||h.getAttribute("x-ulogin-button"),j;if(k&&-1<uLogin.providerNames.indexOf(k)){if((l.match(/^https/i)?"https":"http")!=uLogin.protocol){i=":";k=l.split(i);if(1==k.length){var i="%3A",k=l.split(i)}k.splice(0,1);l=uLogin.protocol+i+k.join(i)}uLogin.add(h,"mouseover",function(b){if(/disabled/.test(b.className)){return !1}var d=uLogin.ids[g].opacity;b.style.filter="alpha(opacity="+d+") progid:DXImageTransform.Microsoft.AlphaImageLoader(src=transparent.png, sizingMethod='crop')";b.style.opacity=parseFloat(d)/100});uLogin.add(h,"mouseout",function(d,c){if(/disabled/.test(d.className)){return !1}d.style.filter="";d.style.opacity=""});uLogin.add(h,"click",function(e,p){if(/disabled/.test(e.className)){return !1}var o=e.getAttribute("data-uloginbutton")||e.getAttribute("x-ulogin-button");if("webmoney"!=o&&"livejournal"!=o&&"openid"!=o){j="https://"+uLogin.uLoginHost+"/auth"}else{if(j="https://"+uLogin.uLoginHost+"/url",document.cookie){var c=new Date((new Date).getTime()-60);document.cookie="windows=; expires = "+c.toGMTString()+"; path=/";document.cookie="q=; expires = "+c.toGMTString()+"; path=/";document.cookie="q="+uLogin.ids[g].redirect_uri+"; path=/";document.cookie="window=3; path=/"}}j+=".php?name="+o+"&window=3&lang="+uLogin.lang+"&fields="+uLogin.ids[g].fields+"&host="+uLogin.host+(uLogin.altway?"&altway=1":"")+"&optional="+uLogin.ids[g].optional+"&redirect_uri="+uLogin.ids[g].redirect_uri+"&verify="+uLogin.ids[g].verify+"&callback="+uLogin.ids[g].callback+"&screen="+screen.width+"x"+screen.height+"&providers="+uLogin.ids[g].providers.substr(0,uLogin.ids[g].providers.length-1)+"&q="+l;uLogin._changeState(g,uLogin.states[1]);if(uLogin.altway){location.href=j}else{var b=window.open(j,"uLogin","width=800,height=600,left="+(screen.width-800)/2+",top="+(screen.height-600)/2),q=window.setInterval(function(){b&&b.closed&&(window.clearInterval(q),uLogin._changeState(g,uLogin.states[0]))},100)}})}},checkCurrentWidgets:function(){for(var d=0;uLogin.ids[d];){var c=uLogin.ifMobileSetMobile(uLogin.ids[d].type);"window"==c?uLogin.initWindow(d):"buttons"==c?uLogin.ids[d].done||uLogin.initButtons(d,"undefined"!=typeof query&&"undefined"!=typeof query.receiver?query.receiver:uLogin.ids[d].redirect_uri):"mobile"==c?uLogin.ids[d].done||uLogin.initMobile(d):(c=uLogin.get(uLogin.ids[d].id))&&!c.getElementsByTagName("iframe").length&&uLogin.ids[d].done&&uLogin.initWidget(uLogin.ids[d].id);d++}},easyXDMadd:function(){if(!uLogin.easyxdmDone){var b=document.createElement("script");b.src="//"+uLogin.uLoginLocalHost+"/images/ulogin/easyXDM.min.js";document.body.appendChild(b);uLogin.easyxdmDone=!0}},getWidget:function(e,d){if("undefined"!=typeof uLogin.widgetSettings[e]){uLogin.widgetSettings[e]?uLogin.setWidgetProperties(d,uLogin.ids.length,uLogin.widgetSettings[e]):setTimeout(function(){uLogin.getWidget(e,d)},500)}else{if("undefined"!=typeof easyXDM){uLogin.widgetSettings[e]=!1;var f=new easyXDM.Socket({remote:"https://"+uLogin.uLoginHost+"/test/getwidget.php?widgetid="+e,swf:uLogin.isIE()?"https://"+uLogin.uLoginHost+"/js/easyxdm.swf":"",onMessage:function(c){if(c&&(c=JSON.parse(c),"undefined"!=typeof c.display)){if("window"==c.display){var b=document.createElement("img");b.setAttribute("src","//"+uLogin.uLoginLocalHost+"/images/ulogin/button.png");b.setAttribute("style","cursor:pointer; width:187px; height:30px");b.setAttribute("alt","\u041c\u0443\u043b\u044c\u0442\u0438\u0412\u0445\u043e\u0434");document.getElementById(d).appendChild(b)}var b=uLogin.parse(document.getElementById(d).getAttribute("data-ulogin")),a;for(a in b){c[a]=b[a]}uLogin.setWidgetProperties(d,uLogin.ids.length,c);uLogin.widgetSettings[e]=c;f.destroy()}}})}else{setTimeout(function(){uLogin.getWidget(e,d)},100)}}},customInit:function(){uLogin.extraction.disabled=!0;for(var d=0;d<arguments.length;d++){var c=uLogin.get(arguments[d]);if(!c||!arguments[d]){return console.log('uLogin ERROR (customInit): Element with ID="'+arguments[d]+'" not found'),!1}uLogin.addWidget(c)}},checkAsyncWidgets:function(){var b=uLogin.get("ulogin")||uLogin.get("uLogin");b&&b.id&&(uLogin.addWidget(b),clearInterval(uLogin.asyncCheckID))},setStateListener:function(f,e,h){var g=!1;f=uLogin.getWidgetNumber(f);if(!isNaN(f)&&uLogin.ids[f]){switch(e){case"ready":g=uLogin.ids[f].ready_func.push(h);break;case"receive":g=uLogin.ids[f].receive_func.push(h);break;case"open":g=uLogin.ids[f].open_func.push(h);break;case"close":g=uLogin.ids[f].close_func.push(h)}}return g-1},removeStateListener:function(e,d,f){e=uLogin.getWidgetNumber(e);if(!isNaN(e)&&-1<uLogin.states.indexOf(f)){switch(f){case"ready":uLogin.ids[e].ready_func.length>=d&&uLogin.ids[e].ready_func.splice(d,1);break;case"receive":uLogin.ids[e].receive_func.length>=d&&uLogin.ids[e].receive_func.splice(d,1);break;case"open":uLogin.ids[e].open_func.length>=d&&uLogin.ids[e].open_func.splice(d,1);break;case"close":uLogin.ids[e].close_func.length>d&&uLogin.ids[e].close_func.splice(d,1)}}},_changeState:function(e,d){if(uLogin.ids[e]){uLogin.ids[e].state=d;var f=0;switch(d){case"ready":for(;uLogin.ids[e].ready_func[f];){uLogin.ids[e].ready_func[f](),f++}break;case"receive":for(;uLogin.ids[e].receive_func[f];){uLogin.ids[e].receive_func[f](),f++}break;case"open":for(;uLogin.ids[e].open_func[f];){uLogin.ids[e].open_func[f](),f++}break;case"close":for(;uLogin.ids[e].close_func[f];){uLogin.ids[e].close_func[f](),f++}}}}};String.prototype.trim||(String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")});-1==uLogin.supportedLanguages.indexOf(uLogin.lang)&&(uLogin.lang=uLogin.supportedLanguages[0]);uLogin.init("undefined"!=typeof uLogin_query?uLogin_query:"");uLogin.asyncCheckID=setInterval(function(){uLogin.checkAsyncWidgets()},20);setTimeout(function(){uLogin.checkCurrentWidgets();setTimeout(arguments.callee,500)},10)}function receiver(d,c){window[c](d)}function redirect(f,e){var h=document.createElement("form");h.action=decodeURIComponent(e);h.method="post";h.target="_top";h.style.display="none";var g=document.createElement("input");g.type="hidden";g.name="token";g.value=f;h.appendChild(g);document.body.appendChild(h);h.submit()};