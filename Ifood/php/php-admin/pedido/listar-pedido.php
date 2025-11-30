<?php
require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");


// Consulta os pedidos
$resultado = mysqli_query($conexao, "SELECT * FROM pedido");

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Lista de Pedidos</title>
  <link rel="stylesheet" href="../../../css/style-admin.css">
  <link rel="icon" href="../../../img/Icon_restrito.png" type="image/png">
</head>

<body>

  <div class="container">

    <header class="header">
      <a href="#" class="brand">
        <img src="../../../img/restrito.png" alt="Logo do sistema">
        <span>Área Administrativa</span>
      </a>
      <nav class="nav">
        <a href="form-cadastrar-pedido.php" class="btn small">Cadastrar</a>
        <a href="listar-pedido.php" class="btn small">Listar</a>
        <a href="../sessao-admin.php" class="btn small ghost">Voltar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="padding: 30px;">
      <h1 class="h1 text-center">Lista de Pedidos</h1>
      <p class="lead text-center">Gerencie os pedidos cadastrados no sistema.</p>

      <?php
      if (isset($_GET['retorno'])) {
        $retorno = $_GET['retorno'];
        if ($retorno === 'pedido excluído com sucesso!') {
          echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
        } elseif ($retorno === 'Exclusão cancelada!') {
          echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
        } elseif ($retorno === 'pedido atualizado com sucesso!') {
          echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
        }
      }
      ?>

      <div class="mt-6">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Horário do Pedido</th>
              <th>Horário de Entrega</th>
              <th>Id do Restaurante</th>
              <th>Id do Cliente</th>
              <th>Id do Entregador</th>
              <th>Produtos</th>
              <th style="width:150px;">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td>
                <?php echo htmlspecialchars($linha['idPedido']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['horarioPedido']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['horarioEntregue']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['idRestaurante']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['idCliente']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['idEntregador']); ?>
              </td>
              <td>
                <?php
                  $idPedido = $linha['idPedido'];
                  $resultadoP = mysqli_query($conexao, "SELECT * FROM itemPedido WHERE idPedido='$idPedido'");
                  while ($linhaP = mysqli_fetch_assoc($resultadoP)) { ?>
                IdProduto:
                <?php echo $linhaP['idProduto']; ?> Quantidade:
                <?php echo $linhaP['quantidade']; ?>
                <?php } ?>
              </td>
              <td class="actions">
                <a href="confirmar-excluir-pedido.php?id=<?php echo $linha['idPedido']; ?>"
                  class="btn small danger">Excluir</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <?php
      mysqli_close($conexao);
      ?>

    </main>

    <footer class="footer text-center">
      <p>Sistema de Cadastro de pedidos 2025&copy;</p>
    </footer>

  </div>
</body>

</html>