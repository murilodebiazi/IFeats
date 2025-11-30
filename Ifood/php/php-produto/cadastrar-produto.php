<?php

session_start();
require_once "../conectar.php";

$nome = $_POST['produto'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$estoque = $_POST['estoque'];

$email = $_SESSION['emailRestaurante'];
$sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
$resultado = $conexao->query($sql);
$linha = $resultado->fetch_assoc();

$idRestaurante = $linha['idRestaurante'];

$sql = "INSERT INTO Produto (nomeProduto, preco, descricao, categoria, emEstoque, idRestaurante) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssss", $nome, $preco, $descricao, $categoria, $estoque, $idRestaurante);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    header("Location: form-cadastrar-produto.php?status=ok");
    exit();
} else {
    echo "Erro na preparação da query: " . mysqli_error($conexao);
}
?>