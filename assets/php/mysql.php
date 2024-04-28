<?
PrintErrors();
	function Mysql($Request)
	{
		global $CFG;
		$conn = new mysqli($CFG["db"][0], $CFG["db"][1], $CFG["db"][2], $CFG["db"][3]);
		return $conn->query($Request);
	}
?>