<?php
require_once "../conectar.php";

session_start();

$email = $_SESSION['emailRestaurante'];

$sql = "DELETE FROM Restaurante WHERE emailRestaurante = '$email'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

session_destroy();

header("Location: ../../html/menu-restaurante.html")
?>