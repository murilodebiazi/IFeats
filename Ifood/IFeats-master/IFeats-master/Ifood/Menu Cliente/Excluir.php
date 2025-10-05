<?php

require_once "../Conexao.php";

//pegar o nome do produto
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

if ($confirmar == $senha) {
    $sql = "DELETE FROM Cliente WHERE CPFCliente = '$cpf' AND emailCliente = '$email' AND senhaCliente = '$senha';";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); //fechar a conexão com BD

    //voltar para o formulario de cadastro e passar parametro ok por GET

    header("Location: ExcluirCliente.php?status=ok");
    exit;
} else
    header("Location: ExcluirCliente.php?status=erro")
        ?>