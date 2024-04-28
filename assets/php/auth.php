<?
	function User($Key)
	{
		return $_SESSION["user"][$Key];
	}

	function CheckActive()
	{
		return isset($_SESSION["user"]);
	}

	if(isset($_GET["page"]))
	{
		if($_GET["page"] == "logout")
		{
			$_SESSION["user"] = null;
			echo "<script>window.location.href = 'https://ht.rzce.ru/main'</script>";
			exit;
		}
	}

	if(isset($_GET["auth"]))
	{
		if(isset($_GET["slogin"]) && isset($_GET["pass"]))
		{
			$Data = Mysql("SELECT * FROM `users` WHERE `login` = '".$_GET["slogin"]."' AND `pass` = '".$_GET["pass"]."'")->fetch_assoc();
			
			if($Data != null)
			{
				$_SESSION["user"] = $Data;
				echo ReturnData([
					"return" => 1001
				]);
			}
			else
			{
				echo ReturnData([
					"return" => 204
				]);
			}
		}
		else
		{
			echo ReturnData([
				"return" => 900
			]);
		}

		exit;
	}	
?>