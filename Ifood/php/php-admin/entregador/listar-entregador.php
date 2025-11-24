<?php
require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

// Consulta os produtos
$resultado = mysqli_query($conexao, "SELECT * FROM entregador");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
  <link rel="stylesheet" href="../../../css/style-admin.css">
</head>
<body>

<div class="container">

  <!-- Cabeçalho -->
  <header class="header">
    <a href="#" class="brand">
      <img src="../../../img/restrito.png" alt="Logo do sistema">
      <span>Área Administrativa</span>
    </a>
    <nav class="nav">
      <a href="form-cadastrar-entregador.php" class="btn small">Cadastrar</a>
      <a href="listar-entregador.php" class="btn small">Listar</a>
      <a href="../sessao-admin.php" class="btn small ghost">Voltar</a>
      <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
    </nav>
  </header>

  <!-- Conteúdo principal -->
  <main class="card" style="padding: 30px;">
    <h1 class="h1 text-center">Lista de entregadores</h1>
    <p class="lead text-center">Gerencie os entregadores cadastrados no sistema.</p>

    <!-- Mensagem de retorno -->
    <?php
      if (isset($_GET['retorno'])) {
          $retorno = $_GET['retorno'];
          if ($retorno === 'entregador excluído com sucesso!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Exclusão cancelada!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'entregador atualizado com sucesso!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          }
      }
    ?>

    <div class="mt-6">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Transporte</th>
            <th>Email</th>
            <th>avaliacao</th>
            <th style="width:150px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($linha['idEntregador']); ?></td>
              <td><?php echo htmlspecialchars($linha['nomeEntregador']); ?></td>
              <td><?php echo htmlspecialchars($linha['CPFEntregador']); ?></td>
              <td><?php echo htmlspecialchars($linha['transporte']); ?></td>
              <td><?php echo htmlspecialchars($linha['emailEntregador']); ?></td>
              <td><?php echo htmlspecialchars($linha['avaliacao']); ?></td>
              <td class="actions">
                <a href="form-editar-entregador.php?id=<?php echo $linha['idEntregador']; ?>" class="btn small">Atualizar</a>
                <a href="confirmar-excluir-entregador.php?id=<?php echo $linha['idEntregador']; ?>" class="btn small danger">Excluir</a>
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

  <!-- Rodapé -->
  <footer class="footer text-center">
    <p>Sistema de Cadastro de Produtos 2025&copy;</p>
  </footer>

</div>
</body>
</html>

