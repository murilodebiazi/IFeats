<?php

require_once "../conectar.php";

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
    if ($confirmar == $senha) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Cliente (nomeCliente, enderecoCliente, telefoneCliente, CPFCliente, emailCliente, senhaCliente) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $nome, $endereco, $telefone, $cpf, $email, $senha_hash);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conexao);
            header("Location: form-cadastrar-cliente.php?status=ok");
        } else {
            echo "Erro na preparação da query: " . mysqli_error($conexao);
        }
    } else
        header("Location: form-cadastrar-cliente.php?status=senha");
}
?>