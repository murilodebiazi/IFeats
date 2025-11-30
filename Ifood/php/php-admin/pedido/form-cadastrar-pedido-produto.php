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

  $idPedido = $_GET['idPedido'];

  $idRestaurante = $_GET['idRestaurante'];
  $sqlRestaurante = "SELECT * FROM Produto WHERE idRestaurante = '$idRestaurante'";
  $resultadoRestaurante = $conexao->query($sqlRestaurante);

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
      <p class="lead text-center">Preencha os dados abaixo para incluir um novo pedido.</p>

      <form action="exec-cadastrar-pedido-produto.php" method="post" enctype="multipart/form-data" class="form mt-6">
        <input type="hidden" name="idPedido" value='<?php echo $idPedido ?>'>
        <input type="hidden" name="idRestaurante" value='<?php echo $idRestaurante ?>'>

        <label>Produto:</label>
        <input list="produto" name="produto">
        <datalist id="produto">
          <?php while ($linha = mysqli_fetch_assoc($resultadoRestaurante)) { ?>
          <option value='<?php echo $linha['nomeProduto'] ?>'>
            <?php } ?>
        </datalist>
        <br>
        <br>
        <label>Quantidade:<label>
            <input type="number" name="quantidade" value='1' required>
            <br>
            <br>
            <input class="botao" type="submit" value="Adicionar Produto" name="adicionar">
            <input class="botao" type="submit" value="Finalizar Pedido" name="finalizar">
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