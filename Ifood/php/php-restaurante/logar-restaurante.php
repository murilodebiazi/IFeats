<?php

require_once "../conectar.php";

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
$confirmar = $_POST['confirmar'] ?? "";

if ($confirmar == $senha) {
    $sql = "SELECT * FROM Restaurante WHERE emailRestaurante='$email'";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        if(password_verify($senha, $linha['senhaRestaurante'])) {
        session_start();
        $_SESSION['emailRestaurante'] = $linha["emailRestaurante"];
        header("Location: sessao-restaurante.php");
        exit();
        }
    }
    //else{
    //header("Location: LogarRestaurante.php?status=nao");
    //}
} else {
    header("Location: form-logar-restaurante.php?status=senha");
}
?>