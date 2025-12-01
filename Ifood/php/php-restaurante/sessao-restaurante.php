<?php
session_start();
include("../conectar.php");
require_once('verificar-sessao-restaurante.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../img/Icon.png" type="image/png">
  <title>Ifood</title>
  <link rel="stylesheet" href="../../css/menupedidos.style.css">
</head>

<body>
  <?php
  $email = $_SESSION['emailRestaurante'];
  $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
  $resultado = $conexao->query($sql);
  $linha = $resultado->fetch_assoc();

  $sqlRestaurante = "SELECT * FROM Restaurante";
  $resultadoRestaurante = $conexao->query($sqlRestaurante);
  ?>

  <div class="cabecalho">
    <a id="voltar" href="perfil-Restaurante.php">
      <?php echo $linha['nomeRestaurante'] ?>
    </a>
    <a id="verpedidos" href="menu-pedidos-restaurante.php">Pedidos</a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    <a id="verrestaurantes" href="sessao-restaurante.php">Produtos</a>
    <a id="logout" href="deslogar-restaurante.php">Logout</a>
  </div>

  <div class="corpo">
    <a class="botao" href="../php-produto/form-cadastrar-produto.php">Cadastrar um Produto</a>
    <a class="botao" href="../php-produto/listar-produtos.php">Ver os Produtos</a>
  </div>

  <div class="rodape-movel">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>