<?php

require_once "../conectar.php";

session_start();

$emailAntigo = $_SESSION['emailEntregador'];

$nome = $_POST['entregador'];
$cpf = $_POST['cpf'];
$transporte = $_POST['veiculo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "UPDATE Entregador SET nomeEntregador='$nome', CPFEntregador='$cpf', transporte = '$transporte',emailEntregador='$email', senhaEntregador='$senha_hash' WHERE emailEntregador='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailEntregador'] = $email;

header("Location: sessao-entregador.php");
exit;

?>