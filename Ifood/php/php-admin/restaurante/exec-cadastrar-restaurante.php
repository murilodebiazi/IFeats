<?php
require_once "../../conectar.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
   $nome = $_POST['nome'];
   $cnpj = $_POST['cnpj'];
   $email = $_POST['email'];
   $avaliacao = $_POST['avaliacao'];
   $categoria = $_POST['categoria'];
   $descricao = $_POST['descricao'];
   $endereco = $_POST['endereço'];
   $telefone = $_POST['telefone'];
   $senha = $_POST['senha'];
} else {
   $msg = urlencode('Acesso negado!');
   header("location: ../form-logar-admin.php?retorno=$msg");
   exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO Restaurante (nomeRestaurante, cnpj, emailRestaurante, avaliacao, categoria, descricao, enderecoRestaurante, telefoneRestaurante, senhaRestaurante)
VALUES ('$nome','$cnpj','$email','$avaliacao','$categoria','$descricao','$endereco','$telefone', '$senha_hash')";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);
$msg = urlencode('ok');
header("location: form-cadastrar-restaurante.php?retorno=$msg");
?>