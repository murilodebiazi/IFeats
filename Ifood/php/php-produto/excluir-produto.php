<?php
require_once "../conectar.php";

session_start();

$idProduto = $_GET['id'];

$sql = "DELETE FROM Produto WHERE idProduto = '$idProduto'";
mysqli_query($conexao, $sql);
mysqli_close($conexao);

header("Location: listar-produtos.php")
?>