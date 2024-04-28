<?
    Mysql("UPDATE `ways` SET `votes` = votes + ".$_GET["votes"]." WHERE `id` = '".$_GET["region"]."'");
?>