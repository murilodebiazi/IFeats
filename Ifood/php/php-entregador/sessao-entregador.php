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

  <?php if ($linha['isDisponivel'] == 1) { ?>
    <h1 class="h1-disponivel">Disponível</h1>
  <?php } else { ?>
    <h1 class="h1-indisponivel">Indisponível</h1>
  <?php } ?>
  
  <div class="corpo">

    <?php if ($linha['isDisponivel'] == 0) { ?>
      <a class="botao-disponivel"
        href="mudar-disponibilidade.php?id=<?php echo $linha['idEntregador'] ?>&acao=marcar-disponivel">Marcar Como
        Disponível</a>
    <?php } ?>

    <?php if ($linha['isDisponivel'] == 1) { ?>
      <a class="botao-indisponivel"
        href="mudar-disponibilidade.php?id=<?php echo $linha['idEntregador'] ?>&acao=marcar-indisponivel">Marcar Como
        Indisponível</a>
      <a class="botao" href="aceitar-pedidos-entregador.php">Aceitar Pedidos</a>
      <a class="botao" href="pedidos-emrota-entregador.php">Pedido Para Entrega</a>
    <?php } ?>

    <a class="botao" href="historico-pedidos-entregador.php">Histórico de Pedidos</a>
  </div>

  <div class="rodape-movel">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>