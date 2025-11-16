<?php
require_once "../../conectar.php";
//pegar nome do produto - ESTE IF É IMPORTANTÍSSIMO: EVITAR INJEÇÃO DE SQL, GRAVAR REGISTRO VAZIO
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome']))
 { 
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $avaliacao = $_POST['avaliacao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereço'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
 } 
 else 
 { 
 $msg = urlencode('Acesso negado!'); 
 header("location: ../form-logar-admin.php?retorno=$msg"); 
 exit; 
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO Restaurante (nomeRestaurante, cnpj, emailRestaurante, avaliacao, categoria, descricao, enderecoRestaurante, telefoneRestaurante, senhaRestaurante) VALUES ('$nome','$cnpj','$email','$avaliacao','$categoria','$descricao','$endereco','$telefone', '$senha_hash')";
mysqli_query($conexao, $sql);
//rotina php para UPLOAD da foto do produto
//pegar o ultimo código gerado pelo mySQL
$ultimocod=mysqli_insert_id($conexao);
//fazer o upLoad da imagem do produto
move_uploaded_file($imagem,$arquivo);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para form-cadastrar e passsar parâmetro por GET com mensagem de: OK
       $msg= urlencode('ok');
       header("location: form-cadastrar-restaurante.php?retorno=$msg");
?>