<?php
require_once ("../../conectar.php");
require_once("../verificar-sessao-admin.php");

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']); // Protege contra injeção
    $nome = $_POST['cliente'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "UPDATE Cliente SET idCliente='$id', nomeCliente='$nome', CPFCliente='$cpf', telefoneCliente='$telefone', emailCliente='$email' WHERE idCliente='$id'";
    if (mysqli_query($conexao, $sql)) {
        // Redireciona para listar.php com mensagem de sucesso
        $msg = urlencode('Cliente atualizado com sucesso!');
        header("Location: listar-cliente.php?retorno=$msg");
        exit;
    } else {
        // Em caso de erro, exibe mensagem
        echo "Erro ao atualizar produto: " . mysqli_error($conexao);
    }

} else {
    // Acesso direto ou dados inválidos
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-cliente.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>
