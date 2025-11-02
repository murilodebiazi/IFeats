<?php

require_once "../Conexao.php";

session_start();

$emailAntigo = $_SESSION['emailCliente'];

//pegar o nome do produto
$nome = $_POST['cliente'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "UPDATE Cliente SET nomeCliente='$nome', CPFCliente='$cpf', telefoneCliente='$telefone', emailCliente='$email', senhaCliente='$senha' WHERE emailCliente='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailCliente'] = $email;

header("Location: TelaCliente.php");
exit;

?>