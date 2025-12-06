<?php
include("../conectar.php");
session_start();
$entregador = $_SESSION['emailEntregador'];
    $sql = "UPDATE Entregador SET isDisponivel = 0 WHERE emailEntregador='$entregador'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); 
session_destroy();
header('Location: ../../html/menu-entregador.html');
?>