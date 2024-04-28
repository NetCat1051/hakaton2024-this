<?
	if(!isset($_GET["key"]))
	{
		return;
	}

	$Data = Mysql("SELECT * FROM `regs` WHERE `key` = '".$_GET["key"]."'")->fetch_assoc();
	if($Data != null)
	{
		Mysql("INSERT INTO `users` (`login`, `pass`, `fio`) VALUES ('".$Data["login"]."', '".$Data["pass"]."', '".$Data["fio"]."')");
		Mysql("DELETE FROM `regs` WHERE `key` = '".$_GET["key"]."'");
	}

?>
<style>
	content.vote .votemenu
{
    display: none;
    position: absolute;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    background-color: #00000011;
    transition: .4s;
}

content.vote .votemenu.active
{
    display: block;
    backdrop-filter: blur(5px);
    background-color: #4848484d;
}

content.vote .votemenu .block
{
	margin-top: 10%;
	width: 340px;
	height: 140px;
	background-color: #52949D;
	margin-left: auto;
	margin-right: auto;
	border-radius: 6px;
	padding: 10px;
	padding-left: 40px;
	padding-right: 40px;
}

content.vote .votemenu .block .title
{
	text-align: center;
	color: #fff;
	font-size: 24px;
}
</style>
<content class="vote">
	<div class="title">
		Вы успешно зарегистрировались
	</div>
</content>