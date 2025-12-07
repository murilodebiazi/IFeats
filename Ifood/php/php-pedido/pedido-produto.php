<?php
require_once "../conectar.php";

date_default_timezone_set('America/Sao_Paulo');

session_start();
$idPedido = $_POST['idPedido'];
$idRestaurante = $_POST['idRestaurante'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];


$sqlProduto = "SELECT * FROM Produto WHERE nomeProduto='$produto'";
mysqli_query($conexao, $sqlProduto);
$resultadoProduto = $conexao->query($sqlProduto);
$linhaP = mysqli_fetch_assoc($resultadoProduto);
$idProduto = $linhaP['idProduto'];


$sql = "INSERT INTO itemPedido (idPedido, idProduto, quantidade) VALUES ('$idPedido', '$idProduto', '$quantidade')";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);

if (isset($_POST['adicionar'])) {
    header("location: form-pedido-produto.php?id=$idPedido&idR=$idRestaurante");
    mysqli_close($conexao);
} else {
    if (isset($_POST['finalizar'])) {
        $horarioAtual = date("H:i:s");
        $sqlP = "UPDATE Pedido SET status='Enviado', horarioPedido='$horarioAtual' WHERE idPedido='$idPedido'";
        mysqli_query($conexao, $sqlP);
        mysqli_close($conexao);
        header("Location: ../php-cliente/ver-cardapio.php?id=$idRestaurante");
    } else {
        if (isset($_POST['cancelar'])) {
            header("location: excluir-pedido.php?id=$idPedido&idR=$idRestaurante&acao=cancelarCliente");
            mysqli_close($conexao);
        }
    }
}
?>