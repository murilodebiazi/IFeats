<?php
require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']); // Protege contra injeção
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $estoque = $_POST['estoque'];
    $idRestaurante = $_POST['idRestaurante'];

    $sql = "UPDATE Produto SET nomeProduto='$nome', preco='$preco' , descricao='$descricao', categoria='$categoria', emEstoque='$estoque', id_Restaurante='$idRestaurante' WHERE idProduto = '$id'";
    if (mysqli_query($conexao, $sql)) {
        $msg = urlencode('Produto atualizado com sucesso!');
        header("Location: listar-produto.php?retorno=$msg");
        exit;
    } else {
        // Em caso de erro, exibe mensagem
        echo "Erro ao atualizar produto: " . mysqli_error($conexao);
    }

} else {
    // Acesso direto ou dados inválidos
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-produto.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>