<?php
// Habilita a exibição de erros na página (0 = desativado)
//ini_set('display_errors', 0);
error_reporting(E_ALL);
require_once 'verificar-sessao-admin.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Administração - Sistema de Cadastro de Produtos 2025</title>
  <link rel="stylesheet" href="../../css/style-admin.css">
</head>
<body>

<div class="container">

  <!-- Cabeçalho -->
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

  <!-- Conteúdo principal -->
  <main class="card text-center" style="padding: 40px;">
    <p class="lead">Bem-vindo à área administrativa.</p>

    <div class="mt-6">
      <img src="../../img/restrito.png" alt="Área restrita" style="max-width:220px; opacity:0.9;">
    </div>
  </main>

  <!-- Rodapé -->
  <footer class="footer text-center">
    <p> Sistema de Cadastro de Produtos 2025&copy;</p>
  </footer>

</div>

</body>
</html>
