<?php
include("../../templates/conexao.php");
session_start();
if (!isset($_SESSION['block'])) {
  $_SESSION['block'] = 1;
}

$email = (isset($_POST['email']) ? $_POST['email'] : null);
$senha = md5((isset($_POST['senha']) ? $_POST['senha'] : null));


if (!empty($email) and !empty($senha)) {

  $consulta = $conexao->prepare("SELECT * FROM tb_usuarios WHERE senha = :senha AND email = :email ");
  $consulta->bindValue(":email", $email);
  $consulta->bindValue(":senha", $senha);

  $consulta->execute();
  //Consulta o banco se o usuario existe por meio da clausula 'WHERE', se existir, o rowCount irá receber 1 e ira entrar na 2º condição
  $verif = $consulta->rowCount();
  $dados = $consulta->fetch(PDO::FETCH_OBJ);


  if ($verif) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    if ($dados->email === $email and $dados->senha === $senha and $dados->condicao == 0) {
      console.log("entrou");
      header("location: ../?pg=inicio");
    } else {
      $_SESSION['block'] = $_SESSION['block'] + 1;
      $_SESSION['cont'] = $_SESSION['block'];
      if ($_SESSION['block'] >= 4) {
        $a = 1;

        $stmt = $conexao->prepare("UPDATE tb_usuarios SET condicao=:condicao  WHERE email=:email");

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':condicao', $a);
        $stmt->execute();


        $_SESSION['block'] = $_SESSION['block'] - 4;
      }
      console.log("Senha errada")
      header("Location: login.php");
    }
  } else {
    $_SESSION['block'] = $_SESSION['block'] + 1;
    echo $_SESSION['block'];
    if ($_SESSION['block'] >= 4) {
      $a = 1;

      $stmt = $conexao->prepare("UPDATE tb_usuarios SET condicao=:condicao  WHERE email=:email");

      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':condicao', $a);
      $stmt->execute();


      $_SESSION['block'] = $_SESSION['block'] - 4;
    }
    header("Location: login.php");
  }
} else {
  header("Location: login.php");
}
