<?php
session_start();
require_once "../conectar.php";

$idPedido= $_GET['id']; 
$idEntregador = $_GET['idE'] ?? "";

if($_GET['acao'] == "entregue"){
    $horarioAtual = date("H:i:s");
    $sql = "UPDATE Pedido SET status='Entregue', horarioEntregue='$horarioAtual' WHERE idPedido='$idPedido'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
    header("location: ../php-cliente/ver-pedidos-cliente.php");
}
if($_GET['acao'] == "pronto"){
    $sql = "UPDATE Pedido SET status='Pronto' WHERE idPedido='$idPedido'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
    header("location: ../php-restaurante/pedidos-fila-restaurante.php");
}
if($_GET['acao'] == "aceito"){
    $sql = "UPDATE Pedido SET status='Em Rota', idEntregador='$idEntregador' WHERE idPedido='$idPedido'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
    header("location: ../php-entregador/aceitar-pedidos-entregador.php");
}
?>