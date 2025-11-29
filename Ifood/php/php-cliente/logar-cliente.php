<?php

require_once "../conectar.php";

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
$confirmar = $_POST['confirmar'] ?? "";

if ($confirmar == $senha) {
    $sql = "SELECT * FROM Cliente WHERE emailCliente = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($linha = mysqli_fetch_assoc($resultado)) {
            if (password_verify($senha, $linha['senhaCliente'])) {
                session_start();
                $_SESSION['emailCliente'] = $linha["emailCliente"];
                header("Location: sessao-cliente.php");
                exit();
            }
        }
        else{
                header("Location: form-logar-cliente.php?status=nao");
        }
    }
} else {
    header("Location: form-logar-cliente.php?status=senha");
}
?>