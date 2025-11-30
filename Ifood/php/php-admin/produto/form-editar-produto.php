<?php
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
  die("ID inválido.");
}

$resultado = mysqli_query($conexao, "SELECT * FROM Produto WHERE idProduto = $id");
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
  die("Produto não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Restaurante</title>
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
        <a href="form-cadastrar-produto.php">Cadastrar</a>
        <a href="listar-produto.php" class="btn small">Listar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Editar Produto</h1>
      <p class="lead text-center">Atualize as informações do Produto selecionado.</p>

      <form class="perfil" action="exec-atualizar-produto.php" method="POST" class="form mt-6">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['idProduto']); ?>">

        <label>Nome do Produto:</label>
        <input type="text" name="nome" size="10" value='<?php echo $linha['nomeProduto']?>' required>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" max="100" inputmode="decimal" value='<?php echo $linha['
          preco']?>' required>

        <label>Descrição:</label>
        <input type="text" name="descricao" value='<?php echo $linha['descricao']?>' required>

        <label>Categoria:</label>
        <input type="text" name="categoria" value='<?php echo $linha['categoria']?>' required>

        <label>Em Estoque?:</label>

        <input type="radio" name="estoque" value="1" required>
        <label>Sim</label>

        <input type="radio" name="estoque" value="0" required>
        <label>Não</label>

        <label>Id do Restaurante:</label>
        <input type="text" name="idRestaurante" value='<?php echo $linha['id_Restaurante']?>' required>

        <div class="text-center mt-6">
          <button type="submit" class="btn">Atualizar</button>
          <a href="listar-restaurante.php" class="btn ghost">Voltar</a>
        </div>
      </form>

    </main>

    <footer class="footer text-center">
      <p>Sistema de Cadastro de Restaurantes 2025&copy;</p>
    </footer>

  </div>

</body>

</html>