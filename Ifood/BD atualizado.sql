DROP DATABASE IF EXISTS IFeats;
CREATE DATABASE IFeats;
USE IFeats;

CREATE TABLE Cliente
(
idCliente INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
nomeCliente VARCHAR(200) NOT NULL,
enderecoCliente VARCHAR(255),
telefoneCliente VARCHAR(13),
CPFCliente VARCHAR(14) NOT NULL UNIQUE,
emailCliente VARCHAR(200) NOT NULL UNIQUE,
senhaCliente VARCHAR(200) NOT NULL
);

CREATE TABLE Entregador
(
idEntregador INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
nomeEntregador VARCHAR(200) NOT NULL,
transporte VARCHAR(20),
CPFEntregador VARCHAR(14) NOT NULL UNIQUE,
emailEntregador VARCHAR(200) NOT NULL UNIQUE,
senhaEntregador VARCHAR(200) NOT NULL,
isDisponivel BOOLEAN DEFAULT 0,
avaliacao DOUBLE DEFAULT 0.00
);

CREATE TABLE Restaurante
(
idRestaurante INT PRIMARY KEY AUTO_INCREMENT,
cnpj VARCHAR(18) NOT NULL UNIQUE,
nomeRestaurante VARCHAR(200) NOT NULL,
emailRestaurante VARCHAR(200) NOT NULL UNIQUE,
avaliacao DOUBLE DEFAULT 0.00,
categoria VARCHAR(100),
descricao TEXT,
enderecoRestaurante VARCHAR(255),
telefoneRestaurante VARCHAR(13),
senhaRestaurante VARCHAR(200)
);

CREATE TABLE Produto
(
idProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
emEstoque BOOLEAN NOT NULL,
preco DOUBLE NOT NULL,
nomeProduto VARCHAR(100) NOT NULL,
descricao TEXT NOT NULL,
categoria VARCHAR(25) NOT NULL,
idRestaurante INT,
FOREIGN KEY(idRestaurante) REFERENCES Restaurante (idRestaurante) ON DELETE CASCADE
);

CREATE TABLE Pedido
(
idPedido INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
status VARCHAR(20) NOT NULL,
horarioPedido TIME,
horarioEntregue TIME,
idRestaurante INT NOT NULL,
idCliente INT NOT NULL,
idEntregador INT,
FOREIGN KEY(idRestaurante) REFERENCES Restaurante (idRestaurante) ON DELETE CASCADE,
FOREIGN KEY(idCliente) REFERENCES Cliente (idCliente) ON DELETE CASCADE,
FOREIGN KEY(idEntregador) REFERENCES Entregador (idEntregador) ON DELETE CASCADE
);

CREATE TABLE itemPedido
(
idPedido INT,
idProduto INT,
pedidosProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
quantidade INT NOT NULL,
FOREIGN KEY(idPedido) REFERENCES Pedido (idPedido) ON DELETE CASCADE,
FOREIGN KEY(idProduto) REFERENCES Produto (idProduto) ON DELETE CASCADE
);

CREATE TABLE administrador
(
nome VARCHAR(200),
senha VARCHAR(200)
);

CREATE TABLE avaliacaoPedido 
(
idAvaliacao INT PRIMARY KEY AUTO_INCREMENT,
notaRestaurante DOUBLE NOT NULL,
notaEntregador DOUBLE NOT NULL,
descricaoNotaRestaurante TEXT,
descricaoNotaEntregador TEXT,
idRestaurante INT,
idEntregador INT,
idPedido INT,
FOREIGN KEY(idRestaurante) REFERENCES Restaurante (idRestaurante) ON DELETE CASCADE,
FOREIGN KEY(idEntregador) REFERENCES Entregador (idEntregador) ON DELETE CASCADE,
FOREIGN KEY(idPedido) REFERENCES Pedido (idPedido) ON DELETE CASCADE
);


-- INFOS 
CREATE VIEW infoIP AS
SELECT i.idPedido AS idPedido,
p.nomeProduto AS nomeProduto,
i.quantidade AS quantidade,
p.preco AS precoProduto,
(SELECT (quantidade * precoProduto) FROM produto GROUP BY(idPedido)) AS precoPorProduto
FROM itemPedido i
JOIN Produto p
ON i.idProduto = p.idProduto;

-- TODAS AS INFOS PERTINENTES DE UM PEDIDO
CREATE VIEW infoPedido AS
SELECT p.idPedido AS idPedido,
c.nomeCliente AS nomeCliente,
c.enderecoCliente AS enderecoCliente,
p.status AS status,
p.horarioPedido AS horarioPedido,
p.horarioEntregue AS horarioEntregue,
p.idEntregador AS idEntregador,
p.idRestaurante AS idRestaurante,
r.nomeRestaurante AS nomeRestaurante,
r.enderecoRestaurante AS enderecoRestaurante,
(SELECT SUM(precoPorProduto) FROM infoIP GROUP BY(idPedido) HAVING idPedido = p.idPedido) AS precoPedido
FROM Pedido p
JOIN infoIP ip
ON p.idPedido = ip.idPedido
JOIN Cliente c
ON c.idCliente = p.idCliente
JOIN Restaurante r
ON r.idRestaurante = p.idRestaurante
GROUP BY(idPedido);

-- FUNCTION PARA CALCULAR UMA AVALIAÇÃO DE UM CLIENTE PARA UM ENTREGADOR
DELIMITER //
CREATE FUNCTION calcular_avaliacao_entregador (idE INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
    DECLARE avaliacao DECIMAL(10,2);
    SET avaliacao = (SELECT SUM(notaEntregador) FROM avaliacaoPedido WHERE idEntregador = idE) / (SELECT COUNT(*) FROM avaliacaoPedido WHERE idEntregador = idE);
    RETURN avaliacao;
END;
// DELIMITER ;

-- FUNCTION PARA CALCULAR UMA AVALIAÇÃO DE UM CLIENTE PARA UM RESTAURANTE
DELIMITER //
CREATE FUNCTION calcular_avaliacao_restaurante (idR INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
    DECLARE avaliacao DECIMAL(10,2);
    SET avaliacao = (SELECT SUM(notaRestaurante) FROM avaliacaoPedido WHERE idRestaurante = idR) / (SELECT COUNT(*) FROM avaliacaoPedido WHERE idRestaurante = idR);
    RETURN avaliacao;
END;
// DELIMITER ;

-- ORDENA OS PRODUTOS DE UM RESTAURANTE EM ORDEM DE MENOR VALOR DE PREÇO
CREATE VIEW produtosMenorPreco AS
SELECT *
FROM Produto
ORDER BY preco;

-- ORDENA OS PRODUTOS DE UM RESTAURANTE EM ORDEM DE MAIOR VALOR DE PREÇO
CREATE VIEW produtosMaiorPreco AS
SELECT *
FROM Produto
ORDER BY preco DESC;

-- ORDENA OS PRODUTOS DE UM RESTAURANTE EM ORDEM ALFABÉTICA
CREATE VIEW produtosAlfabetico AS
SELECT *
FROM Produto
ORDER BY nomeProduto;

-- SELECIONA SOMENTE RESTAURANTES COM ESTOQUES DE ALGUM PRODUTO DELES
CREATE VIEW restaurantesComEstoque AS
SELECT *
FROM Restaurante R
WHERE (SELECT COUNT(idProduto) 
FROM Produto 
WHERE emEstoque = 1 
GROUP BY(idRestaurante) 
HAVING idRestaurante = R.idRestaurante) > 0;