<?php

require_once "../conectar.php";

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
$confirmar = $_POST['confirmar'] ?? "";

if ($confirmar == $senha) {
    $sql = "SELECT * FROM Entregador WHERE emailEntregador='$email'";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        if(password_verify($senha,$linha['senhaEntregador'])) {
        session_start();
        $_SESSION['emailEntregador'] = $linha["emailEntregador"];
        header("Location: sessao-entregador.php");
        exit();
        }
    }//else{
    //("Location: LogarEntregador.php?status=nao");
    //}
} else {
    header("Location: form-logar-entregador.php?status=senha");
}
?>