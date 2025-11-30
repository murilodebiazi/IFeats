<?php

require_once "../conectar.php";

session_start();

$emailAntigo = $_SESSION['emailCliente'];

$nome = $_POST['cliente'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "UPDATE Cliente SET nomeCliente=?, CPFCliente=?, telefoneCliente=?, emailCliente=?, enderecoCliente=?, senhaCliente=? WHERE emailCliente=?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssss", $nome, $cpf, $telefone, $email, $endereco, $senha_hash, $emailAntigo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    $_SESSION['emailCliente'] = $email;
    header("Location: sessao-cliente.php");
    exit;
} else {
    echo "Erro na preparação da query: " . mysqli_error($conexao);
}


?>