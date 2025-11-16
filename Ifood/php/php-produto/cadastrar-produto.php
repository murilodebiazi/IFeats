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

$sql = "INSERT INTO Produto (nomeProduto, preco, descricao, categoria, emEstoque, id_Restaurante)
VALUES ('$nome','$preco','$descricao','$categoria', '$estoque', '$idRestaurante')";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para o formulario de cadastro e passar parametro ok por GET

header("Location: form-cadastrar-produto.php?status=ok");
exit;
?>