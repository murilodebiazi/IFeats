<?php

    require_once "../Conexao.php";

    $email = $_POST['email'] ?? "";
    $senha = $_POST['senha'] ?? "";
    $confirmar = $_POST['confirmar'] ?? "";

    if($confirmar == $senha){
        $sql = "SELECT * FROM Cliente WHERE emailCliente='$email' AND senhaCliente='$senha'";
        $resultado = $conexao -> query($sql);
        if($resultado -> num_rows > 0){
            session_start();
            $linha = $resultado->fetch_assoc();
            $_SESSION['email'] = $linha["emailCliente"];
            header("Location: DadosCliente.php");
            exit();
        }   
        //else{
        //    header("Location: LogarCliente.php?status=nao");
        //}
    }
    else{
        header("Location: LogarCliente.php?status=senha");
    }
?>