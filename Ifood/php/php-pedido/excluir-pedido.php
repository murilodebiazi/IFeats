<?php
require_once "../conectar.php";

session_start();

$idPedido = $_GET['id'];
$idRestaurante = $_GET['idR'];

$sql = "DELETE FROM Pedido WHERE idPedido = '$idPedido'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

if($_GET['acao'] == "cancelarCliente"){
    header("Location: ../php-cliente/ver-cardapio.php?id=$idRestaurante");
}
?>