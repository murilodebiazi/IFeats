<?php
session_start();
include("../conectar.php");
require_once('verificar-sessao-cliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../img/Icon.png" type="image/png">
  <title>Ifood</title>
  <link rel="stylesheet" href="../../css/perfil.style.css">
</head>

<body>

  <?php
  $email = $_SESSION['emailCliente'];
  $sql = "SELECT * FROM Cliente WHERE emailCliente = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();
  ?>

  <div class="cabecalho">
    <a id="voltar" href="perfil-cliente.php">
      <?php echo $linha['nomeCliente'] ?>
    </a>
    <a id="verpedidos" href="menu-pedidos-cliente.php">Pedidos</a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="verrestaurantes" href="sessao-cliente.php">Restaurantes</a>
    <a id="logout" href="deslogar-cliente.php">Logout</a>
  </div>

  <div class="corpo">
    <form class="perfil" action="editar-cliente.php" method="POST">
      <h1> Perfil </h1>
      <label>Nome:</label>
      <input type="text" name="cliente" size="10" value='<?php echo $linha['nomeCliente'] ?>' required>

      <label>CPF:</label>
      <input type="text" name="cpf" value='<?php echo $linha['CPFCliente'] ?>' required>

      <label>Telefone:</label>
      <input type="number" name="telefone" value='<?php echo $linha['telefoneCliente'] ?>' required>

      <label>Email:</label>
      <input type="text" name="email" value='<?php echo $linha['emailCliente'] ?>' required>

      <label>Endereço:</label>
      <input type="text" name="endereco" value='<?php echo $linha['enderecoCliente'] ?>' required>

      <label>Senha:</label>
      <input type="password" name="senha" required>

      <input class="botao" type="submit" value="Editar">

      <a class="botao-excluir" href="excluir-cliente.php">Excluir Perfil</a>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'erro'): ?>
        <script type="text/javascript">
          alert("algo deu errado!");
        </script>
      <?php endif; ?>

    </form>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>