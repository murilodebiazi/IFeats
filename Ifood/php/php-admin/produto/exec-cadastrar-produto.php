<?php
require_once "../../conectar.php"/
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
     $nome = $_POST['nome'];
     $preco = $_POST['preco'];
     $descricao = $_POST['descricao'];
     $categoria = $_POST['categoria'];
     $estoque = $_POST['estoque'];
     $idRestaurante = $_POST['idRestaurante'];

} else {
     $msg = urlencode('Acesso negado!');
     header("location: ../form-logar-admin.php?retorno=$msg");
     exit;
}

$sql = "INSERT INTO Produto (nomeProduto, preco, descricao, categoria, emEstoque, idRestaurante)
VALUES ('$nome','$preco','$descricao','$categoria', '$estoque', '$idRestaurante')";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);
$msg = urlencode('ok');
header("location: form-cadastrar-produto.php?retorno=$msg");
?>