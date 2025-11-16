<?php
require_once ("../../conectar.php");
require_once("../verificar-sessao-admin.php");

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']); // Protege contra injeção
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $transporte = $_POST['transporte'];
    $disponivel = $_POST['disponibilidade'];
    $avaliacao = $_POST['avaliacao'];

    
    $sql = "UPDATE Entregador SET nomeEntregador='$nome', CPFEntregador='$cpf', transporte = '$transporte',emailEntregador='$email', disponivel='$disponivel', avaliacao='$avaliacao' WHERE idEntregador='$id'";
    if (mysqli_query($conexao, $sql)) {
        // Redireciona para listar.php com mensagem de sucesso
        $msg = urlencode('Entregador atualizado com sucesso!');
        header("Location: listar-Entregador.php?retorno=$msg");
        exit;
    } else {
        // Em caso de erro, exibe mensagem
        echo "Erro ao atualizar produto: " . mysqli_error($conexao);
    }

} else {
    // Acesso direto ou dados inválidos
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-Entregador.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>
