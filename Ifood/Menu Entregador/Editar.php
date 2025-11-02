<?php

require_once "../Conexao.php";

session_start();

$emailAntigo = $_SESSION['emailEntregador'];

$nome = $_POST['entregador'];
$cpf = $_POST['cpf'];
$transporte = $_POST['veiculo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "UPDATE Entregador SET nomeEntregador='$nome', CPFEntregador='$cpf', transporte = '$transporte',emailEntregador='$email', senhaEntregador='$senha' WHERE emailEntregador='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailEntregador'] = $email;

header("Location: TelaEntregador.php");
exit;

?>