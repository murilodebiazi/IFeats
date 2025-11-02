<?php

    require_once "../Conexao.php";

    $email = $_POST['email'] ?? "";
    $senha = $_POST['senha'] ?? "";
    $confirmar = $_POST['confirmar'] ?? "";

    if($confirmar == $senha){
        $sql = "SELECT * FROM Restaurante WHERE emailRestaurante='$email' AND senhaRestaurante='$senha'";
        $resultado = $conexao -> query($sql);
        if($resultado -> num_rows > 0){
            session_start();
            $linha = $resultado->fetch_assoc();
            $_SESSION['emailRestaurante'] = $linha["emailRestaurante"];
            header("Location: TelaRestaurante.php");
            exit();
        }   
        //else{
            //header("Location: LogarRestaurante.php?status=nao");
        //}
    }
    else{
        header("Location: LogarRestaurante.php?status=senha");
    }
?>