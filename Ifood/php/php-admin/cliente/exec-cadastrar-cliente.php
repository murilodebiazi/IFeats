<?php
require_once "../../conectar.php";
//pegar nome do produto - ESTE IF É IMPORTANTÍSSIMO: EVITAR INJEÇÃO DE SQL, GRAVAR REGISTRO VAZIO
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome']))
 { 
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
 } 
 else 
 { 
 $msg = urlencode('Acesso negado!'); 
 header("location: ../form-logar-admin.php?retorno=$msg"); 
 exit; 
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO Cliente (nomeCliente, CPFCliente,telefoneCliente, emailCliente, senhaCliente) VALUES ('$nome','$cpf','$telefone','$email','$senha_hash')";
mysqli_query($conexao, $sql);
//rotina php para UPLOAD da foto do produto
//pegar o ultimo código gerado pelo mySQL
$ultimocod=mysqli_insert_id($conexao);
//fazer o upLoad da imagem do produto
move_uploaded_file($imagem,$arquivo);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para form-cadastrar e passsar parâmetro por GET com mensagem de: OK
       $msg= urlencode('ok');
       header("location: form-cadastrar-cliente.php?retorno=$msg");
?>