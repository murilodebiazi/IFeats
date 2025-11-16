<?php
session_start();
include("../php-restaurante/logar-restaurante.php");
require_once('../php-restaurante/verificar-sessao-restaurante.php');
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
    $sqlProdutos = "SELECT * FROM Produto";
    $produtosListados = $conexao->query($sqlProdutos);
    ?>
    <div class="cabecalho">
        <a id="voltar" href="../php-restaurante/sessao-restaurante.php">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
        <a id="logout" href="../php-restaurante/deslogar-restaurante.php">Logout</a>
    </div>
    <div class="corpo">
        <h1>Produtos:</h1>
        <div class="produtos">
            <?php while ($linhaP = mysqli_fetch_assoc($produtosListados)) { ?>
                <div class="produto">
                    <a href="PaginaProduto"> <?php echo $linhaP['nomeProduto'];?> </a>
                    <a href="PaginaProduto"> R$<?php echo $linhaP['preco'];?> </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>