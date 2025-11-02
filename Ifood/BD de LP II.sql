drop database FastFood;
create database FastFood;
use FastFood;

create table cad_Clientes
(
	id INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,  
	nome VARCHAR(200) NOT NULL,
    email VARCHAR(75) NOT NULL UNIQUE,
    senha VARCHAR(15) NOT NULL
);

create table cad_Item_Pedido
(
	id INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    descricao TEXT NOT NULL
);

create table cad_Pedidos
(
	id INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
    horario_inicial DATETIME,
    horario_final DATETIME,
    id_pedido INT,
    id_cliente INT,
	FOREIGN KEY(id_pedido) REFERENCES cad_Item_Pedido (id),
    FOREIGN KEY(id_cliente) REFERENCES cad_Clientes (id)
);

create table cad_Fornecedores
(
	id INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
	cnpj CHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(11) NOT NULL UNIQUE
);



