<?php
session_start();
require_once "../conectar.php";

$idRestaurante = $_GET['id']; 
$emailCliente = $_SESSION['emailCliente'];

$sqlCliente = "SELECT * FROM Cliente WHERE emailCliente='$emailCliente'";
$resultadoCliente = $conexao->query($sqlCliente);
$cliente = $resultadoCliente->fetch_assoc();
$idCliente = $cliente['idCliente'];

$sql = "INSERT INTO Pedido (status, idRestaurante, idCliente) VALUES ('Pedindo', '$idRestaurante','$idCliente')";
mysqli_query($conexao, $sql);

//rotina php para UPLOAD da foto do produto
//pegar o ultimo código gerado pelo mySQL
$ultimocod=mysqli_insert_id($conexao);
//fazer o upLoad da imagem do produto
move_uploaded_file($imagem,$arquivo);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para form-cadastrar e passsar parâmetro por GET com mensagem de: OK
       $msg= urlencode('ok');
       header("location: form-pedido-produto.php?id=$ultimocod&idR=$idRestaurante");
?>