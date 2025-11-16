<?php
require_once ("../../conectar.php");
require_once("../verificar-sessao-admin.php");

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']); // Protege contra injeção
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $avaliacao = $_POST['avaliacao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereço'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

   $sql = "UPDATE Restaurante SET nomeRestaurante='$nome', cnpj = '$cnpj' , emailRestaurante='$email', avaliacao='$avaliacao', categoria='$categoria', descricao='$descricao', enderecoRestaurante= '$endereco' , telefoneRestaurante='$telefone', senhaRestaurante='$senha_hash' WHERE idRestaurante = '$id'";
    if (mysqli_query($conexao, $sql)) {
        // Redireciona para listar.php com mensagem de sucesso
        $msg = urlencode('Restaurante atualizado com sucesso!');
        header("Location: listar-restaurante.php?retorno=$msg");
        exit;
    } else {
        // Em caso de erro, exibe mensagem
        echo "Erro ao atualizar produto: " . mysqli_error($conexao);
    }

} else {
    // Acesso direto ou dados inválidos
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-restaurante.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>
