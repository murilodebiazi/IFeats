<?php
require_once "../../conectar.php";
if(isset($_POST['adicionar'])){
    //pegar nome do produto - ESTE IF É IMPORTANTÍSSIMO: EVITAR INJEÇÃO DE SQL, GRAVAR REGISTRO VAZIO
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idPedido']))
    { 
        $idPedido = $_POST['idPedido'];
        $idRestaurante = $_POST['idRestaurante'];
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
    } 
    else 
    { 
        $msg = urlencode('Acesso negado!'); 
        header("location: ../form-logar-admin.php?retorno=$msg"); 
        exit; 
    }

    $sqlProduto = "SELECT * FROM Produto WHERE nomeProduto='$produto'";
    mysqli_query($conexao, $sqlProduto);
    $resultadoProduto = $conexao->query($sqlProduto);
    $linhaP = mysqli_fetch_assoc($resultadoProduto);
    $idProduto = $linhaP['idProduto'];

    $sql = "INSERT INTO itemPedido (idPedido, idProduto, quantidade) VALUES ('$idPedido', '$idProduto', '$quantidade')";
    mysqli_query($conexao, $sql);
    //rotina php para UPLOAD da foto do produto
    //pegar o ultimo código gerado pelo mySQL
    $ultimocod=mysqli_insert_id($conexao);
    //fazer o upLoad da imagem do produto
    move_uploaded_file($imagem,$arquivo);
    mysqli_close($conexao); //fechar a conexão com BD
    header("location: form-cadastrar-pedido-produto.php?idPedido=$idPedido&idRestaurante=$idRestaurante");
}

else{
    if(isset($_POST['finalizar'])){
        //voltar para form-cadastrar e passsar parâmetro por GET com mensagem de: OK
        $msg= urlencode('ok');
        header("location: form-cadastrar-pedido.php?retorno=$msg");
    }
}
?>