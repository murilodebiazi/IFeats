<?php
require_once "../../conectar.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
       $nome = $_POST['nome'];
       $cpf = $_POST['cpf'];
       $telefone = $_POST['telefone'];
       $endereco = $_POST['endereco'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];
} else {
       $msg = urlencode('Acesso negado!');
       header("location: ../form-logar-admin.php?retorno=$msg");
       exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO Cliente (nomeCliente, CPFCliente,telefoneCliente, emailCliente, enderecoCliente, senhaCliente) VALUES ('$nome','$cpf','$telefone','$email','$endereco', '$senha_hash')";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$msg = urlencode('ok');
header("location: form-cadastrar-cliente.php?retorno=$msg");
?>