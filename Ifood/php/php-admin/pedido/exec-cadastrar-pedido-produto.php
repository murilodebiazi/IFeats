<?php
require_once "../../conectar.php";
if (isset($_POST['adicionar'])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idPedido'])) {
        $idPedido = $_POST['idPedido'];
        $idRestaurante = $_POST['idRestaurante'];
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
    } else {
        $msg = urlencode('Acesso negado!');
        header("location: ../form-logar-admin.php?retorno=$msg");
        exit;
    }

    $sqlProduto = "SELECT * FROM Produto WHERE nomeProduto='$produto'";
    mysqli_query($conexao, $sqlProduto);
    $resultadoProduto = $conexao->query($sqlProduto);
    $linhaP = mysqli_fetch_assoc($resultadoProduto);
    $idProduto = $linhaP['idProduto'];

    $sql = "INSERT INTO itemPedido (idPedido, idProduto, quantidade) VALUES ('$idPedido', '$idProduto', '$quantidade')";

    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao);

    header("location: form-cadastrar-pedido-produto.php?idPedido=$idPedido&idRestaurante=$idRestaurante");
} else {
    if (isset($_POST['finalizar'])) {
        $msg = urlencode('ok');
        header("location: form-cadastrar-pedido.php?retorno=$msg");
    }
}
?>