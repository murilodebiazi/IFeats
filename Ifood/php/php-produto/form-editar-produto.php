<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include("../conectar.php");
require_once('../php-restaurante/verificar-sessao-restaurante.php');
?>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/form.style.css">
</head>

<body>
    <?php
      $idProduto = $_GET['id'];
      $sqlP = "SELECT * FROM Produto WHERE idProduto = '$idProduto'";
      $resultadoP = $conexao->query($sqlP);
      $linhaP =  $resultadoP->fetch_assoc(); 
    ?>

    <div class="cabecalho">
        <a id="voltar" href="../php-restaurante/sessao-restaurante.php">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    </div>

    <div class="corpo">
        <form class="form" action="editar-produto.php" method="POST">
            <input type="hidden" name="idProduto" value='<?php echo $idProduto;?>'>

            <label>Nome do Produto:</label>
            <input type="text" name="produto" value='<?php echo $linhaP['nomeProduto'] ?>' required>

            <label>Preço do Produto:</label>
            <input type="number" name="preco" min="0" step="0.01" value='<?php echo $linhaP['preco'] ?>' required>

            <label>Descrição do Produto:</label>
            <textarea name="descricao" rows="5" col="30" required><?php echo $linhaP['descricao'] ?></textarea>

            <label>Categoria do Produto:</label>
            <input type="text" name="categoria" value='<?php echo $linhaP['categoria'] ?>' required>

            <label>Em Estoque?:</label>

            <div class="escolha">
                <input type="radio" name="estoque" value="1" <?php if($linhaP['emEstoque']==1){?> checked
                <?php } ?> required>
                <label>Sim</label>

                <input type="radio" name="estoque" value="0" <?php if($linhaP['emEstoque']==0){?> checked
                <?php } ?> vrequired>
                <label>Não</label>
            </div>

            <p id="erro"></p>

            <input class="botao" type="submit" value="Editar Produto">
        </form>
    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>