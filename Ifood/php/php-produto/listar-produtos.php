<?php
session_start();
include("../conectar.php");
require_once('../php-restaurante/verificar-sessao-restaurante.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/vercardapio.style.css">
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
                    <p> <?php echo $linhaP['nomeProduto'];?> </p>
                    <p>R$<?php echo $linhaP['preco'];?> </p>
                    <p> <?php echo $linhaP['categoria'];?> </p>
                    <a href="form-editar-produto.php?id=<?php echo $linhaP['idProduto']?>">Editar</a> 
                    <a href="excluir-produto.php?id=<?php echo $linhaP['idProduto']?>">Excluir</a> 
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
            <script type="text/javascript">
                alert("Produto editado com sucesso!");
            </script>
    <?php endif; ?>
</body>

</html>