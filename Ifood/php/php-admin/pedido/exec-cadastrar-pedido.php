<?php
require_once "../../conectar.php";
//pegar nome do produto - ESTE IF É IMPORTANTÍSSIMO: EVITAR INJEÇÃO DE SQL, GRAVAR REGISTRO VAZIO
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idCliente']))
 { 
     $status = $_POST['status'];
     $horarioPedido = $_POST['horarioPedido'];
     $horarioEntrega = $_POST['horarioEntrega'];
     $idRestaurante = $_POST['idRestaurante'];
     $idCliente = $_POST['idCliente'];
     $idEntregador = $_POST['idEntregador'];   
 } 
 else 
 { 
 $msg = urlencode('Acesso negado!'); 
 header("location: ../form-logar-admin.php?retorno=$msg"); 
 exit; 
}

$sql = "INSERT INTO Pedido (status, horarioPedido, horarioEntregue, idRestaurante, idCliente, idEntregador) VALUES ('$status', '$horarioPedido', '$horarioEntrega', '$idRestaurante' , '$idCliente', '$idEntregador')";
mysqli_query($conexao, $sql);
//rotina php para UPLOAD da foto do produto
//pegar o ultimo código gerado pelo mySQL
$ultimocod=mysqli_insert_id($conexao);
//fazer o upLoad da imagem do produto
move_uploaded_file($imagem,$arquivo);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para form-cadastrar e passsar parâmetro por GET com mensagem de: OK
       $msg= urlencode('ok');
       header("location: form-cadastrar-pedido-produto.php?idPedido=$ultimocod&idRestaurante=$idRestaurante");
?>