<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cadastrar Produto</title>
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
        <a href="form-cadastrar-cliente.php" class="btn small">Cadastrar</a>
        <a href="listar-cliente.php">Atualizar/Excluir</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <!-- Conteúdo -->
    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">

      <h1 class="h1 text-center">Cadastro de Clientes</h1>
      <p class="lead text-center">Preencha os dados abaixo para incluir um novo cliente.</p>

      <form action="exec-cadastrar-cliente.php" method="post" enctype="multipart/form-data" class="form mt-6">
        <label>Nome:</label>
        <input type="text" name="nome" size="10" required>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <label>Telefone:</label>
        <input type="number" name="telefone" required>

        <label>Endereço:</label>
        <input type="text" name="endereco" required>
        
        <br>

        <label>Email:</label>
        <input type="text" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <input class="botao" type="submit" value="Cadastrar">
      </form>

      <?php
      //Exibir alerta de sucesso se houver retorno na URL
      if (isset($_GET['retorno']) && $_GET['retorno'] === 'ok') {
        echo '<div class="mensagem-sucesso text-center mt-6">Cliente cadastrado com sucesso!</div>';
      }
      ?>

    </main>

    <footer class="footer text-center">
      <p>Sistema de Cadastro de Produtos 2025 &copy; </p>
    </footer>

  </div>
</body>

</html>