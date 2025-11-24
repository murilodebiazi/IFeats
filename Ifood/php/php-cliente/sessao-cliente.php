<?php
session_start();
include("logar-cliente.php");
require_once('verificar-sessao-cliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../img/Icon.png" type="image/png">
  <title>Ifood</title>
  <link rel="stylesheet" href="../../css/sessaocliente.style.css">
</head>

<body>
  <?php

  $email = $_SESSION['emailCliente'];
  $sql = "SELECT * FROM Cliente WHERE emailCliente = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();

  $sqlRestaurante = "SELECT * FROM Restaurante";
  $resultadoRestaurante = $conexao->query($sqlRestaurante);
  ?>
  <div class="cabecalho">
    <a id="voltar" href="perfil-cliente.php"><?php echo $linha['nomeCliente'] ?></a>
    <a id="verpedidos" href="menu-pedidos-cliente.php">Pedidos</a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="verRestaurantes" href="sessao-cliente.php">Restaurantes</a>
    <a id="logout" href="deslogar-cliente.php">Logout</a>
  </div>

  <div class="restaurantes">
    <div id="m">
      <?php while ($linhaR = mysqli_fetch_assoc($resultadoRestaurante)) { ?>
        <div class='restaurante'>
          <br>
          <a class='titulo'
            href='ver-cardapio.php?id=<?php echo $linhaR['idRestaurante'] ?>'><b><?php echo $linhaR['nomeRestaurante'] ?></b></a>
          <br> <br>
          <p><?php echo $linhaR['avaliacao'] ?></p>
          <br>
        </div>
        <br>
      <?php } ?>
    </div>
  </div>

  <div class="rodape-movel">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>