<?php

require_once "../conectar.php";

session_start();

$emailAntigo = $_SESSION['emailRestaurante'];

$nome = $_POST['Restaurante'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$endereco = $_POST['endereço'];
$telefone = $_POST['telefone'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$senha = $_POST['senha'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "UPDATE Restaurante SET nomeRestaurante='$nome', cnpj = '$cnpj' , emailRestaurante='$email', enderecoRestaurante= '$endereco' , telefoneRestaurante='$telefone', categoria='$categoria', descricao='$descricao', senhaRestaurante='$senha_hash' WHERE emailRestaurante='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailRestaurante'] = $email;

header("Location: sessao-restaurante.php");
exit;
?>