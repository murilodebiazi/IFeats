<?php
require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);
    $nome = $_POST['cliente'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "UPDATE Cliente SET idCliente='$id', nomeCliente='$nome', CPFCliente='$cpf', telefoneCliente='$telefone', enderecoCliente='$endereco', emailCliente='$email', senhaCliente='$senha_hash' WHERE idCliente='$id'";
    if (mysqli_query($conexao, $sql)) {
        $msg = urlencode('Cliente atualizado com sucesso!');
        header("Location: listar-cliente.php?retorno=$msg");
        exit;
    } else {
        echo "Erro ao atualizar cliente: " . mysqli_error($conexao);
    }

} else {
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-cliente.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>