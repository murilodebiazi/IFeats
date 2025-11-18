<?php

require_once "../conectar.php";

$nome = $_POST['restaurante'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

$checarEmail = "SELECT * FROM Restaurante WHERE emailRestaurante='$email'";
$resultado = $conexao->query($checarEmail);

if ($resultado->num_rows > 0) {
    header("Location: form-cadastrar-restaurante.php?status=email");
} else {
    if ($confirmar == $senha) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Restaurante (nomeRestaurante, cnpj, emailRestaurante, senhaRestaurante) VALUES ('$nome','$cnpj','$email','$senha_hash')";
        mysqli_query($conexao, $sql);
        $ultimocod = mysqli_insert_id($conexao);
        mysqli_close($conexao); //fechar a conexão com BD

        //voltar para o formulario de cadastro e passar parametro ok por GET

        header("Location: form-cadastrar-restaurante.php?status=ok");
        exit;
    } else
        header("Location: form-cadastrar-restaurante.php?status=erro");
}
?>