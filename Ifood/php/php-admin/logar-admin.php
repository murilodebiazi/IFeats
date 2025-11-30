<?php
error_reporting(E_ALL);

require_once('../conectar.php');

if (isset($_POST['sub']) && !empty($_POST['sub'])) {
    $use = $_POST['nome'];
    $pas = $_POST['senha'];

    $sql = "SELECT * FROM administrador WHERE nome = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $use);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($linha = mysqli_fetch_assoc($resultado)) {
            if (password_verify($pas, $linha['senha'])) {
                session_start();
                $_SESSION['admin'] = 'ok';
                header("Location: sessao-admin.php");
                exit;
            }
        }

        $msg = urlencode('Dados inválidos!');
        header("Location: form-logar-admin.php?retorno=$msg");
        exit;

    } else {
        die("Erro no SQL: " . mysqli_error($conexao));
    }
} else {
    $msg = 'Acesso negado - Efetue o login';
    header("Location: form-logar-admin.php?retorno=$msg");
    exit;
}


?>