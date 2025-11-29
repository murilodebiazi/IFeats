<?php
session_start();
include("../conectar.php");
require_once('verificar-sessao-entregador.php');
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

  $email = $_SESSION['emailEntregador'];
  $sql = "SELECT * FROM Entregador WHERE emailEntregador = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();
  ?>
  <div class="cabecalho">
    <a id="voltar" href="perfil-entregador.php">
      <?php echo $linha['nomeEntregador'] ?>
    </a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="logout" href="deslogar-entregador.php">Logout</a>
  </div>

  <div class="corpo">
    <a class="botao" href="aceitar-pedidos-entregador.php">Aceitar Pedidos</a>
    <a class="botao" href="pedidos-emrota-entregador.php">Pedido Para Entrega</a>
    <a class="botao" href="historico-pedidos-entregador.php">Histórico de Pedidos</a>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>