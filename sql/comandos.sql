--Criar uma base de dados

CREATE DATABASE exemplo_progweb;

--Criar a tabela fabricantes

CREATE TABLE fabricantes(

id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,

nome VARCHAR(45) NOT NULL

);

--Criar a tabela produtos

CREATE TABLE produtos(

id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,

nome VARCHAR(45) NOT NULL,

descricao TEXT(500) NOT NULL,

fabricante_id TINYINT NOT NULL

);

--Criação da chave estrangeira (relacionamento)

ALTER TABLE produtos

ADD CONSTRAINT fk_produtos_fabricantes

FOREIGN KEY (fabricante_id) REFERENCES fabricantes(id);

--COMANDOS CRUD (INSTRUÇÕES PARA OPERAÇÕES EM DADOS NAS TABELAS)

--INSERT (CRIAR/INSERIR DADOS)

INSERT INTO fabricantes(nome) VALUES('LG');

INSERT INTO fabricantes(nome)VALUES('Dell'), ('Asus'), ('Apple'), ('Samsung'), ('Microsoft');

INSERT INTO produtos(nome, descricao, fabricante_id)VALUES('TV', 'Tela com 40 polegadas', 1);

INSERT INTO produtos(nome, descricao, fabricante_id)VALUES('Notebook', 'CPU Intel Core i7', 2);

INSERT INTO produtos(nome, descricao, fabricante_id)VALUES('Smartphone', 'Zenfone 5', 3);

INSERT INTO produtos(nome, descricao, fabricante_id)VALUES('Ultrabook', 'Equipamento para gamers', 3);

--Exercícios
--Insira mais 4 produtos na sua tabela

INSERT INTO produtos(nome, descricao, fabricante_id)VALUES('Tablet', 'Tela de 7 polegadas', 5),('Tablet', 'Tela de 10 polegadas', 4),('TV', 'Tela 32 polegadas', 5),('Xbox', 'HD de 1TB', 6)

--SELECT (LEITURA/CONSULTA DE DADOS)

SELECT * FROM fabricantes;

SELECT nome FROM fabricantes ORDER BY nome;

SELECT nome, descricao FROM produtos;

SELECT nome, descricao FROM produtos WHERE fabricante_id = 5;

SELECT * FROM produtos WHERE id > 2 AND id < 5;

SELECT nome FROM produtos WHERE fabricante_id = 3 OR fabricante_id = 1;

SELECT nome, descricao FROM produtos WHERE NOT fabricante_id = 1

/* Consulta relacionando dados das duas tabelas */
SELECT fabricantes.nome, produtos.nome 
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id;

SELECT 
    fabricantes.nome AS "Nome do Fabricante",   
    produtos.nome AS "Nome do Produto"
FROM produtos INNER JOIN fabricantes
ON produtos.fabricante_id = fabricantes.id
ORDER BY fabricantes.nome;
/* As vai criar um nome da coluna */
/* Order by ordena por ordem alfabetica*/

UPDATE fabricantes SET nome = "Motorola" WHERE id = 5;
/* Importante colocar o where se não ele vai substituir tudo */
UPDATE produtos SET nome = 'TV Led', descricao = 'Tela com 55 polegadas' WHERE id = 1;

-- Delete (Exclusão de dados)
DELETE FROM produtos WHERE id = 5;
/* Se usar sem o where iria apagar tudo */