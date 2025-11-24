<?php

require_once "../conectar.php";

//pegar o nome do produto
$nome = $_POST['entregador'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$veiculo = $_POST['veiculo'];
$confirmar = $_POST['confirmar'];

$checarEmail = "SELECT * FROM Entregador WHERE emailEntregador='$email'";
$resultado = $conexao->query($checarEmail);

if ($resultado->num_rows > 0) {
    header("Location: form-cadastrar-entregador.php?status=email");
} else {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    if ($confirmar == $senha) {
        $sql = "INSERT INTO Entregador (nomeEntregador, CPFEntregador, emailEntregador, senhaEntregador, transporte) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $nome,$cpf, $email, $senha_hash, $veiculo);
            mysqli_stmt_execute($stmt);
            mysqli_close($conexao); //fechar a conexão com BD
        }
        //voltar para o formulario de cadastro e passar parametro ok por GET

        header("Location: form-cadastrar-entregador.php?status=ok");
        exit;
    } else
        header("Location: form-cadastrar-entregador.php?status=erro");
}
?>