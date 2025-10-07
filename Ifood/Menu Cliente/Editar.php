<?php

require_once "../Conexao.php";

//pegar o nome do produto
$emailA = $_POST['emailA'];
$emailN = $_POST['emailN'];
$senhaA = $_POST['senhaA'];
$senhaN = $_POST['senhaN'];


$checarEmaileSenha = "SELECT * FROM Cliente WHERE emailCliente='$emailA' AND senhaCliente='$senhaA'";
$resultado = $conexao->query($checarEmaileSenha);

if($resultado -> num_rows == 0){
    header("Location: EditarCliente.php?status=emailsenha");
}
else{
    if($emailA != $emailN || $senhaA != $senhaN) {
        $sql = "UPDATE Cliente SET emailCliente='$emailN', senhaCliente='$senhaN' WHERE emailCliente='$emailA' AND senhaCliente='$senhaA'";
        mysqli_query($conexao, $sql);
        $ultimocod = mysqli_insert_id($conexao);
        mysqli_close($conexao); //fechar a conexão com BD

        //voltar para o formulario de Editar e passar parametro ok por GET

        header("Location: EditarCliente.php?status=ok");
        exit;
    }
    else{
        header("Location: EditarCliente.php?status=erro");
    }
}
?>