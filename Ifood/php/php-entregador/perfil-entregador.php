<?php
session_start();
include("../conectar.php");
require_once('verificar-sessao-entregador.php');
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
  $email = $_SESSION['emailEntregador'];
  $sql = "SELECT * FROM Entregador WHERE emailEntregador = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();
  ?>

  <div class="cabecalho">
    <a id="voltar" href="perfil-entregador.php">
      <?php echo $linha['nomeEntregador'] ?>
    </a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="logout" href="deslogar-entregador.php">Logout</a>
  </div>

  <div class="corpo">
    <form class="perfil" action="editar-entregador.php" method="POST">
      <h1> Perfil </h1>

      <label>Nome:</label>
      <input type="text" name="entregador" value='<?php echo $linha[' nomeEntregador'] ?>' required>

      <label>CPF:</label>
      <input type="text" name="cpf" value='<?php echo $linha[' CPFEntregador'] ?>' required>

      <label>Email:</label>
      <input type="email" name="email" value='<?php echo $linha[' emailEntregador'] ?>' required>

      <label>Senha:</label>
      <input type="password" name="senha" required>

      <label>Veículo:</label>

      <div class="escolha">
        <input type="radio" name="veiculo" value="bicicleta" <?php if($linha['transporte']=="bicicleta" ){?> checked
        <?php } ?>required>
        <label>Bicicleta</label>
        <input type="radio" name="veiculo" value="moto" <?php if($linha['transporte']=="moto" ){?> checked
        <?php } ?>required>
        <label>Moto</label>
        <input type="radio" name="veiculo" value="carro" <?php if($linha['transporte']=="carro" ){?> checked
        <?php } ?>required>
        <label>Carro</label>
      </div>

      <input class="botao" type="submit" value="Editar">

      <a class="botao-excluir" href="excluir-entregador.php">Excluir Perfil</a>

    </form>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>