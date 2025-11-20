<?php

session_start();
require_once "../conectar.php";

$idProduto = $_POST['idProduto'];
$nome = $_POST['produto'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$estoque = $_POST['estoque'];

$sql = "UPDATE Produto SET nomeProduto='$nome', preco='$preco', descricao='$descricao', categoria='$categoria', emEstoque='$estoque' WHERE idProduto='$idProduto'";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para o formulario de cadastro e passar parametro ok por GET

header("Location: listar-produtos.php?status=ok");
exit;
?>