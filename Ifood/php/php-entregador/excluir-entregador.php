<?php
require_once "../conectar.php";

session_start();

$email = $_SESSION['emailEntregador'];

$sql = "DELETE FROM Entregador WHERE emailEntregador = '$email'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['emailEntregador'] = null;

session_destroy();

header("Location: ../../html/menu-entregador.html")
    ?>