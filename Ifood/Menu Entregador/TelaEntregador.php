<?php
    session_start();
    include("Login.php");
    require_once('VerificarSessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Ifood</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php

    $email = $_SESSION['emailEntregador'];
    $sql = "SELECT * FROM Entregador WHERE emailEntregador = '$email'";
    $resultado = $conexao -> query($sql);
    $linha = $resultado->fetch_assoc();
  ?> 
  <div class="cabecalho">
    <a id="voltar" href="../Menu Entregador/PerfilEntregador.php"><?php echo $linha['nomeEntregador']?></a>
    <a id="logo" href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
    <a id="logout" href="../Menu Entregador/Logout.php">Logout</a>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>