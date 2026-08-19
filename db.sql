CREATE DATABASE nxt_burguer;
USE nxt_burguer;

CREATE TABLE unidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    descricao VARCHAR(250) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE funcionario (
    cpf CHAR(11) PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    idade TINYINT UNSIGNED,
    senha VARCHAR(250) NOT NULL,
    telefone VARCHAR(11),
    cargo ENUM('adm', 'usuario') NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    categoria   ENUM('bebida', 'comida', 'combo'),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;R