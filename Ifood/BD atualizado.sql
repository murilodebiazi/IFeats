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
 avaliacao DOUBLE,
 disponivel BOOLEAN
); 

CREATE TABLE Restaurante
( 
 idRestaurante INT PRIMARY KEY AUTO_INCREMENT,  
 cnpj CHAR(14) NOT NULL UNIQUE,
 nomeRestaurante VARCHAR(200) NOT NULL, 
 emailRestaurante VARCHAR(200) NOT NULL UNIQUE,  
 avaliacao DOUBLE,  
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
 id_Restaurante INT,  
 FOREIGN KEY(id_Restaurante) REFERENCES Restaurante (idRestaurante)
); 

CREATE TABLE Pedido 
( 
 idPedido INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 status VARCHAR(20) NOT NULL,  
 horarioPedido TIME,  
 horarioEntregue TIME,  
 idRestaurante INT,  
 idCliente INT,  
 idEntregador INT,  
 FOREIGN KEY(idRestaurante) REFERENCES Restaurante (idRestaurante),
 FOREIGN KEY(idCliente) REFERENCES Cliente (idCliente),
 FOREIGN KEY(idEntregador) REFERENCES Entregador (idEntregador)
); 

CREATE TABLE itemPedido 
( 
 idPedido INT,  
 idProduto INT,  
 pedidosProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 quantidade INT NOT NULL,  
 FOREIGN KEY(idPedido) REFERENCES Pedido (idPedido),
 FOREIGN KEY(idProduto) REFERENCES Produto (idProduto)
); 

CREATE TABLE administrador 
(
 nome VARCHAR(200),
 senha VARCHAR(200)
 );

SELECT SUM(Pr.preco) AS PrecoDoPedido
FROM itemPedido i
JOIN Pedido Pe
ON i.idPedido = Pe.idPedido
JOIN Produto Pr
ON i.idProduto = Pr.idProduto
WHERE i.idPedido = x;

SELECT R.nomeRestaurante, COUNT(P.idProduto) AS NumeroDeProdutosPorRestaurante
FROM Restaurante R
JOIN Produto P
ON P.id_Restaurante = R.idRestaurante
GROUP BY R.nomeRestaurante;

SELECT *
FROM Restaurante r
WHERE r.avaliacao >= x;

SELECT *
FROM Produto p
WHERE p.preco > x;

CREATE VIEW EntregadoresDisponiveis AS
SELECT *
FROM Entregador
WHERE disponivel = true;

SELECT *
FROM Produto
ORDER BY preco;
