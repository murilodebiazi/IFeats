DROP DATABASE IFeats;
CREATE DATABASE IFeats;
USE IFeats;

CREATE TABLE Cliente
(
idCliente INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
nomeCliente VARCHAR(200) NOT NULL,
enderecoCliente VARCHAR(255),
telefoneCliente VARCHAR(11),
CPFCliente CHAR(14) NOT NULL UNIQUE,
emailCliente VARCHAR(75) NOT NULL UNIQUE,
senhaCliente VARCHAR(200) NOT NULL
);

CREATE TABLE Entregador
(
idEntregador INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
nomeEntregador VARCHAR(200) NOT NULL,
transporte VARCHAR(20),
CPFEntregador CHAR(14) NOT NULL UNIQUE,
emailEntregador VARCHAR(200) NOT NULL UNIQUE,
senhaEntregador VARCHAR(200) NOT NULL ,
isDisponivel BOOLEAN DEFAULT 0,
avaliacao DOUBLE DEFAULT 0.00
);

CREATE TABLE Restaurante
(
idRestaurante INT PRIMARY KEY AUTO_INCREMENT,
cnpj CHAR(14) NOT NULL UNIQUE,
nomeRestaurante VARCHAR(200) NOT NULL,
emailRestaurante VARCHAR(200) NOT NULL UNIQUE,
avaliacao DOUBLE DEFAULT 0.00,
categoria VARCHAR(100),
descricao TEXT,
enderecoRestaurante VARCHAR(255),
telefoneRestaurante VARCHAR(11),
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
FOREIGN KEY(idEntregador) REFERENCES Entregador (idEntregador)
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

CREATE VIEW infoIP AS
SELECT i.idPedido AS idPedido,
p.nomeProduto AS nomeProduto,
i.quantidade AS quantidade,
p.preco AS precoProduto,
(SELECT (quantidade * precoProduto) FROM produto GROUP BY(idPedido)) AS precoPorProduto
FROM itemPedido i
JOIN Produto p
ON i.idProduto = p.idProduto;

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

SELECT *
FROM Restaurante R
WHERE (SELECT COUNT(idProduto) 
FROM Produto 
WHERE emEstoque = 1 
GROUP BY(idRestaurante) 
HAVING idRestaurante = R.idRestaurante) > 0;

SELECT *
FROM Produto p
WHERE p.preco > x;

CREATE VIEW EntregadoresDisponiveis AS
SELECT *
FROM Entregador
WHERE disponivel = true;

CREATE VIEW produtosMenorPreco AS
SELECT *
FROM Produto
ORDER BY preco;

CREATE VIEW produtosMaiorPreco AS
SELECT *
FROM Produto
ORDER BY preco DESC;

CREATE VIEW produtosAlfabetico AS
SELECT *
FROM Produto
ORDER BY nomeProduto;




