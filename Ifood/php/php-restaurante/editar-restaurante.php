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

$sql = "UPDATE Restaurante SET nomeRestaurante=?, cnpj =?, emailRestaurante=?, enderecoRestaurante=?, telefoneRestaurante=?, categoria=?, descricao=?, senhaRestaurante=? WHERE emailRestaurante=?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssssss", $nome, $cnpj, $email, $endereco, $telefone, $categoria, $descricao, $senha_hash, $emailAntigo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    $_SESSION['emailRestaurante'] = $email;
    header("Location: sessao-restaurante.php");
    exit;
} else {
    echo "Erro na preparação da query: " . mysqli_error($conexao);
}
?>