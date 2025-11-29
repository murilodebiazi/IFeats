<?php
require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$resultado = mysqli_query($conexao, "SELECT * FROM Cliente");
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

    <header class="header">
      <a href="#" class="brand">
        <img src="../../../img/restrito.png" alt="Logo do sistema">
        <span>Área Administrativa</span>
      </a>
      <nav class="nav">
        <a href="form-cadastrar-cliente.php" class="btn small">Cadastrar</a>
        <a href="listar-cliente.php" class="btn small">Listar</a>
        <a href="../sessao-admin.php" class="btn small ghost">Voltar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="padding: 30px;">
      <h1 class="h1 text-center">Lista de Clientes</h1>
      <p class="lead text-center">Gerencie os clientes cadastrados no sistema.</p>

      <?php
      if (isset($_GET['retorno'])) {
          $retorno = $_GET['retorno'];
          if ($retorno === 'Cliente excluído com sucesso!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Exclusão cancelada!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Cliente atualizado com sucesso!') {
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
              <th>Telefone</th>
              <th>CPF</th>
              <th>Email</th>
              <th style="width:150px;">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td>
                <?php echo htmlspecialchars($linha['idCliente']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['nomeCliente']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['telefoneCliente']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['CPFCliente']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['emailCliente']); ?>
              </td>
              <td class="actions">
                <a href="form-editar-cliente.php?id=<?php echo $linha['idCliente']; ?>" class="btn small">Atualizar</a>
                <a href="confirmar-excluir-cliente.php?id=<?php echo $linha['idCliente']; ?>"
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
      <p>Sistema de Cadastro de Produtos 2025&copy;</p>
    </footer>

  </div>
</body>

</html>