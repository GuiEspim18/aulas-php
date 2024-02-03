# 1) Criar banco de dados para o microblog (ajuste para conter seu nome)
CREATE DATABASE microblog CHARACTER SET "utf8";

# 2) Criar tabela de usuários
CREATE TABLE usuarios(
	id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(45) NOT NULL,
	email VARCHAR(40) NOT NULL UNIQUE,
  	senha CHAR(60) NOT NULL,
	tipo ENUM('admin','editor') NOT NULL
);

# 3) Criar tabela de posts
CREATE TABLE posts(
	id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	titulo VARCHAR(100) NOT NULL,
	texto TEXT NOT NULL,
	resumo TEXT NOT NULL,
  	imagem VARCHAR(40) NOT NULL,
  	usuario_id SMALLINT NOT NULL
);

# 4) Criar chave estrangeira para relacionamento entre as tabelas
ALTER TABLE posts 
  ADD CONSTRAINT fk_posts_usuarios 
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id); 