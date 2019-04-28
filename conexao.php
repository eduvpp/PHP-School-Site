<?php
	try{
		$conexao = new PDO('mysql:host=localhost;dbname=ep2018_escola_db_cms','ep201_root','3scol@2018');
		$conexao->exec("set names utf8");
	}catch(PDOException $e){
		echo "Erro ao conectar com o banco de dados";
	}
?>