<?php
error_reporting(E_ALL);
require_once 'verificar-sessao-admin.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Administração - Sistema de Cadastro de Produtos 2025</title>
  <link rel="stylesheet" href="../../css/style-admin.css">
  <link rel="icon" href="../../img/Icon_restrito.png" type="image/png">
</head>

<body>

  <div class="container">

    <header class="header">
      <a href="#" class="brand">
        <span>Manutenção do Cadastro de Produtos 2025</span>
      </a>
      <nav class="nav">
        <a href="cliente/listar-cliente.php">Clientes</a>
        <a href="entregador/listar-entregador.php">Entregadores</a>
        <a href="restaurante/listar-restaurante.php">Restaurantes</a>
        <a href="pedido/listar-pedido.php">Pedidos</a>
        <a href="produto/listar-produto.php">Produtos</a>
        <a href="deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card text-center" style="padding: 40px;">
      <p class="lead">Bem-vindo à área administrativa.</p>

      <div class="mt-6">
        <img src="../../img/restrito.png" alt="Área restrita" style="max-width:220px; opacity:0.9;">
      </div>
    </main>

    <footer class="footer text-center">
      <p> Sistema de Cadastro de Produtos 2025&copy;</p>
    </footer>

  </div>

</body>

</html>