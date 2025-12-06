<?php
session_start();
require_once "../conectar.php";

$idEntregador = $_GET['id'];


if($_GET['acao'] == "marcar-disponivel"){
    $sql = "UPDATE Entregador SET isDisponivel = 1 WHERE idEntregador='$idEntregador'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
    header("location: ../php-entregador/sessao-entregador.php");
}

if($_GET['acao'] == "marcar-indisponivel"){
    $sql = "UPDATE Entregador SET isDisponivel = 0 WHERE idEntregador='$idEntregador'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
    header("location: ../php-entregador/sessao-entregador.php");
}
?>