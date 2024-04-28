<?
	$CFG = [
		"title" => "TurPopov :: Главная страница",
		"db" => ["localhost", "cfb7910i_ht", "Ezki4*mJ", "cfb7910i_ht"],
		"access" => [
			"78.31.74.149"
		]
	];

	if(in_array($_SERVER['HTTP_X_FORWARDED_FOR'], $CFG["access"]))
	{
		header("Location: https://cardpanel.rzce.ru/error");
		exit;
	}

	function SetBackGround($Img)
	{
		echo "<script>SetBackground('".$Img."')</script>";
	}

	include "assets/php/error.php";
	include "assets/php/mysql.php";
	session_start();
	include "assets/php/auth.php";

	function GetYearName($Number, $Years)
	{
		$cases = array(2, 0, 1, 1, 1, 2);
		return $Years[($Number % 100 > 4 && $Number % 100 < 20) ? 2 : $cases[min($Number % 10, 5)]];
	}

	function LoadPage($Page)
	{
		$FilePath = "assets/css/".$Page.".css";
		if(file_exists($FilePath))
		{
			echo "<style>".file_get_contents($FilePath)."</style>";
		}

		include "pages/".$Page.".php";
	}

	if(!isset($_GET["page"]))
	{
		header("Location : https://ht.rzce.ru/main");
	}

	if((isset($_GET["page"]) && isset($_GET["loadpage"])) || $_GET["page"] == "api")
	{
		LoadPage($_GET["page"]);
		exit;
	}
?>

<html>
	<head>
		<title><?=$CFG["title"]?></title>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="assets/js/main.js?<?=time()?>"></script>
		<link rel="stylesheet" href="assets/css/main.css?<?=time()?>">
	</head>
	<body>
		<?if($_GET["page"] != "error"):?>
		<topbar>
			<div class="button" onclick="LoadPage('main')">Главное меню</div>
			<?if(CheckActive()):?>
				<div class="button button_right" onclick="LoadPage('lk')">Личный кабинет</div>
			<?else:?>
				<div class="button button_right" onclick="LoadPage('login')">Авторизоваться</div>
			<?endif;?>
			<div class="button" onclick="LoadPage('vote')">Голосование</div>
		</topbar>
		<?endif;?>
		<mainpage>
			<?
				if(!isset($_GET["loadpage"]))
				{
					SetBackGround("bg".random_int(1, 3));
					LoadPage($_GET["page"]);
				}
			?>
			<div id="notifications"></div>
		</mainpage>
	</body>
</html>