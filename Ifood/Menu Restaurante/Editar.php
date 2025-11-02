<?php

require_once "../Conexao.php";

session_start();

$emailAntigo = $_SESSION['emailRestaurante'];

$nome = $_POST['Restaurante'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$endereco = $_POST['endereço'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "UPDATE Restaurante SET nomeRestaurante='$nome', cnpj = '$cnpj' , emailRestaurante='$email', enderecoRestaurante= '$endereco' , telefoneRestaurante='$telefone', senhaRestaurante='$senha' WHERE emailRestaurante='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailRestaurante'] = $email;

header("Location: TelaRestaurante.php");
exit;

?>