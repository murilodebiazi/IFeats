<?php

require_once "../Conexao.php";

//pegar o nome do produto
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

if ($confirmar == $senha) {
    $sql = "DELETE FROM Restaurante WHERE cnpj = '$cnpj' AND emailRestaurante = '$email' AND senhaRestaurante = '$senha';";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao); //fechar a conexão com BD

    //voltar para o formulario de cadastro e passar parametro ok por GET

    header("Location: ExcluirREstaurante.php?status=ok");
    exit;
} else
    header("Location: ExcluirRestaurante.php?status=erro")
        ?>