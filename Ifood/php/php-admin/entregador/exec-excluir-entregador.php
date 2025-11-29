<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = $_POST['id'] ?? null;
$confirmar = $_POST['confirmar'] ?? null;

if ($id) {
    if ($confirmar === 'sim') {
        $sql = "DELETE FROM Entregador WHERE idEntregador=$id";

        if (mysqli_query($conexao, $sql)) {
            $msg = urlencode('Entregador excluído com sucesso!');
        } else {
            $msg = urlencode('Erro ao excluir o produto!');
        }
    } else {
        $msg = urlencode('Exclusão cancelada!');
    }

    mysqli_close($conexao);
    header("Location: listar-entregador.php?retorno=$msg");
    exit;
} else {
    $msg = urlencode('Acesso negado!');
    header("Location: listar-entregador.php?retorno=$msg");
    exit;
}
?>
