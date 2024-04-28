<?
	$Data = Mysql("SELECT `name` FROM `ways`")->fetch_all();
	echo json_encode($Data);
?>