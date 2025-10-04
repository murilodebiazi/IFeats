<?php

require_once "../Conexao.php";

//pegar o nome do produto
$nome = $_POST['cliente'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

if($confirmar == $senha){
    $sql = "INSERT INTO Cliente (nomeCliente, CPFCliente, emailCliente, senhaCliente) VALUES ('$nome','$cpf','$email','$senha')";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); //fechar a conexão com BD

    //voltar para o formulario de cadastro e passar parametro ok por GET

    header("Location: CadastroCliente.php?status=ok");
    exit;
}
else
    header("Location: CadastroCliente.php?status=erro")
?>