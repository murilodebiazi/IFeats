<?php
require_once "../../conectar.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $veiculo = $_POST['veiculo'];
      $avaliacao = $_POST['avaliacao'];
} else {
      $msg = urlencode('Acesso negado!');
      header("location: ../form-logar-admin.php?retorno=$msg");
      exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO Entregador (nomeEntregador, CPFEntregador, emailEntregador, senhaEntregador, transporte, avaliacao)
VALUES ('$nome','$cpf','$email','$senha_hash','$veiculo','$avaliacao')";

mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$msg = urlencode('ok');
header("location: form-cadastrar-entregador.php?retorno=$msg");
?>