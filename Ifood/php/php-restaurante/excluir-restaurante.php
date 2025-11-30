<?php
require_once "../conectar.php";

session_start();

$email = $_SESSION['emailRestaurante'];

$sql = "DELETE FROM Restaurante WHERE emailRestaurante = ?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_close($conexao);
    $_SESSION['emailRestaurante'] = null;
    session_destroy();
    header("Location: ../../html/menu-restaurante.html");
    exit();
} else {
    header("Location: perfil-restaurante.php?status=erro");
}
?>