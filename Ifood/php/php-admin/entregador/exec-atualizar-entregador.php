<?php
require_once ("../../conectar.php");
require_once("../verificar-sessao-admin.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $transporte = $_POST['transporte'];
    $avaliacao = $_POST['avaliacao'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "UPDATE Entregador SET nomeEntregador='$nome', CPFEntregador='$cpf', transporte = '$transporte',emailEntregador='$email', avaliacao='$avaliacao', senhaEntregador='$senha_hash' WHERE idEntregador='$id'";

    if (mysqli_query($conexao, $sql)) {
        $msg = urlencode('Entregador atualizado com sucesso!');
        header("Location: listar-Entregador.php?retorno=$msg");
        exit;
    } else {
        echo "Erro ao atualizar produto: " . mysqli_error($conexao);
    }

} else {
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-Entregador.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>
