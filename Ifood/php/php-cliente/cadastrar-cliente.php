<?php

require_once "../conectar.php";

//pegar o nome do produto
$nome = $_POST['cliente'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

$checarEmail = "SELECT * FROM Cliente WHERE emailCliente='$email'";
$resultado = $conexao->query($checarEmail);

if ($resultado->num_rows > 0) {
    header("Location: form-cadastrar-cliente.php?status=email");
} else {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    if ($confirmar == $senha) {
        $sql = "INSERT INTO Cliente (nomeCliente, enderecoCliente, telefoneCliente, CPFCliente, emailCliente, senhaCliente) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $nome,$endereco, $telefone, $cpf, $email, $senha_hash);
            mysqli_stmt_execute($stmt);
            mysqli_close($conexao); //fechar a conexão com BD
        }
        //voltar para o formulario de cadastro e passar parametro ok por GET

        header("Location: form-cadastrar-cliente.php?status=ok");
        exit;
    } else
        header("Location: form-cadastrar-cliente.php?status=erro");
}
?>