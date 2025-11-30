<?php
session_start();
require_once "../conectar.php";

$idRestaurante = $_GET['id'];

$emailCliente = $_SESSION['emailCliente'];
$sqlCliente = "SELECT * FROM Cliente WHERE emailCliente='$emailCliente'";
$resultadoCliente = $conexao->query($sqlCliente);
$cliente = $resultadoCliente->fetch_assoc();
$idCliente = $cliente['idCliente'];
$status = "Pedindo";

$sql = "INSERT INTO Pedido (status, idRestaurante, idCliente) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
if ($stmt) {
       mysqli_stmt_bind_param($stmt, "sss", $status, $idRestaurante, $idCliente);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
       $ultimocod = mysqli_insert_id($conexao);
       mysqli_close($conexao);
       header("location: form-pedido-produto.php?id=$ultimocod&idR=$idRestaurante");
}

?>