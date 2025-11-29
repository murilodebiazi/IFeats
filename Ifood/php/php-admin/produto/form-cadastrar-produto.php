<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cadastrar Produto</title>
  <link rel="stylesheet" href="../../../css/style-admin.css">
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
        <a href="form-cadastrar-produto.php" class="btn small">Cadastrar</a>
        <a href="listar-produto.php">Atualizar/Excluir</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Cadastro de Produtos</h1>
      <p class="lead text-center">Preencha os dados abaixo para incluir um novo produto.</p>

      <form action="exec-cadastrar-produto.php" method="post" enctype="multipart/form-data" class="form mt-6">
        <label>Nome do Produto:</label>
        <input type="text" name="nome" required>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" max="100" inputmode="decimal">
        <br>
        <label>Descrição:</label>
        <input type="text" name="descricao" required>

        <label>Categoria:</label>
        <input type="text" name="categoria" required>

        <div class="escolha">
          <label>Em Estoque?:</label>
          <br>
          <input type="radio" name="estoque" value="1" required>
          <label>Sim</label>
          <input type="radio" name="estoque" value="0" required>
          <label>Não</label>
        </div>
        <br>
        <label>Id do Restaurante:</label>
        <input type="text" name="idRestaurante" required>

        <input class="botao" type="submit" value="Cadastrar">
      </form>
      <?php
      if (isset($_GET['retorno']) && $_GET['retorno'] === 'ok') {
        echo '<div class="mensagem-sucesso text-center mt-6">Produto cadastrado com sucesso!</div>';
      }
      ?>
    </main>
    <footer class="footer text-center">
      <p>Sistema de Cadastro de Produtos 2025 &copy; </p>
    </footer>
  </div>
</body>

</html>