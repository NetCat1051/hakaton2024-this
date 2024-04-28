<?
PrintErrors();
	require_once("assets/php/third-party/smtp.mailru.php");
	function RandomString($Size)
	{
		$RandWords = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$String = "";
		for ($i = 0; $i < $Size; $i++)
		{
			$String .= $RandWords[random_int(0, strlen($RandWords) - 1)];
		}
		return $String;
	}

	$Key = RandomString(64);

	Mysql("INSERT INTO `regs` (`key`, `login`, `pass`, `fio`, `time`) VALUES ('".$Key."', '".$_GET["slogin"]."', '".$_GET["pass"]."', '".$_GET["fio"]."', '".time()."')");
	$mailSMTP = new Smtp_mailru("callback@tfw.su", "nVuynEJy7MVWM1kcZJar", "ssl://smtp.mail.ru", 465, "UTF-8");
	$result = $mailSMTP->send($_GET["email"], "Регистрация на сайте TurPopov", "Так значетсЪ, перейдите по ссылке, чтобы активировать ваш профиль.\\https://ht.rzce.ru/ch&key=".$Key, array("bot", "callback@tfw.su")); 
?>