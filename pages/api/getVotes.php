<?
	$Data = Mysql("SELECT `name`, `votes` FROM `ways` WHERE `votes` > '0'")->fetch_all();
	echo json_encode($Data);
?>