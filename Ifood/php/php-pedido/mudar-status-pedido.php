<?php
session_start();
require_once "../conectar.php";

$idPedido= $_GET['id']; 

if($_GET['acao'] == "entregue"){
    $horarioAtual = date("H:i:s");
    $sql = "UPDATE Pedido SET status='Entregue', horarioEntregue='$horarioAtual' WHERE idPedido='$idPedido'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
    header("location: ../php-cliente/ver-pedidos-cliente.php");
}
?>