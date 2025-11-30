<?php
require_once "../conectar.php";

session_start();

$email = $_SESSION['emailEntregador'];

$sql = "DELETE FROM Entregador WHERE emailEntregador = ?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_close($conexao);
    $_SESSION['emailEntregador'] = null;
    session_destroy();
    header("Location: ../../html/menu-entregador.html");
    exit();
} else {
    header("Location: perfil-entregador.php?status=erro");
}


header("Location: ../../html/menu-entregador.html")
    ?>