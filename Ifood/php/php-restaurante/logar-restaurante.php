<?php

require_once "../conectar.php";

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
$confirmar = $_POST['confirmar'] ?? "";

if ($confirmar == $senha) {
    $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($linha = mysqli_fetch_assoc($resultado)) {
            if (password_verify($senha, $linha['senhaRestaurante'])) {
                session_start();
                $_SESSION['emailRestaurante'] = $linha["emailRestaurante"];
                mysqli_stmt_close($stmt);
                mysqli_close($conexao);
                header("Location: sessao-restaurante.php");
                exit();
            } else {
                header("Location: form-logar-restaurante.php?status=nao");
            }
        } else {
            header("Location: form-logar-restaurante.php?status=nao");
        }
    }
} else {
    header("Location: form-logar-restaurante.php?status=senha");
}
?>