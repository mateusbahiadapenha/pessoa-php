<?php 

require_once "dml.php";

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$loginpessoa = $_POST['login'];
$loginSenha = $_POST['senha-login'];

$user = new dml;
$user->cadastroPessoa($nome,$rg,$cpf,$email,$senha);
$user->idPessoa($loginpessoa,$loginSenha);
header("Location: index.php");

 ?>

 ?>