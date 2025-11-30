<?php

session_start();
require_once "../conectar.php";

$nome = $_POST['produto'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$estoque = $_POST['estoque'];
$idProduto = $_POST['idProduto'];

$sql = "UPDATE Produto SET nomeProduto=?, preco=?, descricao=?, categoria=?, emEstoque=? WHERE idProduto=?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssss", $nome, $preco, $descricao, $categoria, $estoque, $idProduto);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    header("Location: listar-produtos.php?status=ok");
    exit;
} else {
    echo "Erro na preparação da query: " . mysqli_error($conexao);
}
?>