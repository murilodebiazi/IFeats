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
            $query = mysqli_query($conexao, "SELECT * FROM Entregador WHERE emailEntregador = '$email'");
            while($linha = mysqli_fetch_array($query)){
                echo "Id :" . $linha['idEntregador'];
                echo "<br>";
                echo "Nome: ". $linha['nomeEntregador'];
                echo "<br>";
                echo "Transporte: ". $linha['transporte'];
                echo "<br>";
                echo "CPF: ". $linha['CPFEntregador'];
                echo "<br>";
                echo "Email: ". $linha['emailEntregador'];
                echo "<br>";
                echo "Score: ". $linha['score'];
                echo "<br>";
                echo "Idade: ". $linha['idade'];
                echo "<br>";
                echo "Disponivel: ". $linha['disponivel'];
                echo "<br>";
                echo "Senha: ". $linha['senhaEntregador'];
            }
        }
        ?> </p>
    </div>
</body>
</html>