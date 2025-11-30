<?php
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
  die("ID inválido.");
}

$resultado = mysqli_query($conexao, "SELECT * FROM Entregador WHERE idEntregador = $id");
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
  die("Entregador não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Entregador</title>
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
        <a href="form-cadastrar-entregador.php">Cadastrar</a>
        <a href="listar-entregador.php" class="btn small">Listar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Editar Entregador</h1>
      <p class="lead text-center">Atualize as informações do Entregador selecionado.</p>

      <form class="perfil" action="exec-atualizar-entregador.php" method="POST" class="form mt-6">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['idEntregador']); ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value='<?php echo $linha['nomeEntregador']?>'required>

        <label>CPF:</label>
        <input type="text" name="cpf" value='<?php echo $linha['CPFEntregador']?>' required>

        <label>Email:</label>
        <input type="text" name="email" value='<?php echo $linha['emailEntregador']?>' required>

        <label>Senha:</label>
        <input type="text" name="senha" required>

        <label>Avaliacao:</label>
        <input type="text" name="avaliacao" value='<?php echo $linha['avaliacao']?>'required>

        <label>Veículo:</label>

        <div class="escolha">
          <input type="radio" name="transporte" value="bicicleta" required>
          <label>Bicicleta</label>

          <input type="radio" name="transporte" value="moto" required>
          <label>Moto</label>

          <input type="radio" name="transporte" value="carro" required>
          <label>Carro</label>
        </div>

        <div class="text-center mt-6">
          <button type="submit" class="btn">Atualizar</button>
          <a href="listar-entregador.php" class="btn ghost">Voltar</a>
        </div>
      </form>

    </main>

    <footer class="footer text-center">
      <p>Sistema de Cadastro de Entregadors 2025&copy;</p>
    </footer>

  </div>

</body>

</html>