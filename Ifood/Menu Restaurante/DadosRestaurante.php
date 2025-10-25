<?php
session_start();
include("Login.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="layoutstylesheet0.css">
    <link rel="icon" href="../Icon.png" type="image/png">
</head>
<body>
    <div>
        <p><?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $query = mysqli_query($conexao, "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'");
            while($linha = mysqli_fetch_array($query)){
                echo "Id: " . $linha['idRestaurante'];
                echo "<br>";
                echo "Nome: " . $linha['nomeRestaurante'];
                echo "<br>";
                echo "CNPJ: ". $linha['cnpj'];
                echo "<br>";
                echo "Email: ". $linha['emailRestaurante'];
                echo "<br>";
                echo "Avaliacao: ". $linha['avaliacao'];
                echo "<br>";
                echo "Endereço: ". $linha['enderecoRestaurante'];
                echo "<br>";
                echo "Telefone: ". $linha['telefoneRestaurante'];
                echo "<br>";
                echo "Senha: ". $linha['senhaRestaurante'];
            }
        }
        ?> </p>
    </div>
</body>
</html>