<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = $_POST['id'] ?? null;
$confirmar = $_POST['confirmar'] ?? null;

if ($id) {
    if ($confirmar === 'sim') {
        // Usuário confirmou a exclusão
        $sql = "DELETE FROM Produto WHERE idProduto=$id";

        if (mysqli_query($conexao, $sql)) {

            // Caminho da imagem a ser excluída
            $caminhoImagem = "../fotos/" . $id . ".png";

            // Verifica se o arquivo existe e tenta excluir
            if (file_exists($caminhoImagem)) {
                unlink($caminhoImagem);
            }

            $msg = urlencode('Produto excluído com sucesso!');
        } else {
            $msg = urlencode('Erro ao excluir o produto!');
        }
    } else {
        // Usuário cancelou a exclusão
        $msg = urlencode('Exclusão cancelada!');
    }

    mysqli_close($conexao);
    header("Location: listar-produto.php?retorno=$msg");
    exit;
} else {
    // Acesso indevido ou ID não enviado
    $msg = urlencode('Acesso negado!');
    header("Location: listar-produto.php?retorno=$msg");
    exit;
}
?>
