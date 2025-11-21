<?php
session_start();
include("logar-restaurante.php");
require_once('verificar-sessao-restaurante.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../img/Icon.png" type="image/png">
  <title>Ifood</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

  <?php
  $email = $_SESSION['emailRestaurante'];
  $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();
  ?>

  <div class="cabecalho">
    <a id="voltar" href="perfil-restaurante.php"><?php echo $linha['nomeRestaurante'] ?></a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="logout" href="deslogar-restaurante.php">Logout</a>
  </div>

  <div class="corpo">
    <form class="perfil" action="editar-restaurante.php" method="POST">
      <h1> Perfil </h1>
      <label>Nome:</label>
      <input type="text" name="Restaurante" size="10" value='<?php echo $linha['nomeRestaurante'] ?>' required>

      <label>CNPJ:</label>
      <input type="text" name="cnpj" value='<?php echo $linha['cnpj'] ?>' required>

      <label>Email:</label>
      <input type="text" name="email" value='<?php echo $linha['emailRestaurante'] ?>' required>

      <label>Endereço:</label>
      <input type="text" name="endereço" value='<?php echo $linha['enderecoRestaurante'] ?>' required>

      <label>Telefone:</label>
      <input type="text" name="telefone" value='<?php echo $linha['telefoneRestaurante'] ?>' required>

      <label>Categoria:</label>
      <input type="text" name="categoria" value='<?php echo $linha['categoria'] ?>' required>

      <label>Descrição:</label>
      <textarea name="descricao" rows="5" col="30" required><?php echo $linha['descricao'] ?></textarea>

      <label>Senha:</label>
      <input type="password" name="senha" required>

      <input class="botao" type="submit" value="Editar">

      <a class="botao-excluir" href="excluir-restaurante.php">Excluir Perfil</a>
    </form>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>