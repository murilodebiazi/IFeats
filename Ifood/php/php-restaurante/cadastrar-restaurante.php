<?php

require_once "../conectar.php";

$nome = $_POST['restaurante'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

$checarEmail = "SELECT * FROM Restaurante WHERE emailRestaurante='$email'";
$resultado = $conexao->query($checarEmail);

if ($resultado->num_rows > 0) {
    header("Location: form-cadastrar-restaurante.php?status=email");
} else {
    if ($confirmar == $senha) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Restaurante (nomeRestaurante, cnpj, emailRestaurante, enderecoRestaurante, telefoneRestaurante, descricao, categoria, senhaRestaurante)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $nome, $cnpj, $email, $endereco, $telefone, $descricao, $categoria, $senha_hash);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conexao);
            header("Location: form-cadastrar-restaurante.php?status=ok");
        } else {
            echo "Erro na preparação da query: " . mysqli_error($conexao);
        }
        exit;
    } else
        header("Location: form-cadastrar-restaurante.php?status=erro");
}
?>