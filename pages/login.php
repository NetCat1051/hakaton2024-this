<?
	
?>

<content class="login">
	<div id="logblock" class="block">
		<div class="title">
			Авторизация
		</div>
		<div class="subtitle">
			Логин
		</div>
		<input id="l" class="textarea" type="login" size="40">
		<div class="subtitle">
			Пароль
		</div>
		<input id="p" class="textarea" type="password" size="40">
		<div style="display: flex;justify-content: space-between;">
			<div class="restore">
				Забыли пароль?
			</div>
			<div class="sendbutton" onclick="SendAuth(this)">
				Авторизоваться
			</div>
		</div>
	</div>
</content>