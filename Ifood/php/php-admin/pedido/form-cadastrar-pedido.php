<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cadastrar Pedido</title>
  <link rel="stylesheet" href="../../../css/style-admin.css">
  <link rel="icon" href="../../../img/Icon_restrito.png" type="image/png">
</head>

<body>
  <?php

  ini_set('display_errors', 0);
  error_reporting(E_ALL);

  require_once("../../conectar.php");
  require_once("../verificar-sessao-admin.php");
  ?>
  <div class="container">

    <header class="header">
      <a href="#" class="brand">
        <img src="../../../img/restrito.png" alt="Logo do sistema">
        <span>Área Administrativa</span>
      </a>
      <nav class="nav">
        <a href="form-cadastrar-pedido.php" class="btn small">Cadastrar</a>
        <a href="listar-pedido.php">Atualizar/Excluir</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Cadastro de Pedidos</h1>
      <p class="lead text-center">Preencha os dados abaixo para incluir um novo produto no pedido.</p>

      <form action="exec-cadastrar-pedido.php" method="post" enctype="multipart/form-data" class="form mt-6">
        <label>Status:</label>
        <input type="text" name="status" required>

        <label>Horario do Pedido:</label>
        <input type="time" name="horarioPedido" required>
        <br>
        <label>Horario de Entrega:</label>
        <input type="time" name="horarioEntrega" required>
        <br>
        <label>Id do Restaurante:</label>
        <input type="text" name="idRestaurante" required>

        <label>Id do Cliente:</label>
        <input type="text" name="idCliente" required>

        <label>Id do Entregador:</label>
        <input type="text" name="idEntregador">

        <input class="botao" type="submit" value="Cadastrar">
      </form>
      <?php
      if (isset($_GET['retorno']) && $_GET['retorno'] === 'ok') {
        echo '<div class="mensagem-sucesso text-center mt-6">Pedido cadastrado com sucesso!</div>';
      }
      ?>
    </main>
    <footer class="footer text-center">
      <p>Sistema de Cadastro de pedidos 2025 &copy; </p>
    </footer>
  </div>
</body>

</html>