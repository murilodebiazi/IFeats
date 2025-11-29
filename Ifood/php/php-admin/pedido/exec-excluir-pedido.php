<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = $_POST['id'] ?? null;
$confirmar = $_POST['confirmar'] ?? null;

if ($id) {
    if ($confirmar === 'sim') {

        $sql = "DELETE FROM Pedido WHERE idPedido=$id";

        if (mysqli_query($conexao, $sql)) {
            $msg = urlencode('Pedido excluído com sucesso!');
        } else {
            $msg = urlencode('Erro ao excluir o Pedido!');
        }
    } else {
        $msg = urlencode('Exclusão cancelada!');
    }

    mysqli_close($conexao);
    header("Location: listar-pedido.php?retorno=$msg");
    exit;
} else {
    $msg = urlencode('Acesso negado!');
    header("Location: listar-pedido.php?retorno=$msg");
    exit;
}
?>