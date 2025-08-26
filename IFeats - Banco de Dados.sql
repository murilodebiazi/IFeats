CREATE TABLE Cliente 
( 
 idCliente INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 nomeCliente VARCHAR(200) NOT NULL,  
 enderecoCliente VARCHAR(255) NOT NULL,  
 telefoneCliente VARCHAR(11) NOT NULL,  
 generoCliente VARCHAR(10) NOT NULL,  
 CPFCliente CHAR(14) NOT NULL UNIQUE,  
 emailCliente VARCHAR(75) NOT NULL UNIQUE
); 

CREATE TABLE Produto 
( 
 idProduto INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT, 
 estoque INT NOT NULL,   
 nomeProduto VARCHAR(100) NOT NULL,  
 descricao TEXT NOT NULL,  
 categoria VARCHAR(25) NOT NULL,  
 idFastFood INT,  
 FOREIGN KEY(idFastFood) REFERENCES FastFood (idFastFood)
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
 disponivel BOOLEAN NOT NULL
); 

CREATE TABLE FastFood 
( 
 idRestaurante INT PRIMARY KEY,  
 nomeFastFood VARCHAR(200) NOT NULL,  
 avaliacao DOUBLE NOT NULL,  
 enderecoFastFood VARCHAR(255) NOT NULL,  
 telefoneFastFood VARCHAR(11)  
); 

CREATE TABLE Pedido 
( 
 idPedidos INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
 distancia INT NOT NULL,  
 entregue INT NOT NULL,  
 horarioPedido DATETIME,  
 tempoEstimado TIME,  
 horarioEntregue DATETIME,  
 idFastFood INT,  
 idCliente INT,  
 idEntregador INT,  
 FOREIGN KEY(idFastFood) REFERENCES FastFood (idFastFood),
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