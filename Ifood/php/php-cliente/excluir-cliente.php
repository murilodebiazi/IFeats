<?php
require_once "../conectar.php";

session_start();

$email = $_SESSION['emailCliente'];

$sql = "DELETE FROM Cliente WHERE emailCliente = ?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_close($conexao);
    $_SESSION['emailCliente'] = null;
    session_destroy();
    header("Location: ../../html/menu-cliente.html");
    exit();
} else {
    header("Location: perfil-cliente.php?status=erro");
}



?>