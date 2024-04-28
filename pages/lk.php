<?
	if(!CheckActive()){header("Location: https://ht.rzce.ru/login");exit;}
	$YOld = floor((time() - User("bd")) / 3.154e+7);
	SetBackGround("bg2");
?>

<content class="lk">
	<div class="avatar">
		<img src="https://avatars.akamai.steamstatic.com/2ad37f5c2f1608226eac84792b6bedad67d378d7_full.jpg">
		<div class="name"><?=User("fio")?><div class="year"><?=$YOld." ".GetYearName($YOld, ["Год", "Лет", "Года"])?></div></div>
		<div class="logout" onclick="LoadPage('logout')">Выйти из аккаунта</div>
	</div>
</content>