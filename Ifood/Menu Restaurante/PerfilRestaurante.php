<?php
    session_start();
    include("Login.php");
    require_once('VerificarSessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Ifood</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
    $email = $_SESSION['emailRestaurante'];
    $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
    $resultado = $conexao -> query($sql);
    $linha = $resultado->fetch_assoc();
  ?> 

  <div class="cabecalho">
    <a id="voltar" href="../Menu Restaurante/PerfilRestaurante.php"><?php echo $linha['nomeRestaurante']?></a>
    <a id="logo" href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
    <a id="logout" href="../Menu Restaurante/Logout.php">Logout</a>
  </div>

  <div class="corpo">
    <form class="perfil" action="Editar.php" method="POST">
      <h1> Perfil </h1>
      <label>Nome:</label>
      <input type="text" name="Restaurante" size="10" value='<?php echo $linha['nomeRestaurante']?>' required> 

      <label>CNPJ:</label>
      <input type="text" name="cnpj" value='<?php echo $linha['cnpj']?>' required> 

      <label>Email:</label>
      <input type="text" name="email" value='<?php echo $linha['emailRestaurante']?>' required>

      <label>Endereço:</label>
      <input type="text" name="endereço" value='<?php echo $linha['enderecoRestaurante']?>' required>

      <label>Telefone:</label>
      <input type="text" name="telefone" value='<?php echo $linha['telefoneRestaurante']?>' required>

      <label>Senha:</label>
      <input type="password" name="senha" value='<?php echo $linha['senhaRestaurante']?>' required> 

      <input class="botao" type="submit" value="Editar">

      <a class="botao-excluir" href="Excluir.php">Excluir Perfil</a>
    </form>
</div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>