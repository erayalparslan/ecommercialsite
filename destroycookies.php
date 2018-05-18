<?php
	if(isset($_COOKIE["username"])){
		//unset($_COOKIE["username"]);
		setcookie("username", '', -1);
	
		//unset($_COOKIE["password"]);
		setcookie("password", '', -1);
	
		header("Location: index.php");
	}
?>