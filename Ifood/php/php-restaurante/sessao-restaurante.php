<?php
session_start();
include("logar-restaurante.php");
require_once('verificar-sessao-restaurante.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../img/Icon.png" type="image/png">
  <title>Ifood</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
  <?php

  $email = $_SESSION['emailRestaurante'];
  $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();

  $sqlRestaurante = "SELECT * FROM Restaurante";
  $resultadoRestaurante = $conexao->query($sqlRestaurante);
  ?>
  <div class="cabecalho">
    <a id="voltar" href="perfil-restaurante.php"><?php echo $linha['nomeRestaurante'] ?></a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="logout" href="deslogar-restaurante.php">Logout</a>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>