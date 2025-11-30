<?php
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
  die("ID inválido.");
}

$resultado = mysqli_query($conexao, "SELECT * FROM Restaurante WHERE idRestaurante = $id");
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
  die("Restaurante não encontrado.");
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
        <a href="form-cadastrar-restaurante.php">Cadastrar</a>
        <a href="listar-restaurante.php" class="btn small">Listar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Editar Restaurante</h1>
      <p class="lead text-center">Atualize as informações do Restaurante selecionado.</p>

      <form class="perfil" action="exec-atualizar-restaurante.php" method="POST" class="form mt-6">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['idRestaurante']); ?>">

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
        <input type="text" name="avaliacao" value='<?php echo $linha['avaliacao']?>' required>

        <label>Categoria:</label>
        <input type="text" name="categoria" value='<?php echo $linha['categoria']?>' required>

        <label>Descrição:</label>
        <input type="text" name="telefone" value='<?php echo $linha['descricao']?>' required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

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