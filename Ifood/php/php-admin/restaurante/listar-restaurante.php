<?php
require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$resultado = mysqli_query($conexao, "SELECT * FROM Restaurante");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
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
        <a href="form-cadastrar-restaurante.php" class="btn small">Cadastrar</a>
        <a href="listar-restaurante.php" class="btn small">Listar</a>
        <a href="../sessao-admin.php" class="btn small ghost">Voltar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="padding: 30px;">
      <h1 class="h1 text-center">Lista de Restaurantes</h1>
      <p class="lead text-center">Gerencie os Restaurantes cadastrados no sistema.</p>

      <?php
      if (isset($_GET['retorno'])) {
          $retorno = $_GET['retorno'];
          if ($retorno === 'Restaurante excluído com sucesso!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Exclusão cancelada!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Restaurante atualizado com sucesso!') {
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
              <th>CNPJ</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>Avaliação</th>
              <th>Categoria</th>
              <th>Descrição</th>
              <th>Endereço</th>
              <th style="width:150px;">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td>
                <?php echo htmlspecialchars($linha['idRestaurante']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['nomeRestaurante']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['cnpj']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['telefoneRestaurante']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['emailRestaurante']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['avaliacao']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['categoria']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['descricao']); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($linha['enderecoRestaurante']); ?>
              </td>
              <td class="actions">
                <a href="form-editar-restaurante.php?id=<?php echo $linha['idRestaurante']; ?>"
                  class="btn small">Atualizar</a>
                <a href="confirmar-excluir-restaurante.php?id=<?php echo $linha['idRestaurante']; ?>"
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