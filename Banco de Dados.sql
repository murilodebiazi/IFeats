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
 idEntregador INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 nomeEntregador VARCHAR(200) NOT NULL,  
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
 idRestaurante INT PRIMARY KEY AUTO_INCREMENT,  
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
 id_Restaurante INT,  
 FOREIGN KEY(id_Restaurante) REFERENCES Restaurante (idRestaurante)
); 

CREATE TABLE Pedido 
( 
 idPedido INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 distancia INT NOT NULL,  
 entregue INT NOT NULL,  
 horarioPedido DATETIME,  
 tempoEstimado INT,  
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
 idPedido INT,  
 idProduto INT,  
 pedidosProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 quantidade INT NOT NULL,  
 FOREIGN KEY(idPedido) REFERENCES Pedido (idPedido),
 FOREIGN KEY(idProduto) REFERENCES Produto (idProduto)
); 

CREATE VIEW Cardapio AS 
SELECT R.nomeRestaurante, P.nomeProduto, P.preco
FROM Produto P
JOIN Restaurante R
ON P.id_Restaurante = R.idRestaurante;

SELECT SUM(Pr.preco) AS PreçoDoPedido
FROM itemPedido i
JOIN Pedido Pe
ON i.idPedido = Pe.idPedido
JOIN Produto Pr
ON i.idProduto = Pr.idProduto
WHERE i.idPedido = x;

SELECT GROUP_CONCAT(P.nomeProduto SEPARATOR ', ')
FROM Produto P
WHERE P.categoria = "";

SELECT R.nomeRestaurante, COUNT(P.idProduto) AS NumeroDeProdutos
FROM Produto P
JOIN Restaurante R
ON P.id_Restaurante = R.idRestaurante
GROUP BY R.nomeRestaurante
HAVING COUNT(P.idProduto) >= 5;
