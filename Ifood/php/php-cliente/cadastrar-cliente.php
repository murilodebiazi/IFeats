<?php

require_once "../conectar.php";

//pegar o nome do produto
$nome = $_POST['cliente'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

$checarEmail = "SELECT * FROM Cliente WHERE emailCliente='$email'";
$resultado = $conexao->query($checarEmail);

if ($resultado->num_rows > 0) {
    header("Location: form-cadastrar-cliente.php?status=email");
} else {
    if ($confirmar == $senha) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Cliente (nomeCliente, CPFCliente,telefoneCliente, emailCliente, senhaCliente) VALUES ('$nome','$cpf','$telefone','$email','$senha_hash')";
        mysqli_query($conexao, $sql);
        $ultimocod = mysqli_insert_id($conexao);
        mysqli_close($conexao); //fechar a conexão com BD

        //voltar para o formulario de cadastro e passar parametro ok por GET

        header("Location: form-cadastrar-cliente.php?status=ok");
        exit;
    } else {
        header("Location: form-cadastrar-cliente.php?status=senha");
    }
}
?>