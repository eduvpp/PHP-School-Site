<?php 
	session_start();
	if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {

		header("Location: login/login.php");
	}
 ?>