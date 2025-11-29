<?php
error_reporting(E_ALL);

require_once("../../conectar.php");
require_once("../verificar-sessao-admin.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
  die("ID inválido.");
}

$resultado = mysqli_query($conexao, "SELECT * FROM Cliente WHERE idCliente = $id");
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
  die("Cliente não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
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
        <a href="form-cadastrar-cliente.php">Cadastrar</a>
        <a href="listar-cliente.php" class="btn small">Listar</a>
        <a href="../deslogar-admin.php" class="btn small ghost">Sair</a>
      </nav>
    </header>

    <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
      <h1 class="h1 text-center">Editar Cliente</h1>
      <p class="lead text-center">Atualize as informações do cliente selecionado.</p>

      <form class="perfil" action="exec-atualizar-cliente.php" method="POST" class="form mt-6">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['idCliente']); ?>">

        <label>Nome:</label>
        <input type="text" name="cliente" size="10" value='<?php echo $linha[' nomeCliente']?>' required>

        <label>CPF:</label>
        <input type="text" name="cpf" value='<?php echo $linha[' CPFCliente']?>' required>

        <label>Telefone:</label>
        <input type="number" name="telefone" value='<?php echo $linha[' telefoneCliente']?>' required>

        <label>Email:</label>
        <input type="text" name="email" value='<?php echo $linha[' emailCliente']?>' required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <div class="text-center mt-6">
          <button type="submit" class="btn">Atualizar</button>
          <a href="listar-cliente.php" class="btn ghost">Voltar</a>
        </div>
        
      </form>

    </main>

    <footer class="footer text-center">
      <p>Sistema de Cadastro de Clientes 2025&copy;</p>
    </footer>
  </div>

</body>

</html>