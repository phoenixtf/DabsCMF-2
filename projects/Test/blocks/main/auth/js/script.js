var uLoginCallback;
var lib = lib || {};

lib.pwdFocus = function(target, faketarget){
	$(faketarget).hide();
	$(target).show();
	$(target).focus();
};

lib.pwdBlur = function(target, faketarget){
	if ($(target).val() == '') {
		$(target).hide();
		$(faketarget).show();
	}
};

lib.phoneFocus = function(target, faketarget){
	$(faketarget).hide();
	$(target).show();
	$(target).focus();
};

lib.phoneBlur = function(target, faketarget){
	var s = $(target).val();
	if (s == '' || s == '+7 (___) ___-__-__' || s.indexOf('_') != -1) {
		$(target).hide();
		$(faketarget).show();
	}
};

lib.showPopupLoader = function (dir, targetWrapper, targetLoader, callback) {
	var wrap = $(targetWrapper);
	var loader = $(targetLoader);
	if (dir) {
		wrap.addClass('disabled');
		loader.fadeIn(200, 'easeInOutExpo', function(){if(typeof callback == 'function') callback();});
	} else {
		loader.fadeOut(750, 'easeInOutExpo', function(){
			wrap.removeClass('disabled');
			if(typeof callback == 'function') callback();
		});
	}
};

/* msg print */
lib.msgPrint = function(target, txt, fade) {
	$(target).hide().html(txt).show();
	if(fade)
		$(target).stop(true, true).show().fadeOut((typeof fade == 'number') ? fade : 15000,'easeInOutExpo');
};

lib.blockPopup = function(obj, trig, targetOuter, targetInner, targetError, targetSuccess, exitCallback, enterCallback){
	var objHtml = '';
	if(typeof obj == 'string') {
		objHtml = obj;
	} else if(typeof obj == 'object'){
		if (!obj[0]) return;
		objHtml = $('<div>').append($(obj).clone()).html(); // .outerHTML simulation
	}
	var typeTargetInner = (targetInner[0] == '.') ? '.' : '#';
	var typeTargetOuter = (targetOuter[0] == '.') ? '.' : '#';
	if(targetInner[0] == '.' || targetInner[0] == '#') targetInner = targetInner.substring(1);
	if(targetOuter[0] == '.' || targetOuter[0] == '#') targetOuter = targetOuter.substring(1);

	if(!$(typeTargetInner + targetInner).length){
		var authWin = "\
		<div " + ((typeTargetInner == "#")? "id" : "class") + "='" + targetInner + "'>\
			<div " + ((typeTargetOuter == "#")? "id" : "class") + "='" + targetOuter + "'>\
				<div class='cancel' title='Закрыть'></div>\
				<div style='display:none;' class='loader disabled'>Секундочку..</div>\
				 <div class='wrapper'>" + objHtml + "</div>\
			</div>\
		</div>";
		authWin = $(authWin);
		$(document.body).append(authWin);

		authWin.find('.wrapper').children().css({'display':'block'});
		if(typeof obj == 'object') {
			obj.remove();
		}
	} else {
		$(typeTargetInner + targetInner + ' .wrapper').html(objHtml);
	}

	// trigger for show win
	if(trig == true){
		showWin();
	} else if($(trig)){
		$(trig).click(function(event){
			showWin();
			return false;
		});
	}

	$(typeTargetOuter + targetOuter + ' .cancel').unbind('click').bind('click',function(){
		$(typeTargetInner + targetInner).css('display', 'none');
		$('.ui-menu').removeClass('fixed');
		if(typeof exitCallback == 'function') exitCallback();
	});


	function showWin(){
		if (targetError != '')
			$(targetError).stop(true, true).text('');
		if (targetSuccess != '')
			$(targetSuccess).stop(true, true).text('');
		$(typeTargetInner + targetInner).css('height', $(document).height());
		$(typeTargetInner + targetInner).css({display: 'block'});
		$(typeTargetOuter + targetOuter).css({
			display:'block',
			opacity:0,
			top: $(window).height()/2-$(typeTargetOuter + targetOuter).height()/2+parseInt($(document.body).scrollTop(), 10),
			left: $(window).width()/2-$(typeTargetOuter + targetOuter).width()/2
		});
		$(typeTargetOuter + targetOuter).css('opacity', 1);
		if(typeof enterCallback == 'function') enterCallback();
		//lib.smoothScrollPage($($(typeTargetInner + targetInner)), 400, 300);
	}
};

(function($){
	$(function(){
		uLoginCallback = function(token){
			$.ajax({
				url			: 'https://u-login.com/token.php',
				type		: 'GET',
				cache		: true,
				beforeSerialize: lib.showPopupLoader(true, '#authPopup .wrapper', '#authPopup .loader'),
				dataType	: 'jsonp',
				data		: {'token': token, 'host': document.domain}, /*encodeURIComponent(location.toString())*/
				success: function(jqXHR){
					uLoginAuthAjax(jqXHR);
				},
				error: function(textStatus) {
					// textStatus in: error, timeout, abort, parsererror
					lib.msgPrint('.authErrorUlogin', 'Произошла ошибка запроса к серверу, <br/> попробуйте еще раз позже', false);
				}
			});
		};

		function uLoginAuthAjax(data, source) {
			$.ajax({
				url: '/block.auth/',
				type: 'POST',
				dataType: 'json',
				cache: true,
				data: {
					'phone': data.phone,
					'mail': data.email,
					'ulogin': true
				},
				success: function(data) {
					if (resp.block.vars.errors) {
						$('.authErrorAll').html(resp.block.vars.errors.join('<br/>'));
					} else {
						$('.authErrorAll').html(resp.fuser.props.firstname.value);
					}
				},
				complete: lib.showPopupLoader(false, '#authPopup .wrapper', '#authPopup .loader')
			});
		}


		lib.blockPopup($('#authWrapper'), $('#authLoginButton'), 'authPopup', 'authWin', '.authError', '',
			function() { // возвращаем закрытую форму в исх. состояние
				var authPopup = $('#authPopup');
				if(authPopup.find('.authHidden').length != 0) {
					authPopup.find('.wrapper').remove();
					authPopup.height(340);
					authPopup.find('.authHidden').removeClass('authHidden').addClass('wrapper');
				}
			}
		);
//		$('#frontLoginPhone').mask('+7 (999) 999-99-99');

		$('#frontAuth').submit(function(){
			$.ajax({
				url:"/block.auth/",
				dataType: "json",
				data:{
					mods:{
						view:['ajax']
					},
					phone: $(this).find('input[name=phone]').val(),
					mail: $(this).find('input[name=mail]').val(),
					password: $(this).find('input[name=password]').val()
				},
				success:function(resp){
					var errors = [];
					if (resp.status == "ok") {
						if (resp.block.vars.errors) {
							errors.push(resp.block.vars.errors.join('<br/>'));
						} else {
							if (!resp.block.vars.fuser) {
								errors.push("Неверные реквизиты входа.");
							} else {
								// Auth done
								errors.push(resp.block.vars.fuser.firstname);
							}
						}
					} else {
						errors.push('Ошибка запроса.');
					}

					$('.authErrorAll').html(errors);
				},
				error:function(resp){
					$('.authErrorAll').html('Ошибка на сервере.');
					$('<div>'+resp.responseText+'</div>').dialog();
				}
			});
			return false;
		})
	});
})(jQuery);