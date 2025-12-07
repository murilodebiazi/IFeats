<?php

session_start();
require_once "../conectar.php";

$notaR = $_POST['notaR'];
$notaE = $_POST['notaE'];
$descR = $_POST['descR'];
$descE = $_POST['descE'];
$idRestaurante = $_POST['idRestaurante'];
$idEntregador = $_POST['idEntregador'];
$idPedido = $_POST['idPedido'];

$sql = "INSERT INTO avaliacaoPedido (notaRestaurante, notaEntregador, descricaoNotaRestaurante, descricaoNotaEntregador, idRestaurante, idEntregador, idPedido) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "iissiii", $notaR, $notaE, $descR, $descE, $idRestaurante, $idEntregador, $idPedido);
    mysqli_stmt_execute($stmt);
    $sqlEntregador = "UPDATE Entregador SET avaliacao = (SELECT calcular_avaliacao_entregador($idEntregador) WHERE idEntregador = $idEntregador)";
    mysqli_query($conexao, $sqlEntregador);
    $sqlRestaurante= "UPDATE Restaurante SET avaliacao = (SELECT calcular_avaliacao_restaurante($idRestaurante) WHERE idRestaurante = $idRestaurante)";
    mysqli_query($conexao, $sqlRestaurante);
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    header("Location: ../php-cliente/historico-pedidos-cliente.php");
    exit();
} else {
    echo "Erro na preparação da query: " . mysqli_error($conexao);
}
?>