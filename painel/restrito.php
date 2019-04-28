<?php
	if (!isset($_SESSION['usuario']) AND !isset($_SESSION['senha'])) {
		header("Location: login/");exit;
	}