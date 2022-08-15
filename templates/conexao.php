<?php
try {
	$conexao = new PDO('mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_a70e0523a5be900', 'b4f8af815d73ba', '07308cf8');
	$conexao->exec("set names utf8");
} catch (PDOException $e) {
	echo "Erro ao conectar com o banco de dados";
}
