<div class="lcabSubmit">
	<?if(!empty($this->vars["fuser"])){?>
	<a class="toolbar__link" href="/cabinet/"><span class="toolbar__icon toolbar__icon_type_authorisation"></span><?=$this->vars["fuser"]->props->firstname->get()?><?if(!empty($this->vars["fuser"]->props->lastname)){?> <?=$this->vars["fuser"]->props->lastname->get()?><?}?></a>&nbsp;<a href="/cabinet/#newsnotify" class="newsNotify"></a>
	<?}else{?>
		<a class="toolbar__link toolbar__link_underline_dashed" href="/cabinet/" id="authLoginButton"><span class="toolbar__icon toolbar__icon_type_authorisation"></span>Войти</a> / <a class="toolbar__link toolbar__link_underline_dashed" href="/cabinet/" id="authRegButton">Регистрация</a>
	<?}?>


	<div id="authWrapper" style="display:none">
		<p class="top">Вход <span>/</span> <a class="reg" href="javascript:void(0)">Регистрация</a><br/></p>
		<form id="frontAuth" method="get" action="/">

			<div class="frontLoginRow">
				<input class="frontLoginTextInput" id="frontLoginFakePhone" type="text" style="" value="Ваш телефон" onfocus="lib.phoneFocus('#frontLoginPhone', '#frontLoginFakePhone');" />
				<input class="frontLoginTextInput" id="frontLoginPhone" type="text" name="phone" style="display:none" value="" onblur="lib.phoneBlur('#frontLoginPhone','#frontLoginFakePhone');$(this).attr('tabindex', 1)" onfocus="$(this).attr('tabindex', 1)" />
				<span class="authError authErrorPhone">&nbsp;</span>
			</div>

			<div class="frontLoginTitle">или</div>
			<div class="frontLoginRow">
				<input class="frontLoginTextInput" id="frontLoginFakeMail" type="text" style="" value="e-mail" onfocus="lib.pwdFocus('#frontLoginMail', '#frontLoginFakeMail');" />
				<input class="frontLoginTextInput" id="frontLoginMail" type="text" name="mail" style="display:none" value="" onblur="lib.pwdBlur('#frontLoginMail', '#frontLoginFakeMail');$(this).attr('tabindex', 1)" onfocus="$(this).attr('tabindex', 1)" />
				<span class="authError authErrorMail">&nbsp;</span>
			</div>

			<div>
				<span class="authError authErrorContact">&nbsp;</span>
			</div>
			<div class="frontLoginTitleB">Пароль (<a class="recPassLink" href="javascript:void(0)">забыли пароль?</a>)</div>
			<div class="frontLoginRow">
				<input class="frontLoginTextInput" id="frontLoginPass" type="password" name="password" value="" tabindex="2" /><br />
				<span class="authError authErrorPassword">&nbsp;</span>
			</div>
			<div class="frontLoginCheckRow">
				<label for="remember"><input id="remember" type="checkbox" tabindex="3" name="remember" checked="checked"/>&nbsp;запомнить</label>
			</div>
			<div class="frontLoginButBox frontLoginRow">
				<input class="frontLoginBut" type="submit" value="вход" tabindex="4" />
				<br />
				<span class="authError authErrorAll">&nbsp;</span>

				<input type="hidden" name="cp" value="" />
			</div>
		</form>
		<p class="bottom">Вход через соцсети</p>
		<a href="#" id="uLogin" x-ulogin-params="display=window;fields=first_name,last_name,phone,email;optional=sex,photo,photo_big,city,country;callback=uLoginCallback;redirect_uri=/block.auth/"><img src="/images/ulogin/button.png" width="187" height="30" alt="МультиВход" /></a>
		<br />
		<span class="authError authErrorUlogin">&nbsp;</span>
	</div>
</div>