<?
	
?>

<content class="reg">
	<div id="regblock" class="block">
		<div class="title">
			Регистрация
		</div>
		<div class="subtitle">
			Номер телефона
		</div>
		<input id="t" class="textarea" type="tel"/>
		<div class="subtitle">
			Почта
		</div>
		<input id="e" class="textarea" type="email" size="40">
		<div class="subtitle">
			ФИО
		</div>
		<input id="f" class="textarea" type="text" size="40">
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
			<div class="sendbutton" onclick="OpenPhone()">
				Продолжить
			</div>
		</div>
	</div>
	<div id="accessblock" class="block">
		<div class="title">
			Регистрация
		</div>
		<img class="phone" src="img/phone.png">
		<div class="subtitle">
			Введите код из SMS
		</div>
		<input id="c" class="textarea" type="password" size="6">
		<div style="display: flex;justify-content: space-between;">
			<div class="restore">
				Забыли пароль?
			</div>
			<div class="sendbutton" onclick="SendReg()">
				Зарегистрироваться
			</div>
		</div>
	</div>
</content>