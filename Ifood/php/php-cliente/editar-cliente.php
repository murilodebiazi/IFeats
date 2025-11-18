<?php

require_once "../conectar.php";

session_start();

$emailAntigo = $_SESSION['emailCliente'];

$nome = $_POST['cliente'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_hash = password_hash($senha,PASSWORD_DEFAULT);
$sql = "UPDATE Cliente SET nomeCliente='$nome', CPFCliente='$cpf', telefoneCliente='$telefone', emailCliente='$email', senhaCliente='$senha_hash' WHERE emailCliente='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailCliente'] = $email;

header("Location: sessao-cliente.php");
exit;

?>