<?php
require_once "../../conectar.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idCliente'])) {
    $status = $_POST['status'];
    $horarioPedido = $_POST['horarioPedido'];
    $horarioEntrega = $_POST['horarioEntrega'];
    $idRestaurante = $_POST['idRestaurante'];
    $idCliente = $_POST['idCliente'];
    $idEntregador = $_POST['idEntregador'];
} else {
    $msg = urlencode('Acesso negado!');
    header("location: ../form-logar-admin.php?retorno=$msg");
    exit;
}

$sql = "INSERT INTO Pedido (status, horarioPedido, horarioEntregue, idRestaurante, idCliente, idEntregador)
VALUES ('$status', '$horarioPedido', '$horarioEntrega', '$idRestaurante' , '$idCliente', '$idEntregador')";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$msg = urlencode('ok');
header("location: form-cadastrar-pedido-produto.php?idPedido=$ultimocod&idRestaurante=$idRestaurante");
?>