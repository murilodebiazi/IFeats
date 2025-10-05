<?php
session_start();
include("Logar.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="layoutstylesheet0.css">
</head>
<body>
    <div>
        <p><?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = mysqli_query($conexao, "SELECT * FROM Cliente WHERE emailCliente = '$email'");
            while($linha = mysqli_fetch_array($query)){
                echo "Id :" . $linha['idCliente'];
                echo "<br>";
                echo "Nome: ". $linha['nomeCliente'];
                echo "<br>";
                echo "CPF: ". $linha['CPFCliente'];
                echo "<br>";
                echo "Email: ". $linha['emailCliente'];
                echo "<br>";
                echo "Senha: ". $linha['senhaCliente'];
            }
        }
        ?> </p>
    </div>
</body>
</html>