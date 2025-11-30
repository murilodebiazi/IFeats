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

$sql = "UPDATE Entregador SET nomeEntregador=?, CPFEntregador=?, transporte=?, emailEntregador=?, senhaEntregador=? WHERE emailEntregador=?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssss", $nome, $cpf, $transporte, $email, $senha_hash, $emailAntigo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    $_SESSION['emailEntregador'] = $email;
    header("Location: sessao-entregador.php");
    exit;
} else {
    echo "Erro na preparação da query: " . mysqli_error($conexao);
}

?>