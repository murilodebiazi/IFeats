<?php
session_start();
include("../php-cliente/logar-cliente.php");
require_once('../php-cliente/verificar-sessao-cliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/form.style.css">
</head>

<body>
    <?php
        $idPedido = $_GET['id'];

        $idRestaurante = $_GET['idR'];
        $sqlRestaurante = "SELECT * FROM Produto WHERE idRestaurante = '$idRestaurante' AND emEstoque='1'";
        $resultadoRestaurante = $conexao->query($sqlRestaurante);
    ?>

    <div class="cabecalho">
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    </div>

    <div class="corpo">
        <form action="pedido-produto.php" method="post" enctype="multipart/form-data" class="form mt-6">
        <input type="hidden" name="idPedido" value='<?php echo $idPedido?>'>
        <input type="hidden" name="idRestaurante" value='<?php echo $idRestaurante ?>'>

        <label>Produto: </label>
        <input list="produto" name="produto" placeholder="Selecione Produto" required>
        <datalist id="produto">
            <?php while ($linha = mysqli_fetch_assoc($resultadoRestaurante)) { ?>
                <option value='<?php echo $linha['nomeProduto'] ?>'>        
            <?php } ?>
        </datalist>

        <label>Quantidade<label>
        <input type="number" name="quantidade" value='1' required>
        <br>
        <br>
        <input class="botao" type="submit" value="Adicionar Produto" name="adicionar">
        <input class="botao" type="submit" value="Finalizar Pedido" name="finalizar">
        <input class="botao" type="submit" value="Cancelar Pedido" name="cancelar">
      </form>
    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>