<?php

require_once "../Conexao.php";

//pegar o nome do produto
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

if ($confirmar == $senha) {
    $sql = "DELETE FROM Entregador WHERE CPFEntregador = '$cpf' AND emailEntregador = '$email' AND senhaEntregador = '$senha';";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); //fechar a conexão com BD

    //voltar para o formulario de cadastro e passar parametro ok por GET

    header("Location: ExcluirEntregador.php?status=ok");
    exit;
} else
    header("Location: ExcluirEntregador.php?status=erro")
        ?>