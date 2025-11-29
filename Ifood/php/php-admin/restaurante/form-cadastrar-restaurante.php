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
        <a href="form-cadastrar-restaurante.php" class="btn small">Cadastrar</a>
        <a href="listar-restaurante.php">Atualizar/Excluir</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Cadastro de Restaurantes</h1>
      <p class="lead text-center">Preencha os dados abaixo para incluir um novo produto.</p>

      <form action="exec-cadastrar-restaurante.php" method="post" enctype="multipart/form-data" class="form mt-6">
        <label>Nome:</label>
        <input type="text" name="nome" size="10" value='<?php echo $linha['nomeRestaurante']?>' required>

        <label>CNPJ:</label>
        <input type="text" name="cnpj" value='<?php echo $linha['cnpj']?>' required>

        <label>Email:</label>
        <input type="text" name="email" value='<?php echo $linha['emailRestaurante']?>' required>

        <label>Endereço:</label>
        <input type="text" name="endereço" value='<?php echo $linha['enderecoRestaurante']?>' required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value='<?php echo $linha['telefoneRestaurante']?>' required>

        <label>Avaliação:</label>
        <input type="number" name="avaliacao" step="0.01" min="0" max="5" inputmode="decimal" value='<?php echo $linha['
          avaliacao']?>' required>
        <br>
        <label>Categoria:</label>
        <input type="text" name="categoria" value='<?php echo $linha['categoria']?>' required>

        <label>Descrição:</label>
        <input type="text" name="descricao" value='<?php echo $linha['descricao']?>' required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <input class="botao" type="submit" value="Cadastrar">
      </form>
      <?php
      if (isset($_GET['retorno']) && $_GET['retorno'] === 'ok') {
        echo '<div class="mensagem-sucesso text-center mt-6">Restaurante cadastrado com sucesso!</div>';
      }
    ?>
    </main>
    <footer class="footer text-center">
      <p>Sistema de Cadastro de Produtos 2025 &copy; </p>
    </footer>
  </div>
</body>

</html>