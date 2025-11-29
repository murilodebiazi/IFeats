<?php
session_start();
include("../conectar.php");
require_once('verificar-sessao-cliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../img/Icon.png" type="image/png">
  <title>Ifood</title>
  <link rel="stylesheet" href="../../css/menupedidos.style.css">
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
    <a id="verrestaurantes" href="sessao-cliente.php">Restaurantes</a>
    <a id="logout" href="deslogar-cliente.php">Logout</a>
  </div>

  <div class="corpo">
    <a class="botao" href="ver-pedidos-cliente.php">Pedidos Em Espera:</a>
    <a class="botao" href="historico-pedidos-cliente.php">Histórico de Pedidos</a>
  </div>

  <div class="rodape-movel">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>