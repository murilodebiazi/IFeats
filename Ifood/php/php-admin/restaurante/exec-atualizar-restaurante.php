<?php
require_once ("../../conectar.php");
require_once("../verificar-sessao-admin.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']); 
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $avaliacao = $_POST['avaliacao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereço'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

   $sql = "UPDATE Restaurante SET nomeRestaurante='$nome', cnpj = '$cnpj' , emailRestaurante='$email', avaliacao='$avaliacao', categoria='$categoria', descricao='$descricao', enderecoRestaurante= '$endereco' , telefoneRestaurante='$telefone', senhaRestaurante='$senha_hash' WHERE idRestaurante = '$id'";
    if (mysqli_query($conexao, $sql)) {
        $msg = urlencode('Restaurante atualizado com sucesso!');
        header("Location: listar-restaurante.php?retorno=$msg");
        exit;
    } else {
        echo "Erro ao atualizar restaurante: " . mysqli_error($conexao);
    }

} else {
    $msg = urlencode('Acesso negado!');
    header("Location: ../listar-restaurante.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>