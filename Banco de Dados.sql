DROP DATABASE IFeats;
CREATE DATABASE IFeats;
USE IFeats;

CREATE TABLE Cliente 
( 
 idCliente INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 nomeCliente VARCHAR(200) NOT NULL,  
 enderecoCliente VARCHAR(255) NOT NULL,  
 telefoneCliente VARCHAR(11) NOT NULL,  
 generoCliente VARCHAR(10) NOT NULL,  
 CPFCliente CHAR(14) NOT NULL UNIQUE,  
 emailCliente VARCHAR(75) NOT NULL UNIQUE,
 senhaCliente VARCHAR(15) NOT NULL
); 

CREATE TABLE Entregador 
( 
 nomeEntregador VARCHAR(200) NOT NULL,  
 idEntregador INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 transporte VARCHAR(20) NOT NULL,  
 CPFEntregador CHAR(14) NOT NULL UNIQUE,  
 emailEntregador VARCHAR(200) NOT NULL UNIQUE,  
 generoEntregador VARCHAR(10) NOT NULL,  
 score INT NOT NULL,  
 idade INT NOT NULL,  
 disponivel BOOLEAN NOT NULL,
 senhaEntregador VARCHAR(15) NOT NULL
); 

CREATE TABLE Restaurante
( 
 idRestaurante INT PRIMARY KEY,  
 cnpj CHAR(14) NOT NULL UNIQUE,
 nomeRestaurante VARCHAR(200) NOT NULL,  
 avaliacao DOUBLE NOT NULL,  
 enderecoRestaurante VARCHAR(255) NOT NULL,  
 telefoneRestaurante VARCHAR(11),
 senhaRestaurante VARCHAR(15)
); 

CREATE TABLE Produto 
( 
 idProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT, 
 estoque INT NOT NULL,   
 preco INT NOT NULL,
 nomeProduto VARCHAR(100) NOT NULL,  
 descricao TEXT NOT NULL,  
 categoria VARCHAR(25) NOT NULL,  
 idRestaurante INT,  
 FOREIGN KEY(idRestaurante) REFERENCES Restaurante (idRestaurante)
); 

CREATE TABLE Pedido 
( 
 idPedidos INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 distancia INT NOT NULL,  
 entregue INT NOT NULL,  
 horarioPedido DATETIME,  
 tempoEstimado TIME,  
 horarioEntregue DATETIME,  
 idRestaurante INT,  
 idCliente INT,  
 idEntregador INT,  
 FOREIGN KEY(idRestaurante) REFERENCES Restaurante (idRestaurante),
 FOREIGN KEY(idCliente) REFERENCES Cliente (idCliente),
 FOREIGN KEY(idEntregador) REFERENCES Entregador (idEntregador)
); 

CREATE TABLE itemPedido 
( 
 idPedidos INT,  
 idProduto INT,  
 pedidosProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 quantidade INT NOT NULL,  
 FOREIGN KEY(idPedidos) REFERENCES Pedido (idPedidos),
 FOREIGN KEY(idProduto) REFERENCES Produto (idProduto)
); 

CREATE VIEW produtoPorRestaurante AS
SELECT * FROM Produto
JOIN Restaurante
ON idRestaurante = idRestaurante;

SELECT SUM(preco)
FROM Produto
WHERE idPedido = x;

SELECT MIN(preco)
FROM Produto
WHERE idRestaurante = x;

SELECT P.nomeProduto, MAX(preco)
FROM Produto P
JOIN Restaurante R
ON P.idRestaurante = R.idRestaurante
GROUP BY R.idRestaurante, P.nomeProduto;

