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
    <link rel="stylesheet" href="../../css/vercardapio.style.css">
</head>

<body>
    <?php
    $email = $_SESSION['emailCliente'];
    $sql = "SELECT * FROM Cliente WHERE emailCliente = '$email'";
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch_assoc();

    $idRestaurante= $_GET['id'];
    $sqlRestaurante= "SELECT * FROM Restaurante WHERE idRestaurante = '$idRestaurante'";
    $restaurante= $conexao->query($sqlRestaurante);
    $linhaR = mysqli_fetch_assoc($restaurante); 

    $sqlProdutos = "SELECT * FROM Produto WHERE idRestaurante = '$idRestaurante'";
    $produtosListados = $conexao->query($sqlProdutos);
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

        <div class="">
            <h1>
                <?php echo $linhaR['nomeRestaurante'] ?>
            </h1>
            <p>Categoria:
                <?php echo $linhaR['categoria'] ?>
            </p>
            <p>
                <?php echo $linhaR['avaliacao'] ?>
            </p>
            <p>Endereço:
                <?php echo $linhaR['enderecoRestaurante'] ?>
            </p>
            <p>Telefone:
                <?php echo $linhaR['telefoneRestaurante'] ?>
            </p>
        </div>

        <a href="../php-pedido/criar-pedido.php?id=<?php echo $idRestaurante?>"> + Fazer Pedido</a>

        <h1>Cardapio:</h1>
        <div class="cardapio">
            <?php while ($linhaP = mysqli_fetch_assoc($produtosListados)) { ?>
            <div class="produto">
                <p>
                    <?php echo $linhaP['nomeProduto'];?>
                </p>
                <p> R$
                    <?php echo $linhaP['preco'];?>
                </p>
                <p>
                    <?php echo $linhaP['categoria'];?>
                </p>
                <p>
                    <?php echo $linhaP['descricao'];?>
                </p>
                <?php if($linhaP['emEstoque'] == 0){?>
                <p>Indisponível</p>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>